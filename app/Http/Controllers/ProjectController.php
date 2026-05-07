<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Support\ContentTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'published')->latest()->get()
            ->map(fn($p) => ContentTransformer::project($p))->all();
        return view('pages.projects.index', [
            'meta_title' => __('messages.our_projects') . ' | Click Software GH',
            'meta_description' => 'Selected projects delivered by Click Software GH.',
            'projects' => $projects,
        ]);
    }

    public function show(string $slug)
    {
        $model = Project::where('slug', $slug)->where('status', 'published')->first();
        if (! $model) throw new NotFoundHttpException();
        $project = ContentTransformer::project($model);
        $related = Project::where('status', 'published')->where('id', '!=', $model->id)->latest()->limit(3)->get()
            ->map(fn($p) => ContentTransformer::project($p))->all();
        return view('pages.projects.show', [
            'meta_title' => $project['title'] . ' | Projects | Click Software GH',
            'meta_description' => $project['short'],
            'project' => $project,
            'related' => $related,
        ]);
    }
}
