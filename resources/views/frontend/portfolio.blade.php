@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Portfolio – Our Featured Projects')
@section('meta_description', $page->meta_description ?? 'Browse our portfolio of successful projects across web, mobile, cloud, and AI domains.')

@section('content')

<section class="page-hero">
    @if($page && $page->banner_image)
        <img src="{{ asset('storage/'.$page->banner_image) }}" alt="Portfolio" class="page-hero-image" />
    @else
        <img src="{{ asset('assets/images/hero-bg-img-2.png') }}" alt="Portfolio" class="page-hero-image" />
    @endif
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <h1 class="page-hero-title">Our <span class="text-gradient">Portfolio</span></h1>
        <p class="page-hero-sub">Real projects, real results — explore our work across industries and technologies.</p>
    </div>
</section>

<section style="padding:100px 0">
    <div class="container">

        @if($categories->isNotEmpty())
        <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-bottom:48px" class="reveal">
            <button class="portfolio-filter-btn active" data-filter="all">All Projects</button>
            @foreach($categories as $cat)
                <button class="portfolio-filter-btn" data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
            @endforeach
        </div>
        @endif

        <div class="portfolio-grid" id="portfolioGrid">
            @forelse($items as $i => $item)
            <div class="portfolio-card reveal reveal-delay-{{ ($i%3)+1 }}" data-category="{{ Str::slug($item->category) }}">
                @if($item->image && !str_starts_with($item->image,'assets/'))
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="portfolio-img" />
                @else
                    <img src="{{ asset('assets/images/about-us.jpg') }}" alt="{{ $item->title }}" class="portfolio-img" />
                @endif
                <div class="portfolio-overlay">
                    @if($item->category)
                        <div class="portfolio-tag">{{ $item->category }}</div>
                    @endif
                    <h3 class="portfolio-title">{{ $item->title }}</h3>
                    @if($item->description)
                        <p style="color:rgba(255,255,255,0.8);font-size:0.85rem;margin-top:8px;line-height:1.5">{{ Str::limit($item->description, 100) }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:80px;grid-column:1/-1;color:var(--text-light)">
                <div style="font-size:3rem;margin-bottom:16px">🚧</div>
                <h3>Portfolio Coming Soon</h3>
                <p style="margin-top:8px">We're currently updating our portfolio. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Your Project Next?</span>
        <h2 class="cta-title">Let's Create Something <span class="text-gradient">Remarkable</span></h2>
        <p class="cta-subtitle">Join 250+ satisfied clients who've trusted Accrosian to deliver exceptional digital products.</p>
        <div class="cta-actions">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-arrow">Start Your Project</a>
            <a href="{{ route('services') }}" class="btn btn-outline">Our Services</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.portfolio-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.portfolio-filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.portfolio-card').forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
<style>
.portfolio-filter-btn {
    background: var(--card-bg);
    border: 1px solid var(--border);
    color: var(--text-light);
    padding: 8px 20px;
    border-radius: 50px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s;
}
.portfolio-filter-btn:hover,
.portfolio-filter-btn.active {
    background: var(--orange);
    border-color: var(--orange);
    color: #fff;
}
</style>
@endpush
