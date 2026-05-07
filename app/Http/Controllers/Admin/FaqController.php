<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $q = Faq::query();
        if ($s = $request->get('search')) $q->where('question_en', 'like', "%$s%");
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->orderBy('sort_order')->paginate(15)->withQueryString();
        return view('admin.faqs.index', compact('items'));
    }

    public function create() { return view('admin.faqs.form', ['item' => new Faq()]); }

    public function store(Request $request)
    {
        Faq::create($this->validateData($request));
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created.');
    }

    public function edit(Faq $faq) { return view('admin.faqs.form', ['item' => $faq]); }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validateData($request));
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'FAQ deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'question_en' => 'required|string|max:255',
            'question_fr' => 'nullable|string|max:255',
            'answer_en' => 'required|string',
            'answer_fr' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);
    }
}
