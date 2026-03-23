<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSubmission::latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $submissions = $query->paginate(20);
        return view('admin.contact.index', compact('submissions'));
    }

    public function show(ContactSubmission $contact)
    {
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }
        return view('admin.contact.show', compact('contact'));
    }

    public function updateStatus(Request $request, ContactSubmission $contact)
    {
        $request->validate(['status' => 'required|in:new,read,replied']);
        $contact->update(['status' => $request->status]);
        return back()->with('success', 'Status updated to ' . $request->status . '.');
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Submission deleted.');
    }
}
