@extends('layouts.admin')
@section('admin_title', 'New Blog Post')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.blog.index') }}">Blog</a><span>/</span> New Post</div>
<form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@include('admin.blog._form', ['blog' => null])
</form>
@endsection
