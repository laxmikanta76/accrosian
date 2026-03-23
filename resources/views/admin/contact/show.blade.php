@extends('layouts.admin')
@section('admin_title', 'View Submission')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.contact.index') }}">Contact</a><span>/</span> View</div>

<div style="display:grid;grid-template-columns:1fr 280px;gap:24px">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Message from {{ $contact->name }}</h3>
            <span class="badge badge-{{ $contact->status }}">{{ ucfirst($contact->status) }}</span>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px">
            @foreach([['👤 Name', $contact->name],['✉️ Email', $contact->email],['📞 Phone', $contact->phone ?? '—'],['📋 Subject', $contact->subject ?? 'General Enquiry']] as $field)
            <div style="background:var(--surface);border-radius:8px;padding:14px">
                <div style="font-size:0.75rem;color:var(--muted);margin-bottom:4px">{{ $field[0] }}</div>
                <div style="font-size:0.9rem;color:var(--text);font-weight:600">{{ $field[1] }}</div>
            </div>
            @endforeach
        </div>

        <div style="background:var(--surface);border-radius:8px;padding:20px;margin-bottom:20px">
            <div style="font-size:0.75rem;color:var(--muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:0.05em">Message</div>
            <p style="color:var(--text-light);line-height:1.8;white-space:pre-wrap">{{ $contact->message }}</p>
        </div>

        <div style="color:var(--muted);font-size:0.8rem">Submitted {{ $contact->created_at->format('F j, Y \a\t g:i A') }} ({{ $contact->created_at->diffForHumans() }})</div>
    </div>

    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Update Status</h3>
            <form action="{{ route('admin.contact.status', $contact) }}" method="POST">
                @csrf @method('PATCH')
                <div class="form-field">
                    <select name="status">
                        @foreach(['new'=>'New','read'=>'Read','replied'=>'Replied'] as $val => $label)
                        <option value="{{ $val }}" {{ $contact->status === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-admin btn-admin-primary" style="width:100%;justify-content:center"><i class="fas fa-sync"></i> Update Status</button>
            </form>
        </div>

        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Quick Reply</h3>
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject ?? 'Your Enquiry') }}"
               class="btn-admin btn-admin-primary" style="width:100%;justify-content:center">
                <i class="fas fa-reply"></i> Reply via Email
            </a>
        </div>

        <div class="admin-card">
            <a href="{{ route('admin.contact.index') }}" class="btn-admin btn-admin-outline" style="width:100%;justify-content:center"><i class="fas fa-arrow-left"></i> Back to List</a>
            <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" style="margin-top:8px" onsubmit="return confirm('Delete this submission?')">
                @csrf @method('DELETE')
                <button class="btn-admin btn-admin-danger" style="width:100%;justify-content:center"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
