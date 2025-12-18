<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', config('app.name')),
            'site_description' => Setting::get('site_description', ''),
            'site_keywords' => Setting::get('site_keywords', ''),
            'contact_email' => Setting::get('contact_email', ''),
            'contact_phone' => Setting::get('contact_phone', ''),
            'social_github' => Setting::get('social_github', ''),
            'social_linkedin' => Setting::get('social_linkedin', ''),
            'social_twitter' => Setting::get('social_twitter', ''),
            'social_instagram' => Setting::get('social_instagram', ''),
            'cv_file' => Setting::get('cv_file', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_keywords' => 'nullable|string|max:500',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'social_github' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Handle CV upload
        if ($request->hasFile('cv_file')) {
            // Delete old CV
            $oldCv = Setting::get('cv_file');
            if ($oldCv) {
                Storage::disk('public')->delete($oldCv);
            }

            $cvPath = $request->file('cv_file')->store('cv', 'public');
            Setting::set('cv_file', $cvPath);
            unset($validated['cv_file']);
        }

        // Save all other settings
        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
