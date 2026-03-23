@extends('layouts.admin')
@section('admin_title', 'Add Portfolio Item')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.portfolio.index') }}">Portfolio</a><span>/</span> Add New</div>
<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@include('admin.portfolio._form', ['portfolio' => null])
</form>
@endsection
