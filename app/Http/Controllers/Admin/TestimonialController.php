<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'project_name' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $validated['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'project_name' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            // Delete old image
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $validated['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete image if exists
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
