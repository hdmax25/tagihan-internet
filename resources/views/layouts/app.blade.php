<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tagihan Internet - @yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body { background-color: #f0f2f5; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #a0aec0;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: #ffffff;
        }
        .sidebar .nav-link i { margin-right: 10px; width: 20px; }
        .sidebar-brand {
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 20px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 10px;
        }
        .main-content { padding: 30px; }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        .card-header {
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
        }
        .stat-card {
            border-radius: 12px;
            color: white;
            padding: 20px;
        }
        .table th { font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .badge { font-size: 0.8rem; padding: 6px 12px; border-radius: 20px; }
        .btn { border-radius: 8px; }
        .topbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">

        {{-- SIDEBAR --}}
        <div class="col-md-2 sidebar">
            <div class="sidebar-brand">
                🌐 Tagihan Internet
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        📊 Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}"
                       class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                        👥 Pelanggan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('packages.index') }}"
                       class="nav-link {{ request()->routeIs('packages.*') ? 'active' : '' }}">
                        📦 Paket Internet
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bills.index') }}"
                       class="nav-link {{ request()->routeIs('bills.*') ? 'active' : '' }}">
                        🧾 Tagihan
                    </a>
                </li>
            </ul>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="col-md-10 p-0">
            {{-- TOPBAR --}}
            <div class="topbar d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">@yield('title')</h5>
                <span class="text-muted">{{ now()->format('d M Y') }}</span>
            </div>

            {{-- ALERT --}}
            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ✅ {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ❌ {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

    </div>
</div>
</body>
</html>