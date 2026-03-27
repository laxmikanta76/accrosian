<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string',
            'full_description'  => 'nullable|string',
            'icon'              => 'nullable|string|max:10',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'content_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keywords'     => 'nullable|string',
            'status'            => 'boolean',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['slug']   = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        if ($request->hasFile('content_image')) {
            $data['content_image'] = $request->file('content_image')->store('services', 'public');
        }

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'short_description' => 'nullable|string',
            'full_description'  => 'nullable|string',
            'icon'              => 'nullable|string|max:10',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'content_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keywords'     => 'nullable|string',
            'status'            => 'boolean',
            'sort_order'        => 'nullable|integer',
        ]);

        $data['slug']   = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        if ($request->hasFile('content_image')) {
            $data['content_image'] = $request->file('content_image')->store('services', 'public');
            dd($data['content_image']);
        } else {
            unset($data['content_image']);
        }

        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }
}