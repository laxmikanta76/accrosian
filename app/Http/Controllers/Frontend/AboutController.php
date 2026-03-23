<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{Setting, Page};
class AboutController extends Controller {
    public function index() {
        $setting = Setting::first();
        $page    = Page::where('slug','about')->first();
        return view('frontend.about', compact('setting','page'));
    }
}
