<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'content'         => 'nullable|string',
            'banner_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'meta_title'      => 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
            'meta_keywords'   => 'nullable|string',
            'status'          => 'boolean',
        ]);

        $data           = $request->except(['_token', '_method', 'banner_image']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('pages', 'public');
        }

        $page->update($data);
        return back()->with('success', 'Page updated successfully.');
    }
}
