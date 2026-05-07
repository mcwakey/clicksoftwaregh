@extends('admin.layouts.app')
@section('title', 'Message')
@section('heading', 'Message Details')
@section('content')
<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-xl font-bold">{{ $item->full_name }}</h2>
                <p class="text-sm text-slate-500">{{ $item->email }} · {{ $item->phone }}</p>
                @if($item->organization) <p class="text-sm text-slate-500">{{ $item->organization }}</p> @endif
            </div>
            <p class="text-xs text-slate-500">{{ $item->created_at->format('M j, Y g:i a') }}</p>
        </div>
        @if($item->service) <p class="text-sm mb-3"><span class="font-semibold">Service:</span> {{ $item->service }}</p> @endif
        <div class="prose dark:prose-invert max-w-none whitespace-pre-line border-t border-slate-200 dark:border-slate-800 pt-4">{{ $item->message }}</div>
        <div class="mt-6 flex gap-3">
            <a href="mailto:{{ $item->email }}" class="px-4 py-2 rounded-lg bg-brand text-white text-sm font-semibold"><i class="fa-solid fa-reply"></i> Reply via Email</a>
            <form method="POST" action="{{ route('admin.messages.destroy', $item) }}" onsubmit="return confirm('Delete this message?')">@csrf @method('DELETE')<button class="px-4 py-2 rounded-lg bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300 text-sm font-semibold"><i class="fa-solid fa-trash"></i> Delete</button></form>
        </div>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6">
        <h3 class="font-bold mb-4">Status</h3>
        <form method="POST" action="{{ route('admin.messages.update', $item) }}" class="space-y-3">@csrf @method('PATCH')
            <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <option value="unread" @selected($item->status==='unread')>Unread</option>
                <option value="read" @selected($item->status==='read')>Read</option>
                <option value="replied" @selected($item->status==='replied')>Replied</option>
            </select>
            <button class="w-full px-4 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm font-semibold">Update Status</button>
        </form>
        <a href="{{ route('admin.messages.index') }}" class="block mt-4 text-sm text-brand hover:underline"><i class="fa-solid fa-arrow-left"></i> Back to inbox</a>
    </div>
</div>
@endsection
