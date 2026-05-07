@php
    $company = \App\Support\SiteData::company();
    $links = [
        ['home', __('messages.home')],
        ['about', __('messages.about')],
        ['services', __('messages.services')],
        ['projects.index', __('messages.projects')],
        ['blog.index', __('messages.blog')],
        ['contact', __('messages.contact')],
    ];
@endphp
<header id="site-navbar" class="sticky top-0 z-40 backdrop-blur bg-white/80 transition-all duration-300 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <span class="w-9 h-9 rounded-xl bg-navy text-accent grid place-items-center font-extrabold shadow-soft group-hover:scale-105 transition">C</span>
                <span class="font-extrabold text-navy tracking-tight">Click<span class="text-accent-dark">Software</span><span class="text-brand">GH</span></span>
            </a>

            <nav class="hidden lg:flex items-center gap-1 text-sm font-medium">
                @foreach ($links as [$route, $label])
                    @php($active = request()->routeIs($route) || ($route === 'projects.index' && request()->routeIs('projects.*')) || ($route === 'blog.index' && request()->routeIs('blog.*')))
                    <a href="{{ route($route) }}"
                       class="px-3 py-2 rounded-lg transition {{ $active ? 'text-brand bg-brand/10' : 'text-slate-700 hover:text-brand hover:bg-slate-100' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden lg:flex items-center gap-3">
                <div class="flex items-center gap-1 text-xs font-semibold border border-slate-200 rounded-lg overflow-hidden">
                    <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'en' ? 'bg-navy text-white' : 'text-slate-600 hover:bg-slate-100' }}">EN</a>
                    <a href="{{ route('locale.switch', 'fr') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'fr' ? 'bg-navy text-white' : 'text-slate-600 hover:bg-slate-100' }}">FR</a>
                </div>
                <a href="{{ route('quote') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-brand to-accent-dark text-white text-sm font-semibold shadow-soft hover:opacity-90 transition">
                    <i class="fa-solid fa-paper-plane text-xs"></i> {{ __('messages.request_quote') }}
                </a>
            </div>

            <button id="mobile-menu-btn" class="lg:hidden inline-grid place-items-center w-10 h-10 rounded-lg text-navy hover:bg-slate-100" aria-label="Toggle menu">
                <i class="fa-solid fa-bars text-lg"></i>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-100 bg-white">
        <div class="px-4 py-3 space-y-1 text-sm">
            @foreach ($links as [$route, $label])
                @php($active = request()->routeIs($route))
                <a href="{{ route($route) }}"
                   class="block px-3 py-2 rounded-lg {{ $active ? 'bg-brand/10 text-brand' : 'text-slate-700 hover:bg-slate-100' }}">
                    {{ $label }}
                </a>
            @endforeach
            <div class="flex items-center gap-1 text-xs font-semibold border border-slate-200 rounded-lg overflow-hidden mt-3 w-fit">
                <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'en' ? 'bg-navy text-white' : 'text-slate-600' }}">EN</a>
                <a href="{{ route('locale.switch', 'fr') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'fr' ? 'bg-navy text-white' : 'text-slate-600' }}">FR</a>
            </div>
            <a href="{{ route('quote') }}" class="block mt-2 text-center px-4 py-2.5 rounded-lg bg-gradient-to-r from-brand to-accent-dark text-white font-semibold">
                {{ __('messages.request_quote') }}
            </a>
        </div>
    </div>
</header>
