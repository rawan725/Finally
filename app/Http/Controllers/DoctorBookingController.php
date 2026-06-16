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
        'severity_level' => ['required', 'in:simple,moderate,emergency'],
        'case_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'booking_date' => ['nullable', 'date'],
        'booking_time' => ['nullable'],
    ]);

    $imageName = null;

    if ($request->hasFile('case_image')) {
        $imageName = time() . '_' . $request->file('case_image')->getClientOriginalName();

        $request->file('case_image')->move(
            public_path('images/doctor-bookings'),
            $imageName
        );
    }

    $severityLabels = [
        'simple' => 'بسيطة',
        'moderate' => 'متوسطة',
        'emergency' => 'طارئة',
    ];

    $typeLabel = $type === 'online'
        ? 'استشارة أونلاين'
        : 'حجز موعد عيادة';

    $doctorPhone = $doctor->phone ?: $doctor->whatsapp_number;

    $smsMessage =
        "Smart Pet - إشعار طبيب\n"
        . "لديك طلب طبي جديد من المنصة.\n\n"
        . "نوع الطلب: " . $typeLabel . "\n"
        . "اسم الحيوان: " . $request->pet_name . "\n"
        . "نوع الحيوان: " . $request->pet_type . "\n"
        . "درجة الحالة: " . ($severityLabels[$request->severity_level] ?? 'بسيطة') . "\n"
        . "عنوان المشكلة: " . $request->problem_title . "\n"
        . "تاريخ الموعد: " . ($request->booking_date ?? 'غير محدد') . "\n"
        . "وقت الموعد: " . ($request->booking_time ?? 'غير محدد');

    $smsSent = !empty($doctorPhone);

    DoctorBooking::create([
        'user_id' => auth()->id(),
        'doctor_id' => $doctor->id,
        'consultation_type' => $type,
        'pet_name' => $request->pet_name,
        'pet_type' => $request->pet_type,
        'problem_title' => $request->problem_title,
        'problem_description' => $request->problem_description,
        'severity_level' => $request->severity_level,
        'case_image' => $imageName,
        'sms_sent' => $smsSent,
        'sms_message' => $smsMessage,
        'sms_sent_at' => $smsSent ? now() : null,
        'booking_date' => $request->booking_date,
        'booking_time' => $request->booking_time,
        'status' => 'pending',
    ]);

    return redirect()->route('doctor')
        ->with('success', 'تم إرسال طلب الحجز للطبيب بنجاح، وتم إنشاء إشعار SMS تجريبي للطبيب');
}

    public function store(Request $request)
    {
        return redirect()->route('doctor');
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

    public function myConsultations()
    {
        $bookings = DoctorBooking::with('doctor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('my-consultations', compact('bookings'));
    }

    public function destroy($id)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $booking = DoctorBooking::findOrFail($id);

    if ($booking->case_image) {
        $imagePath = public_path('images/doctor-bookings/' . $booking->case_image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $booking->delete();

    return redirect()->route('admin.doctor.bookings')
        ->with('success', 'تم حذف الاستشارة بنجاح');
}
}