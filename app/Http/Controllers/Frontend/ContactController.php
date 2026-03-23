<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{ContactSubmission, Setting, Page};
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $page    = Page::where('slug', 'contact')->first();
        return view('frontend.contact', compact('setting', 'page'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ], [
            'name.required'    => 'Your name is required.',
            'email.required'   => 'A valid email address is required.',
            'message.required' => 'Please enter your message.',
            'message.min'      => 'Message must be at least 10 characters.',
        ]);

        ContactSubmission::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'status'  => 'new',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been received. We\'ll get back to you within 24 hours.');
    }
}
