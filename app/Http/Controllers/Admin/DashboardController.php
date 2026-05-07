<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\QuoteRequest;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'messages' => ContactMessage::count(),
            'quotes' => QuoteRequest::count(),
            'unread_messages' => ContactMessage::where('status', 'unread')->count(),
            'published_posts' => BlogPost::where('status', 'published')->count(),
            'draft_posts' => BlogPost::where('status', 'draft')->count(),
        ];
        $recentMessages = ContactMessage::latest()->limit(5)->get();
        $recentQuotes = QuoteRequest::latest()->limit(5)->get();
        $recentPosts = BlogPost::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentQuotes', 'recentPosts'));
    }
}
