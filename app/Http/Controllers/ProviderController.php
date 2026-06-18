<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function dashboard()
    {
        $provider = auth()->user()->provider;

        return view('provider-dashboard', compact('provider'));
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:clinic,doctor,store,grooming_center'],
            'phone' => ['nullable', 'string', 'max:30'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Provider::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'business_name' => $request->business_name,
                'type' => $request->type,
                'phone' => $request->phone,
                'whatsapp_number' => $request->whatsapp_number,
                'email' => $request->email,
                'address' => $request->address,
                'description' => $request->description,
                'status' => 'pending',
            ]
        );

        auth()->user()->update([
            'role' => 'provider',
        ]);

        return redirect()->route('provider.dashboard')
            ->with('success', 'تم إرسال طلب الانضمام كمزود خدمة بنجاح، بانتظار موافقة الأدمن');
    }

    public function adminIndex()
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $providers = Provider::with('user')
        ->latest()
        ->get();

    return view('admin-providers', compact('providers'));
}

public function updateStatus(Request $request, Provider $provider)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $request->validate([
        'status' => ['required', 'in:pending,approved,rejected'],
    ]);

    $provider->update([
        'status' => $request->status,
    ]);

    if ($request->status === 'approved') {
        $provider->user->update([
            'role' => 'provider',
        ]);
    }

    if ($request->status === 'rejected') {
        $provider->user->update([
            'role' => 'user',
        ]);
    }

    return redirect()->route('admin.providers')
        ->with('success', 'تم تحديث حالة مزود الخدمة بنجاح');
}
}
