<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AdminAnimalController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $animals = Animal::latest()->get();

        return view('admin-animals', compact('animals'));
    }

    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('admin-animal-create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/animals'),
                $imageName
            );
        }

        Animal::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.animals')
            ->with('success', 'تمت إضافة الحيوان بنجاح');
    }

    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $animal = Animal::findOrFail($id);

        return view('admin-animal-edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $animal = Animal::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imageName = $animal->image;

        if ($request->hasFile('image')) {

            if ($animal->image) {
                $oldImagePath = public_path('images/animals/' . $animal->image);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/animals'),
                $imageName
            );
        }

        $animal->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.animals')
            ->with('success', 'تم تعديل الحيوان بنجاح');
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $animal = Animal::findOrFail($id);

        if ($animal->image) {
            $imagePath = public_path('images/animals/' . $animal->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $animal->delete();

        return redirect()->route('admin.animals')
            ->with('success', 'تم حذف الحيوان بنجاح');
    }
}
