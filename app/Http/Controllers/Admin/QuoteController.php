<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $q = QuoteRequest::query();
        if ($s = $request->get('search')) $q->where(fn($w) => $w->where('full_name', 'like', "%$s%")->orWhere('email', 'like', "%$s%"));
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.quotes.index', compact('items'));
    }

    public function show(QuoteRequest $quote)
    {
        return view('admin.quotes.show', ['item' => $quote]);
    }

    public function update(Request $request, QuoteRequest $quote)
    {
        $quote->update(['status' => $request->validate(['status' => 'required|in:new,reviewed,approved,rejected'])['status']]);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(QuoteRequest $quote)
    {
        if ($quote->attachment) {
            Storage::disk('public')->delete($quote->attachment);
        }
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Quote deleted.');
    }
}
