<div style="display:grid;grid-template-columns:1fr 320px;gap:24px">
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">Portfolio Details</h3>
            @if($errors->any())
            <div class="alert alert-error">@foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach</div>
            @endif
            <div class="form-row">
                <div class="form-field">
                    <label>Title *</label>
                    <input type="text" name="title" value="{{ old('title', $portfolio->title ?? '') }}" required />
                </div>
                <div class="form-field">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $portfolio->slug ?? '') }}"
                        placeholder="auto-generated" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label>Category</label>
                    <input type="text" name="category" value="{{ old('category', $portfolio->category ?? '') }}"
                        placeholder="e.g. Web Development" />
                </div>
                <div class="form-field">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order"
                        value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}" />
                </div>
            </div>
            <div class="form-field">
                <label>Description</label>
                <textarea name="description" rows="5">{{ old('description', $portfolio->description ?? '') }}</textarea>
            </div>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">SEO</h3>
            <div class="form-field"><label>Meta Title</label><input type="text" name="meta_title"
                    value="{{ old('meta_title', $portfolio->meta_title ?? '') }}" /></div>
            <div class="form-field"><label>Meta Description</label><textarea name="meta_description"
                    rows="3">{{ old('meta_description', $portfolio->meta_description ?? '') }}</textarea></div>
            <div class="form-field"><label>Meta Keywords</label><input type="text" name="meta_keywords"
                    value="{{ old('meta_keywords', $portfolio->meta_keywords ?? '') }}" /></div>
        </div>
    </div>
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Publish</h3>
            <div class="toggle-wrap" style="margin-bottom:16px">
                <label class="toggle"><input type="checkbox" name="status" value="1"
                        {{ old('status', $portfolio->status ?? true) ? 'checked' : '' }}><span
                        class="toggle-slider"></span></label>
                <span style="font-size:0.9rem;color:var(--text-light)">Active</span>
            </div>
            <div style="display:flex;gap:8px">
                <button type="submit" class="btn-admin btn-admin-primary"><i class="fas fa-save"></i> Save</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn-admin btn-admin-outline">Cancel</a>
            </div>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Image</h3>
            @if(isset($portfolio) && $portfolio && $portfolio->image)
            <img src="{{ asset('storage/'.$portfolio->image) }}"
                style="width:100%;border-radius:8px;max-height:160px;object-fit:cover;margin-bottom:12px" />
            @endif
            <div class="form-field">
                <label>Upload Image</label>
                <input type="file" name="image" accept="image/*" />
                <span class="hint">JPG, PNG, WebP. Max 8MB.</span>
            </div>
        </div>
    </div>
</div>