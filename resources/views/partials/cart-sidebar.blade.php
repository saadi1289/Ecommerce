<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-sidebar-header">
        <h3>Shopping Cart</h3>
        <button class="cart-close-btn" id="cartCloseBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="cart-sidebar-content">
        <div class="cart-items" id="cartSidebarItems">
            <!-- Cart items will be dynamically loaded here -->
            <div class="cart-item">
                <div class="item-image">
                    <img src="/placeholder.svg?height=60&width=60" alt="Product">
                </div>
                <div class="item-details">
                    <h4>Wireless Bluetooth Headphones</h4>
                    <div class="item-price">$99.99</div>
                    <div class="item-quantity">
                        <button class="qty-btn minus">-</button>
                        <span class="qty">1</span>
                        <button class="qty-btn plus">+</button>
                    </div>
                </div>
                <button class="remove-item-btn">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        
        <div class="cart-empty" id="cartEmpty" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h4>Your cart is empty</h4>
            <p>Add some products to get started</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
        </div>
    </div>
    
    <div class="cart-sidebar-footer">
        <div class="cart-total">
            <div class="total-row">
                <span>Subtotal:</span>
                <span id="cartSubtotal">$0.00</span>
            </div>
            <div class="total-row">
                <span>Shipping:</span>
                <span>Free</span>
            </div>
            <div class="total-row final">
                <span>Total:</span>
                <span id="cartSidebarTotal">$0.00</span>
            </div>
        </div>
        
        <div class="cart-actions">
            <a href="{{ route('cart.index') }}" class="btn btn-outline btn-block">View Cart</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-block">Checkout</a>
        </div>
    </div>
</div>

<div class="cart-overlay" id="cartOverlay"></div>
