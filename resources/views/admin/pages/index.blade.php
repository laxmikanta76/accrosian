@extends('layouts.admin')
@section('admin_title', 'Pages')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Pages</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">CMS Pages</h3>
        <span style="font-size:0.85rem;color:var(--text-light)">Edit SEO and content for each page</span>
    </div>
    <table class="admin-table">
        <thead><tr><th>Page</th><th>Slug</th><th>Meta Title</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td style="color:var(--text);font-weight:600">{{ $page->title }}</td>
            <td><code style="background:var(--surface);padding:2px 8px;border-radius:4px;font-size:0.8rem">/{{ $page->slug }}</code></td>
            <td style="font-size:0.85rem;color:var(--text-light)">{{ Str::limit($page->meta_title, 45) ?? '—' }}</td>
            <td><span class="badge badge-{{ $page->status ? 'active':'inactive' }}">{{ $page->status ? 'Active':'Inactive' }}</span></td>
            <td>
                <a href="{{ route('admin.pages.edit', $page) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit SEO</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
