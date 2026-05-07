<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $q = Page::query();
        if ($s = $request->get('search')) $q->where('title_en', 'like', "%$s%");
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.pages.index', compact('items'));
    }

    public function create() { return view('admin.pages.form', ['item' => new Page()]); }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        Page::create($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page created.');
    }

    public function edit(Page $page) { return view('admin.pages.form', ['item' => $page]); }

    public function update(Request $request, Page $page)
    {
        $data = $this->validateData($request, $page->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page updated.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Page deleted.');
    }

    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . ($id ?: 'NULL'),
            'content_en' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'status' => 'required|in:published,draft',
        ]);
    }
}
