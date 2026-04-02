@extends('layouts.admin')
@section('admin_title', 'Student Registrations')

@section('admin_content')
<div class="breadcrumb">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Student Registrations
</div>

{{-- STATS --}}
<div style="display:grid;grid-template-columns:repeat(5,1fr);gap:16px;margin-bottom:24px">
    @foreach([
    ['All', $counts['all'], ''],
    ['New', $counts['new'], 'color:var(--orange)'],
    ['Reviewed', $counts['reviewed'], 'color:#56ccf2'],
    ['Shortlisted', $counts['shortlisted'], 'color:#6fcf97'],
    ['Rejected', $counts['rejected'], 'color:#eb5757'],
    ] as [$label, $count, $style])
    <div class="admin-card" style="text-align:center;padding:16px">
        <div style="font-size:1.8rem;font-weight:800;{{ $style }}">{{ $count }}</div>
        <div style="font-size:0.8rem;color:var(--muted);margin-top:4px">{{ $label }}</div>
    </div>
    @endforeach
</div>

{{-- FILTER --}}
<div class="admin-card" style="margin-bottom:16px;padding:16px">
    <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
        <span style="font-size:0.85rem;color:var(--text-light)">Filter:</span>
        @foreach(['' => 'All', 'new' => 'New', 'reviewed' => 'Reviewed', 'shortlisted' => 'Shortlisted', 'rejected' =>
        'Rejected'] as $val => $label)
        <a href="{{ route('admin.students.index', $val ? ['status' => $val] : []) }}"
            class="btn-admin btn-admin-sm {{ request('status') === ($val ?: null) ? 'btn-admin-primary' : 'btn-admin-outline' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Registrations ({{ $students->total() }})</h3>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>College</th>
                <th>Course</th>
                <th>Year</th>
                <th>Resume</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $s)
            <tr>
                <td style="font-weight:{{ $s->status === 'new' ? '700' : '400' }};color:var(--text)">
                    {{ $s->name }}
                </td>
                <td style="font-size:0.85rem">{{ $s->email }}</td>
                <td style="font-size:0.85rem">{{ $s->mobile }}</td>
                <td style="font-size:0.85rem">{{ Str::limit($s->college_name, 25) }}</td>
                <td style="font-size:0.82rem">{{ $s->course }}</td>
                <td style="font-size:0.82rem">{{ $s->year }}</td>
                <td>
                    @if($s->resume)
                    <a href="{{ $s->resume_url }}" target="_blank" class="btn-admin btn-admin-outline btn-admin-sm"
                        title="View Resume">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>
                    @else
                    <span style="color:var(--muted);font-size:0.8rem">—</span>
                    @endif
                </td>
                <td>
                    <span class="badge badge-{{ $s->status }}">{{ ucfirst($s->status) }}</span>
                </td>
                <td style="font-size:0.82rem;white-space:nowrap">
                    {{ $s->created_at->format('M d, Y') }}
                </td>
                <td style="display:flex;gap:6px">
                    <a href="{{ route('admin.students.show', $s) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action="{{ route('admin.students.destroy', $s) }}" method="POST"
                        onsubmit="return confirm('Delete this registration?')" style="margin:0">
                        @csrf @method('DELETE')
                        <button class="btn-admin btn-admin-danger btn-admin-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" style="text-align:center;padding:40px;color:var(--text-light)">
                    No student registrations yet.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($students->hasPages())
    <div style="padding:20px">{{ $students->links() }}</div>
    @endif
</div>
@endsection