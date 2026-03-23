@extends('layouts.admin')
@section('admin_title', 'Edit Page: '.$page->title)

@section('admin_content')
<div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>/</span><a href="{{ route('admin.pages.index') }}">Pages</a><span>/</span> {{ $page->title }}</div>

<div style="display:grid;grid-template-columns:1fr 300px;gap:24px">
    <div>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            @if($errors->any())
            <div class="alert alert-error">@foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach</div>
            @endif

            <div class="admin-card">
                <h3 class="admin-card-title" style="margin-bottom:20px">Page: {{ $page->title }}</h3>
                <div class="form-field"><label>Page Title</label><input type="text" name="title" value="{{ old('title', $page->title) }}" required /></div>
                <div class="form-field">
                    <label>Banner Image</label>
                    @if($page->banner_image)
                    <div style="margin-bottom:8px"><img src="{{ asset('storage/'.$page->banner_image) }}" style="width:100%;max-height:160px;object-fit:cover;border-radius:8px" /></div>
                    @endif
                    <input type="file" name="banner_image" accept="image/*" />
                    <span class="hint">Recommended: 1920×600px</span>
                </div>
                <div class="form-field">
                    <label>Page Content (optional HTML)</label>
                    <textarea name="content" rows="10" placeholder="Optional additional content for this page...">{{ old('content', $page->content) }}</textarea>
                </div>
            </div>

            <div class="admin-card">
                <h3 class="admin-card-title" style="margin-bottom:20px">🔍 SEO Settings</h3>
                <div class="form-field"><label>Meta Title</label><input type="text" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" placeholder="55–65 characters" /></div>
                <div class="form-field"><label>Meta Description</label><textarea name="meta_description" rows="3" placeholder="120–160 characters">{{ old('meta_description', $page->meta_description) }}</textarea></div>
                <div class="form-field"><label>Meta Keywords</label><input type="text" name="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}" /></div>
                <div class="form-field">
                    <label>OG Image (social share)</label>
                    @if($page->og_image)<img src="{{ asset('storage/'.$page->og_image) }}" style="width:100%;max-height:100px;object-fit:cover;border-radius:6px;margin-bottom:8px" />@endif
                    <input type="file" name="og_image" accept="image/*" />
                </div>
                <div class="toggle-wrap" style="margin-bottom:16px">
                    <label class="toggle"><input type="checkbox" name="status" value="1" {{ old('status', $page->status) ? 'checked' : '' }}><span class="toggle-slider"></span></label>
                    <span style="font-size:0.9rem;color:var(--text-light)">Page Active</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button type="submit" class="btn-admin btn-admin-primary"><i class="fas fa-save"></i> Save Page</button>
                    <a href="{{ route('admin.pages.index') }}" class="btn-admin btn-admin-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:12px">SEO Preview</h3>
            <div style="background:var(--surface);border-radius:8px;padding:16px;font-family:Arial,sans-serif">
                <div style="color:#1a0dab;font-size:1rem;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $page->meta_title ?? $page->title }} – Accrosian</div>
                <div style="color:#006621;font-size:0.8rem;margin:4px 0">{{ url('/'.$page->slug) }}</div>
                <div style="color:#545454;font-size:0.85rem;line-height:1.5">{{ Str::limit($page->meta_description, 155) ?? 'No meta description set.' }}</div>
            </div>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:12px">View Page</h3>
            @if($page->slug !== 'home')
            <a href="{{ url('/'.$page->slug) }}" class="btn-admin btn-admin-outline" style="width:100%;justify-content:center" target="_blank">
                <i class="fas fa-external-link-alt"></i> Open /{{ $page->slug }}
            </a>
            @else
            <a href="{{ route('home') }}" class="btn-admin btn-admin-outline" style="width:100%;justify-content:center" target="_blank">
                <i class="fas fa-external-link-alt"></i> Open Homepage
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
