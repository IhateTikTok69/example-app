<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\product_images;

class ProductController extends Controller
{

    public function retrieveProductInfo($product_id)
    {
        $product = Product::find($product_id);
        $img = product_images::select('path')->where('product_id', $product_id)->get();
        return view('/product/index', compact('product', 'img'));
    }
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
        DB::table('products')->where('product_id', $key)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back();
    }
    public function insert(Request $request)
    {
        $latestProduct = Product::latest('created_at')->first();
        $latestID = $latestProduct->product_id + 1;
        $itemName = $request->input('name');
        $price = $request->input('price');
        if ($request->input('category') === null) {
            $cat_id = 1;
        } else {
            $cat_id = $request->input('category');
        }

        if ($request->input('sub-category') === null) {
            $sub_cat_id = 1;
        } else {
            $sub_cat_id = $request->input('sub-category');
        }
        $item_desc = $request->input('item_desc');
        $height = $request->input('Height');
        $width = $request->input('Width');
        $length = $request->input('Length');
        $weight = $request->input('weight');
        $stock = $request->input('stock');

        $file1 = $request->file('previmg');
        $previmg = time() . '_' . $file1->getClientOriginalName();
        $file1->move(public_path('assets/products'), $previmg);

        product::create([
            'item_name' => $itemName,
            'price' => $price,
            'item_desc' => $item_desc,
            'cat_id' => $cat_id,
            'sub_cat_id' => $sub_cat_id,
            'weight' => $weight,
            'stock' => $stock,
            'height' => $height,
            'width' => $width,
            'length' => $length,
            'previmg' => $previmg,
        ]);

        $file2 = $request->file('img1');
        if ($file2 != null) {
            $product_id = $latestID;
            $path = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('assets/products'), $path);
            product_images::create([
                'product_id' => $product_id,
                'path' => $path,
            ]);
        }
        $file3 = $request->file('img2');
        if ($file3 != null) {
            $product_id = $latestID;
            $path = time() . '_' . $file3->getClientOriginalName();
            $file3->move(public_path('assets/products'), $path);
            product_images::create([
                'product_id' => $product_id,
                'path' => $path,
            ]);
        }
        $file4 = $request->file('img3');
        if ($file4 != null) {
            $product_id = $latestID;
            $path = time() . '_' . $file4->getClientOriginalName();
            $file4->move(public_path('assets/products'), $path);
            product_images::create([
                'product_id' => $product_id,
                'path' => $path,
            ]);
        }
        $file5 = $request->file('img4');
        if ($file5 != null) {
            $product_id = $latestID;
            $path = time() . '_' . $file5->getClientOriginalName();
            $file5->move(public_path('assets/products'), $path);
            product_images::create([
                'product_id' => $product_id,
                'path' => $path,
            ]);
        }
        return redirect()->route('products.show', ['product_id' => $latestID])->with('success', 'Product updated successfully.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
}
