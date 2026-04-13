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
            <li class="nav-dropdown nav-mega-parent">
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">
                    What We Do <span class="nav-arrow">▾</span>
                </a>

                <div class="dropdown-menu dropdown-mega">
                    @php
                    $navServices = \App\Models\Service::active()
                    ->orderBy('category')
                    ->orderBy('sort_order')
                    ->get();
                    $grouped = $navServices->groupBy('category');
                    @endphp

                    <div class="mega-groups-wrap">
                        @foreach($grouped as $category => $services)
                        <div class="mega-group">
                            <div class="mega-group-title">{{ $category }}</div>
                            @foreach($services as $svc)
                            <a href="{{ route('services.show', $svc->slug) }}" class="mega-group-item">
                                <span class="mega-item-icon">{{ $svc->icon }}</span>
                                <span>{{ $svc->title }}</span>
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <div class="mega-footer">
                        <a href="{{ route('services') }}">
                            View All Services →
                        </a>
                    </div>
                </div>
            </li>
            <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
            {{-- Our Company Dropdown --}}
            <li class="nav-dropdown">
                <a href="#"
                    class="{{ request()->routeIs('about') || request()->routeIs('portfolio') || request()->routeIs('contact') ? 'active' : '' }}">
                    Our Company
                </a>

                <div class="dropdown-menu">
                    <a href="{{ route('about') }}">🏢 About Us</a>
                    <a href="{{ route('portfolio') }}">💼 Portfolio</a>
                    <a href="{{ route('contact') }}">📞 Contact</a>
                    <a href="{{ route('student.register') }}">🎓 Student Registration</a>
                    <a href="{{ route('airs') }}">🌉 AIRS Program</a>
                </div>
            </li>
            {{-- Our Initiatives Dropdown --}}
            <li class="nav-dropdown">
                <a href="#"
                    class="{{ request()->routeIs('about') || request()->routeIs('portfolio') || request()->routeIs('contact') ? 'active' : '' }}">
                    Our Initiatives
                </a>

                <div class="dropdown-menu">
                    <a href="{{ route('student.register') }}">🎓 Student Registration</a>
                    <a href="{{ route('airs') }}">🌉 AIRS Program</a>
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