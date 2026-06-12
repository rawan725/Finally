<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class AdminSupplyController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $supplies = Supply::latest()->get();

        return view('admin-supplies', compact('supplies'));
    }

    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('admin-supply-create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/supplies'),
                $imageName
            );
        }

        Supply::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.supplies')
            ->with('success', 'تمت إضافة المستلزم بنجاح');
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $supply = Supply::findOrFail($id);

        if ($supply->image) {
            $imagePath = public_path('images/supplies/' . $supply->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $supply->delete();

        return redirect()->route('admin.supplies')
           
    ->with('success', 'تم حذف المستلزم بنجاح');
    }

    public function edit($id)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $supply = Supply::findOrFail($id);

    return view('admin-supply-edit', compact('supply'));
}

public function update(Request $request, $id)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $supply = Supply::findOrFail($id);

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'category' => ['required', 'string'],
        'price' => ['required', 'numeric', 'min:0'],
        'description' => ['nullable', 'string'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ]);

    $imageName = $supply->image;

    if ($request->hasFile('image')) {

        if ($supply->image) {
            $oldImagePath = public_path('images/supplies/' . $supply->image);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

        $request->file('image')->move(
            public_path('images/supplies'),
            $imageName
        );
    }

    $supply->update([
        'name' => $request->name,
        'category' => $request->category,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.supplies')
        ->with('success', 'تم تعديل المستلزم بنجاح');
}
}
