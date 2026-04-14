<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            @if(isset($setting) && $setting->logo)
            <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name ?? 'Accrosian' }} Logo" />
            @else
            <img src="{{ asset('assets/images/logo2.png') }}" alt="Accrosian Logo" />
            @endif
            <!-- <span class="nav-logo-text">Accr<span>o</span>sian</span> -->
        </a>
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            {{-- What We Do — Mega Grouped Dropdown --}}
            <li class="nav-dropdown mega">
                <a href="{{ route('services') }}"
                    class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a>
                <div class="mega-menu">
                    <div class="mega-inner">
                        <div class="mega-category">
                            <div class="mega-cat-label">What we offer</div>
                            <div class="mega-cat-title">Our Services</div>
                            <div class="mega-cat-desc">Explore the full range of solutions we deliver for growing
                                businesses.</div>
                            <a href="{{ route('services') }}" class="mega-cat-cta">View All Services →</a>
                        </div>
                        <div class="mega-cols">
                            @php $navServices = \App\Models\Service::active()->orderBy('sort_order')->get(); @endphp
                            @foreach($navServices as $svc)
                            <div class="mega-col">
                                <a href="{{ route('services.show', $svc->slug) }}">
                                    <span class="svc-icon">{{ $svc->icon }}</span>
                                    {{ $svc->title }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
            {{-- Our Company Dropdown --}}
            <li class="nav-dropdown">
                <a href="#">Our Company</a>
                <div class="simple-dropdown">
                    <a href="{{ route('about') }}"><span class="drop-icon">🏢</span> About Us</a>
                    <a href="{{ route('portfolio') }}"><span class="drop-icon">💼</span> Portfolio</a>
                    <a href="{{ route('contact') }}"><span class="drop-icon">📞</span> Contact</a>
                </div>
            </li>

            <li class="nav-dropdown">
                <a href="#">Our Initiatives</a>
                <div class="simple-dropdown">
                    <a href="{{ route('student.register') }}"><span class="drop-icon">🎓</span> Student Registration</a>
                    <a href="{{ route('airs') }}"><span class="drop-icon">🌉</span> AIRS Program</a>
                </div>
            </li>
            {{-- Our Initiatives Dropdown --}}
            <li class="nav-dropdown">
                <a href="#">Our Initiatives</a>
                <div class="simple-dropdown">
                    <a href="{{ route('student.register') }}"><span class="drop-icon">🎓</span> Student Registration</a>
                    <a href="{{ route('airs') }}"><span class="drop-icon">🌉</span> AIRS Program</a>
                </div>
            </li>

        </ul>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-sm nav-cta">Get a Quote</a>
        @auth
        <div style="display:flex;align-items:center;gap:8px;margin-left:8px;">
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline btn-sm">Admin</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn btn-sm"
                    style="background:transparent;border:1px solid rgba(255,255,255,0.3);color:#fff;cursor:pointer;">Logout</button>
            </form>
        </div>
        @endauth
        <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
    </div>
</nav>