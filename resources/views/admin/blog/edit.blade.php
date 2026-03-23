@extends('layouts.admin')
@section('admin_title', 'Edit Post')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.blog.index') }}">Blog</a><span>/</span> Edit</div>
<form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
@include('admin.blog._form', ['blog' => $blog])
</form>
@endsection
