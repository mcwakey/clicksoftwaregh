<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function show()
    {
        return view('pages.quote', [
            'meta_title' => 'Request a Quote | Click Software GH',
            'meta_description' => 'Tell us about your project and get a tailored quote from Click Software GH.',
            'services' => SiteData::services(),
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
        ]);

        // TODO: Send email / store quote request. For now we just acknowledge.
        // Mail::to(config('mail.to.address'))->send(new QuoteRequest($data));

        return back()
            ->with('success', 'Thank you, ' . $data['full_name'] . '. We have received your request and will respond within one business day.')
            ->withInput([]);
    }
}
