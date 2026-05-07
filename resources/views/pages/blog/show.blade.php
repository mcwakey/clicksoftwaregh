@extends('layouts.app')

@section('content')
    <section class="hero-gradient text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <nav class="text-sm text-slate-300 mb-6">
                <a href="{{ route('home') }}" class="hover:text-accent">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('blog.index') }}" class="hover:text-accent">Blog</a>
            </nav>
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/15 text-xs font-medium text-accent">
                {{ $blog['category'] }}
            </span>
            <h1 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight">{{ $blog['title'] }}</h1>
            <div class="mt-4 text-sm text-slate-300 flex items-center justify-center gap-4">
                <span><i class="fa-regular fa-user mr-1"></i>{{ $blog['author'] }}</span>
                <span><i class="fa-regular fa-calendar mr-1"></i>{{ $blog['date'] }}</span>
            </div>
        </div>
    </section>

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10">
        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}"
             class="w-full h-64 sm:h-96 object-cover rounded-2xl shadow-soft">

        <div class="prose prose-slate max-w-none mt-10 text-slate-700 leading-relaxed">
            @foreach (preg_split("/\n\n+/", $blog['body']) as $paragraph)
                <p class="mb-5">{{ $paragraph }}</p>
            @endforeach
        </div>

        <div class="mt-10 flex items-center justify-between border-t border-slate-200 pt-6">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-brand font-semibold hover:text-brand-dark">
                <i class="fa-solid fa-arrow-left text-xs"></i> Back to all articles
            </a>
            <div class="flex items-center gap-3 text-slate-500">
                <span class="text-sm">Share:</span>
                <a href="#" class="hover:text-brand"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="hover:text-brand"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="hover:text-brand"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="hover:text-brand"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </article>

    @if (count($related))
        <section class="bg-slate-100/60 py-16 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-navy mb-8">Related Articles</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($related as $r)
                        <x-blog-card :blog="$r" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-section />
@endsection
