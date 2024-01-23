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
        //['rooms' => $roomsWithFacilities, 'selected' => 'rooms']
        return view('/admin/products/index', [
            'selected' => 'products',
            "Title" => 'Rooms Info',
        ]);
    }
    public function fetchData(Request $request)
    {
        $items = product::query();

        // Apply amenity filter if provided in the request
        $amenities = $request->input('amenities', []);

        if (!empty($amenities)) {
            $items->where(function ($query) use ($amenities) {
                foreach ($amenities as $amenity) {
                    $query->where($amenity, true);
                }
            });
        }

        // Paginate the results
        $items = $items->paginate(10);


        return view('/admin/products/data', compact('items'))->render();
    }

    public function newProduct()
    {
        return view('/admin/add', [
            "selected" => "add",
            "Title" => 'Add New Item',
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
        var_dump($file1 = $request->file('previmg'));
        $latestProduct = Product::latest('created_at')->first();
        $latestID = $latestProduct->product_id + 1;
        $itemName = $request->input('name');
        $price = $request->input('price');
        if ($request->input('category') === null) {
            $category = 1;
        } else {
            $category = $request->input('category');
        }

        if ($request->input('sub-category') === null) {
            $sub_category = 1;
        } else {
            $sub_category = $request->input('sub-category');
        }
        $item_desc = $request->input('item_desc');
        $height = $request->input('Height');
        $width = $request->input('Width');
        $length = $request->input('Length');
        $weight = $request->input('weight');
        $stock = $request->input('stock');

        //so it's easy to read
        $file1 = $request->file('previmg');
        $previmg = time() . '_' . $file1->getClientOriginalName();
        $file2 = $request->file('img1');
        $file3 = $request->file('img2');
        $file4 = $request->file('img3');
        $file5 = $request->file('img4');
        $pool = $request->input('pool');

        product::create([
            'item_name' => $itemName,
            'price' => $price,
            'item_desc' => $item_desc,
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
