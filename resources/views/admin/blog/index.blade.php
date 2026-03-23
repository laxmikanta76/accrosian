@extends('layouts.admin')
@section('admin_title', 'Blog Posts')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Blog Posts</div>
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Posts ({{ $posts->count() }})</h3>
        <a href="{{ route('admin.blog.create') }}" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> New Post</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Title</th><th>Status</th><th>Published</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($posts as $post)
        <tr>
            <td style="color:var(--text);font-weight:600;max-width:340px">{{ Str::limit($post->title,60) }}</td>
            <td><span class="badge badge-{{ $post->status ? 'active':'inactive' }}">{{ $post->status ? 'Published':'Draft' }}</span></td>
            <td style="font-size:0.85rem">{{ $post->published_at?->format('M d, Y') ?? '—' }}</td>
            <td style="display:flex;gap:6px">
                @if($post->status)<a href="{{ route('blog.show', $post->slug) }}" class="btn-admin btn-admin-outline btn-admin-sm" target="_blank"><i class="fas fa-eye"></i></a>@endif
                <a href="{{ route('admin.blog.edit', $post) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-light)">No posts. <a href="{{ route('admin.blog.create') }}" style="color:var(--orange)">Create one</a></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
