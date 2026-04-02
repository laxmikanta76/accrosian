<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = StudentRegistration::latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $students = $query->paginate(20);
        $counts = [
            'all'         => StudentRegistration::count(),
            'new'         => StudentRegistration::where('status', 'new')->count(),
            'reviewed'    => StudentRegistration::where('status', 'reviewed')->count(),
            'shortlisted' => StudentRegistration::where('status', 'shortlisted')->count(),
            'rejected'    => StudentRegistration::where('status', 'rejected')->count(),
        ];
        return view('admin.students.index', compact('students', 'counts'));
    }

    public function show(StudentRegistration $student)
    {
        if ($student->status === 'new') {
            $student->update(['status' => 'reviewed']);
        }
        return view('admin.students.show', compact('student'));
    }

    public function updateStatus(Request $request, StudentRegistration $student)
    {
        $request->validate([
            'status' => 'required|in:new,reviewed,shortlisted,rejected'
        ]);
        $student->update(['status' => $request->status]);
        return back()->with('success', 'Status updated to ' . $request->status . '.');
    }

    public function destroy(StudentRegistration $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')
            ->with('success', 'Registration deleted.');
    }
}