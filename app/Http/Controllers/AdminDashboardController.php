<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Supply;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\DoctorBooking;
use App\Models\ContactMessage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $animalsCount = Animal::count();
        $suppliesCount = Supply::count();
        $doctorsCount = Doctor::count();
        $ordersCount = Order::count();
        $bookingsCount = DoctorBooking::count();
        $messagesCount = ContactMessage::count();

        $pendingBookingsCount = DoctorBooking::where('status', 'pending')->count();
        $newMessagesCount = ContactMessage::where('status', 'new')->count();

        $latestBookings = DoctorBooking::with(['user', 'doctor'])
            ->latest()
            ->take(5)
            ->get();

        $latestMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        $latestOrders = Order::latest()
            ->take(5)
            ->get();

        return view('admin-dashboard', compact(
            'animalsCount',
            'suppliesCount',
            'doctorsCount',
            'ordersCount',
            'bookingsCount',
            'messagesCount',
            'pendingBookingsCount',
            'newMessagesCount',
            'latestBookings',
            'latestMessages',
            'latestOrders'
        ));
    }
}
