@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Service' : 'New Service')
@section('heading', $item->exists ? 'Edit Service' : 'New Service')
@section('content')
@php
    $benEn = is_array($item->benefits_en) ? implode("\n", $item->benefits_en) : (string) $item->benefits_en;
    $benFr = is_array($item->benefits_fr) ? implode("\n", $item->benefits_fr) : (string) $item->benefits_fr;
@endphp
<form method="POST" action="{{ $item->exists ? route('admin.services.update', $item) : route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($item->exists) @method('PUT') @endif

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
        <x-admin.lang-tabs>
            <x-slot name="en">
                <x-admin.field name="title_en" label="Title (EN)" :value="$item->title_en" required />
                <x-admin.field name="short_description_en" label="Short Description (EN)" type="textarea" :value="$item->short_description_en" />
                <x-admin.field name="description_en" label="Description (EN)" type="textarea" rows="6" :value="$item->description_en" />
                <x-admin.field name="benefits_en" label="Benefits (EN, one per line)" type="textarea" rows="5" :value="$benEn" />
                <x-admin.field name="meta_title_en" label="Meta Title (EN)" :value="$item->meta_title_en" />
                <x-admin.field name="meta_description_en" label="Meta Description (EN)" type="textarea" :value="$item->meta_description_en" />
            </x-slot>
            <x-slot name="fr">
                <x-admin.field name="title_fr" label="Title (FR)" :value="$item->title_fr" />
                <x-admin.field name="short_description_fr" label="Short Description (FR)" type="textarea" :value="$item->short_description_fr" />
                <x-admin.field name="description_fr" label="Description (FR)" type="textarea" rows="6" :value="$item->description_fr" />
                <x-admin.field name="benefits_fr" label="Benefits (FR, one per line)" type="textarea" rows="5" :value="$benFr" />
                <x-admin.field name="meta_title_fr" label="Meta Title (FR)" :value="$item->meta_title_fr" />
                <x-admin.field name="meta_description_fr" label="Meta Description (FR)" type="textarea" :value="$item->meta_description_fr" />
            </x-slot>
        </x-admin.lang-tabs>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4">
            <h3 class="font-bold">Settings</h3>
            <x-admin.field name="slug" label="Slug" :value="$item->slug" placeholder="auto-generated from title" />
            <x-admin.field name="icon" label="Icon (Font Awesome class)" :value="$item->icon" placeholder="fa-screwdriver-wrench" />
            <x-admin.field name="sort_order" label="Sort Order" type="number" :value="$item->sort_order ?? 0" />
            <label class="block">
                <span class="block text-sm font-medium mb-1">Status</span>
                <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <option value="published" @selected(($item->status ?? 'draft')==='published')>Published</option>
                    <option value="draft" @selected(($item->status ?? 'draft')==='draft')>Draft</option>
                </select>
            </label>
            <label class="flex items-center gap-2"><input type="checkbox" name="is_featured" value="1" @checked($item->is_featured) class="rounded text-brand"> <span class="text-sm">Featured</span></label>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4">
            <h3 class="font-bold">Image</h3>
            @if($item->image)
                <img src="{{ \Illuminate\Support\Str::startsWith($item->image, ['http','/']) ? $item->image : asset('storage/'.$item->image) }}" class="rounded-lg w-full h-48 object-cover">
            @endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm">
        </div>
    </div>

    <div class="flex gap-3">
        <button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a>
    </div>
</form>
@endsection
