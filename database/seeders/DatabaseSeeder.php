<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\Page;
use App\Support\SiteData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@clicksoftwaregh.com'],
            [
                'name' => 'Site Admin',
                'password' => Hash::make('password'),
                'role' => 'super-admin',
                'status' => 'active',
            ]
        );

        foreach (SiteData::services() as $i => $s) {
            Service::updateOrCreate(['slug' => $s['slug']], [
                'icon' => $s['icon'] ?? null,
                'title_en' => $s['title'],
                'title_fr' => $s['title'],
                'short_description_en' => $s['short'] ?? null,
                'short_description_fr' => $s['short'] ?? null,
                'description_en' => $s['short'] ?? null,
                'description_fr' => $s['short'] ?? null,
                'benefits_en' => $s['benefits'] ?? [],
                'benefits_fr' => $s['benefits'] ?? [],
                'sort_order' => $i,
                'is_featured' => $i < 6,
                'status' => 'published',
            ]);
        }

        foreach (SiteData::projects() as $i => $p) {
            Project::updateOrCreate(['slug' => $p['slug']], [
                'title_en' => $p['title'],
                'title_fr' => $p['title'],
                'category_en' => $p['category'] ?? null,
                'category_fr' => $p['category'] ?? null,
                'short_description_en' => $p['short'] ?? null,
                'short_description_fr' => $p['short'] ?? null,
                'description_en' => $p['short'] ?? null,
                'description_fr' => $p['short'] ?? null,
                'problem_en' => $p['problem'] ?? null,
                'problem_fr' => $p['problem'] ?? null,
                'solution_en' => $p['solution'] ?? null,
                'solution_fr' => $p['solution'] ?? null,
                'features_en' => $p['features'] ?? [],
                'features_fr' => $p['features'] ?? [],
                'technologies' => $p['tech'] ?? [],
                'image' => $p['image'] ?? null,
                'is_featured' => $i < 3,
                'status' => 'published',
            ]);
        }

        foreach (SiteData::blogs() as $b) {
            BlogPost::updateOrCreate(['slug' => $b['slug']], [
                'title_en' => $b['title'],
                'title_fr' => $b['title'],
                'excerpt_en' => $b['excerpt'] ?? null,
                'excerpt_fr' => $b['excerpt'] ?? null,
                'content_en' => $b['body'] ?? null,
                'content_fr' => $b['body'] ?? null,
                'category_en' => $b['category'] ?? null,
                'category_fr' => $b['category'] ?? null,
                'image' => $b['image'] ?? null,
                'author_name' => $b['author'] ?? null,
                'published_at' => isset($b['date']) ? date('Y-m-d', strtotime($b['date'])) : now(),
                'status' => 'published',
            ]);
        }

        foreach (SiteData::testimonials() as $i => $t) {
            Testimonial::updateOrCreate(['client_name' => $t['name']], [
                'company_name' => null,
                'position' => $t['role'] ?? null,
                'message_en' => $t['quote'],
                'message_fr' => $t['quote'],
                'rating' => 5,
                'image' => $t['avatar'] ?? null,
                'status' => 'active',
                'sort_order' => $i,
            ]);
        }

        foreach (SiteData::team() as $i => $m) {
            TeamMember::updateOrCreate(['name' => $m['name']], [
                'position_en' => $m['role'],
                'position_fr' => $m['role'],
                'image' => $m['avatar'] ?? null,
                'sort_order' => $i,
                'status' => 'active',
            ]);
        }

        $faqs = [
            ['Do you offer custom software for any industry?', 'Yes, we build tailored systems for schools, hospitals, retail, logistics, finance and more.'],
            ['How long does a typical project take?', 'Simple websites take 2-4 weeks. Custom systems usually take 6-16 weeks depending on scope.'],
            ['Do you provide support after launch?', 'Yes, we provide maintenance plans with monitoring, backups and ongoing improvements.'],
            ['Can you work with clients outside Ghana?', 'Absolutely. We currently serve clients across West Africa and beyond, fully remote.'],
            ['What payment methods do you accept?', 'We accept bank transfer, mobile money and card payments through secure invoices.'],
        ];
        foreach ($faqs as $i => [$q, $a]) {
            Faq::updateOrCreate(['question_en' => $q], [
                'question_fr' => $q,
                'answer_en' => $a,
                'answer_fr' => $a,
                'sort_order' => $i,
                'status' => 'active',
            ]);
        }

        $c = SiteData::company();
        $settings = [
            ['site_name', $c['name'], 'general', 'text'],
            ['site_slogan', $c['tagline'], 'general', 'text'],
            ['company_email', $c['email'], 'contact', 'text'],
            ['company_phone', $c['phones'][0] ?? '', 'contact', 'text'],
            ['company_phone_alt', $c['phones'][1] ?? '', 'contact', 'text'],
            ['whatsapp_number', $c['whatsapp'], 'contact', 'text'],
            ['address', $c['address'], 'contact', 'text'],
            ['business_hours', "Mon - Fri: 8:00am - 6:00pm\nSat: 9:00am - 2:00pm", 'contact', 'textarea'],
            ['facebook_link', $c['social']['facebook'], 'social', 'text'],
            ['linkedin_link', $c['social']['linkedin'], 'social', 'text'],
            ['twitter_link', $c['social']['twitter'], 'social', 'text'],
            ['instagram_link', $c['social']['instagram'], 'social', 'text'],
            ['footer_text', '© ' . date('Y') . ' ' . $c['name'] . '. All rights reserved.', 'general', 'text'],
            ['hero_title', 'High Level Multi-Technology Software Solutions', 'homepage', 'text'],
            ['hero_subtitle', 'We build websites, apps and business systems that grow your impact.', 'homepage', 'textarea'],
            ['seo_default_title', $c['name'] . ' - Software Solutions in Ghana', 'seo', 'text'],
            ['seo_default_description', 'Premium websites, mobile apps and business systems crafted in Kumasi, Ghana.', 'seo', 'textarea'],
        ];
        foreach ($settings as [$key, $val, $group, $type]) {
            SiteSetting::updateOrCreate(['key' => $key], [
                'value_en' => $val,
                'value_fr' => $val,
                'group' => $group,
                'type' => $type,
            ]);
        }

        foreach ([
            ['privacy-policy', 'Privacy Policy', 'Politique de confidentialité'],
            ['terms', 'Terms of Service', 'Conditions d\'utilisation'],
        ] as [$slug, $titleEn, $titleFr]) {
            Page::updateOrCreate(['slug' => $slug], [
                'title_en' => $titleEn,
                'title_fr' => $titleFr,
                'content_en' => '<p>This is the ' . $titleEn . ' content. Edit it from the admin panel.</p>',
                'content_fr' => '<p>Ceci est le contenu de la page ' . $titleFr . '. Modifiez-le depuis le panneau d\'administration.</p>',
                'status' => 'published',
            ]);
        }
    }
}
