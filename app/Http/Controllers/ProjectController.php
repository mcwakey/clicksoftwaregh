<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.projects.index', [
            'meta_title' => 'Our Projects | Click Software GH',
            'meta_description' => 'Selected projects delivered by Click Software GH for clients in Ghana and beyond.',
            'projects' => SiteData::projects(),
        ]);
    }

    public function show(string $slug)
    {
        $project = SiteData::findProject($slug);
        if (!$project) {
            throw new NotFoundHttpException();
        }

        return view('pages.projects.show', [
            'meta_title' => $project['title'] . ' | Projects | Click Software GH',
            'meta_description' => $project['short'],
            'project' => $project,
            'related' => array_slice(array_filter(SiteData::projects(), fn($p) => $p['slug'] !== $slug), 0, 3),
        ]);
    }
}
