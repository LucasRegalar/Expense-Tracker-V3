<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandingorderRequest;
use App\Http\Requests\UpdateStandingorderRequest;
use App\Models\Standingorder;
use App\Models\Category;
use App\Services\StandingorderService;

class StandingorderController extends Controller
{
    protected $standingorderService;

    public function __construct(StandingorderService $standingorderService)
    {
        $this->standingorderService = $standingorderService;
    }
    public function index()
    {

        $categories = $this->standingorderService->getCategories();

        return view('standingorders', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStandingorderRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Standingorder $standingorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStandingorderRequest $request, Standingorder $standingorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standingorder $standingorder)
    {
        //
    }
}
