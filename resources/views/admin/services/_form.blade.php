<div style="display:grid;grid-template-columns:1fr 340px;gap:24px">
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">Service Details</h3>

            @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach
            </div>
            @endif

            <div class="form-row">
                <div class="form-field">
                    <label>Title *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required
                        placeholder="e.g. Web Development" />
                </div>
                <div class="form-field">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $service->slug ?? '') }}"
                        placeholder="auto-generated" />
                    <span class="hint">Leave blank to auto-generate from title</span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <label>Icon (emoji)</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}" placeholder="🌐"
                        maxlength="10" />
                </div>
                <div class="form-field">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                        min="0" />
                </div>
            </div>

            <div class="form-field">
                <label>Short Description</label>
                <textarea name="short_description" rows="3"
                    placeholder="Brief summary shown in cards...">{{ old('short_description', $service->short_description ?? '') }}</textarea>
            </div>

            <div class="form-field">
                <label>Full Description (HTML)</label>
                <textarea name="full_description" rows="10"
                    placeholder="Full HTML content for service detail page...">{{ old('full_description', $service->full_description ?? '') }}</textarea>
                <span class="hint">Supports HTML tags: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, etc.</span>
            </div>
        </div>

        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:20px">SEO Settings</h3>
            <div class="form-field">
                <label>Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $service->meta_title ?? '') }}"
                    placeholder="SEO page title (55–65 chars recommended)" />
            </div>
            <div class="form-field">
                <label>Meta Description</label>
                <textarea name="meta_description" rows="3"
                    placeholder="SEO description (120–160 chars recommended)">{{ old('meta_description', $service->meta_description ?? '') }}</textarea>
            </div>
            <div class="form-field">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords"
                    value="{{ old('meta_keywords', $service->meta_keywords ?? '') }}"
                    placeholder="keyword1, keyword2, keyword3" />
            </div>
        </div>
    </div>

    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Publish</h3>
            <div class="toggle-wrap" style="margin-bottom:16px">
                <label class="toggle">
                    <input type="checkbox" name="status" value="1"
                        {{ old('status', $service->status ?? true) ? 'checked' : '' }}>
                    <span class="toggle-slider"></span>
                </label>
                <span style="font-size:0.9rem;color:var(--text-light)">Active (visible on site)</span>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                <button type="submit" class="btn-admin btn-admin-primary"><i class="fas fa-save"></i> Save
                    Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn-admin btn-admin-outline">Cancel</a>
            </div>
        </div>

        {{-- HERO / BANNER IMAGE --}}
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:8px">Hero / Banner Image</h3>
            <p style="font-size:0.82rem;color:var(--muted);margin-bottom:14px">
                Background of the <strong>page top hero</strong> section.
            </p>
            @if(isset($service) && $service && $service->image)
            <div style="margin-bottom:12px">
                @if(str_starts_with($service->image,'assets/'))
                <img src="{{ asset($service->image) }}"
                    style="width:100%;border-radius:8px;object-fit:cover;max-height:150px" />
                @else
                <img src="{{ asset('storage/'.$service->image) }}"
                    style="width:100%;border-radius:8px;object-fit:cover;max-height:150px" />
                @endif
                <p style="font-size:0.75rem;color:var(--muted);margin-top:4px">Current hero image</p>
            </div>
            @endif
            <div class="form-field">
                <label>{{ (isset($service) && $service->image) ? 'Replace Hero Image' : 'Upload Hero Image' }}</label>
                <input type="file" name="image" accept="image/jpg,image/jpeg,image/png,image/webp,image/svg+xml"
                    onchange="previewImg(this,'heroPreview')" />
                <span class="hint">Leave blank to keep current. JPG, PNG, WebP. Max 2MB.</span>
                <div id="heroPreview" style="display:none;margin-top:10px">
                    <img
                        style="width:100%;border-radius:8px;object-fit:cover;max-height:140px;border:2px solid var(--orange)" />
                    <p style="font-size:0.75rem;color:var(--orange);margin-top:4px">✓ New hero preview</p>
                </div>
            </div>
        </div>

        {{-- CONTENT SECTION IMAGE (separate) --}}
        <div class="admin-card" style="border:1px solid rgba(255,107,53,0.35)">
            <h3 class="admin-card-title" style="margin-bottom:8px">Content Image</h3>
            <p style="font-size:0.82rem;color:var(--muted);margin-bottom:14px">
                Shown <strong>inside the body</strong> of the service page — completely separate from the hero above.
            </p>
            @if(isset($service) && $service && $service->content_image)
            <div style="margin-bottom:12px">
                @if(str_starts_with($service->content_image,'assets/'))
                <img src="{{ asset($service->content_image) }}"
                    style="width:100%;border-radius:8px;object-fit:cover;max-height:150px" />
                @else
                <img src="{{ asset('storage/'.$service->content_image) }}"
                    style="width:100%;border-radius:8px;object-fit:cover;max-height:150px" />
                @endif
                <p style="font-size:0.75rem;color:var(--orange);margin-top:4px">Current content image</p>
            </div>
            @else
            <div style="height:90px;border:2px dashed rgba(255,107,53,0.4);border-radius:8px;
                    display:flex;align-items:center;justify-content:center;
                    color:var(--muted);font-size:0.85rem;margin-bottom:12px">
                No content image uploaded yet
            </div>
            @endif
            <div class="form-field">
                <label>{{ (isset($service) && $service->content_image) ? 'Replace Content Image' : 'Upload Content Image' }}</label>
                <input type="file" name="content_image" accept="image/jpg,image/jpeg,image/png,image/webp,image/svg+xml"
                    onchange="previewImg(this,'contentPreview')" />
                <span class="hint">Leave blank to keep current. JPG, PNG, WebP. Max 2MB.</span>
                <div id="contentPreview" style="display:none;margin-top:10px">
                    <img
                        style="width:100%;border-radius:8px;object-fit:cover;max-height:150px;border:2px solid var(--orange)" />
                    <p style="font-size:0.75rem;color:var(--orange);margin-top:4px">✓ New content image preview</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function previewImg(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.style.display = 'block';
            preview.querySelector('img').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush