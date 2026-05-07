<?php

namespace App\Support;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;

class ContentTransformer
{
    public static function service($s): array
    {
        return [
            'slug'  => $s->slug,
            'title' => translated($s, 'title'),
            'icon'  => $s->icon,
            'short' => translated($s, 'short_description'),
            'description' => translated($s, 'description'),
            'image' => $s->image,
            'benefits' => translated_array($s, 'benefits'),
        ];
    }

    public static function project($p): array
    {
        return [
            'slug'    => $p->slug,
            'title'   => translated($p, 'title'),
            'category'=> translated($p, 'category'),
            'image'   => $p->image,
            'short'   => translated($p, 'short_description'),
            'description' => translated($p, 'description'),
            'tech'    => is_array($p->technologies) ? $p->technologies : [],
            'problem' => translated($p, 'problem'),
            'solution'=> translated($p, 'solution'),
            'features'=> translated_array($p, 'features'),
            'gallery' => is_array($p->gallery) ? $p->gallery : [],
            'project_url' => $p->project_url,
            'client_name' => $p->client_name,
            'completion_date' => optional($p->completion_date)->format('M Y'),
            'result'  => '',
        ];
    }

    public static function blog($b): array
    {
        return [
            'slug'    => $b->slug,
            'title'   => translated($b, 'title'),
            'category'=> translated($b, 'category'),
            'date'    => optional($b->published_at)->format('F j, Y'),
            'author'  => $b->author_name,
            'image'   => $b->image,
            'excerpt' => translated($b, 'excerpt'),
            'body'    => translated($b, 'content'),
        ];
    }

    public static function testimonial($t): array
    {
        return [
            'name'  => $t->client_name,
            'role'  => trim(($t->position ?? '') . ($t->company_name ? ', ' . $t->company_name : ''), ', '),
            'avatar'=> $t->image,
            'quote' => translated($t, 'message'),
        ];
    }

    public static function team($m): array
    {
        return [
            'name'   => $m->name,
            'role'   => translated($m, 'position'),
            'avatar' => $m->image,
        ];
    }
}
