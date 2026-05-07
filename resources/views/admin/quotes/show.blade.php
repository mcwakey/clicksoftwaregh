@extends('admin.layouts.app')
@section('title', 'Quote Request')
@section('heading', 'Quote Request')
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
        <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
            <div><span class="text-slate-500">Project Type:</span> <strong>{{ $item->project_type }}</strong></div>
            <div><span class="text-slate-500">Budget:</span> <strong>{{ $item->budget_range }}</strong></div>
            @if($item->deadline)<div><span class="text-slate-500">Deadline:</span> <strong>{{ \Illuminate\Support\Carbon::parse($item->deadline)->format('M j, Y') }}</strong></div>@endif
        </div>
        <h3 class="font-bold mt-4 mb-2">Project Description</h3>
        <div class="whitespace-pre-line border-t border-slate-200 dark:border-slate-800 pt-3 text-sm">{{ $item->project_description }}</div>
        @if($item->attachment)
            <a href="{{ asset('storage/'.$item->attachment) }}" target="_blank" class="inline-flex items-center gap-2 mt-4 px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm"><i class="fa-solid fa-paperclip"></i> Download Attachment</a>
        @endif
        <div class="mt-6 flex gap-3">
            <a href="mailto:{{ $item->email }}" class="px-4 py-2 rounded-lg bg-brand text-white text-sm font-semibold"><i class="fa-solid fa-reply"></i> Reply</a>
            <form method="POST" action="{{ route('admin.quotes.destroy', $item) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="px-4 py-2 rounded-lg bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300 text-sm font-semibold"><i class="fa-solid fa-trash"></i> Delete</button></form>
        </div>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6">
        <h3 class="font-bold mb-4">Status</h3>
        <form method="POST" action="{{ route('admin.quotes.update', $item) }}" class="space-y-3">@csrf @method('PATCH')
            <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                @foreach(['new','reviewed','approved','rejected'] as $s)
                    <option value="{{ $s }}" @selected($item->status===$s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button class="w-full px-4 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm font-semibold">Update Status</button>
        </form>
        <a href="{{ route('admin.quotes.index') }}" class="block mt-4 text-sm text-brand hover:underline"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>
@endsection
