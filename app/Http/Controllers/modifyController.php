<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modifyController extends Controller
{
    public function index()
    {
        return view('/admin/modify', [
            "selected" => "modify",
            "Title" => 'Modify Web',
        ]);
    }
}
