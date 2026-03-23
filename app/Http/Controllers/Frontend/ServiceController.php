<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{Service, Setting, Page};
class ServiceController extends Controller {
    public function index() {
        $services = Service::active()->orderBy('sort_order')->get();
        $setting  = Setting::first();
        $page     = Page::where('slug','services')->first();
        return view('frontend.services', compact('services','setting','page'));
    }
    public function show(Service $service) {
        $others = Service::active()->where('id','!=',$service->id)->orderBy('sort_order')->get();
        $setting = Setting::first();
        return view('frontend.service-detail', compact('service','others','setting'));
    }
}
