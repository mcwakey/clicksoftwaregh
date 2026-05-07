@props(['active' => 'en'])
<div x-data="{ tab: '{{ $active }}' }">
    <div class="flex gap-1 border-b border-slate-200 dark:border-slate-800 mb-4">
        <button type="button" @click="tab='en'" :class="tab==='en' ? 'border-brand text-brand' : 'border-transparent text-slate-500'" class="px-4 py-2 text-sm font-semibold border-b-2 -mb-px"><i class="fa-solid fa-flag-usa"></i> English</button>
        <button type="button" @click="tab='fr'" :class="tab==='fr' ? 'border-brand text-brand' : 'border-transparent text-slate-500'" class="px-4 py-2 text-sm font-semibold border-b-2 -mb-px"><i class="fa-solid fa-flag"></i> Français</button>
    </div>
    <div x-show="tab==='en'" class="space-y-4">{{ $en }}</div>
    <div x-show="tab==='fr'" class="space-y-4" x-cloak>{{ $fr }}</div>
</div>
