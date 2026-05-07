<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $meta_title ?? 'Click Software GH | Smart Digital Solutions' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Click Software GH builds modern websites, mobile apps and business systems for organizations across Ghana and beyond.' }}" />
    <meta name="author" content="Click Software GH" />
    <meta property="og:title" content="{{ $meta_title ?? 'Click Software GH' }}" />
    <meta property="og:description" content="{{ $meta_description ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230b1f3a'/><text x='50' y='66' font-family='Arial' font-size='56' font-weight='700' fill='%2322d3ee' text-anchor='middle'>C</text></svg>" />

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:   { DEFAULT: '#0b1f3a', dark: '#071529', light: '#13315c' },
                        brand:  { DEFAULT: '#1d4ed8', light: '#3b82f6', dark: '#1e3a8a' },
                        accent: { DEFAULT: '#22d3ee', dark: '#0891b2' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 10px 30px -12px rgba(11,31,58,0.18)',
                    },
                    keyframes: {
                        floaty: { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-8px)' } },
                        fadeUp: { '0%': { opacity: 0, transform: 'translateY(16px)' }, '100%': { opacity: 1, transform: 'translateY(0)' } },
                    },
                    animation: {
                        floaty: 'floaty 4s ease-in-out infinite',
                        fadeUp: 'fadeUp .7s ease-out both',
                    },
                }
            }
        }
    </script>

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        html, body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background:
                radial-gradient(1200px 600px at 10% -10%, rgba(34,211,238,.18), transparent 60%),
                radial-gradient(900px 500px at 110% 20%, rgba(59,130,246,.25), transparent 60%),
                linear-gradient(135deg, #071529 0%, #0b1f3a 60%, #13315c 100%);
        }
        .grid-pattern {
            background-image: linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>

    @stack('head')
</head>
<body class="bg-slate-50 text-slate-700 antialiased">
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.whatsapp')

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                    btn.querySelector('i')?.classList.toggle('fa-bars');
                    btn.querySelector('i')?.classList.toggle('fa-xmark');
                });
                menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => menu.classList.add('hidden')));
            }

            // Sticky navbar shadow on scroll
            const nav = document.getElementById('site-navbar');
            const onScroll = () => {
                if (!nav) return;
                if (window.scrollY > 8) {
                    nav.classList.add('shadow-soft', 'bg-white/95');
                    nav.classList.remove('bg-white/80');
                } else {
                    nav.classList.remove('shadow-soft', 'bg-white/95');
                    nav.classList.add('bg-white/80');
                }
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        });
    </script>
    @stack('scripts')
</body>
</html>
