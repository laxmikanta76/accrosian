<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{PortfolioItem, Setting, Page};
class PortfolioController extends Controller {
    public function index() {
        $items    = PortfolioItem::active()->orderBy('sort_order')->get();
        $setting  = Setting::first();
        $page     = Page::where('slug','portfolio')->first();
        $categories = $items->pluck('category')->unique()->filter()->values();
        return view('frontend.portfolio', compact('items','setting','page','categories'));
    }
}
