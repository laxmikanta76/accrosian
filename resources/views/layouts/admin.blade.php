<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('admin_title', 'Admin Panel') – Accrosian CMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @php $setting = \App\Models\Setting::first(); @endphp
    @if($setting && $setting->favicon)
    <link rel="icon" href="{{ asset('storage/'.$setting->favicon) }}" type="image/png">
    @else
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/png">
    @endif
    <style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --bg: #0a0a0a;
        --surface: #111;
        --card: #1a1a1a;
        --border: rgba(255, 255, 255, 0.08);
        --text: #f0f0f0;
        --text-light: #aaa;
        --muted: #666;
        --orange: #ff6b35;
        --orange-dark: #e55a25;
        --sidebar-w: 260px;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
    }

    body {
        font-family: 'Inter', system-ui, sans-serif;
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
        display: flex;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    /* Sidebar */
    .sidebar {
        width: var(--sidebar-w);
        background: var(--surface);
        border-right: 1px solid var(--border);
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        z-index: 100;
    }

    .sidebar-brand {
        padding: 24px 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sidebar-brand img {
        height: 36px;
        border-radius: 8px;
    }

    .sidebar-brand-name {
        font-weight: 800;
        font-size: 1.1rem;
    }

    .sidebar-brand-name span {
        color: var(--orange);
    }

    .sidebar-brand-sub {
        font-size: 0.7rem;
        color: var(--text-light);
        margin-top: 2px;
    }

    .sidebar-nav {
        padding: 16px 12px;
        flex: 1;
    }

    .sidebar-section {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--muted);
        padding: 12px 8px 6px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        color: var(--text-light);
        font-size: 0.9rem;
        transition: all 0.2s;
        margin-bottom: 2px;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
        background: rgba(255, 107, 53, 0.1);
        color: var(--orange);
    }

    .sidebar-link i {
        width: 18px;
        text-align: center;
        font-size: 0.85rem;
    }

    .sidebar-badge {
        margin-left: auto;
        background: var(--orange);
        color: #fff;
        font-size: 0.7rem;
        padding: 2px 7px;
        border-radius: 50px;
        font-weight: 700;
    }

    .sidebar-footer {
        padding: 16px 12px;
        border-top: 1px solid var(--border);
    }

    .sidebar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        background: var(--card);
    }

    .sidebar-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--orange);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .sidebar-user-name {
        font-size: 0.85rem;
        font-weight: 600;
    }

    .sidebar-user-role {
        font-size: 0.75rem;
        color: var(--orange);
    }

    /* Main */
    .admin-main {
        margin-left: var(--sidebar-w);
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .admin-topbar {
        background: var(--surface);
        border-bottom: 1px solid var(--border);
        padding: 16px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .topbar-title {
        font-weight: 700;
        font-size: 1.1rem;
    }

    .topbar-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .admin-content {
        padding: 32px;
        flex: 1;
    }

    /* Cards & UI */
    .admin-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 24px;
    }

    .admin-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .admin-card-title {
        font-weight: 700;
        font-size: 1rem;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
    }

    .stat-card-num {
        font-size: 2rem;
        font-weight: 800;
        color: var(--orange);
    }

    .stat-card-label {
        color: var(--text-light);
        font-size: 0.85rem;
        margin-top: 4px;
    }

    /* Table */
    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-light);
        border-bottom: 1px solid var(--border);
    }

    .admin-table td {
        padding: 14px 16px;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
        color: var(--text-light);
        vertical-align: middle;
    }

    .admin-table tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }

    .admin-table tr:last-child td {
        border-bottom: none;
    }

    /* Buttons */
    .btn-admin {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-admin-primary {
        background: var(--orange);
        color: #fff;
    }

    .btn-admin-primary:hover {
        background: var(--orange-dark);
    }

    .btn-admin-outline {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-light);
    }

    .btn-admin-outline:hover {
        border-color: var(--orange);
        color: var(--orange);
    }

    .btn-admin-danger {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
    }

    .btn-admin-danger:hover {
        background: #ef4444;
        color: #fff;
    }

    .btn-admin-sm {
        padding: 5px 10px;
        font-size: 0.78rem;
    }

    /* Badges */
    .badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-new {
        background: rgba(59, 130, 246, 0.15);
        color: #3b82f6;
    }

    .badge-read {
        background: rgba(107, 114, 128, 0.15);
        color: #9ca3af;
    }

    .badge-replied {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
    }

    .badge-active {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
    }

    .badge-inactive {
        background: rgba(107, 114, 128, 0.15);
        color: #9ca3af;
    }

    .badge-admin {
        background: rgba(255, 107, 53, 0.15);
        color: var(--orange);
    }

    .badge-user {
        background: rgba(59, 130, 246, 0.15);
        color: #3b82f6;
    }

    /* Form */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-row.full {
        grid-template-columns: 1fr;
    }

    .form-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 20px;
    }

    .form-field label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text);
    }

    .form-field input,
    .form-field select,
    .form-field textarea {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 10px 14px;
        color: var(--text);
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
        width: 100%;
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        border-color: var(--orange);
    }

    .form-field textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-field .hint {
        font-size: 0.78rem;
        color: var(--muted);
    }

    /* Alerts */
    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #10b981;
    }

    .alert-error {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
    }

    /* Toggle */
    .toggle-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toggle {
        position: relative;
        width: 44px;
        height: 24px;
    }

    .toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        background: var(--border);
        border-radius: 50px;
        cursor: pointer;
        transition: 0.3s;
    }

    .toggle-slider:before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        left: 3px;
        bottom: 3px;
        background: white;
        border-radius: 50%;
        transition: 0.3s;
    }

    .toggle input:checked+.toggle-slider {
        background: var(--orange);
    }

    .toggle input:checked+.toggle-slider:before {
        transform: translateX(20px);
    }

    /* Page breadcrumb */
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: var(--text-light);
        margin-bottom: 24px;
    }

    .breadcrumb a {
        color: var(--orange);
    }

    .breadcrumb span {
        color: var(--muted);
    }

    @media(max-width:768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .admin-main {
            margin-left: 0;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
    </style>
    @stack('admin_styles')
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            @if(isset($setting) && $setting->logo)
            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" />
            @else
            <img src="{{ asset('assets/images/logo2.png') }}" alt="Accrosian" />
            @endif
            <div>
                <div class="sidebar-brand-name">Accr<span>o</span>sian</div>
                <div class="sidebar-brand-sub">Admin Panel</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>

            <div class="sidebar-section">Content</div>
            <a href="{{ route('admin.services.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i class="fas fa-cogs"></i> Services
            </a>
            <a href="{{ route('admin.portfolio.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.portfolio*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Portfolio
            </a>
            <a href="{{ route('admin.blog.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                <i class="fas fa-blog"></i> Blog Posts
            </a>
            <a href="{{ route('admin.pages.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Pages
            </a>

            <div class="sidebar-section">Enquiries</div>
            <a href="{{ route('admin.contact.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Contact Forms
                @php $newCount = \App\Models\ContactSubmission::where('status','new')->count(); @endphp
                @if($newCount > 0)
                <span class="sidebar-badge">{{ $newCount }}</span>
                @endif
            </a>

            <div class="sidebar-section">System</div>
            <a href="{{ route('admin.users.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Users
            </a>
            <a href="{{ route('admin.settings.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="fas fa-sliders-h"></i> Settings
            </a>

            <div class="sidebar-section">Website</div>
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">{{ ucfirst(auth()->user()->role) }}</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin-top:8px">
                @csrf
                <button type="submit" class="btn-admin btn-admin-outline" style="width:100%;justify-content:center">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-title">@yield('admin_title', 'Dashboard')</div>
            <div class="topbar-actions">
                <span style="color:var(--text-light);font-size:0.85rem">Welcome, {{ auth()->user()->name }}</span>
                <a href="{{ route('home') }}" class="btn-admin btn-admin-outline btn-admin-sm" target="_blank">
                    <i class="fas fa-eye"></i> Preview Site
                </a>
            </div>
        </header>

        <main class="admin-content">
            @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-error">✗ {{ session('error') }}</div>
            @endif

            @yield('admin_content')
        </main>
    </div>

    @stack('admin_scripts')
</body>

</html>