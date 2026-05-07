<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $q = Testimonial::query();
        if ($s = $request->get('search')) $q->where('client_name', 'like', "%$s%");
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->orderBy('sort_order')->paginate(15)->withQueryString();
        return view('admin.testimonials.index', compact('items'));
    }

    public function create() { return view('admin.testimonials.form', ['item' => new Testimonial()]); }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('testimonials', 'public');
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial) { return view('admin.testimonials.form', ['item' => $testimonial]); }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('testimonials', 'public');
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'client_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'message_en' => 'required|string',
            'message_fr' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:4096',
        ]);
    }
}
