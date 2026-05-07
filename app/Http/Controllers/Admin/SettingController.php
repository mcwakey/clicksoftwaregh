<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $groups = SiteSetting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.settings.index', compact('groups'));
    }

    public function update(Request $request)
    {
        $values = $request->input('settings', []);
        foreach ($values as $key => $vals) {
            $row = SiteSetting::where('key', $key)->first();
            if (! $row) continue;
            $row->update([
                'value_en' => $vals['en'] ?? null,
                'value_fr' => $vals['fr'] ?? null,
            ]);
        }
        return back()->with('success', 'Settings saved.');
    }
}
