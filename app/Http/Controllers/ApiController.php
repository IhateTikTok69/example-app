<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Models\users;
use App\Models\product;

class ApiController extends Controller
{
    public function getDashboardData(Request $request)
    {
        // GET REPORT CHARTS
        $sales = transactions::select('trans_id', 'created_at', 'bill')
            ->whereYear('created_at', now())
            ->whereMonth('created_at', now())
            ->where(function ($query) {
                $query->where('status', 'paid')
                    ->orWhere('status', 'completed');
            })
            ->orderBy('created_at')->get() // Sort by created_at in ascending order
            ->groupBy(function ($sales) {
                return Carbon::parse($sales->created_at)->format('Y/m/d');
            });
        $days = [];
        $salesCount = [];
        foreach ($sales as $sale => $values) {
            $days[] = $sale;
            $salesCount[] = $values->sum('bill');
        }
        // GET TOP SELLING ITEMS 
        $topSelling = DB::table('transactions')
            ->select('transactions.product_id', 'products.prevImg', 'products.item_name', DB::raw('SUM(transactions.bill) as total_bill'), 'products.price', DB::raw('COUNT(transactions.trans_id) as total_sold'))
            ->join('products', 'transactions.product_id', '=', 'products.product_id')
            ->where('status', 'completed')
            ->orWhere('status', 'paid')
            ->groupBy('transactions.product_id', 'products.item_name', 'products.price', 'products.prevImg')
            ->orderByDesc('total_bill')
            ->limit(10)
            ->get();
        $recent = transactions::orderBy('created_at', 'desc')->take('6')->get();
        return response()->json([
            'salesCount' => $salesCount,
            'days' => $days,
            'recents' => $recent,
            'topSelling' => $topSelling,
        ]);
    }

    public function index()
    {
    }
}
