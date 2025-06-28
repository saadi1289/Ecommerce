<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-content">
                <div class="header-info">
                    <span><i class="fas fa-phone"></i> +1 (555) 123-4567</span>
                    <span><i class="fas fa-envelope"></i> support@shoppro.com</span>
                </div>
                <div class="header-links">
                    @auth
                        <a href="{{ route('account.dashboard') }}">My Account</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline-form">
                            @csrf
                            <button type="submit" class="link-btn">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-store"></i>
                        <span>ShopPro</span>
                    </a>
                </div>
                
                <div class="search-bar">
                    <form action="{{ route('products.search') }}" method="GET" class="search-form">
                        <input type="text" name="q" placeholder="Search products..." class="search-input" value="{{ request('q') }}">
                        <select name="category" class="search-category">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="books">Books</option>
                            <option value="home">Home & Garden</option>
                        </select>
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="header-actions">
                    <button class="action-btn wishlist-btn" id="wishlistBtn">
                        <i class="fas fa-heart"></i>
                        <span class="badge" id="wishlistCount">0</span>
                    </button>
                    
                    <button class="action-btn cart-btn" id="cartBtn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge" id="cartCount">0</span>
                    </button>
                    
                    <div class="cart-total" id="cartTotal">
                        $0.00
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <nav class="navigation">
        <div class="container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fas fa-th-large"></i>
                        Products
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('products.category', 'electronics') }}" class="dropdown-link">Electronics</a>
                        <a href="{{ route('products.category', 'clothing') }}" class="dropdown-link">Clothing</a>
                        <a href="{{ route('products.category', 'books') }}" class="dropdown-link">Books</a>
                        <a href="{{ route('products.category', 'home') }}" class="dropdown-link">Home & Garden</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('deals') }}" class="nav-link">
                        <i class="fas fa-fire"></i>
                        Deals
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <i class="fas fa-info-circle"></i>
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">
                        <i class="fas fa-envelope"></i>
                        Contact
                    </a>
                </li>
            </ul>
            
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</header>
