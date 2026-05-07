<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\SiteSetting;
use App\Models\Page;
use App\Support\ContentTransformer;
use App\Support\SiteData;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('status', 'published')->orderBy('sort_order')->limit(6)->get()
            ->map(fn($s) => ContentTransformer::service($s))->all();
        $projects = Project::where('status', 'published')->where('is_featured', true)->latest()->limit(3)->get()
            ->map(fn($p) => ContentTransformer::project($p))->all();
        if (count($projects) < 3) {
            $projects = Project::where('status', 'published')->latest()->limit(3)->get()
                ->map(fn($p) => ContentTransformer::project($p))->all();
        }
        $testimonials = Testimonial::where('status', 'active')->orderBy('sort_order')->get()
            ->map(fn($t) => ContentTransformer::testimonial($t))->all();

        return view('pages.home', [
            'meta_title' => SiteSetting::get('seo_default_title') ?: 'Click Software GH',
            'meta_description' => SiteSetting::get('seo_default_description') ?: '',
            'services' => $services,
            'projects' => $projects,
            'testimonials' => $testimonials,
        ]);
    }

    public function about()
    {
        $team = TeamMember::where('status', 'active')->orderBy('sort_order')->get()
            ->map(fn($m) => ContentTransformer::team($m))->all();

        return view('pages.about', [
            'meta_title' => __('messages.about_us') . ' | Click Software GH',
            'meta_description' => 'Learn more about Click Software GH.',
            'values' => SiteData::values(),
            'team' => $team,
            'timeline' => SiteData::timeline(),
        ]);
    }

    public function services()
    {
        $services = Service::where('status', 'published')->orderBy('sort_order')->get()
            ->map(fn($s) => ContentTransformer::service($s))->all();
        return view('pages.services', [
            'meta_title' => __('messages.our_services') . ' | Click Software GH',
            'meta_description' => 'Our services.',
            'services' => $services,
        ]);
    }

    public function privacy()
    {
        $page = Page::where('slug', 'privacy-policy')->first();
        return view('pages.privacy', [
            'meta_title' => $page ? translated($page, 'title') : 'Privacy Policy',
            'meta_description' => 'Privacy Policy',
            'page' => $page,
        ]);
    }

    public function terms()
    {
        $page = Page::where('slug', 'terms')->first();
        return view('pages.terms', [
            'meta_title' => $page ? translated($page, 'title') : 'Terms of Service',
            'meta_description' => 'Terms of Service',
            'page' => $page,
        ]);
    }
}
