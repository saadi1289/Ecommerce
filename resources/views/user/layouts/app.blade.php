<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard') - ShopPro</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Main CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body class="user-dashboard">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <a href="{{ route('welcome') }}">
                    <span class="logo-text">ShopPro</span>
                </a>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="icon-x"></i>
            </button>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                        <i class="icon-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.orders.index') }}" class="nav-link {{ request()->routeIs('user.orders.*') ? 'active' : '' }}">
                        <i class="icon-package"></i>
                        <span>Orders</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.wishlist.index') }}" class="nav-link {{ request()->routeIs('user.wishlist.*') ? 'active' : '' }}">
                        <i class="icon-heart"></i>
                        <span>Wishlist</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.profile.index') }}" class="nav-link {{ request()->routeIs('user.profile.*') ? 'active' : '' }}">
                        <i class="icon-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.addresses.index') }}" class="nav-link {{ request()->routeIs('user.addresses.*') ? 'active' : '' }}">
                        <i class="icon-map-pin"></i>
                        <span>Addresses</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.settings.index') }}" class="nav-link {{ request()->routeIs('user.settings.*') ? 'active' : '' }}">
                        <i class="icon-settings"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="/placeholder.svg?height=40&width=40" alt="User">
                </div>
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name ?? 'User' }}</div>
                    <div class="user-email">{{ Auth::user()->email ?? 'user@example.com' }}</div>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn" data-tooltip="Logout">
                    <i class="icon-log-out"></i>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <header class="topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle-btn" id="sidebarToggleBtn">
                    <i class="icon-menu"></i>
                </button>
                
                <div class="breadcrumb">
                    <span class="breadcrumb-item">@yield('title', 'Dashboard')</span>
                </div>
            </div>
            
            <div class="topbar-right">
                <button class="topbar-btn" data-tooltip="Notifications">
                    <i class="icon-bell"></i>
                    <span class="badge">3</span>
                </button>
                
                <a href="{{ route('welcome') }}" class="topbar-btn" data-tooltip="Back to Store">
                    <i class="icon-shopping-bag"></i>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
