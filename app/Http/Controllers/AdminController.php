<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Helpers\Helper;
use App\Models\transactions;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

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
                ->whereYear('created_at', 2023)
                ->whereMonth('created_at', 12)
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

            // GET REPORT CHARTS

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
                $records = transactions::with('user', 'room')->whereDate('created_at', today())->count();
                break;
            case 'This Week':
                $records = transactions::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
                break;
            case 'This Month':
                $records = transactions::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->count();
                break;
        }

        return view('/admin/main/sales', compact('records'))->render();
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
                break;
            case 'This Week':
                $revenue = transactions::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where(function ($query) {
                    $query->where('status', 'paid')
                        ->orWhere('status', 'completed');
                })->sum('bill');
                break;
            case 'This Month':
                $revenue = transactions::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)->where(function ($query) {
                        $query->where('status', 'paid')
                            ->orWhere('status', 'completed');
                    })->sum('bill');
                break;
        }

        return view('/admin/main/revenue', compact('revenue'))->render();
    }
    //GET REGISTRATIONS DATA
    public function getRegister(Request $request)
    {
        $dateFilter = $request->input('dateFIlter');

        switch ($dateFilter) {
            case 'Today':
                $records = users::whereDate('created_at', today())->count();
                break;
            case 'This Week':
                $records = users::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
                break;
            case 'This Month':
                $records = users::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->count();
                break;
        }

        return view('/admin/main/customer', compact('records'))->render();
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
