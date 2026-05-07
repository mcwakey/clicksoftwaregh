<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blog.index', [
            'meta_title' => 'Blog & Insights | Click Software GH',
            'meta_description' => 'Articles and insights on software, websites, mobile apps and digital transformation in Ghana.',
            'blogs' => SiteData::blogs(),
        ]);
    }

    public function show(string $slug)
    {
        $blog = SiteData::findBlog($slug);
        if (!$blog) {
            throw new NotFoundHttpException();
        }

        return view('pages.blog.show', [
            'meta_title' => $blog['title'] . ' | Blog | Click Software GH',
            'meta_description' => $blog['excerpt'],
            'blog' => $blog,
            'related' => array_slice(array_filter(SiteData::blogs(), fn($b) => $b['slug'] !== $slug), 0, 3),
        ]);
    }
}
