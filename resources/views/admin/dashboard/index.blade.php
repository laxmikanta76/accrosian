@extends('layouts.admin')
@section('admin_title', 'Dashboard')

@section('admin_content')

<div class="stat-grid">
    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px">
            <div style="width:44px;height:44px;background:rgba(255,107,53,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">📩</div>
            @if($stats['new_contacts'] > 0)
                <span class="badge badge-new">{{ $stats['new_contacts'] }} new</span>
            @endif
        </div>
        <div class="stat-card-num">{{ $stats['contacts'] }}</div>
        <div class="stat-card-label">Contact Submissions</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(59,130,246,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">⚙️</div>
        <div class="stat-card-num">{{ $stats['services'] }}</div>
        <div class="stat-card-label">Services</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(16,185,129,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">💼</div>
        <div class="stat-card-num">{{ $stats['portfolio'] }}</div>
        <div class="stat-card-label">Portfolio Items</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(245,158,11,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">✍️</div>
        <div class="stat-card-num">{{ $stats['blogs'] }}</div>
        <div class="stat-card-label">Blog Posts</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(139,92,246,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">👥</div>
        <div class="stat-card-num">{{ $stats['users'] }}</div>
        <div class="stat-card-label">Users</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 320px;gap:24px">
    {{-- Recent Contacts --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Contact Submissions</h3>
            <a href="{{ route('admin.contact.index') }}" class="btn-admin btn-admin-outline btn-admin-sm">View All</a>
        </div>
        @if($recent_contacts->isEmpty())
            <p style="color:var(--text-light);font-size:0.9rem;padding:20px 0;text-align:center">No submissions yet.</p>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recent_contacts as $c)
                <tr>
                    <td style="color:var(--text);font-weight:600">{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ Str::limit($c->subject, 30) }}</td>
                    <td><span class="badge badge-{{ $c->status }}">{{ ucfirst($c->status) }}</span></td>
                    <td>{{ $c->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    {{-- Quick Links --}}
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Quick Actions</h3>
            @foreach([
                ['admin.services.create','Add Service','fas fa-plus','#ff6b35'],
                ['admin.portfolio.create','Add Portfolio Item','fas fa-plus','#3b82f6'],
                ['admin.blog.create','New Blog Post','fas fa-pen','#10b981'],
                ['admin.settings.index','Site Settings','fas fa-cog','#f59e0b'],
                ['admin.contact.index','View Enquiries','fas fa-envelope','#8b5cf6'],
            ] as $link)
            <a href="{{ route($link[0]) }}" class="btn-admin btn-admin-outline" style="width:100%;justify-content:flex-start;margin-bottom:8px;gap:10px">
                <i class="{{ $link[2] }}" style="color:{{ $link[3] }}"></i> {{ $link[1] }}
            </a>
            @endforeach
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:12px">System Info</h3>
            <div style="font-size:0.85rem;color:var(--text-light);display:flex;flex-direction:column;gap:8px">
                <div style="display:flex;justify-content:space-between"><span>PHP Version</span><span style="color:var(--text)">{{ PHP_VERSION }}</span></div>
                <div style="display:flex;justify-content:space-between"><span>Laravel</span><span style="color:var(--text)">{{ app()->version() }}</span></div>
                <div style="display:flex;justify-content:space-between"><span>Environment</span><span style="color:var(--orange)">{{ app()->environment() }}</span></div>
                <div style="display:flex;justify-content:space-between"><span>Timezone</span><span style="color:var(--text)">{{ config('app.timezone') }}</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
