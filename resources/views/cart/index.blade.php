@extends('layouts.app')

@section('title', 'Shopping Cart - E-Commerce Store')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Shopping Cart</h1>
        <div class="breadcrumb">
            <a href="#">Home</a> > <span>Shopping Cart</span>
        </div>
    </div>

    <div class="cart-page">
        <div class="cart-content">
            <div class="cart-items-section">
                <div class="cart-header">
                    <h2>Your Items (<span id="cartItemCount">3</span>)</h2>
                    <button class="clear-cart-btn" onclick="clearCart()">Clear Cart</button>
                </div>

                <div class="cart-items-list" id="cartItemsList">
                    <!-- Cart items will be populated by JavaScript -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="/placeholder.svg?height=120&width=120" alt="Wireless Headphones">
                        </div>
                        <div class="item-details">
                            <h3>Premium Wireless Headphones</h3>
                            <p class="item-description">Color: Black | Model: WH-1000XM4</p>
                            <div class="item-actions">
                                <button class="btn-link" onclick="moveToWishlist(1)">
                                    <i class="far fa-heart"></i> Move to Wishlist
                                </button>
                                <button class="btn-link" onclick="removeFromCart(1)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                        <div class="item-quantity">
                            <label>Quantity:</label>
                            <div class="quantity-controls">
                                <button onclick="updateQuantity(1, -1)">-</button>
                                <input type="number" value="1" min="1" onchange="updateQuantity(1, this.value)">
                                <button onclick="updateQuantity(1, 1)">+</button>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="current-price">$99.99</div>
                            <div class="original-price">$129.99</div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="item-image">
                            <img src="/placeholder.svg?height=120&width=120" alt="Smart Watch">
                        </div>
                        <div class="item-details">
                            <h3>Smart Watch Series 8</h3>
                            <p class="item-description">Color: Space Gray | Size: 44mm</p>
                            <div class="item-actions">
                                <button class="btn-link" onclick="moveToWishlist(2)">
                                    <i class="far fa-heart"></i> Move to Wishlist
                                </button>
                                <button class="btn-link" onclick="removeFromCart(2)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                        <div class="item-quantity">
                            <label>Quantity:</label>
                            <div class="quantity-controls">
                                <button onclick="updateQuantity(2, -1)">-</button>
                                <input type="number" value="2" min="1" onchange="updateQuantity(2, this.value)">
                                <button onclick="updateQuantity(2, 1)">+</button>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="current-price">$399.98</div>
                            <div class="unit-price">$199.99 each</div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="item-image">
                            <img src="/placeholder.svg?height=120&width=120" alt="Bluetooth Speaker">
                        </div>
                        <div class="item-details">
                            <h3>Portable Bluetooth Speaker</h3>
                            <p class="item-description">Color: Blue | Waterproof Rating: IPX7</p>
                            <div class="item-actions">
                                <button class="btn-link" onclick="moveToWishlist(3)">
                                    <i class="far fa-heart"></i> Move to Wishlist
                                </button>
                                <button class="btn-link" onclick="removeFromCart(3)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                        <div class="item-quantity">
                            <label>Quantity:</label>
                            <div class="quantity-controls">
                                <button onclick="updateQuantity(3, -1)">-</button>
                                <input type="number" value="1" min="1" onchange="updateQuantity(3, this.value)">
                                <button onclick="updateQuantity(3, 1)">+</button>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="current-price">$79.99</div>
                        </div>
                    </div>
                </div>

                <div class="continue-shopping">
                    <a href="#" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            </div>

            <div class="cart-summary">
                <div class="summary-card">
                    <h3>Order Summary</h3>

                    <div class="summary-row">
                        <span>Subtotal (3 items):</span>
                        <span>$579.96</span>
                    </div>

                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span class="free">FREE</span>
                    </div>

                    <div class="summary-row">
                        <span>Tax:</span>
                        <span>$46.40</span>
                    </div>

                    <div class="promo-code">
                        <input type="text" placeholder="Enter promo code">
                        <button class="btn btn-outline">Apply</button>
                    </div>

                    <div class="summary-row total">
                        <span>Total:</span>
                        <span>$626.36</span>
                    </div>

                    <button class="btn btn-primary btn-large btn-block checkout-btn" onclick="goToCheckout()">
                        Proceed to Checkout
                    </button>

                    <div class="payment-methods">
                        <p>We accept:</p>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fab fa-cc-mastercard"></i>
                            <i class="fab fa-cc-amex"></i>
                            <i class="fab fa-cc-paypal"></i>
                            <i class="fab fa-apple-pay"></i>
                        </div>
                    </div>
                </div>

                <div class="shipping-info">
                    <div class="info-item">
                        <i class="fas fa-shipping-fast"></i>
                        <div>
                            <strong>Free Shipping</strong>
                            <p>On orders over $50</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-undo"></i>
                        <div>
                            <strong>Easy Returns</strong>
                            <p>30-day return policy</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <strong>Secure Checkout</strong>
                            <p>SSL encrypted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->
        <section class="recently-viewed">
            <h2>Recently Viewed</h2>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="/placeholder.svg?height=200&width=200" alt="Laptop">
                        <div class="product-overlay">
                            <button class="btn btn-primary add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Gaming Laptop</h3>
                        <div class="product-price">
                            <span class="current-price">$1,299.99</span>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="/placeholder.svg?height=200&width=200" alt="Keyboard">
                        <div class="product-overlay">
                            <button class="btn btn-primary add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Mechanical Keyboard</h3>
                        <div class="product-price">
                            <span class="current-price">$149.99</span>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="/placeholder.svg?height=200&width=200" alt="Monitor">
                        <div class="product-overlay">
                            <button class="btn btn-primary add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>4K Monitor</h3>
                        <div class="product-price">
                            <span class="current-price">$399.99</span>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="/placeholder.svg?height=200&width=200" alt="Mouse Pad">
                        <div class="product-overlay">
                            <button class="btn btn-primary add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Gaming Mouse Pad</h3>
                        <div class="product-price">
                            <span class="current-price">$29.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
