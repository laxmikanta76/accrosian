@extends('layouts.admin')
@section('admin_title', 'Student Registration Detail')

@section('admin_content')
<div class="breadcrumb">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span>
    <a href="{{ route('admin.students.index') }}">Students</a><span>/</span>
    View
</div>

<div style="display:grid;grid-template-columns:1fr 280px;gap:24px">

    {{-- MAIN DETAILS --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">{{ $student->name }}</h3>
            <span class="badge badge-{{ $student->status }}">{{ ucfirst($student->status) }}</span>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px">
            @foreach([
            ['👤 Full Name', $student->name],
            ['✉️ Email', $student->email],
            ['📞 Mobile', $student->mobile],
            ['🏫 College', $student->college_name],
            ['📚 Course', $student->course],
            ['🎓 Year', $student->year],
            ['🔬 Specialization', $student->specialization ?: '—'],
            ['📅 Applied On', $student->created_at->format('F j, Y \a\t g:i A')],
            ] as [$label, $value])
            <div style="background:var(--surface);border-radius:8px;padding:14px">
                <div style="font-size:0.75rem;color:var(--muted);margin-bottom:4px">{{ $label }}</div>
                <div style="font-size:0.92rem;color:var(--text);font-weight:600">{{ $value }}</div>
            </div>
            @endforeach
        </div>

        {{-- RESUME --}}
        @if($student->resume)
        <div style="background:var(--surface);border-radius:12px;padding:20px">
            <div style="font-size:0.75rem;color:var(--muted);margin-bottom:12px;
                        text-transform:uppercase;letter-spacing:0.05em">
                📄 Resume
            </div>
            <iframe src="{{ $student->resume_url }}" style="width:100%;height:500px;border:none;border-radius:8px;
                           background:#fff;display:block" title="Resume">
            </iframe>
            <a href="{{ $student->resume_url }}" target="_blank" download class="btn-admin btn-admin-primary"
                style="margin-top:12px;display:inline-flex">
                <i class="fas fa-download"></i> Download Resume
            </a>
        </div>
        @else
        <div style="background:var(--surface);border-radius:8px;padding:20px;
                    text-align:center;color:var(--muted)">
            No resume uploaded
        </div>
        @endif
    </div>

    {{-- SIDEBAR ACTIONS --}}
    <div style="display:flex;flex-direction:column;gap:16px">

        {{-- UPDATE STATUS --}}
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Update Status</h3>
            <form action="{{ route('admin.students.status', $student) }}" method="POST">
                @csrf @method('PATCH')
                <div class="form-field" style="margin-bottom:12px">
                    <select name="status" style="width:100%">
                        @foreach(['new' => 'New', 'reviewed' => 'Reviewed', 'shortlisted' => 'Shortlisted', 'rejected'
                        => 'Rejected'] as $val => $label)
                        <option value="{{ $val }}" {{ $student->status === $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-admin btn-admin-primary" style="width:100%;justify-content:center">
                    <i class="fas fa-sync"></i> Update Status
                </button>
            </form>
        </div>

        {{-- CONTACT --}}
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:12px">Quick Actions</h3>
            <a href="mailto:{{ $student->email }}?subject=Re: Your Application at Accrosian"
                class="btn-admin btn-admin-primary"
                style="width:100%;justify-content:center;margin-bottom:8px;display:flex">
                <i class="fas fa-envelope"></i> Email Student
            </a>
            <a href="tel:{{ $student->mobile }}" class="btn-admin btn-admin-outline"
                style="width:100%;justify-content:center;display:flex">
                <i class="fas fa-phone"></i> Call Student
            </a>
        </div>

        {{-- BACK / DELETE --}}
        <div class="admin-card">
            <a href="{{ route('admin.students.index') }}" class="btn-admin btn-admin-outline"
                style="width:100%;justify-content:center;display:flex;margin-bottom:8px">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <form action="{{ route('admin.students.destroy', $student) }}" method="POST"
                onsubmit="return confirm('Delete this registration permanently?')">
                @csrf @method('DELETE')
                <button class="btn-admin btn-admin-danger" style="width:100%;justify-content:center">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection