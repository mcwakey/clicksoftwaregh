@extends('layouts.app')

@section('content')
    <section class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <nav class="text-sm text-slate-300 mb-6">
                <a href="{{ route('home') }}" class="hover:text-accent">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('projects.index') }}" class="hover:text-accent">Projects</a>
                <span class="mx-2">/</span>
                <span class="text-white">{{ $project['title'] }}</span>
            </nav>
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/15 text-xs font-medium text-accent">
                {{ $project['category'] }}
            </span>
            <h1 class="mt-4 text-4xl lg:text-5xl font-extrabold leading-tight">{{ $project['title'] }}</h1>
            <p class="mt-4 text-lg text-slate-300 max-w-3xl">{{ $project['short'] }}</p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10">
        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
             class="w-full h-64 sm:h-96 object-cover rounded-2xl shadow-soft">
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2 space-y-10">
            <div>
                <h2 class="text-2xl font-bold text-navy">Project Overview</h2>
                <p class="mt-3 text-slate-600 leading-relaxed">{{ $project['short'] }}</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy">The Problem</h2>
                <p class="mt-3 text-slate-600 leading-relaxed">{{ $project['problem'] }}</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy">Our Solution</h2>
                <p class="mt-3 text-slate-600 leading-relaxed">{{ $project['solution'] }}</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy">Key Features</h2>
                <ul class="mt-4 grid sm:grid-cols-2 gap-3">
                    @foreach ($project['features'] as $f)
                        <li class="flex items-start gap-2 text-slate-700">
                            <i class="fa-solid fa-circle-check text-accent-dark mt-1"></i>
                            <span>{{ $f }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy">Screenshots</h2>
                <div class="mt-4 grid sm:grid-cols-2 gap-4">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="aspect-video rounded-xl bg-slate-100 grid place-items-center text-slate-400">
                            <i class="fa-solid fa-image text-3xl"></i>
                        </div>
                    @endfor
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-navy">Result &amp; Impact</h2>
                <p class="mt-3 text-slate-600 leading-relaxed">{{ $project['result'] }}</p>
            </div>
        </div>

        <aside class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-soft">
                <h3 class="font-bold text-navy">Technology Stack</h3>
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($project['tech'] as $t)
                        <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-brand/10 text-brand">{{ $t }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bg-navy text-white rounded-2xl p-6">
                <h3 class="font-bold">Have a similar project?</h3>
                <p class="mt-2 text-sm text-slate-300">We can build something even better for you.</p>
                <a href="{{ route('quote') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-accent text-navy font-semibold">
                    Request a Quote <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </aside>
    </section>

    @if (count($related))
        <section class="bg-slate-100/60 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-navy mb-8">Related Projects</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($related as $r)
                        <x-project-card :project="$r" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-section />
@endsection
