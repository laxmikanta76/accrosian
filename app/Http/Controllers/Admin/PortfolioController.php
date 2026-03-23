<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::orderBy('sort_order')->get();
        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:portfolio_items,slug',
            'category'        => 'nullable|string|max:255',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'description'     => 'nullable|string',
            'meta_title'      => 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
            'meta_keywords'   => 'nullable|string',
            'status'          => 'boolean',
            'sort_order'      => 'nullable|integer',
        ],[
    'image.image' => 'Please upload a valid image.',
    'image.mimes' => 'Image must be JPG, JPEG, PNG, or WebP.',
    'image.max'   => 'Image size must not exceed 8MB.',
]);

        $data['slug']   = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        PortfolioItem::create($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created.');
    }

    public function edit(PortfolioItem $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:portfolio_items,slug,' . $portfolio->id,
            'category'        => 'nullable|string|max:255',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'description'     => 'nullable|string',
            'meta_title'      => 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
            'meta_keywords'   => 'nullable|string',
            'status'          => 'boolean',
            'sort_order'      => 'nullable|integer',
        ],
        [
    'image.image' => 'Please upload a valid image.',
    'image.mimes' => 'Image must be JPG, JPEG, PNG, or WebP.',
    'image.max'   => 'Image size must not exceed 8MB.',
]);

        $data['slug']   = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($data);
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated.');
    }

    public function destroy(PortfolioItem $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted.');
    }
}