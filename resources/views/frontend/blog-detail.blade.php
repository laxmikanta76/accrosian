@extends('layouts.app')

@section('meta_title', $post->meta_title ?? $post->title.' – Accrosian Blog')
@section('meta_description', $post->meta_description ?? $post->excerpt)
@section('meta_keywords', $post->meta_keywords ?? '')

@section('content')

<section class="page-hero">
    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="page-hero-image" style="object-position:center" />
    <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(10,10,10,0.6),rgba(10,10,10,0.8))">
    </div>
    <div class="hero-bg-effects">
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner" style="position:relative;z-index:2">
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-bottom:16px">
            <span
                style="background:rgba(255,107,53,0.2);color:var(--orange);padding:4px 16px;border-radius:50px;font-size:0.85rem;font-weight:600">Tech
                Insights</span>
            <span
                style="color:rgba(255,255,255,0.7);font-size:0.85rem">{{ $post->published_at?->format('F d, Y') }}</span>
            <span style="color:rgba(255,255,255,0.7);font-size:0.85rem">{{ $post->read_time }}</span>
        </div>
        <h1 class="page-hero-title" style="font-size:clamp(1rem, 3vw, 2.5rem)">{{ $post->title }}</h1>
        <p class="page-hero-sub">Artificial intelligence is transforming software development by enhancing automation,
            improving efficiency, enabling smarter solutions, and accelerating innovation across modern digital
            applications</p>
        <a style="margin-top:30px" href="{{ route('contact') }}" class="btn btn-primary">Get a Quote</a>
    </div>
</section>

<section style="padding:80px 0">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 340px;gap:60px;align-items:start">

            {{-- MAIN CONTENT --}}
            <article>
                <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:48px;color:var(--text-light);line-height:1.9;font-size:1.05rem"
                    class="blog-content">
                    {!! $post->content !!}
                </div>

                {{-- SHARE --}}
                <div
                    style="margin-top:32px;padding:24px;background:var(--surface);border-radius:12px;display:flex;align-items:center;gap:16px;flex-wrap:wrap">
                    <span style="font-weight:600;color:var(--text)">Share this article:</span>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}"
                        target="_blank"
                        style="background:var(--card-bg);border:1px solid var(--border);color:var(--text-light);padding:8px 16px;border-radius:8px;text-decoration:none;font-size:0.9rem;display:flex;align-items:center;gap:6px">
                        <i class="fab fa-x-twitter"></i> Twitter
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                        target="_blank"
                        style="background:var(--card-bg);border:1px solid var(--border);color:var(--text-light);padding:8px 16px;border-radius:8px;text-decoration:none;font-size:0.9rem;display:flex;align-items:center;gap:6px">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                    </a>
                </div>
            </article>

            {{-- SIDEBAR --}}
            <aside>
                <div
                    style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:32px;margin-bottom:24px">
                    <h3 style="font-weight:700;margin-bottom:20px;color:var(--text)">Related Articles</h3>
                    @forelse($related as $rel)
                    <a href="{{ route('blog.show', $rel->slug) }}"
                        style="display:flex;gap:12px;margin-bottom:20px;text-decoration:none;padding-bottom:20px;border-bottom:1px solid var(--border)">
                        <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                            style="width:70px;height:60px;object-fit:cover;border-radius:8px;flex-shrink:0" />
                        <div>
                            <p
                                style="color:var(--text);font-size:0.9rem;font-weight:600;line-height:1.4;margin-bottom:4px">
                                {{ Str::limit($rel->title,60) }}</p>
                            <span
                                style="color:var(--text-muted);font-size:0.8rem">{{ $rel->published_at?->format('M d, Y') }}</span>
                        </div>
                    </a>
                    @empty
                    <p style="color:var(--text-light);font-size:0.9rem">No related posts yet.</p>
                    @endforelse
                </div>

                <div
                    style="background:linear-gradient(135deg,var(--orange),#ff8c42);border-radius:16px;padding:32px;text-align:center">
                    <div style="font-size:2.5rem;margin-bottom:12px">💬</div>
                    <h3 style="color:#fff;font-weight:700;margin-bottom:8px">Have a Project?</h3>
                    <p style="color:rgba(255,255,255,0.85);font-size:0.9rem;margin-bottom:20px">Let's discuss how we can
                        help your business grow.</p>
                    <a href="{{ route('contact') }}"
                        style="background:#fff;color:var(--orange);padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:700;font-size:0.9rem">Get
                        in Touch</a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
.blog-content h2 {
    color: var(--text);
    font-size: 1.5rem;
    font-weight: 700;
    margin: 32px 0 16px;
}

.blog-content h3 {
    color: var(--text);
    font-size: 1.25rem;
    font-weight: 700;
    margin: 28px 0 12px;
}

.blog-content p {
    margin-bottom: 20px;
}

.blog-content ul,
.blog-content ol {
    margin: 16px 0 20px 24px;
}

.blog-content li {
    margin-bottom: 8px;
}

.blog-content a {
    color: var(--orange);
}

.blog-content strong {
    color: var(--text);
    font-weight: 700;
}

@media(max-width:900px) {
    .blog-content-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endpush