@extends('admin.layouts.app')
@section('title', __('messages.media_library'))
@section('heading', __('messages.media_library'))
@section('content')
<div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 mb-6">
    <h3 class="font-bold mb-3">Upload File</h3>
    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-4 gap-3">
        @csrf
        <input type="file" name="file" required class="md:col-span-2 text-sm">
        <input type="text" name="alt_text_en" placeholder="Alt text (EN)" class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
        <input type="text" name="alt_text_fr" placeholder="Alt text (FR)" class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
        <button class="md:col-span-4 mt-1 px-4 py-2 rounded-lg bg-brand text-white text-sm font-semibold"><i class="fa-solid fa-upload"></i> Upload</button>
    </form>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3">
    @forelse($items as $it)
        @php $isImg = str_starts_with((string) $it->file_type, 'image/'); @endphp
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
            @if($isImg)
                <a href="{{ asset('storage/'.$it->file_path) }}" target="_blank"><img src="{{ asset('storage/'.$it->file_path) }}" class="aspect-square w-full object-cover"></a>
            @else
                <a href="{{ asset('storage/'.$it->file_path) }}" target="_blank" class="block aspect-square w-full grid place-items-center bg-slate-100 dark:bg-slate-800 text-slate-500"><i class="fa-solid fa-file fa-2x"></i></a>
            @endif
            <div class="p-2 space-y-1">
                <form method="POST" action="{{ route('admin.media.update', $it) }}" class="space-y-1">@csrf @method('PATCH')
                    <input type="text" name="alt_text_en" value="{{ $it->alt_text_en }}" placeholder="Alt EN" class="w-full px-2 py-1 text-xs rounded border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <input type="text" name="alt_text_fr" value="{{ $it->alt_text_fr }}" placeholder="Alt FR" class="w-full px-2 py-1 text-xs rounded border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <button class="w-full text-xs px-2 py-1 rounded bg-slate-100 dark:bg-slate-800">Save</button>
                </form>
                <p class="text-[10px] text-slate-500 truncate" title="{{ $it->file_name }}">{{ $it->file_name }}</p>
                <form method="POST" action="{{ route('admin.media.destroy', $it) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="w-full text-xs px-2 py-1 rounded bg-rose-100 text-rose-700 dark:bg-rose-900/40"><i class="fa-solid fa-trash"></i> Delete</button></form>
            </div>
        </div>
    @empty
        <p class="col-span-full text-center text-slate-500 py-12">No files yet. Upload one above.</p>
    @endforelse
</div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
