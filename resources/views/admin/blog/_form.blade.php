<div style="display:grid;grid-template-columns:1fr 320px;gap:24px">
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">Post Content</h3>
            @if($errors->any())
            <div class="alert alert-error">@foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach</div>
            @endif
            <div class="form-row">
                <div class="form-field" style="grid-column:1/-1">
                    <label>Post Title *</label>
                    <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}" required placeholder="Enter post title..." />
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $blog->slug ?? '') }}" placeholder="auto-generated" />
                </div>
                <div class="form-field">
                    <label>Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}" />
                </div>
            </div>
            <div class="form-field">
                <label>Excerpt / Summary</label>
                <textarea name="excerpt" rows="3" placeholder="Brief summary shown in listings...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
            </div>
            <div class="form-field">
                <label>Full Content (HTML)</label>
                <textarea name="content" rows="16" placeholder="Full article HTML content...">{{ old('content', $blog->content ?? '') }}</textarea>
                <span class="hint">Supports HTML: &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, etc.</span>
            </div>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">SEO</h3>
            <div class="form-field"><label>Meta Title</label><input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title ?? '') }}" placeholder="55–65 chars" /></div>
            <div class="form-field"><label>Meta Description</label><textarea name="meta_description" rows="3" placeholder="120–160 chars">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea></div>
            <div class="form-field"><label>Meta Keywords</label><input type="text" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords ?? '') }}" /></div>
        </div>
    </div>
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Publish</h3>
            <div class="toggle-wrap" style="margin-bottom:16px">
                <label class="toggle"><input type="checkbox" name="status" value="1" {{ old('status', $blog->status ?? false) ? 'checked' : '' }}><span class="toggle-slider"></span></label>
                <span style="font-size:0.9rem;color:var(--text-light)">Published</span>
            </div>
            <div style="display:flex;gap:8px">
                <button type="submit" class="btn-admin btn-admin-primary"><i class="fas fa-save"></i> Save Post</button>
                <a href="{{ route('admin.blog.index') }}" class="btn-admin btn-admin-outline">Cancel</a>
            </div>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Featured Image</h3>
            @if(isset($blog) && $blog && $blog->featured_image)
                <img src="{{ asset('storage/'.$blog->featured_image) }}" style="width:100%;border-radius:8px;max-height:160px;object-fit:cover;margin-bottom:12px" />
            @endif
            <div class="form-field">
                <label>Upload Image</label>
                <input type="file" name="featured_image" accept="image/*" />
                <span class="hint">JPG, PNG, WebP. Max 2MB.</span>
            </div>
        </div>
    </div>
</div>
