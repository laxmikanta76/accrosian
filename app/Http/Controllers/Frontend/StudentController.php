<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use App\Models\Setting;
use App\Models\Page;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        // Company brochure PDF path — update this to your actual PDF path
        $brochurePdf = 'assets/pdf/company-brochure.pdf';
        return view('frontend.student-registration', compact('setting', 'brochurePdf'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'mobile'         => 'required|string|max:15',
            'college_name'   => 'required|string|max:255',
            'course'         => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'year'           => 'required|string|max:50',
            'resume'         => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'name.required'         => 'Your name is required.',
            'email.required'        => 'A valid email is required.',
            'mobile.required'       => 'Mobile number is required.',
            'college_name.required' => 'College name is required.',
            'course.required'       => 'Please select your course.',
            'year.required'         => 'Please select your year.',
            'resume.mimes'          => 'Resume must be a PDF file.',
            'resume.max'            => 'Resume must not exceed 2MB.',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        StudentRegistration::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'mobile'         => $validated['mobile'],
            'college_name'   => $validated['college_name'],
            'course'         => $validated['course'],
            'specialization' => $validated['specialization'] ?? null,
            'year'           => $validated['year'],
            'resume'         => $resumePath,
            'status'         => 'new',
        ]);

        return redirect()->route('student.register')
            ->with('success', 'Thank you! Your registration has been submitted successfully. We will contact you soon.');
    }
}