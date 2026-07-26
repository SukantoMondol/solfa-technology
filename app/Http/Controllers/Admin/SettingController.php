<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /** Editable setting keys and their labels. */
    private const FIELDS = [
        'site_name' => 'Site Name',
        'tagline' => 'Tagline',
        'hero_title' => 'Hero Title',
        'hero_text' => 'Hero Text',
        'about_title' => 'About Title',
        'about_text' => 'About Text',
        'vision' => 'Vision',
        'mission' => 'Mission',
        'phone' => 'Phone',
        'email' => 'Email',
        'address' => 'Address',
        'facebook' => 'Facebook URL',
        'linkedin' => 'LinkedIn URL',
        'instagram' => 'Instagram URL',
        'twitter' => 'X / Twitter URL',
        'tiktok' => 'TikTok URL',
        'stat_projects' => 'Stat: Projects',
        'stat_clients' => 'Stat: Clients',
        'stat_years' => 'Stat: Years',
        'stat_team' => 'Stat: Team Members',
    ];

    public function edit(): View
    {
        return view('admin.settings', [
            'fields' => self::FIELDS,
            'values' => Setting::pluck('value', 'key')->toArray(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        foreach (array_keys(self::FIELDS) as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings saved.');
    }
}
