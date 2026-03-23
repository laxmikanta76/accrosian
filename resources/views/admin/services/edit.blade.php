@extends('layouts.admin')
@section('admin_title', 'Edit Service')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.services.index') }}">Services</a><span>/</span> Edit</div>

<form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
@include('admin.services._form', ['service' => $service])
</form>
@endsection
