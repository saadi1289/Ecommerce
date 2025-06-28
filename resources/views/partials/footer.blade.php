<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-store"></i>
                            <span>ShopPro</span>
                        </a>
                    </div>
                    <p class="footer-description">
                        Your premium shopping destination for quality products at unbeatable prices. 
                        We're committed to providing exceptional customer service and fast delivery.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('products.index') }}">All Products</a></li>
                        <li><a href="{{ route('deals') }}">Special Deals</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Categories</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('products.category', 'electronics') }}">Electronics</a></li>
                        <li><a href="{{ route('products.category', 'clothing') }}">Clothing</a></li>
                        <li><a href="{{ route('products.category', 'books') }}">Books</a></li>
                        <li><a href="{{ route('products.category', 'home') }}">Home & Garden</a></li>
                        <li><a href="{{ route('products.category', 'sports') }}">Sports</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Customer Service</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('help') }}">Help Center</a></li>
                        <li><a href="{{ route('shipping') }}">Shipping Info</a></li>
                        <li><a href="{{ route('returns') }}">Returns</a></li>
                        <li><a href="{{ route('size-guide') }}">Size Guide</a></li>
                        <li><a href="{{ route('track-order') }}">Track Order</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Shopping Street<br>New York, NY 10001</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+1 (555) 123-4567</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>support@shoppro.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Mon-Fri: 9AM-6PM EST</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; 2024 ShopPro. All rights reserved.</p>
                </div>
                <div class="footer-links-bottom">
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="{{ route('terms') }}">Terms of Service</a>
                    <a href="{{ route('cookies') }}">Cookie Policy</a>
                </div>
                <div class="payment-methods">
                    <span>We accept:</span>
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-amex"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-apple-pay"></i>
                        <i class="fab fa-google-pay"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
