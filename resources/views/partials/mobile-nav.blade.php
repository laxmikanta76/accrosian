<div class="mobile-nav" id="mobileNav">
    <button class="mobile-close" id="mobileClose">✕</button>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('services') }}">Services</a>
    <a href="{{ route('portfolio') }}">Portfolio</a>
    <a href="{{ route('blog') }}">Blog</a>
    <a href="{{ route('contact') }}">Contact</a>
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        @endif
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:none;border:none;color:inherit;font-size:inherit;cursor:pointer;padding:12px 0;display:block;width:100%;text-align:left;">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</div>
