<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $q = TeamMember::query();
        if ($s = $request->get('search')) $q->where('name', 'like', "%$s%");
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->orderBy('sort_order')->paginate(15)->withQueryString();
        return view('admin.team.index', compact('items'));
    }

    public function create() { return view('admin.team.form', ['item' => new TeamMember()]); }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('team', 'public');
        TeamMember::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $team) { return view('admin.team.form', ['item' => $team]); }

    public function update(Request $request, TeamMember $team)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('team', 'public');
        $team->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return back()->with('success', 'Team member removed.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_fr' => 'nullable|string|max:255',
            'bio_en' => 'nullable|string',
            'bio_fr' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'linkedin' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:4096',
        ]);
    }
}
