@extends('layouts.app')

@section('title', 'Checkout - E-Commerce Store')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Checkout</h1>
        <div class="breadcrumb">
            <a href="#">Home</a> > <a href="#">Cart</a> > <span>Checkout</span>
        </div>
    </div>

    <div class="checkout-page">
        <div class="checkout-steps">
            <div class="step active">
                <div class="step-number">1</div>
                <span>Shipping</span>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <span>Payment</span>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <span>Review</span>
            </div>
        </div>

        <div class="checkout-content">
            <div class="checkout-form">
                <form id="checkoutForm">
                    <!-- Shipping Information -->
                    <div class="form-section active" id="shippingSection">
                        <h2>Shipping Information</h2>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name *</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Street Address *</label>
                            <input type="text" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <label for="apartment">Apartment, suite, etc. (optional)</label>
                            <input type="text" id="apartment" name="apartment">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State *</label>
                                <select id="state" name="state" required>
                                    <option value="">Select State</option>
                                    <option value="CA">California</option>
                                    <option value="NY">New York</option>
                                    <option value="TX">Texas</option>
                                    <option value="FL">Florida</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zipCode">ZIP Code *</label>
                                <input type="text" id="zipCode" name="zipCode" required>
                            </div>
                        </div>

                        <div class="shipping-options">
                            <h3>Shipping Method</h3>
                            <div class="shipping-option">
                                <input type="radio" id="standard" name="shipping" value="standard" checked>
                                <label for="standard">
                                    <div class="option-info">
                                        <strong>Standard Shipping</strong>
                                        <span>5-7 business days</span>
                                    </div>
                                    <span class="option-price">FREE</span>
                                </label>
                            </div>
                            <div class="shipping-option">
                                <input type="radio" id="express" name="shipping" value="express">
                                <label for="express">
                                    <div class="option-info">
                                        <strong>Express Shipping</strong>
                                        <span>2-3 business days</span>
                                    </div>
                                    <span class="option-price">$12.99</span>
                                </label>
                            </div>
                            <div class="shipping-option">
                                <input type="radio" id="overnight" name="shipping" value="overnight">
                                <label for="overnight">
                                    <div class="option-info">
                                        <strong>Overnight Shipping</strong>
                                        <span>1 business day</span>
                                    </div>
                                    <span class="option-price">$24.99</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-primary" onclick="nextStep()">Continue to Payment</button>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="form-section" id="paymentSection">
                        <h2>Payment Information</h2>

                        <div class="payment-methods">
                            <div class="payment-method">
                                <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" checked>
                                <label for="creditCard">
                                    <i class="fas fa-credit-card"></i>
                                    Credit/Debit Card
                                </label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="paypal" name="paymentMethod" value="paypal">
                                <label for="paypal">
                                    <i class="fab fa-paypal"></i>
                                    PayPal
                                </label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="applePay" name="paymentMethod" value="applePay">
                                <label for="applePay">
                                    <i class="fab fa-apple-pay"></i>
                                    Apple Pay
                                </label>
                            </div>
                        </div>

                        <div class="credit-card-form" id="creditCardForm">
                            <div class="form-group">
                                <label for="cardNumber">Card Number *</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiryDate">Expiry Date *</label>
                                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV *</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cardName">Name on Card *</label>
                                <input type="text" id="cardName" name="cardName" required>
                            </div>
                        </div>

                        <div class="billing-address">
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="sameAsShipping" checked onchange="toggleBillingAddress()">
                                <label for="sameAsShipping">Billing address is the same as shipping address</label>
                            </div>

                            <div class="billing-form" id="billingForm" style="display: none;">
                                <h3>Billing Address</h3>
                                <!-- Billing address fields would go here -->
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-outline" onclick="prevStep()">Back to Shipping</button>
                            <button type="button" class="btn btn-primary" onclick="nextStep()">Review Order</button>
                        </div>
                    </div>

                    <!-- Order Review -->
                    <div class="form-section" id="reviewSection">
                        <h2>Review Your Order</h2>

                        <div class="order-review">
                            <div class="review-section">
                                <h3>Shipping Address</h3>
                                <div class="address-display" id="shippingAddressDisplay">
                                    <!-- Address will be populated by JavaScript -->
                                </div>
                                <button type="button" class="btn-link" onclick="editSection('shipping')">Edit</button>
                            </div>

                            <div class="review-section">
                                <h3>Payment Method</h3>
                                <div class="payment-display" id="paymentMethodDisplay">
                                    <!-- Payment method will be populated by JavaScript -->
                                </div>
                                <button type="button" class="btn-link" onclick="editSection('payment')">Edit</button>
                            </div>

                            <div class="review-section">
                                <h3>Order Items</h3>
                                <div class="order-items">
                                    <div class="order-item">
                                        <img src="/placeholder.svg?height=80&width=80" alt="Wireless Headphones">
                                        <div class="item-details">
                                            <h4>Premium Wireless Headphones</h4>
                                            <p>Color: Black</p>
                                            <p>Qty: 1</p>
                                        </div>
                                        <div class="item-price">$99.99</div>
                                    </div>

                                    <div class="order-item">
                                        <img src="/placeholder.svg?height=80&width=80" alt="Smart Watch">
                                        <div class="item-details">
                                            <h4>Smart Watch Series 8</h4>
                                            <p>Color: Space Gray, Size: 44mm</p>
                                            <p>Qty: 2</p>
                                        </div>
                                        <div class="item-price">$399.98</div>
                                    </div>

                                    <div class="order-item">
                                        <img src="/placeholder.svg?height=80&width=80" alt="Bluetooth Speaker">
                                        <div class="item-details">
                                            <h4>Portable Bluetooth Speaker</h4>
                                            <p>Color: Blue</p>
                                            <p>Qty: 1</p>
                                        </div>
                                        <div class="item-price">$79.99</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="terms-conditions">
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="agreeTerms" required>
                                <label for="agreeTerms">I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-outline" onclick="prevStep()">Back to Payment</button>
                            <button type="submit" class="btn btn-primary btn-large" onclick="placeOrder()">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="order-summary">
                <div class="summary-card">
                    <h3>Order Summary</h3>

                    <div class="summary-items">
                        <div class="summary-item">
                            <span>Premium Wireless Headphones × 1</span>
                            <span>$99.99</span>
                        </div>
                        <div class="summary-item">
                            <span>Smart Watch Series 8 × 2</span>
                            <span>$399.98</span>
                        </div>
                        <div class="summary-item">
                            <span>Portable Bluetooth Speaker × 1</span>
                            <span>$79.99</span>
                        </div>
                    </div>

                    <div class="summary-calculations">
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span>$579.96</span>
                        </div>

                        <div class="summary-row">
                            <span>Shipping:</span>
                            <span id="shippingCost">FREE</span>
                        </div>

                        <div class="summary-row">
                            <span>Tax:</span>
                            <span>$46.40</span>
                        </div>

                        <div class="summary-row total">
                            <span>Total:</span>
                            <span id="orderTotal">$626.36</span>
                        </div>
                    </div>

                    <div class="security-badges">
                        <div class="security-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>SSL Secured</span>
                        </div>
                        <div class="security-item">
                            <i class="fas fa-lock"></i>
                            <span>256-bit Encryption</span>
                        </div>
                    </div>
                </div>

                <div class="help-section">
                    <h4>Need Help?</h4>
                    <p>Contact our customer service team</p>
                    <div class="contact-options">
                        <div class="contact-option">
                            <i class="fas fa-phone"></i>
                            <span>1-800-123-4567</span>
                        </div>
                        <div class="contact-option">
                            <i class="fas fa-envelope"></i>
                            <span>support@shophub.com</span>
                        </div>
                        <div class="contact-option">
                            <i class="fas fa-comments"></i>
                            <span>Live Chat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
