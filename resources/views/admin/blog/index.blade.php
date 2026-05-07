@extends('admin.layouts.app')
@section('title', __('messages.blog'))
@section('heading', __('messages.blog'))
@section('content')
<div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
    <div class="p-4 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between border-b border-slate-200 dark:border-slate-800">
        <form method="GET" class="flex flex-1 gap-2">
            <input name="search" value="{{ request('search') }}" placeholder="Search..." class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
            <select name="status" class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                <option value="">All</option>
                <option value="published" @selected(request('status')==='published')>Published</option>
                <option value="draft" @selected(request('status')==='draft')>Draft</option>
            </select>
            <button class="px-3 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-brand text-white text-sm font-semibold"><i class="fa-solid fa-plus"></i> New Post</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-xs uppercase text-slate-500 bg-slate-50 dark:bg-slate-800/50">
                <tr><th class="px-4 py-3">Title</th><th class="px-4 py-3">Author</th><th class="px-4 py-3">Status</th><th class="px-4 py-3">Published</th><th class="px-4 py-3 text-right">Actions</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($items as $it)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $it->title_en }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ $it->author_name }}</td>
                        <td class="px-4 py-3"><span class="px-2 py-0.5 text-xs rounded-full {{ $it->status==='published' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-slate-100 text-slate-600 dark:bg-slate-800' }}">{{ ucfirst($it->status) }}</span></td>
                        <td class="px-4 py-3 text-slate-500">{{ optional($it->published_at)->format('M j, Y') ?? '—' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.blog.edit', $it) }}" class="text-brand"><i class="fa-solid fa-pen"></i></a>
                            <form method="POST" action="{{ route('admin.blog.destroy', $it) }}" class="inline ml-2" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-rose-600"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">{{ $items->links() }}</div>
</div>
@endsection
