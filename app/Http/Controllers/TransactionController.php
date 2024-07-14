<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Services\CategoryService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService,
        protected CategoryService $categoryService
    ) {
    }

    public function index(Request $request)
    {
        // Building query based on the active Filter
        $query = $this->transactionService->buildQuery($request);

        $transactions = $query->get()->all();
        $transactionsPaginated = $this->transactionService->setupPagination($query, $request);
        $categories = $this->categoryService->getCategories();
        $activeFilter = $this->transactionService->getActiveFilter($request);
        $totalBalance = $this->transactionService->calculateBalance($transactions);

        return view('transaction.index', [
            'transactions' => $transactionsPaginated,
            'categories' => $categories,
            'activeFilter' => $activeFilter,
            'totalBalance' => $totalBalance,
        ]);
    }

    public function create()
    {
        $categories = $this->categoryService->getCategories();

        return view('transaction.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreTransactionRequest $request)
    {
        // Persisting transaction to database and attach categories
        $this->transactionService->createTransaction($request);

        return redirect('/transactions');
    }

    public function edit($id)
    {
        $transaction = $this->transactionService->getTransaction($id);
        $categories = $this->categoryService->getCategories();

        $this->transactionService->flashTransaction($transaction);

        return view('transaction.edit', [
            'transaction' => $transaction,
            'categories' => $categories,
        ]);
    }

    public function update(StoreTransactionRequest $request, $id)
    {
        $transaction = $this->transactionService->getTransaction($id);

        $this->transactionService->updateTransaction($transaction, $request);

        return redirect('/transactions');
    }


    public function destroy($id)
    {
        $transaction = $this->transactionService->getTransaction($id);

        $transaction->delete();

        return back();
    }
}
