<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Animal;
use App\Models\Supply;
use App\Models\Doctor;
use App\Models\DoctorBooking;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $items = CartItem::where('user_id', auth()->id())->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart');
        }

        return view('checkout', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'postal_code' => ['nullable', 'string', 'max:50'],
            'payment_method' => ['required', 'string'],
            'payment_reference' => ['nullable', 'string', 'max:255'],
        ]);

        $cartItems = CartItem::where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart');
        }

        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
            'status' => 'pending',
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'payment_method' => $request->payment_method,
            'payment_reference' => $request->payment_reference,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'orderable_id' => $item->cartable_id,
                'orderable_type' => $item->cartable_type,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('order.success', $order->id);
    }

    public function success($id)
    {
        $order = Order::with('items.orderable')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('order-success', compact('order'));
    }

    public function myOrders()
    {
        $orders = Order::withCount('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('my-orders', compact('orders'));
    }

    public function adminOrders()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $orders = Order::with(['user', 'items'])
            ->latest()
            ->get();

        return view('admin-orders', compact('orders'));
    }

    public function adminOrderDetails($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $order = Order::with(['user', 'items.orderable'])
            ->findOrFail($id);

        return view('admin-order-details', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'status' => ['required', 'in:pending,accepted,preparing,delivered,cancelled'],
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders')
            ->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    public function adminDashboard()
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $usersCount = User::count();

    $ordersCount = Order::count();
    $pendingOrdersCount = Order::where('status', 'pending')->count();
    $acceptedOrdersCount = Order::where('status', 'accepted')->count();
    $deliveredOrdersCount = Order::where('status', 'delivered')->count();
    $cancelledOrdersCount = Order::where('status', 'cancelled')->count();

    $animalsCount = Animal::count();
    $suppliesCount = Supply::count();

    $doctorsCount = Doctor::count();
    $doctorBookingsCount = DoctorBooking::count();
    $pendingDoctorBookingsCount = DoctorBooking::where('status', 'pending')->count();

    $providersCount = Provider::count();
    $pendingProvidersCount = Provider::where('status', 'pending')->count();
    $approvedProvidersCount = Provider::where('status', 'approved')->count();

    $totalSales = Order::sum('total_price');

    $recentOrders = Order::with('user')
        ->latest()
        ->take(5)
        ->get();

    $recentBookings = DoctorBooking::with(['user', 'doctor'])
        ->latest()
        ->take(5)
        ->get();

    $latestProviders = Provider::with('user')
        ->latest()
        ->take(5)
        ->get();

    return view('admin-dashboard', compact(
        'usersCount',
        'ordersCount',
        'pendingOrdersCount',
        'acceptedOrdersCount',
        'deliveredOrdersCount',
        'cancelledOrdersCount',
        'animalsCount',
        'suppliesCount',
        'doctorsCount',
        'doctorBookingsCount',
        'pendingDoctorBookingsCount',
        'providersCount',
        'pendingProvidersCount',
        'approvedProvidersCount',
        'totalSales',
        'recentOrders',
        'recentBookings',
        'latestProviders'
    ));
}
}