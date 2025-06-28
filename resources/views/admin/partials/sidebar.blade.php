<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="fas fa-crown brand-icon"></i>
            <span class="brand-text">AdminPro</span>
        </div>
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="sidebar-content">
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Users Management -->
                {{-- <li class="nav-item has-submenu">
                    <a href="#" class="nav-link submenu-toggle">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-text">Users</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="" class="submenu-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                <i class="fas fa-list submenu-icon"></i>
                                All Users
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="" class="submenu-link {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                                <i class="fas fa-plus submenu-icon"></i>
                                Add User
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="" class="submenu-link {{ request()->routeIs('admin.users.roles') ? 'active' : '' }}">
                                <i class="fas fa-user-shield submenu-icon"></i>
                                User Roles
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- Content Management -->
                {{-- <li class="nav-item has-submenu">
                    <a href="#" class="nav-link submenu-toggle">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <span class="nav-text">Content</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="" class="submenu-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                                <i class="fas fa-newspaper submenu-icon"></i>
                                Posts
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="" class="submenu-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                                <i class="fas fa-file submenu-icon"></i>
                                Pages
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.categories.index') }}" class="submenu-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                <i class="fas fa-tags submenu-icon"></i>
                                Categories
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- E-commerce -->
                <li class="nav-item has-submenu">
                    <a href="{{ route('admin.products.index') }}" class="nav-link submenu-toggle">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <span class="nav-text">Products</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.products.index') }}" class="submenu-link {{ request()->routeIs('admin.products.index.*') ? 'active' : '' }}">
                                <i class="fas fa-box submenu-icon"></i>
                                Products
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.products.create') }}" class="submenu-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                                <i class="fas fa-receipt submenu-icon"></i>
                                Create Products
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a href="#" class="nav-link submenu-toggle">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <span class="nav-text">Categories</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.categories.index') }}" class="submenu-link {{ request()->routeIs('admin.categories.index.*') ? 'active' : '' }}">
                                <i class="fas fa-box submenu-icon"></i>
                                Categories
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.categories.create') }}" class="submenu-link {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">
                                <i class="fas fa-receipt submenu-icon"></i>
                                Create Categories
                            </a>
                        </li>

                    </ul>
                </li>
                 <li class="nav-item has-submenu">
                    <a href="{{ route('admin.coupons.index') }}" class="nav-link submenu-toggle">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <span class="nav-text">Coupons</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.coupons.index') }}" class="submenu-link {{ request()->routeIs('admin.coupons.index.*') ? 'active' : '' }}">
                                <i class="fas fa-box submenu-icon"></i>
                                Coupons
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.coupons.create') }}" class="submenu-link {{ request()->routeIs('admin.coupons.create') ? 'active' : '' }}">
                                <i class="fas fa-receipt submenu-icon"></i>
                                Create Coupons
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Analytics -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <span class="nav-text">Analytics</span>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item has-submenu">
                    <a href="#" class="nav-link submenu-toggle">
                        <i class="fas fa-cog nav-icon"></i>
                        <span class="nav-text">Settings</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    {{-- <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.general') }}" class="submenu-link">
                                <i class="fas fa-sliders-h submenu-icon"></i>
                                General
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.security') }}" class="submenu-link">
                                <i class="fas fa-shield-alt submenu-icon"></i>
                                Security
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.email') }}" class="submenu-link">
                                <i class="fas fa-envelope submenu-icon"></i>
                                Email
                            </a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </nav>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name ?? 'Admin' }}&background=6366f1&color=fff"
                    alt="User Avatar">
            </div>
            <div class="user-details">
                <span class="user-name">{{ auth()->user()->first_name ?? 'Admin User' }}</span>
                <span class="user-role">Administrator</span>
            </div>
        </div>
    </div>
</aside>
