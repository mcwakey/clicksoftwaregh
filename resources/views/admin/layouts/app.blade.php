<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') · Click Software GH</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script>
        // Apply theme before paint to avoid FOUC
        (function () {
            try {
                var saved = localStorage.getItem('admin-theme');
                var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (saved === 'dark' || (!saved && prefersDark)) {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#0ea5a4', dark: '#0c8786' },
                        navy: { DEFAULT: '#0f172a', light: '#1e293b' },
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .scrollbar-thin::-webkit-scrollbar { width: 6px; height: 6px; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: rgba(100,116,139,.4); border-radius: 3px; }
    </style>
    @stack('head')
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200">
@php
    $nav = [
        ['admin.dashboard', 'fa-gauge-high', __('messages.dashboard')],
        ['admin.pages.index', 'fa-file-lines', __('messages.pages')],
        ['admin.services.index', 'fa-screwdriver-wrench', __('messages.services')],
        ['admin.projects.index', 'fa-diagram-project', __('messages.projects')],
        ['admin.blog.index', 'fa-newspaper', __('messages.blog')],
        ['admin.testimonials.index', 'fa-comments', __('messages.testimonials')],
        ['admin.team.index', 'fa-people-group', __('messages.team')],
        ['admin.faqs.index', 'fa-circle-question', __('messages.faqs')],
        ['admin.messages.index', 'fa-envelope', __('messages.messages')],
        ['admin.quotes.index', 'fa-file-invoice-dollar', __('messages.quote_requests')],
        ['admin.media.index', 'fa-photo-film', __('messages.media_library')],
        ['admin.settings.index', 'fa-gear', __('messages.settings')],
        ['admin.translations.index', 'fa-language', __('messages.translations')],
    ];
@endphp

<div class="flex min-h-screen" x-data="{ sidebarOpen: false }" x-cloak>
    {{-- Sidebar --}}
    <aside class="fixed inset-y-0 left-0 z-40 w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transform transition-transform lg:translate-x-0 lg:static lg:inset-auto"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex items-center gap-2 h-16 px-5 border-b border-slate-200 dark:border-slate-800">
            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-brand to-brand-dark grid place-items-center text-white font-extrabold">C</div>
            <div class="leading-tight">
                <p class="font-bold text-navy dark:text-white text-sm">Click Software</p>
                <p class="text-[10px] uppercase tracking-wide text-slate-500">Admin Panel</p>
            </div>
        </div>
        <nav class="p-3 space-y-0.5 overflow-y-auto scrollbar-thin h-[calc(100vh-4rem)] pb-20">
            @foreach($nav as [$route, $icon, $label])
                @php $active = request()->routeIs(str_replace('.index','*',$route)) || request()->routeIs($route); @endphp
                <a href="{{ route($route) }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                          {{ $active ? 'bg-brand/10 text-brand dark:bg-brand/20' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <i class="fa-solid {{ $icon }} w-4 text-center"></i>
                    <span>{{ $label }}</span>
                </a>
            @endforeach
            <form method="POST" action="{{ route('admin.logout') }}" class="pt-3">
                @csrf
                <button class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20">
                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                    <span>{{ __('messages.logout') }}</span>
                </button>
            </form>
        </nav>
    </aside>

    {{-- Backdrop --}}
    <div x-show="sidebarOpen" @click="sidebarOpen=false" class="fixed inset-0 bg-black/50 z-30 lg:hidden"></div>

    {{-- Main --}}
    <div class="flex-1 flex flex-col min-w-0">
        <header class="sticky top-0 z-20 bg-white/80 dark:bg-slate-900/80 backdrop-blur border-b border-slate-200 dark:border-slate-800">
            <div class="flex items-center justify-between h-16 px-4 lg:px-6">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen=!sidebarOpen" class="lg:hidden w-9 h-9 grid place-items-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <h1 class="text-lg font-bold text-navy dark:text-white">@yield('heading', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-2">
                    <div class="hidden md:flex items-center gap-1 text-xs font-semibold border border-slate-200 dark:border-slate-700 rounded-lg overflow-hidden">
                        <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1.5 {{ app()->getLocale()==='en' ? 'bg-navy text-white' : 'text-slate-600 dark:text-slate-300' }}">EN</a>
                        <a href="{{ route('locale.switch', 'fr') }}" class="px-2.5 py-1.5 {{ app()->getLocale()==='fr' ? 'bg-navy text-white' : 'text-slate-600 dark:text-slate-300' }}">FR</a>
                    </div>
                    <button id="theme-toggle" class="w-9 h-9 grid place-items-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" title="Toggle theme">
                        <i class="fa-solid fa-moon dark:hidden"></i>
                        <i class="fa-solid fa-sun hidden dark:inline"></i>
                    </button>
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> View Site
                    </a>
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-200 dark:border-slate-700">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand to-brand-dark grid place-items-center text-white text-xs font-bold">
                            {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <span class="hidden sm:block text-sm font-medium">{{ auth('admin')->user()->name ?? 'Admin' }}</span>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-4 lg:p-6 flex-1">
            @if (session('success'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-300 border border-rose-200 dark:border-rose-800 flex items-center gap-2">
                    <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 px-4 py-3 rounded-lg bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-300 border border-rose-200 dark:border-rose-800">
                    <p class="font-semibold mb-1"><i class="fa-solid fa-triangle-exclamation"></i> Please fix the following:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.getElementById('theme-toggle')?.addEventListener('click', function () {
        var html = document.documentElement;
        html.classList.toggle('dark');
        localStorage.setItem('admin-theme', html.classList.contains('dark') ? 'dark' : 'light');
    });
</script>
@stack('scripts')
</body>
</html>
