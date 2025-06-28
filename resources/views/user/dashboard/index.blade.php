@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-section" data-aos="fade-up">
        <div class="welcome-content">
            <h1 class="welcome-title">Welcome back, {{ Auth::user()->name ?? 'User' }}</h1>
            <p class="welcome-subtitle">Here's what's happening with your account</p>
        </div>
        <div class="welcome-visual">
            <div class="welcome-shape"></div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card">
            <div class="stat-icon orders">
                <i class="icon-package"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">12</div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon wishlist">
                <i class="icon-heart"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">8</div>
                <div class="stat-label">Wishlist Items</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon spent">
                <i class="icon-credit-card"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">$2,450</div>
                <div class="stat-label">Total Spent</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon points">
                <i class="icon-star"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">1,250</div>
                <div class="stat-label">Reward Points</div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="dashboard-grid">
        <div class="dashboard-card recent-orders" data-aos="fade-up" data-aos-delay="300">
            <div class="card-header">
                <h3 class="card-title">Recent Orders</h3>
                <a href="{{ route('user.orders.index') }}" class="card-link">View All</a>
            </div>
            <div class="card-content">
                <div class="order-list">
                    <div class="order-item">
                        <div class="order-info">
                            <div class="order-id">#ORD-001</div>
                            <div class="order-date">2 days ago</div>
                        </div>
                        <div class="order-status delivered">Delivered</div>
                        <div class="order-amount">$299.00</div>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-info">
                            <div class="order-id">#ORD-002</div>
                            <div class="order-date">1 week ago</div>
                        </div>
                        <div class="order-status processing">Processing</div>
                        <div class="order-amount">$149.00</div>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-info">
                            <div class="order-id">#ORD-003</div>
                            <div class="order-date">2 weeks ago</div>
                        </div>
                        <div class="order-status shipped">Shipped</div>
                        <div class="order-amount">$89.00</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card quick-actions" data-aos="fade-up" data-aos-delay="400">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-content">
                <div class="action-grid">
                    <a href="{{ route('user.orders.index') }}" class="action-item">
                        <div class="action-icon">
                            <i class="icon-package"></i>
                        </div>
                        <span>View Orders</span>
                    </a>
                    
                    <a href="{{ route('user.wishlist.index') }}" class="action-item">
                        <div class="action-icon">
                            <i class="icon-heart"></i>
                        </div>
                        <span>Wishlist</span>
                    </a>
                    
                    <a href="{{ route('user.profile.index') }}" class="action-item">
                        <div class="action-icon">
                            <i class="icon-user"></i>
                        </div>
                        <span>Profile</span>
                    </a>
                    
                    <a href="{{ route('user.addresses.index') }}" class="action-item">
                        <div class="action-icon">
                            <i class="icon-map-pin"></i>
                        </div>
                        <span>Addresses</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
