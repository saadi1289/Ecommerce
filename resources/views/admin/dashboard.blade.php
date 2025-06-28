@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<div class="dashboard-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-title">
            <h1>Dashboard</h1>
            <p>Welcome back! Here's what's happening with your business today.</p>
        </div>
        <div class="page-actions">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New
            </button>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>12,345</h3>
                <p>Total Users</p>
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+12.5%</span>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon bg-success">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="stat-content">
                <h3>$45,678</h3>
                <p>Total Revenue</p>
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+8.2%</span>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon bg-warning">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <h3>1,234</h3>
                <p>Total Orders</p>
                <div class="stat-trend negative">
                    <i class="fas fa-arrow-down"></i>
                    <span>-3.1%</span>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon bg-info">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <h3>89.5%</h3>
                <p>Conversion Rate</p>
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+2.4%</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Charts and Tables Row -->
    <div class="dashboard-row">
        <!-- Revenue Chart -->
        <div class="dashboard-card chart-card">
            <div class="card-header">
                <h3>Revenue Overview</h3>
                <div class="card-actions">
                    <select class="form-select">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 3 months</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Recent Orders -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Recent Orders</h3>
                <a href="#" class="view-all-link">View All</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#12345</td>
                                <td>John Doe</td>
                                <td>$299.00</td>
                                <td><span class="badge badge-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#12346</td>
                                <td>Jane Smith</td>
                                <td>$149.50</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#12347</td>
                                <td>Mike Johnson</td>
                                <td>$89.99</td>
                                <td><span class="badge badge-info">Processing</span></td>
                            </tr>
                            <tr>
                                <td>#12348</td>
                                <td>Sarah Wilson</td>
                                <td>$199.00</td>
                                <td><span class="badge badge-success">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Row -->
    <div class="dashboard-row">
        <!-- Top Products -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Top Products</h3>
            </div>
            <div class="card-body">
                <div class="product-list">
                    <div class="product-item">
                        <div class="product-info">
                            <div class="product-image">
                                <img src="/placeholder.svg?height=40&width=40" alt="Product">
                            </div>
                            <div class="product-details">
                                <h6>Wireless Headphones</h6>
                                <p>Electronics</p>
                            </div>
                        </div>
                        <div class="product-stats">
                            <span class="product-sales">$12,450</span>
                            <span class="product-units">245 sold</span>
                        </div>
                    </div>
                    
                    <div class="product-item">
                        <div class="product-info">
                            <div class="product-image">
                                <img src="/placeholder.svg?height=40&width=40" alt="Product">
                            </div>
                            <div class="product-details">
                                <h6>Smart Watch</h6>
                                <p>Wearables</p>
                            </div>
                        </div>
                        <div class="product-stats">
                            <span class="product-sales">$8,920</span>
                            <span class="product-units">178 sold</span>
                        </div>
                    </div>
                    
                    <div class="product-item">
                        <div class="product-info">
                            <div class="product-image">
                                <img src="/placeholder.svg?height=40&width=40" alt="Product">
                            </div>
                            <div class="product-details">
                                <h6>Laptop Stand</h6>
                                <p>Accessories</p>
                            </div>
                        </div>
                        <div class="product-stats">
                            <span class="product-sales">$5,670</span>
                            <span class="product-units">134 sold</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Activity Feed -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Recent Activity</h3>
            </div>
            <div class="card-body">
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon bg-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>New user registered</strong></p>
                            <small>John Doe joined the platform</small>
                            <span class="activity-time">2 minutes ago</span>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>New order placed</strong></p>
                            <small>Order #12349 for $299.00</small>
                            <span class="activity-time">5 minutes ago</span>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-info">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Product updated</strong></p>
                            <small>Wireless Headphones price changed</small>
                            <span class="activity-time">15 minutes ago</span>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Low stock alert</strong></p>
                            <small>Smart Watch has only 5 units left</small>
                            <span class="activity-time">1 hour ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Revenue Chart
const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Revenue',
            data: [12000, 19000, 15000, 25000, 22000, 30000],
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>
@endpush
