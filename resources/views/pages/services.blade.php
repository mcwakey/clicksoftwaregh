@extends('layouts.app')

@section('content')
    <x-hero-section
        eyebrow="What We Do"
        title="Services that move your organization forward"
        subtitle="From websites and mobile apps to school, hospital and business management systems — we deliver high-level multi-technology solutions for best living."
        :primary="['label' => 'Request a Service', 'href' => route('quote'), 'icon' => 'fa-paper-plane']"
        :secondary="['label' => 'Talk to Us', 'href' => route('contact'), 'icon' => 'fa-phone']"
        :showStats="false"
    />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </section>

    <x-cta-section
        title="Not sure which service fits your needs?"
        subtitle="Tell us about your goals and we will recommend the right solution and a clear plan."
    />
@endsection
