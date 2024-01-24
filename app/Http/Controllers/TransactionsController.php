<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\StoretransactionsRequest;
use App\Http\Requests\UpdatetransactionsRequest;
use Faker\Factory as Faker;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/admin/orders/index', [
            "selected" => "transactions",
            "Title" => 'Transactions History',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function GetAllTransactions(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/allData', compact('items'))->render();
    }
    public function GetNewTransactions(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->where('transactions.status', 'created')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/newOrders', compact('items',))->render();
    }
    public function getPaidOrders(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->where('transactions.status', 'paid')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/paidOrders', compact('items',))->render();
    }
    public function GetInShipment(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->where('transactions.status', 'in-shipment')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/inShipment', compact('items',))->render();
    }
    public function GetCompleted(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->where('transactions.status', 'completed')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/completedOrders', compact('items',))->render();
    }
    public function GetCanceled(Request $request)
    {
        $items = transactions::select('transactions.bill', 'products.item_name', 'products.prevImg', 'transactions.status', 'transactions.created_at', 'transactions.updated_at', 'transactions.receipt_id', 'transactions.name')
            ->join('products', 'transactions.product_id', 'products.product_id')
            ->where('transactions.status', 'canceled')
            ->orderBy('updated_at', 'asc');
        $items = $items->paginate(5);
        return view('/admin/orders/canceledOrders', compact('items',))->render();
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
