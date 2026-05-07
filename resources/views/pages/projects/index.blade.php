@extends('layouts.app')

@section('content')
    <x-hero-section
        eyebrow="Our Work"
        title="Projects we've delivered for great clients"
        subtitle="A selection of recent platforms and systems built by Click Software GH for organizations across multiple industries."
        :primary="['label' => 'Start a Project', 'href' => route('quote'), 'icon' => 'fa-rocket']"
        :secondary="['label' => 'Explore Services', 'href' => route('services'), 'icon' => 'fa-arrow-right']"
        :showStats="false"
    />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </section>

    <x-cta-section />
@endsection
