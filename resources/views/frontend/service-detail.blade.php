@extends('layouts.app')

@section('meta_title', $service->meta_title ?? $service->title.' – Accrosian')
@section('meta_description', $service->meta_description ?? $service->short_description)
@section('meta_keywords', $service->meta_keywords ?? '')

@section('content')

<section class="page-hero">
    @if($service->hero_image)
    <img src="{{ asset('storage/'.$service->hero_image) }}" alt="{{ $service->title }}" class="page-hero-image" />
    @elseif($service->image && !str_starts_with($service->image,'assets/'))
    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="page-hero-image" />
    @elseif($service->image)
    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="page-hero-image" />
    @else
    <img src="{{ asset('assets/images/hero-bg-img-2.png') }}" alt="{{ $service->title }}" class="page-hero-image" />
    @endif
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.1"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <!-- <div style="font-size:4rem;margin-bottom:16px">{{ $service->icon }}</div> -->
        <h1 class="page-hero-title"><span class="text-gradient">{{ $service->title }}</span></h1>
        <p class="page-hero-sub">{{ $service->short_description }}</p>
    </div>
</section>

<section style="padding:100px 0">
    <div style="max-width:100%;padding:0 40px">

        {{-- Top: Image right, intro text left --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:25px;align-items:start;" class="reveal">
            <div>
                <!-- <span class="section-tag">Overview</span> -->
                <h2 class="section-title">Custom Mobile Application Development<span class="text-gradient">Services for
                        Modern Businesses</span></h2>
                <p style="color:var(--text-light);line-height:1.8;margin-top:16px;font-size:1.05rem;">
                    {{ $service->short_description }}
                </p>
            </div>
            <div class="reveal reveal-delay-2">
                @if($service->image && !str_starts_with($service->image,'assets/'))
                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                @elseif($service->image)
                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                @else
                <img src="{{ asset('assets/images/web-dev-img.png') }}" alt="{{ $service->title }}"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                @endif
            </div>
        </div>

        {{-- Full width content below --}}
        <div style="margin-top:40px;color:var(--text-light);line-height:1.8;" class="service-full-desc reveal">
            {!! $service->full_description !!}
        </div>

        {{-- Buttons --}}
        <div style="margin-top:36px;display:flex;gap:16px;flex-wrap:wrap;" class="reveal">
            <a href="{{ route('contact') }}" class="btn btn-primary">Get a Quote</a>
            <a href="{{ route('services') }}" class="btn btn-outline">All Services</a>
        </div>

    </div>
</section>

@if($others->isNotEmpty())
<section style="padding:80px 0;background:var(--surface)">
    <div class="container">
        <div style="text-align:center;margin-bottom:48px">
            <span class="section-tag">Explore More</span>
            <h2 class="section-title">Other <span class="text-gradient">Services</span></h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:24px">
            @foreach($others as $other)
            <a href="{{ route('services.show', $other->slug) }}"
                style="background:var(--card-bg);border:1px solid var(--border);border-radius:12px;padding:24px;text-decoration:none;transition:all 0.3s;display:block"
                class="reveal">
                <div style="font-size:2rem;margin-bottom:12px">{{ $other->icon }}</div>
                <h4 style="color:var(--text);font-weight:700;margin-bottom:8px">{{ $other->title }}</h4>
                <p style="color:var(--text-light);font-size:0.9rem;line-height:1.6">
                    {{ Str::limit($other->short_description, 80) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Ready to Start?</span>
        <h2 class="cta-title">Let's Discuss Your <span class="text-gradient">{{ $service->title }}</span> Project</h2>
        <p class="cta-subtitle">Get a free consultation and detailed project proposal within 24 hours.</p>
        <div class="cta-actions">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-arrow">Start Project</a>
            <a href="{{ route('portfolio') }}" class="btn btn-outline">View Our Work</a>
        </div>
    </div>
</section>

@endsection