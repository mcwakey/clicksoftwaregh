<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Service;
use App\Support\ContentTransformer;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function show()
    {
        $services = Service::where('status', 'published')->orderBy('sort_order')->get()
            ->map(fn($s) => ContentTransformer::service($s))->all();
        return view('pages.quote', [
            'meta_title' => __('messages.request_quote') . ' | Click Software GH',
            'meta_description' => 'Request a quote from Click Software GH.',
            'services' => $services,
        ]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'full_name'           => ['required', 'string', 'max:120'],
            'email'               => ['required', 'email', 'max:160'],
            'phone'               => ['required', 'string', 'max:40'],
            'organization'        => ['nullable', 'string', 'max:160'],
            'project_type'        => ['required', 'string', 'max:160'],
            'budget_range'        => ['required', 'string', 'max:80'],
            'deadline'            => ['nullable', 'date'],
            'project_description' => ['required', 'string', 'max:5000'],
            'attachment'          => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('quotes', 'public');
        }

        QuoteRequest::create($data + ['status' => 'new']);

        return back()
            ->with('success', __('messages.quote_thanks', ['name' => $data['full_name']]))
            ->withInput([]);
    }
}
