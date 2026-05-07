<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Support\ContentTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::where('status', 'published')->latest('published_at')->get()
            ->map(fn($b) => ContentTransformer::blog($b))->all();
        return view('pages.blog.index', [
            'meta_title' => __('messages.blog') . ' | Click Software GH',
            'meta_description' => 'Articles and insights from Click Software GH.',
            'blogs' => $blogs,
        ]);
    }

    public function show(string $slug)
    {
        $model = BlogPost::where('slug', $slug)->where('status', 'published')->first();
        if (! $model) throw new NotFoundHttpException();
        $blog = ContentTransformer::blog($model);
        $related = BlogPost::where('status', 'published')->where('id', '!=', $model->id)->latest('published_at')->limit(3)->get()
            ->map(fn($b) => ContentTransformer::blog($b))->all();
        return view('pages.blog.show', [
            'meta_title' => $blog['title'] . ' | Blog | Click Software GH',
            'meta_description' => $blog['excerpt'],
            'blog' => $blog,
            'related' => $related,
        ]);
    }
}
