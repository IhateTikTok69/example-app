<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomsWithFacilities = product::paginate(14);
        //['rooms' => $roomsWithFacilities, 'selected' => 'rooms']
        return view('/admin/rooms/index', [
            'selected' => 'rooms',
            "Title" => 'Rooms Info',
        ]);
    }
    public function fetchData(Request $request)
    {
        $rooms = product::query();

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
        $rooms = $rooms->paginate(10);


        return view('/admin/rooms/data', compact('rooms'))->render();
    }

    public function NewRoom()
    {
        return view('/admin/add', [
            "selected" => "add",
            "Title" => 'New Rooms',
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
        $type = $request->input('type');
        $wifi = $request->input('wifi');
        $gym = $request->input('gym');
        $breakfast = $request->input('breakfast');
        $smoking = $request->input('smoking');
        $park = $request->input('park');
        $pool = $request->input('pool');
        product::create([
            'price' => $price,
            'availability' => $availability,
            'roomType' => $type,
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
}
