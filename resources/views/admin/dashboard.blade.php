@extends('admin.layouts.app')
@section('title', __('messages.dashboard'))
@section('heading', __('messages.dashboard'))

@section('content')
    @php
        $cards = [
            ['Services', $stats['services'] ?? 0, 'fa-screwdriver-wrench', 'from-sky-500 to-sky-600'],
            ['Projects', $stats['projects'] ?? 0, 'fa-diagram-project', 'from-violet-500 to-violet-600'],
            ['Blog Posts', $stats['blog_posts'] ?? 0, 'fa-newspaper', 'from-amber-500 to-amber-600'],
            ['Messages', $stats['messages'] ?? 0, 'fa-envelope', 'from-emerald-500 to-emerald-600'],
            ['Quote Requests', $stats['quotes'] ?? 0, 'fa-file-invoice-dollar', 'from-rose-500 to-rose-600'],
            ['Unread Messages', $stats['unread_messages'] ?? 0, 'fa-envelope-open-text', 'from-red-500 to-red-600'],
            ['Published Posts', $stats['published_posts'] ?? 0, 'fa-circle-check', 'from-teal-500 to-teal-600'],
            ['Draft Posts', $stats['draft_posts'] ?? 0, 'fa-pen-ruler', 'from-slate-500 to-slate-600'],
        ];
    @endphp
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        @foreach($cards as [$label, $val, $icon, $grad])
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-500">{{ $label }}</p>
                        <p class="text-2xl font-extrabold mt-1">{{ $val }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br {{ $grad }} grid place-items-center text-white">
                        <i class="fa-solid {{ $icon }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid lg:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold">Recent Messages</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-xs text-brand hover:underline">View all</a>
            </div>
            <ul class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($recentMessages as $m)
                    <li class="py-2.5">
                        <a href="{{ route('admin.messages.show', $m) }}" class="block hover:bg-slate-50 dark:hover:bg-slate-800/50 -mx-2 px-2 py-1 rounded">
                            <p class="text-sm font-semibold truncate">{{ $m->full_name }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ \Illuminate\Support\Str::limit($m->message, 60) }}</p>
                        </a>
                    </li>
                @empty
                    <li class="py-4 text-sm text-slate-500 text-center">No messages yet.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold">Recent Quote Requests</h3>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs text-brand hover:underline">View all</a>
            </div>
            <ul class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($recentQuotes as $q)
                    <li class="py-2.5">
                        <a href="{{ route('admin.quotes.show', $q) }}" class="block hover:bg-slate-50 dark:hover:bg-slate-800/50 -mx-2 px-2 py-1 rounded">
                            <p class="text-sm font-semibold truncate">{{ $q->full_name }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ $q->project_type }} · {{ $q->budget_range }}</p>
                        </a>
                    </li>
                @empty
                    <li class="py-4 text-sm text-slate-500 text-center">No quote requests yet.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold">Recent Posts</h3>
                <a href="{{ route('admin.blog.index') }}" class="text-xs text-brand hover:underline">View all</a>
            </div>
            <ul class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($recentPosts as $p)
                    <li class="py-2.5">
                        <a href="{{ route('admin.blog.edit', $p) }}" class="block hover:bg-slate-50 dark:hover:bg-slate-800/50 -mx-2 px-2 py-1 rounded">
                            <p class="text-sm font-semibold truncate">{{ translated($p, 'title') }}</p>
                            <p class="text-xs text-slate-500">{{ ucfirst($p->status) }}</p>
                        </a>
                    </li>
                @empty
                    <li class="py-4 text-sm text-slate-500 text-center">No posts yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
