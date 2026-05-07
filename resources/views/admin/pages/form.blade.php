@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Page' : 'New Page')
@section('heading', $item->exists ? 'Edit Page' : 'New Page')
@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.pages.update', $item) : route('admin.pages.store') }}" class="space-y-6">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
        <x-admin.lang-tabs>
            <x-slot name="en">
                <x-admin.field name="title_en" label="Title (EN)" :value="$item->title_en" required />
                <x-admin.field name="content_en" label="Content (EN)" type="textarea" rows="14" :value="$item->content_en" />
                <x-admin.field name="meta_title_en" label="Meta Title (EN)" :value="$item->meta_title_en" />
                <x-admin.field name="meta_description_en" label="Meta Description (EN)" type="textarea" :value="$item->meta_description_en" />
            </x-slot>
            <x-slot name="fr">
                <x-admin.field name="title_fr" label="Title (FR)" :value="$item->title_fr" />
                <x-admin.field name="content_fr" label="Content (FR)" type="textarea" rows="14" :value="$item->content_fr" />
                <x-admin.field name="meta_title_fr" label="Meta Title (FR)" :value="$item->meta_title_fr" />
                <x-admin.field name="meta_description_fr" label="Meta Description (FR)" type="textarea" :value="$item->meta_description_fr" />
            </x-slot>
        </x-admin.lang-tabs>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4 grid md:grid-cols-2 gap-4">
        <x-admin.field name="slug" label="Slug" :value="$item->slug" />
        <label class="block"><span class="block text-sm font-medium mb-1">Status</span>
            <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <option value="published" @selected(($item->status ?? 'draft')==='published')>Published</option>
                <option value="draft" @selected(($item->status ?? 'draft')==='draft')>Draft</option>
            </select>
        </label>
    </div>
    <div class="flex gap-3"><button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark">Save</button><a href="{{ route('admin.pages.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a></div>
</form>
@endsection
