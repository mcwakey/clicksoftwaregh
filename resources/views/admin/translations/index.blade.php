@extends('admin.layouts.app')
@section('title', __('messages.translations'))
@section('heading', __('messages.translations'))
@section('content')
<form method="POST" action="{{ route('admin.translations.update') }}" class="space-y-4" x-data="{ rows: {{ json_encode(array_values(array_map(fn($k) => ['key' => $k, 'en' => $en[$k] ?? '', 'fr' => $fr[$k] ?? ''], $keys))) }} }">
    @csrf @method('PATCH')
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-left text-xs uppercase text-slate-500 bg-slate-50 dark:bg-slate-800/50">
                    <tr><th class="px-4 py-3 w-1/4">Key</th><th class="px-4 py-3">English</th><th class="px-4 py-3">Français</th><th class="px-4 py-3 w-12"></th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    <template x-for="(row, i) in rows" :key="i">
                        <tr>
                            <td class="px-3 py-2"><input :name="'translations['+i+'][key]'" x-model="row.key" placeholder="messages.key" class="w-full px-2 py-1.5 rounded border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm font-mono"></td>
                            <td class="px-3 py-2"><textarea :name="'translations['+i+'][en]'" x-model="row.en" rows="1" class="w-full px-2 py-1.5 rounded border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm"></textarea></td>
                            <td class="px-3 py-2"><textarea :name="'translations['+i+'][fr]'" x-model="row.fr" rows="1" class="w-full px-2 py-1.5 rounded border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm"></textarea></td>
                            <td class="px-3 py-2"><button type="button" @click="rows.splice(i,1)" class="text-rose-600"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <div class="p-3 border-t border-slate-200 dark:border-slate-800">
            <button type="button" @click="rows.push({key:'',en:'',fr:''})" class="px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm"><i class="fa-solid fa-plus"></i> Add Row</button>
        </div>
    </div>
    <button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark"><i class="fa-solid fa-floppy-disk"></i> Save Translations</button>
</form>
@endsection
