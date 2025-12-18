<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('images')->ordered()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'tech_stack' => 'nullable|array',
            'tech_stack.*' => 'string|max:255',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'demo_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
            'completed_at' => 'nullable|date',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('projects', 'public');
        }

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $project = Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('images');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'tech_stack' => 'nullable|array',
            'tech_stack.*' => 'string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'demo_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
            'completed_at' => 'nullable|date',
        ]);

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete featured image
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        // Delete all project images
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
