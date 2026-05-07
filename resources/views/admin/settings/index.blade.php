@extends('admin.layouts.app')
@section('title', __('messages.settings'))
@section('heading', __('messages.settings'))
@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
    @csrf @method('PATCH')
    @foreach($groups as $groupName => $rows)
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5">
            <h3 class="text-lg font-bold mb-4 capitalize"><i class="fa-solid fa-folder-open text-brand"></i> {{ $groupName }}</h3>
            <div class="space-y-4">
                @foreach($rows as $row)
                    @php $isLong = strlen((string) $row->value_en) > 80 || $row->type === 'textarea'; @endphp
                    <div>
                        <label class="block text-sm font-semibold mb-1">{{ \Illuminate\Support\Str::headline($row->key) }} <span class="text-xs font-normal text-slate-500">({{ $row->key }})</span></label>
                        <div class="grid md:grid-cols-2 gap-3">
                            @if($isLong)
                                <textarea name="settings[{{ $row->key }}][en]" rows="3" placeholder="English"
                                    class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">{{ $row->value_en }}</textarea>
                                <textarea name="settings[{{ $row->key }}][fr]" rows="3" placeholder="Français"
                                    class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">{{ $row->value_fr }}</textarea>
                            @else
                                <input type="text" name="settings[{{ $row->key }}][en]" value="{{ $row->value_en }}" placeholder="English"
                                    class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                                <input type="text" name="settings[{{ $row->key }}][fr]" value="{{ $row->value_fr }}" placeholder="Français"
                                    class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <button class="px-5 py-2.5 rounded-lg bg-brand text-white font-semibold hover:bg-brand-dark"><i class="fa-solid fa-floppy-disk"></i> Save Settings</button>
</form>
@endsection
