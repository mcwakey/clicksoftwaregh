<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact', [
            'meta_title' => 'Contact Us | Click Software GH',
            'meta_description' => 'Get in touch with Click Software GH for websites, mobile apps and business systems.',
            'services' => SiteData::services(),
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

        // TODO: Send email / store enquiry. For now we just acknowledge.
        // Mail::to(config('mail.to.address'))->send(new ContactEnquiry($data));

        return back()
            ->with('success', 'Thank you for reaching out, ' . $data['full_name'] . '. Our team will get back to you shortly.')
            ->withInput([]);
    }
}
