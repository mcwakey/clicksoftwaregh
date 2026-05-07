@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit FAQ' : 'New FAQ')
@section('heading', $item->exists ? 'Edit FAQ' : 'New FAQ')
@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.faqs.update', $item) : route('admin.faqs.store') }}" class="space-y-6">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
        <x-admin.lang-tabs>
            <x-slot name="en">
                <x-admin.field name="question_en" label="Question (EN)" :value="$item->question_en" required />
                <x-admin.field name="answer_en" label="Answer (EN)" type="textarea" rows="6" :value="$item->answer_en" required />
            </x-slot>
            <x-slot name="fr">
                <x-admin.field name="question_fr" label="Question (FR)" :value="$item->question_fr" />
                <x-admin.field name="answer_fr" label="Answer (FR)" type="textarea" rows="6" :value="$item->answer_fr" />
            </x-slot>
        </x-admin.lang-tabs>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 grid md:grid-cols-2 gap-4">
        <x-admin.field name="sort_order" label="Sort Order" type="number" :value="$item->sort_order ?? 0" />
        <label class="block"><span class="block text-sm font-medium mb-1">Status</span>
            <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <option value="active" @selected(($item->status ?? 'active')==='active')>Active</option>
                <option value="inactive" @selected(($item->status ?? 'active')==='inactive')>Inactive</option>
            </select>
        </label>
    </div>
    <div class="flex gap-3"><button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark">Save</button><a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a></div>
</form>
@endsection
