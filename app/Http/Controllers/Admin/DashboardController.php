<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, ContactSubmission, Service, PortfolioItem, BlogPost, Setting};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users'       => User::count(),
            'contacts'    => ContactSubmission::count(),
            'new_contacts'=> ContactSubmission::where('status', 'new')->count(),
            'services'    => Service::count(),
            'portfolio'   => PortfolioItem::count(),
            'blogs'       => BlogPost::count(),
        ];
        $recent_contacts = ContactSubmission::latest()->take(5)->get();
        $setting = Setting::first();
        return view('admin.dashboard.index', compact('stats', 'recent_contacts', 'setting'));
    }
}
