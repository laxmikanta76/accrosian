<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{Service, PortfolioItem, BlogPost, Setting};
class HomeController extends Controller {
    public function index() {
        $services   = Service::active()->orderBy('sort_order')->take(6)->get();
        $portfolio  = PortfolioItem::active()->orderBy('sort_order')->take(6)->get();
        $posts      = BlogPost::published()->latest('published_at')->take(3)->get();
        $setting    = Setting::first();
        return view('frontend.home', compact('services','portfolio','posts','setting'));
    }
}
