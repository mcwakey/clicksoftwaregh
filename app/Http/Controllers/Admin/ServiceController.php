<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $q = Service::query();
        if ($s = $request->get('search')) {
            $q->where('title_en', 'like', "%$s%")->orWhere('title_fr', 'like', "%$s%");
        }
        if ($status = $request->get('status')) {
            $q->where('status', $status);
        }
        $items = $q->orderBy('sort_order')->paginate(15)->withQueryString();
        return view('admin.services.index', compact('items'));
    }

    public function create()
    {
        return view('admin.services.form', ['item' => new Service()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        $data['benefits_en'] = $this->splitLines($request->get('benefits_en'));
        $data['benefits_fr'] = $this->splitLines($request->get('benefits_fr'));
        $data['is_featured'] = $request->boolean('is_featured');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', ['item' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $this->validateData($request, $service->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title_en']);
        $data['benefits_en'] = $this->splitLines($request->get('benefits_en'));
        $data['benefits_fr'] = $this->splitLines($request->get('benefits_fr'));
        $data['is_featured'] = $request->boolean('is_featured');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted.');
    }

    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . ($id ?: 'NULL'),
            'icon' => 'nullable|string|max:100',
            'short_description_en' => 'nullable|string',
            'short_description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|max:4096',
        ]);
    }

    private function splitLines($value): array
    {
        if (! $value) return [];
        return array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $value))));
    }
}
