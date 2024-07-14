<?php

namespace App\Services;

use Illuminate\Http\Request;

class FilterService
{

    public function apllyFilter($query, Request $request): void
    {
        $this->applyTypeFilter($query, $request);
        $this->applyCategoryFilter($query, $request);
        $this->applyDateFilter($query, $request);
    }

    protected function applyTypeFilter($query, Request $request): void
    {
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
    }

    protected function applyCategoryFilter($query, Request $request): void
    {
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('title', $request->input('category'));

                if ($request->filled('only-primary-category')) {
                    $query->where('primary_category', true);
                }
            });
        }
    }

    protected function applyDateFilter($query, Request $request): void
    {
        if ($request->filled('starting-date') || $request->filled('end-date')) {
            $request->validate([
                'starting-date' => ['required', 'before_or_equal:end-date'],
                'end-date' => ['required', 'after_or_equal:starting-date'],
            ]);

            $query->whereBetween('date', [$request->input('starting-date'), $request->input('end-date')]);
        }
    }

    public static function getActiveFilter(Request $request): array
    {

        $activeFilter = [];

        if ($request->filled('type')) {
            array_push($activeFilter, ucfirst($request->input('type')));
        }

        if ($request->filled('category')) {
            array_push($activeFilter, ucfirst($request->input('category')));
        }

        if ($request->filled('starting-date') || $request->filled('end-date')) {
            array_push($activeFilter, $request->input('starting-date') . " - " . $request->input('end-date'));
        }

        return $activeFilter;
    }

}