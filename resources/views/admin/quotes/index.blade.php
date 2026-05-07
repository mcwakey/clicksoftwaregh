@extends('admin.layouts.app')
@section('title', __('messages.quote_requests'))
@section('heading', __('messages.quote_requests'))
@section('content')
<div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
    <div class="p-4 flex justify-between items-center border-b border-slate-200 dark:border-slate-800">
        <form method="GET" class="flex gap-2 flex-1">
            <input name="search" value="{{ request('search') }}" placeholder="Search..." class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm flex-1">
            <select name="status" class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                <option value="">All</option>
                @foreach(['new','reviewed','approved','rejected'] as $s)
                    <option value="{{ $s }}" @selected(request('status')===$s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button class="px-3 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <table class="w-full text-sm">
        <thead class="text-left text-xs uppercase text-slate-500 bg-slate-50 dark:bg-slate-800/50"><tr><th class="px-4 py-3">Name</th><th class="px-4 py-3">Project Type</th><th class="px-4 py-3">Budget</th><th class="px-4 py-3">Status</th><th class="px-4 py-3">Date</th></tr></thead>
        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
            @forelse($items as $it)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer" onclick="location='{{ route('admin.quotes.show', $it) }}'">
                    <td class="px-4 py-3 font-medium">{{ $it->full_name }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $it->project_type }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $it->budget_range }}</td>
                    <td class="px-4 py-3"><span class="px-2 py-0.5 text-xs rounded-full
                        {{ ['new'=>'bg-sky-100 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300','reviewed'=>'bg-amber-100 text-amber-700','approved'=>'bg-emerald-100 text-emerald-700','rejected'=>'bg-rose-100 text-rose-700'][$it->status] ?? '' }}">{{ ucfirst($it->status) }}</span></td>
                    <td class="px-4 py-3 text-slate-500">{{ $it->created_at->format('M j, Y') }}</td>
                </tr>
            @empty <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">No quote requests.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $items->links() }}</div>
</div>
@endsection
