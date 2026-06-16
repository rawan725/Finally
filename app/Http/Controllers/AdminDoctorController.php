<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $doctors = Doctor::latest()->get();

        return view('admin-doctors', compact('doctors'));
    }

    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('admin-doctor-create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialty' => ['required', 'string', 'max:255'],
            'experience_years' => ['required', 'integer', 'min:0'],
            'consultation_price' => ['required', 'numeric', 'min:0'],
            'bio' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'response_time' => ['nullable', 'string', 'max:100'],
            'is_available' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/doctors'),
                $imageName
            );
        }

        Doctor::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'experience_years' => $request->experience_years,
            'consultation_price' => $request->consultation_price,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'whatsapp_number' => $request->whatsapp_number,
            'response_time' => $request->response_time,
            'is_available' => $request->has('is_available'),
            'image' => $imageName,
        ]);

        return redirect()->route('admin.doctors')
            ->with('success', 'تمت إضافة الطبيب بنجاح');
    }

    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $doctor = Doctor::findOrFail($id);

        return view('admin-doctor-edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialty' => ['required', 'string', 'max:255'],
            'experience_years' => ['required', 'integer', 'min:0'],
            'consultation_price' => ['required', 'numeric', 'min:0'],
            'bio' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'response_time' => ['nullable', 'string', 'max:100'],
            'is_available' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imageName = $doctor->image;

        if ($request->hasFile('image')) {
            if ($doctor->image) {
                $oldImagePath = public_path('images/doctors/' . $doctor->image);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/doctors'),
                $imageName
            );
        }

        $doctor->update([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'experience_years' => $request->experience_years,
            'consultation_price' => $request->consultation_price,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'whatsapp_number' => $request->whatsapp_number,
            'response_time' => $request->response_time,
            'is_available' => $request->has('is_available'),
            'image' => $imageName,
        ]);

        return redirect()->route('admin.doctors')
            ->with('success', 'تم تعديل الطبيب بنجاح');
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $doctor = Doctor::findOrFail($id);

        if ($doctor->image) {
            $imagePath = public_path('images/doctors/' . $doctor->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $doctor->delete();

        return redirect()->route('admin.doctors')
            ->with('success', 'تم حذف الطبيب بنجاح');
    }
}