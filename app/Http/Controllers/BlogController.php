<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with(['category', 'user'])->published();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->latest('published_at')->paginate(9);
        $categories = BlogCategory::withCount('publishedPosts')->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(BlogPost $post)
    {
        // Only show published posts
        if ($post->status !== 'published') {
            abort(404);
        }

        // Increment views
        $post->incrementViews();

        // Load relationships
        $post->load(['category', 'user']);

        // Get related posts
        $relatedPosts = BlogPost::published()
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = BlogPost::published()
            ->where('blog_category_id', $category->id)
            ->latest('published_at')
            ->paginate(9);
        $categories = BlogCategory::withCount('publishedPosts')->get();

        return view('blog.index', compact('posts', 'categories', 'category'));
    }
}
