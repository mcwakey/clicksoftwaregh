<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $items = Media::latest()->paginate(24)->withQueryString();
        return view('admin.media.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240|mimes:jpg,jpeg,png,gif,webp,svg,pdf,doc,docx,xls,xlsx',
            'alt_text_en' => 'nullable|string|max:255',
            'alt_text_fr' => 'nullable|string|max:255',
        ]);
        $file = $request->file('file');
        $path = $file->store('media', 'public');
        Media::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'alt_text_en' => $request->get('alt_text_en'),
            'alt_text_fr' => $request->get('alt_text_fr'),
            'uploaded_by' => optional(Auth::guard('admin')->user())->id,
        ]);
        return back()->with('success', 'File uploaded.');
    }

    public function update(Request $request, Media $medium)
    {
        $medium->update($request->validate([
            'alt_text_en' => 'nullable|string|max:255',
            'alt_text_fr' => 'nullable|string|max:255',
        ]));
        return back()->with('success', 'Updated.');
    }

    public function destroy(Media $medium)
    {
        Storage::disk('public')->delete($medium->file_path);
        $medium->delete();
        return back()->with('success', 'File deleted.');
    }
}
