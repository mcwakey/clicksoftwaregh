@extends('layouts.app')

@section('content')
    @php($company = \App\Support\SiteData::company())

    <x-hero-section
        eyebrow="Get In Touch"
        title="Let's talk about your next project"
        subtitle="Whether you have a clear brief or just an idea, our team in Kumasi is ready to listen and help."
        :primary="['label' => 'Request a Quote', 'href' => route('quote'), 'icon' => 'fa-paper-plane']"
        :secondary="['label' => 'Our Services', 'href' => route('services'), 'icon' => 'fa-briefcase']"
        :showStats="false"
    />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid lg:grid-cols-3 gap-10">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 p-8 shadow-soft">
            <h2 class="text-2xl font-bold text-navy">Send us a message</h2>
            <p class="mt-2 text-slate-600 text-sm">Fill in the form below and we will get back to you within one business day.</p>

            <div class="mt-8">
                <x-contact-form :services="$services" />
            </div>
        </div>

        <aside class="space-y-6">
            <div class="bg-white rounded-2xl border border-slate-100 p-6">
                <h3 class="font-bold text-navy">Contact Information</h3>
                <ul class="mt-4 space-y-4 text-sm text-slate-600">
                    <li class="flex gap-3"><i class="fa-solid fa-location-dot text-brand mt-1"></i><span>{{ $company['address'] }}</span></li>
                    <li class="flex gap-3"><i class="fa-solid fa-envelope text-brand mt-1"></i><a href="mailto:{{ $company['email'] }}" class="hover:text-brand">{{ $company['email'] }}</a></li>
                    @foreach ($company['phones'] as $p)
                        <li class="flex gap-3"><i class="fa-solid fa-phone text-brand mt-1"></i><a href="tel:{{ preg_replace('/\s+/', '', $p) }}" class="hover:text-brand">{{ $p }}</a></li>
                    @endforeach
                </ul>
                <a href="https://wa.me/{{ $company['whatsapp'] }}" target="_blank" rel="noopener"
                   class="mt-6 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-500 hover:bg-green-600 text-white font-semibold">
                    <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                </a>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 p-6">
                <h3 class="font-bold text-navy">Business Hours</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    <li class="flex justify-between"><span>Mon – Fri</span><span class="font-semibold text-navy">8:00 AM – 6:00 PM</span></li>
                    <li class="flex justify-between"><span>Saturday</span><span class="font-semibold text-navy">9:00 AM – 2:00 PM</span></li>
                    <li class="flex justify-between"><span>Sunday</span><span class="font-semibold text-navy">Closed</span></li>
                </ul>
            </div>

            <div class="rounded-2xl overflow-hidden border border-slate-100">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($company['address']) }}&output=embed"
                    width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" title="Map"></iframe>
            </div>
        </aside>
    </section>
@endsection
