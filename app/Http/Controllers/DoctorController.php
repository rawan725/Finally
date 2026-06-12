<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();

        return view('doctor', compact('doctors'));
    }
}
