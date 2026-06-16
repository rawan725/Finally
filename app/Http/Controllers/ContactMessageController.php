<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:5'],
        ]);

        ContactMessage::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return redirect()->route('home')
            ->with('contact_success', 'تم إرسال رسالتك بنجاح، سنقوم بالرد عليك قريبًا.');
    }

    public function adminIndex()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $messages = ContactMessage::latest()->get();

        return view('admin-contact-messages', compact('messages'));
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact.messages')
            ->with('success', 'تم حذف الرسالة بنجاح');
    }
}
