@props([
    'eyebrow' => null,
    'title' => 'Smart Digital Solutions for Growing Businesses',
    'subtitle' => 'We design and develop websites, mobile apps, business systems, and digital platforms that help organizations work smarter.',
    'primary' => ['label' => 'Request a Quote', 'href' => route('quote'), 'icon' => 'fa-paper-plane'],
    'secondary' => ['label' => 'View Our Services', 'href' => route('services'), 'icon' => 'fa-arrow-right'],
    'showStats' => true,
])

<section class="relative hero-gradient text-white overflow-hidden">
    <div class="absolute inset-0 grid-pattern opacity-60"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-accent/20 blur-3xl"></div>
    <div class="absolute -bottom-40 -left-20 w-[28rem] h-[28rem] rounded-full bg-brand/30 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-24 lg:pt-28 lg:pb-32">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 animate-fadeUp">
                @if ($eyebrow)
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-xs font-medium text-accent">
                        <i class="fa-solid fa-bolt"></i> {{ $eyebrow }}
                    </span>
                @endif
                <h1 class="mt-5 text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                    {!! $title !!}
                </h1>
                <p class="mt-6 text-lg text-slate-300 max-w-2xl">
                    {{ $subtitle }}
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    @if ($primary)
                        <a href="{{ $primary['href'] }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-accent text-navy font-semibold shadow-soft hover:bg-white transition">
                            <i class="fa-solid {{ $primary['icon'] ?? 'fa-arrow-right' }}"></i> {{ $primary['label'] }}
                        </a>
                    @endif
                    @if ($secondary)
                        <a href="{{ $secondary['href'] }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 font-semibold transition">
                            {{ $secondary['label'] }} <i class="fa-solid {{ $secondary['icon'] ?? 'fa-arrow-right' }}"></i>
                        </a>
                    @endif
                </div>

                @if ($showStats)
                    <dl class="mt-12 grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-2xl">
                        @foreach ([
                            ['120+', 'Projects Delivered'],
                            ['90+',  'Happy Clients'],
                            ['8+',   'Years of Experience'],
                            ['24/7', 'Support Availability'],
                        ] as [$num, $label])
                            <div>
                                <dt class="text-3xl font-extrabold text-white">{{ $num }}</dt>
                                <dd class="text-xs uppercase tracking-wider text-slate-400 mt-1">{{ $label }}</dd>
                            </div>
                        @endforeach
                    </dl>
                @endif
            </div>

            <div class="lg:col-span-5 hidden lg:block animate-fadeUp">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-br from-accent/30 to-brand/30 blur-2xl rounded-3xl"></div>
                    <div class="relative rounded-3xl bg-white/5 border border-white/10 backdrop-blur p-6 shadow-soft">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-3 h-3 rounded-full bg-red-400"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                            <span class="w-3 h-3 rounded-full bg-green-400"></span>
                            <span class="ml-3 text-xs text-slate-400">clicksoftwaregh.com</span>
                        </div>
                        <div class="space-y-3">
                            <div class="h-3 w-2/3 rounded bg-white/15"></div>
                            <div class="h-3 w-1/2 rounded bg-white/10"></div>
                            <div class="grid grid-cols-3 gap-3 mt-4">
                                <div class="h-20 rounded-xl bg-gradient-to-br from-brand to-accent-dark"></div>
                                <div class="h-20 rounded-xl bg-white/10"></div>
                                <div class="h-20 rounded-xl bg-white/10"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mt-3">
                                <div class="h-16 rounded-xl bg-white/10"></div>
                                <div class="h-16 rounded-xl bg-gradient-to-br from-accent to-brand"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 hidden md:flex items-center gap-3 rounded-2xl bg-white text-navy px-4 py-3 shadow-soft animate-floaty">
                        <span class="w-10 h-10 grid place-items-center rounded-full bg-brand/10 text-brand"><i class="fa-solid fa-shield-halved"></i></span>
                        <div>
                            <div class="text-xs text-slate-500">Secure & Reliable</div>
                            <div class="font-semibold text-sm">Production-grade systems</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
