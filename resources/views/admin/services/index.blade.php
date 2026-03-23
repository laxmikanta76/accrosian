@extends('layouts.admin')
@section('admin_title', 'Services')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Services</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Services ({{ $services->count() }})</h3>
        <a href="{{ route('admin.services.create') }}" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> Add Service</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Icon</th><th>Title</th><th>Slug</th><th>Status</th><th>Order</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($services as $service)
        <tr>
            <td style="font-size:1.5rem">{{ $service->icon }}</td>
            <td style="color:var(--text);font-weight:600">{{ $service->title }}</td>
            <td><code style="background:var(--surface);padding:2px 6px;border-radius:4px;font-size:0.8rem">{{ $service->slug }}</code></td>
            <td><span class="badge badge-{{ $service->status ? 'active' : 'inactive' }}">{{ $service->status ? 'Active' : 'Inactive' }}</span></td>
            <td>{{ $service->sort_order }}</td>
            <td style="display:flex;gap:6px">
                <a href="{{ route('services.show', $service->slug) }}" class="btn-admin btn-admin-outline btn-admin-sm" target="_blank"><i class="fas fa-eye"></i></a>
                <a href="{{ route('admin.services.edit', $service) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                    @csrf @method('DELETE')
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--text-light)">No services found. <a href="{{ route('admin.services.create') }}" style="color:var(--orange)">Add one</a></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
