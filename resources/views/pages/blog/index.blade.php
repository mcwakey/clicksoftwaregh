@extends('layouts.app')

@section('content')
    <x-hero-section
        eyebrow="Insights"
        title="Articles, ideas and updates from our team"
        subtitle="Practical insights on software, websites, mobile apps, business systems and digital transformation."
        :primary="['label' => 'Talk to Us', 'href' => route('contact'), 'icon' => 'fa-comment']"
        :secondary="['label' => 'Our Services', 'href' => route('services'), 'icon' => 'fa-arrow-right']"
        :showStats="false"
    />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($blogs as $blog)
                <x-blog-card :blog="$blog" />
            @endforeach
        </div>
    </section>

    <x-cta-section />
@endsection
