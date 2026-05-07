@props(['name', 'label', 'value' => '', 'type' => 'text', 'required' => false, 'placeholder' => '', 'rows' => 3])
<label class="block">
    <span class="block text-sm font-medium mb-1">{{ $label }} @if($required)<span class="text-rose-500">*</span>@endif</span>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-brand focus:border-transparent outline-none">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-brand focus:border-transparent outline-none">
    @endif
</label>
