<?php

namespace App\Http\Controllers;

use App\Models\Supply;

class SupplyController extends Controller
{
    public function index()
    {
        $supplies = Supply::all();

        return view('supplies', compact('supplies'));
    }

    public function show($id)
    {
        $supply = Supply::findOrFail($id);

        return view('supply-details', compact('supply'));
    }

    public function category($category)
    {
        $supplies = Supply::where('category', '=', $category)->get();

        return view('supplies', compact('supplies', 'category'));
    }
}
