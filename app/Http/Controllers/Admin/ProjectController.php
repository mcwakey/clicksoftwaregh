<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $q = Project::query();
        if ($s = $request->get('search')) {
            $q->where(fn($w) => $w->where('title_en', 'like', "%$s%")->orWhere('title_fr', 'like', "%$s%"));
        }
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.projects.index', compact('items'));
    }

    public function create()
    {
        return view('admin.projects.form', ['item' => new Project()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data = $this->processData($request, $data);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        if ($request->hasFile('gallery')) {
            $g = [];
            foreach ($request->file('gallery') as $f) {
                $g[] = $f->store('projects/gallery', 'public');
            }
            $data['gallery'] = $g;
        }
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', ['item' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request, $project->id);
        $data = $this->processData($request, $data);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        if ($request->hasFile('gallery')) {
            $g = $project->gallery ?? [];
            foreach ($request->file('gallery') as $f) {
                $g[] = $f->store('projects/gallery', 'public');
            }
            $data['gallery'] = $g;
        }
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }

    private function processData(Request $request, array $data): array
    {
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        $data['features_en'] = $this->splitLines($request->get('features_en'));
        $data['features_fr'] = $this->splitLines($request->get('features_fr'));
        $data['technologies'] = $this->splitCsv($request->get('technologies'));
        $data['is_featured'] = $request->boolean('is_featured');
        return $data;
    }

    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . ($id ?: 'NULL'),
            'category_en' => 'nullable|string|max:120',
            'category_fr' => 'nullable|string|max:120',
            'client_name' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'problem_en' => 'nullable|string',
            'problem_fr' => 'nullable|string',
            'solution_en' => 'nullable|string',
            'solution_fr' => 'nullable|string',
            'project_url' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|max:4096',
            'gallery.*' => 'nullable|image|max:4096',
        ]);
    }

    private function splitLines($value): array
    {
        if (! $value) return [];
        return array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $value))));
    }

    private function splitCsv($value): array
    {
        if (! $value) return [];
        return array_values(array_filter(array_map('trim', explode(',', $value))));
    }
}
