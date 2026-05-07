<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    private function path(string $locale): string
    {
        return base_path("lang/$locale/messages.php");
    }

    public function index()
    {
        $en = $this->load('en');
        $fr = $this->load('fr');
        $keys = array_unique(array_merge(array_keys($en), array_keys($fr)));
        sort($keys);
        return view('admin.translations.index', compact('en', 'fr', 'keys'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'translations' => 'array',
            'translations.*.key' => 'required|string',
            'translations.*.en' => 'nullable|string',
            'translations.*.fr' => 'nullable|string',
        ]);
        $en = []; $fr = [];
        foreach ($data['translations'] as $row) {
            if ($row['key'] === '') continue;
            $en[$row['key']] = (string) ($row['en'] ?? '');
            $fr[$row['key']] = (string) ($row['fr'] ?? '');
        }
        $this->save('en', $en);
        $this->save('fr', $fr);
        return back()->with('success', 'Translations saved.');
    }

    private function load(string $locale): array
    {
        $p = $this->path($locale);
        return File::exists($p) ? (require $p) : [];
    }

    private function save(string $locale, array $arr): void
    {
        $dir = dirname($this->path($locale));
        if (! File::isDirectory($dir)) File::makeDirectory($dir, 0755, true);
        $php = "<?php\n\nreturn " . var_export($arr, true) . ";\n";
        File::put($this->path($locale), $php);
    }
}
