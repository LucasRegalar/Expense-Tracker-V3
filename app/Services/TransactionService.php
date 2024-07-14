<?php

namespace App\Services;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FilterService;

class TransactionService
{
    public function __construct(
        protected FilterService $filterService,
        protected Calculator $calculator,
        protected CategoryService $categoryService
    ) {
    }

    public function getActiveFilter(Request $request): array
    {
        return $this->filterService->getActiveFilter($request);
    }

    public function getTransaction($id): Transaction
    {
        return Auth::user()->transactions()->findOrFail($id);
    }

    //Calculation Service
    public function calculateBalance(array $transactions): int
    {
        $this->calculator->setTransactions($transactions);
        $totalBalance = $this->calculator->calculateTotalBalance();

        return $totalBalance;
    }

    //Create Service
    public function createTransaction(StoreTransactionRequest $request): Transaction
    {
        $transaction = $this->create($request);
        $this->attachCategories($transaction, $request);

        return $transaction;
    }

    protected function create(StoreTransactionRequest $request): Transaction
    {
        $transaction = Transaction::create([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount') * 100,
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'user_id' => Auth::id()
        ]);

        return $transaction;
    }

    protected function attachCategories(Transaction $transaction, StoreTransactionRequest $request): void
    {
        $primaryCategory = $this->categoryService->findCategoryByName($request->input('primary_category'));
        $secondaryCategory = $this->categoryService->findCategoryByName($request->input('secondary_category'));

        $transaction->categories()->attach([
            $primaryCategory->id => ['primary_category' => true],
            $secondaryCategory->id => ['primary_category' => false],
        ]);
    }

    //Flashing Service
    public function flashTransaction(Transaction $transaction)
    {

        $primaryCategory = $this->categoryService->getPrimaryCategory($transaction);
        $secondaryCategory = $this->categoryService->getSecondaryCategory($transaction);

        session()->flash('_old_input', [
            'title' => $transaction->title,
            'amount' => $transaction->amount / 100,
            'date' => $transaction->date,
            'description' => $transaction->description,
            'type' => $transaction->type,
        ]);

        if ($primaryCategory) {
            session()->flash('_old_input.primary_category', $primaryCategory->title);
        }
        if ($secondaryCategory) {
            session()->flash('_old_input.secondary_category', $secondaryCategory->title);
        }
    }

    //Query Service
    public function buildQuery(Request $request)
    {
        $query = Auth::user()->transactions();
        $this->filterService->apllyFilter($query, $request);
        $query->orderBy('date', 'desc');

        return $query;
    }

    public function setupPagination($query, $request)
    {
        return $query->paginate(5)->appends($request->except('page'));
    }

    //Update Servuce
    public function updateTransaction(Transaction $transaction, StoreTransactionRequest $request): Transaction
    {
        $this->updateTransactionTable($transaction, $request);
        $this->syncCategories($transaction, $request);

        return $transaction;
    }

    protected function updateTransactionTable(Transaction $transaction, StoreTransactionRequest $request): Transaction
    {
        $transaction->update([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount') * 100,
            'date' => $request->input('date'),
            'description' => $request->input('description'),
        ]);

        return $transaction;
    }

    protected function syncCategories(Transaction $transaction, StoreTransactionRequest $request)
    {
        $primaryCategory = $this->categoryService->findCategoryByName($request->input('primary_category'));
        $secondaryCategory = $this->categoryService->findCategoryByName($request->input('secondary_category'));

        $syncData = [
            "$primaryCategory->id" => ['primary_category' => true],
            "$secondaryCategory->id" => ['primary_category' => false],
        ];

        $transaction->categories()->sync($syncData);
    }
}
