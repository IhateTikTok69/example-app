<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use App\Http\Requests\StoretransactionsRequest;
use App\Http\Requests\UpdatetransactionsRequest;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/admin/trans', [
            "selected" => "transactions",
            "Title" => 'Transactions History',
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
    public function store(StoretransactionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransactionsRequest $request, transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transactions $transactions)
    {
        //
    }
}
