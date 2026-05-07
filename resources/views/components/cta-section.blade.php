@props([
    'title' => 'Ready to build something amazing?',
    'subtitle' => 'Tell us about your idea and we will help you bring it to life with the right technology and a dedicated team.',
    'primary' => ['label' => 'Request a Quote', 'href' => null, 'icon' => 'fa-paper-plane'],
    'secondary' => ['label' => 'Talk to Us', 'href' => null, 'icon' => 'fa-phone'],
])

@php
    $primary['href']   ??= route('quote');
    $secondary['href'] ??= route('contact');
@endphp

<section class="relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-20">
        <div class="relative rounded-3xl hero-gradient text-white p-10 lg:p-14 overflow-hidden">
            <div class="absolute inset-0 grid-pattern opacity-50"></div>
            <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-accent/30 blur-3xl"></div>
            <div class="relative grid lg:grid-cols-12 gap-6 items-center">
                <div class="lg:col-span-8">
                    <h2 class="text-3xl lg:text-4xl font-extrabold leading-tight">{{ $title }}</h2>
                    <p class="mt-3 text-slate-300 max-w-2xl">{{ $subtitle }}</p>
                </div>
                <div class="lg:col-span-4 flex flex-wrap lg:justify-end gap-3">
                    <a href="{{ $primary['href'] }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-accent text-navy font-semibold hover:bg-white transition">
                        <i class="fa-solid {{ $primary['icon'] ?? 'fa-arrow-right' }}"></i> {{ $primary['label'] }}
                    </a>
                    <a href="{{ $secondary['href'] }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 font-semibold transition">
                        <i class="fa-solid {{ $secondary['icon'] ?? 'fa-arrow-right' }}"></i> {{ $secondary['label'] }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
