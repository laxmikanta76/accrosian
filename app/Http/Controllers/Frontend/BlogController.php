<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{BlogPost, Setting, Page};
class BlogController extends Controller {
    public function index() {
        $posts   = BlogPost::published()->latest('published_at')->paginate(9);
        $setting = Setting::first();
        $page    = Page::where('slug','blog')->first();
        return view('frontend.blog', compact('posts','setting','page'));
    }
    public function show(BlogPost $post) {
        abort_unless($post->status, 404);
        $related = BlogPost::published()->where('id','!=',$post->id)->latest('published_at')->take(3)->get();
        $setting = Setting::first();
        return view('frontend.blog-detail', compact('post','related','setting'));
    }
}
