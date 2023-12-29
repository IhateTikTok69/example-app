<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use App\Http\Requests\StoreroomsRequest;
use App\Http\Requests\UpdateroomsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomsWithFacilities = rooms::paginate(14);
        //['rooms' => $roomsWithFacilities, 'selected' => 'rooms']
        return view('/admin/rooms/index', ['selected' => 'rooms',]);
    }
    public function fetchData(Request $request)
    {
        $rooms = rooms::query();

        // Apply amenity filter if provided in the request
        $amenities = $request->input('amenities', []);

        if (!empty($amenities)) {
            $rooms->where(function ($query) use ($amenities) {
                foreach ($amenities as $amenity) {
                    $query->where($amenity, true);
                }
            });
        }

        // Paginate the results
        $rooms = $rooms->paginate(14);


        return view('/admin/rooms/data', compact('rooms'))->render();
    }

    public function NewRoom()
    {
        return view('/admin/add', [
            "selected" => "add"
        ]);
    }
    public function delete(Request $request)
    {
        $key = $request->input('id');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rooms')->where('roomNum', $key)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back();
    }
    public function insert(Request $request)
    {
        $price = $request->input('price');
        $availability = $request->input('availability');
        $wifi = $request->input('wifi');
        $gym = $request->input('gym');
        $breakfast = $request->input('breakfast');
        $smoking = $request->input('smoking');
        $park = $request->input('park');
        $pool = $request->input('pool');
        rooms::create([
            'price' => $price,
            'availability' => $availability,
            'wifi' => $wifi,
            'gym' => $gym,
            'breakfast' => $breakfast,
            'smoking' => $smoking,
            'park' => $park,
            'pool' => $pool,
        ]);
        return back();
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
    public function store(StoreRoomsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rooms $rooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomsRequest $request, rooms $rooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rooms $rooms)
    {
        //
    }
}
