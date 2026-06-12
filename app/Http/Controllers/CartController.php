<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Supply;
use App\Models\Animal;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::where('user_id', auth()->id())->get();

        return view('cart', compact('items'));
    }

    public function addSupply($id)
    {
        $supply = Supply::findOrFail($id);

        CartItem::create([
            'user_id' => auth()->id(),
            'cartable_id' => $supply->id,
            'cartable_type' => Supply::class,
            'quantity' => 1,
            'price' => $supply->price,
        ]);

        return redirect()->route('cart');
    }
    public function destroy($id)
{
    $item = CartItem::where('user_id', auth()->id())
        ->where('id', $id)
        ->firstOrFail();

    $item->delete();

    return redirect()->route('cart');
}
public function addAnimal($id)
{
    $animal = Animal::findOrFail($id);

    CartItem::create([
        'user_id' => auth()->id(),
        'cartable_id' => $animal->id,
        'cartable_type' => Animal::class,
        'quantity' => 1,
        'price' => $animal->price,
    ]);

    return redirect()->route('cart');
}
public function increase($id)
{
    $item = CartItem::where('user_id', auth()->id())
        ->where('id', $id)
        ->firstOrFail();

    $item->quantity += 1;
    $item->save();

    return redirect()->route('cart');
}

public function decrease($id)
{
    $item = CartItem::where('user_id', auth()->id())
        ->where('id', $id)
        ->firstOrFail();

    if ($item->quantity > 1) {
        $item->quantity -= 1;
        $item->save();
    } else {
        $item->delete();
    }

    return redirect()->route('cart');
}
}
