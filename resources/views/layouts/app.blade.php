<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
    if (sessionStorage.getItem('loaderShown')) {
        document.documentElement.classList.add('no-loader');
    }
    </script>

    {{-- Dynamic SEO --}}
    <title>@yield('meta_title', $setting->site_title ?? config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', $setting->meta_description ?? '')">
    <meta name="keywords" content="@yield('meta_keywords', $setting->meta_keywords ?? '')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('meta_title', $setting->site_title ?? config('app.name'))">
    <meta property="og:description" content="@yield('meta_description', $setting->meta_description ?? '')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(isset($setting) && $setting->og_image)
    <meta property="og:image" content="{{ asset('storage/' . $setting->og_image) }}">
    @endif

    {{-- Favicon --}}
    @if(isset($setting) && $setting->favicon)
    <link rel="icon" href="{{ asset('storage/' . $setting->favicon) }}" type="image/png">
    @else
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/png">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    @stack('head')

    {{-- Google Analytics --}}
    @if(isset($setting) && $setting->google_analytics)
    {!! $setting->google_analytics !!}
    @endif
</head>

<body>

    {{-- Loader --}}
    <div class="loader" id="loader">
        @if(isset($setting) && $setting->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name ?? 'Logo' }}"
            style="height:64px;border-radius:12px">
        @else
        <img src="{{ asset('assets/images/logo2.png') }}" alt="Accrosian" style="height:84px;border-radius:12px">
        @endif
        <div class="loader-logo">Loading</div>

        <div class="loader-dots">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    @include('partials.navbar')
    @include('partials.mobile-nav')

    <main>
        @if(session('success'))
        <div class="toast-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="toast-error">
            {{ session('error') }}
        </div>
        @endif
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>
    @stack('scripts')

    <script>
    setTimeout(() => {
        document.querySelectorAll('.toast-success, .toast-error').forEach(el => {
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 3000);
    </script>

    @if(session('success'))
    <div id="toast-success" class="toast-success">
        ✅ {{ session('success') }}
    </div>
    @endif

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const toast = document.getElementById("toast-success");

        if (toast) {
            setTimeout(() => toast.classList.add("show"), 100);

            setTimeout(() => {
                toast.classList.remove("show");
                setTimeout(() => toast.remove(), 400);
            }, 3000);
        }
    });
    </script>


    <script>
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.parentElement;

            document.querySelectorAll('.faq-item').forEach(i => {
                if (i !== item) i.classList.remove('active');
            });

            item.classList.toggle('active');
        });
    });
    </script>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
    lucide.createIcons();
    </script>

</body>

</html>