<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce Store')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="#"><i class="fas fa-store"></i> ShopHub</a>
                </div>

                <nav class="nav">
                    <ul>
                        <li><a href="#" class="nav-link">Home</a></li>
                        <li><a href="#" class="nav-link">Products</a></li>
                        <li><a href="#" class="nav-link">Categories</a></li>
                        <li><a href="#" class="nav-link">About</a></li>
                        <li><a href="#" class="nav-link">Contact</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Search products..." class="search-input">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>

                    <div class="cart-icon" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </div>

                    <div class="user-menu">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>ShopHub</h3>
                    <p>Your one-stop destination for quality products at amazing prices.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Customer Service</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Newsletter</h4>
                    <p>Subscribe to get updates on new products and offers.</p>
                    <div class="newsletter">
                        <input type="email" placeholder="Your email">
                        <button>Subscribe</button>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 ShopHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Shopping Cart</h3>
            <button class="close-cart" onclick="toggleCart()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="cart-items" id="cartItems">
            <!-- Cart items will be populated by JavaScript -->
        </div>

        <div class="cart-footer">
            <div class="cart-total">
                <strong>Total: $<span id="cartTotal">0.00</span></strong>
            </div>
            <button class="btn btn-primary btn-block" onclick="goToCart()">View Cart</button>
            <button class="btn btn-secondary btn-block" onclick="goToCheckout()">Checkout</button>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleCart()"></div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
