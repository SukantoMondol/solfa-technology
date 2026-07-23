<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\JobOpening;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'Services' => Service::count(),
                'Projects' => Project::count(),
                'Blog Posts' => Post::count(),
                'Job Openings' => JobOpening::count(),
                'Testimonials' => Testimonial::count(),
                'FAQs' => Faq::count(),
                'Messages' => ContactMessage::count(),
                'Subscribers' => Subscriber::count(),
            ],
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'latestMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
