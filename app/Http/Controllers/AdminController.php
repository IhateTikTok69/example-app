<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Helpers\Helper;
use App\Models\transactions;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            // GET REPORT CHARTS
            $sales = transactions::select('trans_id', 'created_at', 'bill')
                ->whereYear('created_at', now())
                ->whereMonth('created_at', now())
                ->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })
                ->orderBy('created_at')->get()
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
            $countUser = users::get();
            $recent = transactions::orderBy('created_at', 'desc')->take('6')->get();
            return view('/admin/main/index', [
                "selected" => "dashboard",
                "Title" => 'Dashboard',
                'user' => $user,
                'salesCount' => $salesCount,
                'days' => $days,
                'countUser' => $countUser,
                'recents' => $recent,
                'topSelling' => $topSelling,
            ]);
        } else {
            return redirect()->route('adminLogin')->with('Error', 'Invalid Credentials');
        }
    }
    // GET REPORT CHARTS

    //GET SALES DATA
    public function getSales(Request $request)
    {
        $dateFilter = $request->input('dateFIlter');

        switch ($dateFilter) {
            case 'Today':
                $yesterday = Carbon::now()->subDay();
                $records = transactions::with('user', 'room')->whereDate('created_at', today())->count();
                $yesterCheck = transactions::with('user', 'room')->whereDate('created_at', $yesterday)->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Week':
                $records = transactions::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
                $yesterCheck = transactions::with('user', 'room')->whereDate('created_at', Carbon::now()->subWeek())->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Month':
                $yearcheck = Carbon::now()->year;
                $monthCheck = Carbon::now()->month;
                if (now()->month === 1) {
                    $yearcheck = Carbon::now()->subYear();
                    $monthCheck = 12;
                }
                $records = transactions::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->count();
                $yesterCheck = transactions::whereYear('created_at', $yearcheck)
                    ->whereMonth('created_at', $monthCheck)
                    ->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
        }

        return view('/admin/main/sales', compact('records', 'compare'))->render();
    }

    //GET REVENUE DATA
    public function getRevenue(Request $request)
    {
        $dateFilter = $request->input('dateFIlter');

        switch ($dateFilter) {
            case 'Today':
                $revenue = transactions::whereDate('created_at', today())->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })->sum('bill');
                $yesterCheck = transactions::whereDate('created_at', now()->subDay())->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })->sum('bill');
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($revenue - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Week':
                $revenue = transactions::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })->sum('bill');
                $yesterCheck = transactions::whereDate('created_at', Carbon::now()->subWeek())->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })->sum('bill');
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($revenue - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Month':
                $yearcheck = Carbon::now()->year;
                $monthCheck = Carbon::now()->month;
                if (now()->month === 1) {
                    $yearcheck = Carbon::now()->subYear();
                    $monthCheck = 12;
                }
                $revenue = transactions::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)->where(function ($query) {
                        $query->where('status', 'paid')
                            ->orWhere('status', 'completed');
                    })->sum('bill');
                $yesterCheck = transactions::whereYear('created_at', $yearcheck)
                    ->whereMonth('created_at', $monthCheck)->where(function ($query) {
                        $query->where('status', 'paid')
                            ->orWhere('status', 'completed');
                    })->sum('bill');
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($revenue - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
        }

        return view('/admin/main/revenue', compact('revenue', 'compare'))->render();
    }
    //GET REGISTRATIONS DATA
    public function getRegister(Request $request)
    {
        $dateFilter = $request->input('dateFIlter');

        switch ($dateFilter) {
            case 'Today':
                $records = users::whereDate('created_at', today())->count();
                $yesterCheck = users::whereDate('created_at', now()->subDay())->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Week':
                $records = users::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
                $yesterCheck = users::whereDate('created_at', now()->subWeek())->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
            case 'This Month':
                $yearcheck = Carbon::now()->year;
                $monthCheck = Carbon::now()->month;
                if (now()->month === 1) {
                    $yearcheck = Carbon::now()->subYear();
                    $monthCheck = 12;
                }
                $records = users::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->count();
                $yesterCheck = users::whereYear('created_at', $yearcheck)
                    ->whereMonth('created_at', $monthCheck)
                    ->count();
                if ($yesterCheck === 0) {
                    $compare = 0;
                } else {
                    $compare = number_format(($records - $yesterCheck) / $yesterCheck * 100, 1);
                }
                break;
        }

        return view('/admin/main/customer', compact('records', 'compare'))->render();
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
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
