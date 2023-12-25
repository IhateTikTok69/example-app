<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\transactions;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $sales = transactions::where('status', 'paid')->orWhere('status', 'completed')->count();
            $revenue = transactions::where('status', 'paid')->orWhere('status', 'completed')->sum('bill');
            $countUser = users::count();
            $recent = transactions::latest('updated_at')->take('6')->get();
            return view('/admin/main/index', [
                "selected" => "dashboard",
                'user' => $user,
                'revenue' => $revenue,
                'Sales' => $sales,
                'countUser' => $countUser,
                'recents' => $recent,
            ]);
        } else {
            return redirect()->route('adminLogin')->with('Error', 'Invalid Credentials');
        }
    }

    public function getSales(Request $request)
    {
        $dateFilter = $request->input('dateFIlter');

        switch ($dateFilter) {
            case 'today':
                $records = transactions::whereDate('created_at', today())->count();
                break;
            case 'this_week':
                $records = transactions::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
                break;
            case 'this_month':
                $records = transactions::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->get();
                break;
        }

        return view('/admin/main/sales', compact('records'))->render();
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
