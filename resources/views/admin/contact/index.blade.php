@extends('layouts.admin')
@section('admin_title', 'Contact Submissions')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Contact Submissions</div>

<div class="admin-card" style="margin-bottom:20px">
    <form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
        <label style="font-size:0.85rem;color:var(--text-light)">Filter by status:</label>
        @foreach([''=>'All', 'new'=>'New', 'read'=>'Read', 'replied'=>'Replied'] as $val => $label)
        <a href="{{ route('admin.contact.index', $val ? ['status'=>$val] : []) }}"
           class="btn-admin btn-admin-sm {{ request('status',$val===''?'':null) === ($val===''?null:$val) ? 'btn-admin-primary' : 'btn-admin-outline' }}">
           {{ $label }}
        </a>
        @endforeach
    </form>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Submissions ({{ $submissions->total() }})</h3>
    </div>
    <table class="admin-table">
        <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($submissions as $c)
        <tr style="{{ $c->status === 'new' ? 'background:rgba(59,130,246,0.03)' : '' }}">
            <td style="font-weight:{{ $c->status==='new'?'700':'400' }};color:var(--text)">{{ $c->name }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ Str::limit($c->subject ?? 'General Enquiry', 35) }}</td>
            <td><span class="badge badge-{{ $c->status }}">{{ ucfirst($c->status) }}</span></td>
            <td style="font-size:0.82rem;white-space:nowrap">{{ $c->created_at->format('M d, Y') }}</td>
            <td style="display:flex;gap:6px">
                <a href="{{ route('admin.contact.show', $c) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-eye"></i> View</a>
                <form action="{{ route('admin.contact.destroy', $c) }}" method="POST" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--text-light)">No submissions found.</td></tr>
        @endforelse
        </tbody>
    </table>
    @if($submissions->hasPages())
    <div style="padding:20px">{{ $submissions->links() }}</div>
    @endif
</div>
@endsection
