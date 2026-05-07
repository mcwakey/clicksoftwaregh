@extends('layouts.app')

@section('content')
    <x-hero-section
        eyebrow="Request a Quote"
        title="Tell us about your project"
        subtitle="Share a few details about what you'd like to build and we'll send you a tailored quote within one business day."
        :primary="['label' => 'Talk to Us', 'href' => route('contact'), 'icon' => 'fa-phone']"
        :secondary="['label' => 'Our Services', 'href' => route('services'), 'icon' => 'fa-briefcase']"
        :showStats="false"
    />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="bg-white rounded-2xl border border-slate-100 p-8 lg:p-10 shadow-soft">
            <h2 class="text-2xl font-bold text-navy">Project Details</h2>
            <p class="mt-2 text-slate-600 text-sm">All requests are confidential. We will only use this information to prepare your quote.</p>

            <div class="mt-8">
                <x-quote-form :services="$services" />
            </div>
        </div>
    </section>
@endsection
