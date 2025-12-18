<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::ordered()->paginate(20);
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')
                ->store('experiences', 'public');
        }

        if ($validated['is_current'] ?? false) {
            $validated['end_date'] = null;
        }

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('company_logo')) {
            // Delete old logo
            if ($experience->company_logo) {
                Storage::disk('public')->delete($experience->company_logo);
            }
            $validated['company_logo'] = $request->file('company_logo')
                ->store('experiences', 'public');
        }

        if ($validated['is_current'] ?? false) {
            $validated['end_date'] = null;
        }

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        // Delete logo if exists
        if ($experience->company_logo) {
            Storage::disk('public')->delete($experience->company_logo);
        }

        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience deleted successfully.');
    }
}
