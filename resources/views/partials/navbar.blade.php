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
            <li class="nav-dropdown">
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">
                    What We Do
                </a>

                <div class="dropdown-menu">

                    {{-- First Level Services --}}
                    @foreach($navServices->take(3) as $svc)
                    <a href="{{ route('services.show', $svc->slug) }}">
                        {{ $svc->icon }} {{ $svc->title }}
                    </a>
                    @endforeach

                    {{-- Nested Dropdown --}}
                    <div class="dropdown-sub">
                        <span class="submenu-title">Tech Solution</span>

                        <div class="dropdown-sub-menu">
                            @foreach($navServices->skip(3) as $svc)
                            <a href="{{ route('services.show', $svc->slug) }}">
                                {{ $svc->icon }} {{ $svc->title }}
                            </a>
                            @endforeach
                        </div>
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
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('portfolio') }}">Portfolio</a>
                    <a href="{{ route('contact') }}">Contact</a>
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