<?php

namespace App\Http\Controllers;

use App\Support\SiteData;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'meta_title' => 'Click Software GH | Smart Digital Solutions for Growing Businesses',
            'meta_description' => 'Click Software GH builds modern websites, mobile apps and business systems for organizations across Ghana and beyond.',
            'services' => array_slice(SiteData::services(), 0, 6),
            'projects' => array_slice(SiteData::projects(), 0, 3),
            'testimonials' => SiteData::testimonials(),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'meta_title' => 'About Us | Click Software GH',
            'meta_description' => 'Learn more about Click Software GH — a Kumasi-based software company delivering reliable, modern IT solutions.',
            'values' => SiteData::values(),
            'team' => SiteData::team(),
            'timeline' => SiteData::timeline(),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            'meta_title' => 'Our Services | Click Software GH',
            'meta_description' => 'Website design, mobile apps, custom software, school & hospital systems, e-commerce, hosting, IT consultancy and more.',
            'services' => SiteData::services(),
        ]);
    }

    public function privacy()
    {
        return view('pages.privacy', [
            'meta_title' => 'Privacy Policy | Click Software GH',
            'meta_description' => 'Read the privacy policy for Click Software GH and learn how we protect your data.',
        ]);
    }

    public function terms()
    {
        return view('pages.terms', [
            'meta_title' => 'Terms & Conditions | Click Software GH',
            'meta_description' => 'Terms and conditions for using the Click Software GH website and services.',
        ]);
    }
}
