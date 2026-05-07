<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Service;
use App\Support\ContentTransformer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $services = Service::where('status', 'published')->orderBy('sort_order')->get()
            ->map(fn($s) => ContentTransformer::service($s))->all();
        return view('pages.contact', [
            'meta_title' => __('messages.contact_us') . ' | Click Software GH',
            'meta_description' => 'Get in touch with Click Software GH.',
            'services' => $services,
        ]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'full_name'    => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:160'],
            'phone'        => ['required', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:160'],
            'service'      => ['nullable', 'string', 'max:160'],
            'message'      => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($data + ['status' => 'unread']);

        return back()
            ->with('success', __('messages.contact_thanks', ['name' => $data['full_name']]))
            ->withInput([]);
    }
}
