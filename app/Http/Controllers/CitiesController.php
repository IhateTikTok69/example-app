<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Http\Requests\StorecitiesRequest;
use App\Http\Requests\UpdatecitiesRequest;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorecitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cities $cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecitiesRequest $request, cities $cities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cities $cities)
    {
        //
    }
}
