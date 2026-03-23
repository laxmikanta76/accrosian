@extends('layouts.admin')
@section('admin_title', 'Edit Portfolio Item')
@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.portfolio.index') }}">Portfolio</a><span>/</span> Edit</div>
<form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
@include('admin.portfolio._form', ['portfolio' => $portfolio])
</form>
@endsection
