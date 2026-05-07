@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Team Member' : 'New Team Member')
@section('heading', $item->exists ? 'Edit Team Member' : 'New Team Member')
@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.team.update', $item) : route('admin.team.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4">
            <x-admin.field name="name" label="Name" :value="$item->name" required />
            <x-admin.field name="email" label="Email" type="email" :value="$item->email" />
            <x-admin.field name="linkedin" label="LinkedIn URL" :value="$item->linkedin" />
            <x-admin.field name="twitter" label="Twitter URL" :value="$item->twitter" />
            <x-admin.field name="sort_order" label="Sort Order" type="number" :value="$item->sort_order ?? 0" />
            <label class="block"><span class="block text-sm font-medium mb-1">Status</span>
                <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <option value="active" @selected(($item->status ?? 'active')==='active')>Active</option>
                    <option value="inactive" @selected(($item->status ?? 'active')==='inactive')>Inactive</option>
                </select>
            </label>
            @if($item->image)<img src="{{ \Illuminate\Support\Str::startsWith($item->image, ['http','/']) ? $item->image : asset('storage/'.$item->image) }}" class="rounded-full w-24 h-24 object-cover">@endif
            <input type="file" name="image" accept="image/*" class="block text-sm">
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
            <x-admin.lang-tabs>
                <x-slot name="en">
                    <x-admin.field name="position_en" label="Position (EN)" :value="$item->position_en" required />
                    <x-admin.field name="bio_en" label="Bio (EN)" type="textarea" rows="6" :value="$item->bio_en" />
                </x-slot>
                <x-slot name="fr">
                    <x-admin.field name="position_fr" label="Position (FR)" :value="$item->position_fr" />
                    <x-admin.field name="bio_fr" label="Bio (FR)" type="textarea" rows="6" :value="$item->bio_fr" />
                </x-slot>
            </x-admin.lang-tabs>
        </div>
    </div>
    <div class="flex gap-3"><button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark">Save</button><a href="{{ route('admin.team.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a></div>
</form>
@endsection
