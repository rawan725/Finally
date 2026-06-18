<?php

namespace App\Http\Controllers;

use App\Models\PetMedicalProfile;
use Illuminate\Http\Request;

class PetMedicalProfileController extends Controller
{
    public function index()
    {
        $profile = PetMedicalProfile::where('user_id', auth()->id())
            ->latest()
            ->first();

        return view('pet-medical-profile', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => ['required', 'string', 'max:255'],
            'pet_type' => ['required', 'string', 'max:255'],
            'age' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:100'],
            'health_status' => ['nullable', 'string'],
            'vaccinations' => ['nullable', 'string'],
            'allergies' => ['nullable', 'string'],
            'medications' => ['nullable', 'string'],
            'medical_notes' => ['nullable', 'string'],
        ]);

        PetMedicalProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'pet_name' => $request->pet_name,
                'pet_type' => $request->pet_type,
                'age' => $request->age,
                'gender' => $request->gender,
                'health_status' => $request->health_status,
                'vaccinations' => $request->vaccinations,
                'allergies' => $request->allergies,
                'medications' => $request->medications,
                'medical_notes' => $request->medical_notes,
            ]
        );

        return redirect()->route('pet.medical.profile')
            ->with('success', 'تم حفظ الملف الطبي بنجاح');
    }
}
