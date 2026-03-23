@extends('layouts.admin')
@section('admin_title', 'Edit User')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.users.index') }}">Users</a><span>/</span> Edit</div>
<div style="max-width:600px">
<div class="admin-card">
    <h3 class="admin-card-title" style="margin-bottom:20px">User Details</h3>
    @if($errors->any())<div class="alert alert-error">@foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach</div>@endif
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-field"><label>Full Name *</label><input type="text" name="name" value="{{ old('name', $user->name) }}" required /></div>
        <div class="form-field"><label>Email Address *</label><input type="email" name="email" value="{{ old('email', $user->email) }}" required /></div>
        <div class="form-field"><label>Role *</label>
            <select name="role">
                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="form-field"><label>Password (leave blank to keep)</label><input type="password" name="password"  /></div>
        <div class="form-field"><label>Confirm Password</label><input type="password" name="password_confirmation"  /></div>
        <div style="display:flex;gap:8px;margin-top:8px">
            <button type="submit" class="btn-admin btn-admin-primary"><i class="fas fa-save"></i> Save User</button>
            <a href="{{ route('admin.users.index') }}" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>
</div>
@endsection
