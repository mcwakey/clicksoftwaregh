@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Testimonial' : 'New Testimonial')
@section('heading', $item->exists ? 'Edit Testimonial' : 'New Testimonial')
@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 space-y-4">
            <h3 class="font-bold">Client Info</h3>
            <x-admin.field name="client_name" label="Client Name" :value="$item->client_name" required />
            <x-admin.field name="position" label="Position" :value="$item->position" />
            <x-admin.field name="company_name" label="Company" :value="$item->company_name" />
            <x-admin.field name="rating" label="Rating (1-5)" type="number" :value="$item->rating ?? 5" />
            <x-admin.field name="sort_order" label="Sort Order" type="number" :value="$item->sort_order ?? 0" />
            <label class="block"><span class="block text-sm font-medium mb-1">Status</span>
                <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <option value="active" @selected(($item->status ?? 'active')==='active')>Active</option>
                    <option value="inactive" @selected(($item->status ?? 'active')==='inactive')>Inactive</option>
                </select>
            </label>
            <h4 class="font-bold pt-2">Avatar</h4>
            @if($item->image)<img src="{{ \Illuminate\Support\Str::startsWith($item->image, ['http','/']) ? $item->image : asset('storage/'.$item->image) }}" class="rounded-full w-24 h-24 object-cover">@endif
            <input type="file" name="image" accept="image/*" class="block text-sm">
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
            <x-admin.lang-tabs>
                <x-slot name="en"><x-admin.field name="message_en" label="Quote (EN)" type="textarea" rows="8" :value="$item->message_en" required /></x-slot>
                <x-slot name="fr"><x-admin.field name="message_fr" label="Quote (FR)" type="textarea" rows="8" :value="$item->message_fr" /></x-slot>
            </x-admin.lang-tabs>
        </div>
    </div>
    <div class="flex gap-3"><button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark">Save</button><a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700">Cancel</a></div>
</form>
@endsection
