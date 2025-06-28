@extends('layouts.app')

@section('title', $product->name . ' - E-Commerce Store')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="#">Home</a> > <a href="#">Electronics</a> > <span>Wireless Headphones</span>
    </div>

    <div class="product-details">
        <div class="product-images">
            <div class="main-image">
                <img id="mainProductImage" src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}">
                <div class="image-zoom" id="imageZoom"></div>
            </div>

            <div class="image-thumbnails">
                <div class="thumbnail-slider">
                    <button class="slider-btn prev" onclick="prevThumbnail()">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="thumbnails-container">
                        @foreach(json_decode($product->gallery_images, true) ?? [] as $img)
                        <div class="thumbnail {{ $loop->first ? 'active' : '' }}" onclick="changeMainImage('{{ asset('storage/' . $img) }}', this)">
                            <img src="{{ asset('storage/' . $img) }}" alt="Image {{ $loop->iteration }}">
                        </div>
                        @endforeach
                    </div>

                    <button class="slider-btn next" onclick="nextThumbnail()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="product-info">
            <h1>{{ $product->name }}</h1>

            <div class="product-rating">
                {{-- Dynamic rating if available --}}
                <span class="rating-text">({{ $product->rating ?? '4.5' }} out of 5)</span>
                {{-- Add review count if available --}}
            </div>

            <div class="product-price">
                <span class="current-price">${{ $product->sale_price ?? $product->price }}</span>
                @if($product->sale_price)
                <span class="original-price">${{ $product->price }}</span>
                <span class="discount">
                    {{ round(100 - ($product->sale_price / $product->price * 100)) }}% OFF
                </span>
                @endif
            </div>

            <div class="product-description">
                <p>{{ $product->short_description }}</p>
            </div>

            <div class="product-options">
                <div class="option-group">
                    <label>Color:</label>
                    <div class="color-options">
                        @foreach(json_decode($product->color, true) ?? [] as $color)
                        <div class="color-option" data-color="{{ $color }}" style="background-color: {{ $color }};"></div>
                        @endforeach
                    </div>
                </div>

                <div class="option-group">
                    <label for="quantity">Quantity:</label>
                    <div class="quantity-selector">
                        <button onclick="decreaseQuantity()">-</button>
                        <input type="number" id="quantity" value="1" min="1" max="{{ $product->stock }}">
                        <button onclick="increaseQuantity()">+</button>
                    </div>
                </div>
            </div>

            <div class="product-actions">
                <button class="btn btn-primary btn-large add-to-cart" onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->sale_price ?? $product->price }}, '{{ asset('storage/' . $product->main_image) }}')">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-secondary btn-large buy-now">
                    <i class="fas fa-bolt"></i> Buy Now
                </button>
                <button class="btn btn-outline wishlist-btn">
                    <i class="far fa-heart"></i> Add to Wishlist
                </button>
            </div>

            <div class="product-features">
                <div class="feature">
                    <i class="fas fa-shipping-fast"></i>
                    <div>
                        <strong>Free Shipping</strong>
                        <p>On orders over $50</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-undo"></i>
                    <div>
                        <strong>30-Day Returns</strong>
                        <p>Easy return policy</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <strong>2-Year Warranty</strong>
                        <p>Full manufacturer warranty</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Tabs -->
    <div class="product-tabs">
        <div class="tab-buttons">
            <button class="tab-btn active" onclick="showTab('description')">Description</button>
            <button class="tab-btn" onclick="showTab('specifications')">Specifications</button>
            <button class="tab-btn" onclick="showTab('reviews')">Reviews (127)</button>
            <button class="tab-btn" onclick="showTab('shipping')">Shipping</button>
        </div>

        <div class="tab-content">
            <div id="description" class="tab-pane active">
                <h3>Product Description</h3>
                <p>These premium wireless headphones deliver exceptional sound quality with deep bass and crystal-clear highs. Featuring advanced active noise cancellation technology, they block out ambient noise so you can focus on your music.</p>

                <h4>Key Features:</h4>
                <ul>
                    <li>Active Noise Cancellation (ANC)</li>
                    <li>30-hour battery life with ANC off, 20 hours with ANC on</li>
                    <li>Quick charge: 5 minutes for 3 hours of playback</li>
                    <li>Premium comfort design with memory foam ear cups</li>
                    <li>Bluetooth 5.0 connectivity</li>
                    <li>Built-in microphone for hands-free calls</li>
                    <li>Foldable design for easy portability</li>
                </ul>
            </div>

            <div id="specifications" class="tab-pane">
                <h3>Technical Specifications</h3>
                <table class="specs-table">
                    <tr><td>Driver Size</td><td>40mm</td></tr>
                    <tr><td>Frequency Response</td><td>20Hz - 20kHz</td></tr>
                    <tr><td>Impedance</td><td>32 Ohms</td></tr>
                    <tr><td>Bluetooth Version</td><td>5.0</td></tr>
                    <tr><td>Battery Life</td><td>30 hours (ANC off), 20 hours (ANC on)</td></tr>
                    <tr><td>Charging Time</td><td>2 hours</td></tr>
                    <tr><td>Weight</td><td>250g</td></tr>
                    <tr><td>Dimensions</td><td>190 x 160 x 80mm</td></tr>
                </table>
            </div>

            <div id="reviews" class="tab-pane">
                <div class="reviews-summary">
                    <div class="rating-overview">
                        <div class="average-rating">
                            <span class="rating-number">4.5</span>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p>Based on 127 reviews</p>
                        </div>

                        <div class="rating-breakdown">
                            <div class="rating-bar">
                                <span>5 stars</span>
                                <div class="bar"><div class="fill" style="width: 70%"></div></div>
                                <span>89</span>
                            </div>
                            <div class="rating-bar">
                                <span>4 stars</span>
                                <div class="bar"><div class="fill" style="width: 20%"></div></div>
                                <span>25</span>
                            </div>
                            <div class="rating-bar">
                                <span>3 stars</span>
                                <div class="bar"><div class="fill" style="width: 7%"></div></div>
                                <span>9</span>
                            </div>
                            <div class="rating-bar">
                                <span>2 stars</span>
                                <div class="bar"><div class="fill" style="width: 2%"></div></div>
                                <span>3</span>
                            </div>
                            <div class="rating-bar">
                                <span>1 star</span>
                                <div class="bar"><div class="fill" style="width: 1%"></div></div>
                                <span>1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reviews-list">
                    <div class="review">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <strong>John D.</strong>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <span class="review-date">2 days ago</span>
                        </div>
                        <p>Excellent sound quality and the noise cancellation works perfectly. Very comfortable for long listening sessions.</p>
                    </div>

                    <div class="review">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <strong>Sarah M.</strong>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <span class="review-date">1 week ago</span>
                        </div>
                        <p>Great headphones overall. The battery life is impressive and they're very comfortable. Only minor complaint is they can get a bit warm during extended use.</p>
                    </div>
                </div>
            </div>

            <div id="shipping" class="tab-pane">
                <h3>Shipping Information</h3>
                <div class="shipping-options">
                    <div class="shipping-option">
                        <strong>Standard Shipping (5-7 business days)</strong>
                        <p>Free on orders over $50, otherwise $5.99</p>
                    </div>
                    <div class="shipping-option">
                        <strong>Express Shipping (2-3 business days)</strong>
                        <p>$12.99</p>
                    </div>
                    <div class="shipping-option">
                        <strong>Overnight Shipping (1 business day)</strong>
                        <p>$24.99</p>
                    </div>
                </div>

                <h4>Return Policy</h4>
                <p>We offer a 30-day return policy for all items. Items must be in original condition with all packaging and accessories included.</p>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <section class="related-products">
        <h2>Related Products</h2>
        <div class="product-grid">
            @foreach($related as $rel)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $rel->main_image) }}" alt="{{ $rel->name }}">
                    <div class="product-overlay">
                        <button class="btn btn-primary add-to-cart-btn" onclick="addToCart({{ $rel->id }}, '{{ addslashes($rel->name) }}', {{ $rel->sale_price ?? $rel->price }}, '{{ asset('storage/' . $rel->main_image) }}')">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <h3>{{ $rel->name }}</h3>
                    <div class="product-price">
                        <span class="current-price">${{ $rel->sale_price ?? $rel->price }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
