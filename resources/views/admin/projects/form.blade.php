@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Project' : 'New Project')
@section('heading', $item->exists ? 'Edit Project' : 'New Project')
@section('content')
@php
    $featEn = is_array($item->features_en) ? implode("\n", $item->features_en) : (string) $item->features_en;
    $featFr = is_array($item->features_fr) ? implode("\n", $item->features_fr) : (string) $item->features_fr;
    $tech   = is_array($item->technologies) ? implode(', ', $item->technologies) : (string) $item->technologies;
    $gallery = is_array($item->gallery) ? $item->gallery : [];
@endphp
<form method="POST" action="{{ $item->exists ? route('admin.projects.update', $item) : route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
        <x-admin.lang-tabs>
            <x-slot name="en">
                <x-admin.field name="title_en" label="Title (EN)" :value="$item->title_en" required />
                <x-admin.field name="category_en" label="Category (EN)" :value="$item->category_en" />
                <x-admin.field name="short_description_en" label="Short Description (EN)" type="textarea" :value="$item->short_description_en" />
                <x-admin.field name="description_en" label="Description (EN)" type="textarea" rows="5" :value="$item->description_en" />
                <x-admin.field name="problem_en" label="Problem (EN)" type="textarea" :value="$item->problem_en" />
                <x-admin.field name="solution_en" label="Solution (EN)" type="textarea" :value="$item->solution_en" />
                <x-admin.field name="features_en" label="Key Features (EN, one per line)" type="textarea" rows="5" :value="$featEn" />
            </x-slot>
            <x-slot name="fr">
                <x-admin.field name="title_fr" label="Title (FR)" :value="$item->title_fr" />
                <x-admin.field name="category_fr" label="Category (FR)" :value="$item->category_fr" />
                <x-admin.field name="short_description_fr" label="Short Description (FR)" type="textarea" :value="$item->short_description_fr" />
                <x-admin.field name="description_fr" label="Description (FR)" type="textarea" rows="5" :value="$item->description_fr" />
                <x-admin.field name="problem_fr" label="Problem (FR)" type="textarea" :value="$item->problem_fr" />
                <x-admin.field name="solution_fr" label="Solution (FR)" type="textarea" :value="$item->solution_fr" />
                <x-admin.field name="features_fr" label="Key Features (FR, one per line)" type="textarea" rows="5" :value="$featFr" />
            </x-slot>
        </x-admin.lang-tabs>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4">
            <h3 class="font-bold">Details</h3>
            <x-admin.field name="slug" label="Slug" :value="$item->slug" />
            <x-admin.field name="client_name" label="Client" :value="$item->client_name" />
            <x-admin.field name="project_url" label="Project URL" :value="$item->project_url" />
            <x-admin.field name="completion_date" label="Completion Date" type="date" :value="optional($item->completion_date)->format('Y-m-d')" />
            <x-admin.field name="technologies" label="Technologies (comma-separated)" :value="$tech" placeholder="Laravel, MySQL, Tailwind" />
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
            <h3 class="font-bold">Cover Image & Gallery</h3>
            @if($item->image)<img src="{{ \Illuminate\Support\Str::startsWith($item->image, ['http','/']) ? $item->image : asset('storage/'.$item->image) }}" class="rounded-lg w-full h-40 object-cover">@endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm">
            @if(count($gallery))
                <div class="grid grid-cols-3 gap-2 pt-2">
                    @foreach($gallery as $g)<img src="{{ \Illuminate\Support\Str::startsWith($g, ['http','/']) ? $g : asset('storage/'.$g) }}" class="rounded-md h-20 w-full object-cover">@endforeach
                </div>
            @endif
            <label class="block text-sm font-medium">Add gallery images</label>
            <input type="file" name="gallery[]" accept="image/*" multiple class="block w-full text-sm">
        </div>
    </div>
    <div class="flex gap-3">
        <button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a>
    </div>
</form>
@endsection
