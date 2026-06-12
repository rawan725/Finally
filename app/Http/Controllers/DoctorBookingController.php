<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorBooking;
use Illuminate\Http\Request;

class DoctorBookingController extends Controller
{
    public function create()
    {
        return redirect()->route('doctor');
    }

    public function book(Doctor $doctor, $type)
    {
        if (!in_array($type, ['online', 'appointment'])) {
            abort(404);
        }

        return view('doctor-booking', compact('doctor', 'type'));
    }

    public function storeForDoctor(Request $request, Doctor $doctor, $type)
    {
        if (!in_array($type, ['online', 'appointment'])) {
            abort(404);
        }

        $request->validate([
            'pet_name' => ['required', 'string', 'max:255'],
            'pet_type' => ['required', 'string', 'max:100'],
            'problem_title' => ['required', 'string', 'max:255'],
            'problem_description' => ['required', 'string'],
            'booking_date' => ['nullable', 'date'],
            'booking_time' => ['nullable'],
        ]);

        DoctorBooking::create([
            'user_id' => auth()->id(),
            'doctor_id' => $doctor->id,
            'consultation_type' => $type,
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'problem_title' => $request->problem_title,
            'problem_description' => $request->problem_description,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
        ]);

        return redirect()->route('doctor')
            ->with('success', 'تم إرسال طلب الاستشارة بنجاح، سيتم التواصل معك قريباً');
    }

    public function adminIndex()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $bookings = DoctorBooking::with(['user', 'doctor'])
            ->latest()
            ->get();

        return view('admin-doctor-bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'status' => ['required', 'in:pending,accepted,completed,cancelled'],
        ]);

        $booking = DoctorBooking::findOrFail($id);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.doctor.bookings')
            ->with('success', 'تم تحديث حالة الاستشارة بنجاح');
    }
}
