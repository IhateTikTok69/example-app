<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use App\Http\Requests\StoreroomsRequest;
use App\Http\Requests\UpdateroomsRequest;
use Illuminate\Http\Request;

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
