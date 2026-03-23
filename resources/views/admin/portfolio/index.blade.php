@extends('layouts.admin')
@section('admin_title', 'Portfolio')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Portfolio</div>
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Portfolio Items ({{ $items->count() }})</h3>
        <a href="{{ route('admin.portfolio.create') }}" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> Add Item</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Title</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($items as $item)
        <tr>
            <td style="color:var(--text);font-weight:600">{{ $item->title }}</td>
            <td>{{ $item->category ?? '—' }}</td>
            <td><span class="badge badge-{{ $item->status ? 'active':'inactive' }}">{{ $item->status ? 'Active':'Inactive' }}</span></td>
            <td style="display:flex;gap:6px">
                <a href="{{ route('admin.portfolio.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-light)">No items. <a href="{{ route('admin.portfolio.create') }}" style="color:var(--orange)">Add one</a></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
