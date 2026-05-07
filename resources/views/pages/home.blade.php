@extends('layouts.app')

@section('content')
    <x-hero-section eyebrow="Click Software GH" />

    {{-- Why choose us --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5">
                <span class="text-sm font-semibold text-brand uppercase tracking-widest">Why Choose Us</span>
                <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy leading-tight">A trusted multi-technology partner for ambitious teams</h2>
                <p class="mt-4 text-slate-600 leading-relaxed">
                    From Kumasi to the rest of West Africa, we help organizations replace manual processes with reliable, modern digital systems built to scale.
                </p>
                <a href="{{ route('about') }}" class="mt-6 inline-flex items-center gap-2 text-brand font-semibold hover:text-brand-dark">
                    Learn more about us <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
            <div class="lg:col-span-7 grid sm:grid-cols-2 gap-5">
                @foreach ([
                    ['fa-solid fa-bullseye','Proven Expertise','Over 8 years building software for businesses, schools and hospitals.'],
                    ['fa-solid fa-gauge-high','Fast Delivery','We ship quickly without sacrificing quality or maintainability.'],
                    ['fa-solid fa-headset','Dedicated Support','Real humans available to support your team when you need help.'],
                    ['fa-solid fa-lock','Secure by Default','Best practices baked into every line of code we write.'],
                ] as [$icon, $t, $d])
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 hover:shadow-soft transition">
                        <div class="w-11 h-11 grid place-items-center rounded-xl bg-accent/15 text-accent-dark"><i class="{{ $icon }}"></i></div>
                        <h3 class="mt-4 font-bold text-navy">{{ $t }}</h3>
                        <p class="mt-1 text-sm text-slate-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Services preview --}}
    <section class="bg-slate-100/60 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 mb-12">
                <div>
                    <span class="text-sm font-semibold text-brand uppercase tracking-widest">Our Services</span>
                    <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">Smart digital solutions for every need</h2>
                </div>
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-brand font-semibold hover:text-brand-dark">
                    View all services <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects preview --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 mb-12">
            <div>
                <span class="text-sm font-semibold text-brand uppercase tracking-widest">Featured Work</span>
                <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">Selected projects we are proud of</h2>
            </div>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-brand font-semibold hover:text-brand-dark">
                View portfolio <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="bg-slate-100/60 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-sm font-semibold text-brand uppercase tracking-widest">Testimonials</span>
                <h2 class="mt-2 text-3xl lg:text-4xl font-extrabold text-navy">What our clients are saying</h2>
            </div>
            <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($testimonials as $t)
                    <x-testimonial-card :testimonial="$t" />
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-section />
@endsection
