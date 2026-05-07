<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $q = BlogPost::query();
        if ($s = $request->get('search')) {
            $q->where(fn($w) => $w->where('title_en', 'like', "%$s%")->orWhere('title_fr', 'like', "%$s%"));
        }
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.blog.index', compact('items'));
    }

    public function create()
    {
        return view('admin.blog.form', ['item' => new BlogPost()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog', 'public');
        }
        BlogPost::create($data);
        return redirect()->route('admin.blog.index')->with('success', 'Post created.');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.form', ['item' => $blog]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $this->validateData($request, $blog->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog', 'public');
        }
        $blog->update($data);
        return redirect()->route('admin.blog.index')->with('success', 'Post updated.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return back()->with('success', 'Post deleted.');
    }

    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . ($id ?: 'NULL'),
            'excerpt_en' => 'nullable|string',
            'excerpt_fr' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'category_en' => 'nullable|string|max:120',
            'category_fr' => 'nullable|string|max:120',
            'author_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|max:4096',
        ]);
    }
}
