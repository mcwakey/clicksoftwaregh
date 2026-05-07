<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('messages.login') }} · Click Software GH</title>
    <script>(function(){try{var s=localStorage.getItem('admin-theme');var d=window.matchMedia('(prefers-color-scheme: dark)').matches;if(s==='dark'||(!s&&d))document.documentElement.classList.add('dark');}catch(e){}})();</script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class', theme: { extend: { colors: { brand: { DEFAULT: '#0ea5a4', dark: '#0c8786' }, navy: '#0f172a' } } } }</script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',system-ui,sans-serif}</style>
</head>
<body class="h-full bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-slate-950 dark:via-slate-900 dark:to-navy">
    <div class="min-h-screen grid place-items-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <div class="inline-flex w-14 h-14 rounded-2xl bg-gradient-to-br from-brand to-brand-dark grid place-items-center text-white text-2xl font-extrabold shadow-lg">C</div>
                <h1 class="mt-4 text-2xl font-extrabold text-navy dark:text-white">Click Software GH</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400">Admin Panel</p>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-8 border border-slate-200 dark:border-slate-800">
                <h2 class="text-xl font-bold text-navy dark:text-white mb-1">{{ __('messages.login') }}</h2>
                <p class="text-sm text-slate-500 mb-6">Sign in to manage your site.</p>

                @if ($errors->any())
                    <div class="mb-4 px-3 py-2 rounded-lg bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-300 text-sm border border-rose-200 dark:border-rose-800">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input name="email" type="email" required autofocus value="{{ old('email') }}"
                            class="w-full px-3 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-brand focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input name="password" type="password" required
                            class="w-full px-3 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-brand focus:border-transparent outline-none">
                    </div>
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" name="remember" class="rounded text-brand focus:ring-brand"> Remember me
                    </label>
                    <button class="w-full py-2.5 rounded-lg bg-gradient-to-r from-brand to-brand-dark text-white font-semibold hover:opacity-90 transition">
                        {{ __('messages.login') }}
                    </button>
                </form>
            </div>
            <p class="mt-6 text-center text-xs text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-brand"><i class="fa-solid fa-arrow-left mr-1"></i> Back to website</a>
            </p>
        </div>
    </div>
</body>
</html>
