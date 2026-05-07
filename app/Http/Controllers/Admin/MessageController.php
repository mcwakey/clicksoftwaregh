<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $q = ContactMessage::query();
        if ($s = $request->get('search')) $q->where(fn($w) => $w->where('full_name', 'like', "%$s%")->orWhere('email', 'like', "%$s%"));
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.messages.index', compact('items'));
    }

    public function show(ContactMessage $message)
    {
        if ($message->status === 'unread') $message->update(['status' => 'read']);
        return view('admin.messages.show', ['item' => $message]);
    }

    public function update(Request $request, ContactMessage $message)
    {
        $message->update(['status' => $request->validate(['status' => 'required|in:unread,read,replied'])['status']]);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
