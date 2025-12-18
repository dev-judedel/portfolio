<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'featured_projects' => Project::featured()->count(),
            'total_blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'unread_messages' => Contact::new()->count(),
            'total_messages' => Contact::count(),
            'total_testimonials' => Testimonial::count(),
            'total_visitors' => Cache::get('total_visitors', 0),
        ];

        $recentMessages = Contact::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
