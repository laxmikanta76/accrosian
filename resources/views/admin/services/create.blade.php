@extends('layouts.admin')
@section('admin_title', 'Add Service')

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.services.index') }}">Services</a><span>/</span> Add New</div>

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@include('admin.services._form', ['service' => null])
</form>
@endsection
