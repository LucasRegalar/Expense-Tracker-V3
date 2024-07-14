<?php

namespace App\Services;

class Calculator
{

    protected $transactions;

    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }

    public function calculateTotalIncome(): int
    {

        $incomes = array_filter($this->transactions, function ($transaction) {
            return $transaction->type === 'income';
        });

        $totalIncome = array_reduce($incomes, function ($carry, $income) {
            return $carry + $income->amount;
        }, 0);

        return $totalIncome;
    }

    public function calculateTotalExpense(): int
    {

        $expenses = array_filter($this->transactions, function ($transaction) {
            return $transaction->type === 'expense';
        });

        $totalExpense = array_reduce($expenses, function ($carry, $expense) {
            return $carry + $expense->amount;
        }, 0);

        return $totalExpense;
    }

    public function calculateTotalBalance(): int
    {

        $totalBalance = $this->calculateTotalIncome() - $this->calculateTotalExpense();

        return $totalBalance;
    }
}