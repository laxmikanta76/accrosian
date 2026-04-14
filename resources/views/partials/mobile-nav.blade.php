<div class="mobile-nav" id="mobileNav">

    <!-- Overlay -->
    <div class="mobile-overlay"></div>

    <!-- Sidebar -->
    <div class="mobile-sidebar">

        <button class="mobile-close">✕</button>

        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('portfolio') }}">Portfolio</a>
        <a href="{{ route('blog') }}">Blog</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('student.register') }}">Student Registration</a>
        <a href="{{ route('airs') }}">AIRS Program</a>

        @auth
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="mobile-link-btn" type="submit">Logout</button>
        </form>
        @else
        <a href="{{ route('login') }}">Login</a>
        @endauth

    </div>
</div>