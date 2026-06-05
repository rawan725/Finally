<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
{
    $animals = Animal::all();
    $type = 'all';

    return view('animals', compact('animals', 'type'));
}

    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view('animal-details', compact('animal'));
    }

    public function category($type)
{
    $animals = Animal::where('type', '=', $type)->get();

    return view('animals', compact('animals', 'type'));
}
}