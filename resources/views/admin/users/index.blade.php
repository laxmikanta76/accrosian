@extends('layouts.admin')
@section('admin_title', 'Users')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span> Users</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Users ({{ $users->total() }})</h3>
        <a href="{{ route('admin.users.create') }}" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> Add User</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Joined</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td style="display:flex;align-items:center;gap:10px">
                <div style="width:32px;height:32px;border-radius:50%;background:var(--orange);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.8rem;flex-shrink:0">{{ strtoupper(substr($user->name,0,1)) }}</div>
                <span style="color:var(--text);font-weight:600">{{ $user->name }}</span>
            </td>
            <td>{{ $user->email }}</td>
            <td><span class="badge badge-{{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
            <td style="font-size:0.85rem">{{ $user->created_at->format('M d, Y') }}</td>
            <td style="display:flex;gap:6px">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                @if($user->id !== auth()->id())
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete user {{ $user->name }}?')">
                    @csrf @method('DELETE')
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @if($users->hasPages())<div style="padding:20px">{{ $users->links() }}</div>@endif
</div>
@endsection
