@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@push('styles')
<link href="{{ asset('css/admin-profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="profile-container">
    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-cover">
            <div class="cover-overlay"></div>
            <button class="change-cover-btn" id="changeCoverBtn">
                <i class="fas fa-camera"></i>
                Change Cover
            </button>
        </div>
        
        <div class="profile-info">
            <div class="profile-avatar-section">
                <div class="profile-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name ?? 'Admin User' }}&background=6366f1&color=fff&size=120" alt="Profile Avatar" id="profileImage">
                    <div class="avatar-overlay">
                        <i class="fas fa-camera"></i>
                    </div>
                    <input type="file" id="avatarInput" accept="image/*" style="display: none;">
                </div>
                <div class="profile-status">
                    <span class="status-indicator online"></span>
                    <span class="status-text">Online</span>
                </div>
            </div>
            
            <div class="profile-details">
                <h1 class="profile-name">{{ auth()->user()->name ?? 'Admin User' }}</h1>
                <p class="profile-role">System Administrator</p>
                <p class="profile-email">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-number">156</span>
                        <span class="stat-label">Products</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">2.4K</span>
                        <span class="stat-label">Orders</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label">Success Rate</span>
                    </div>
                </div>
            </div>
            
            <div class="profile-actions">
                <button class="btn btn-primary" id="editProfileBtn">
                    <i class="fas fa-edit"></i>
                    Edit Profile
                </button>
                <button class="btn btn-outline">
                    <i class="fas fa-cog"></i>
                    Settings
                </button>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="profile-content">
        <div class="profile-tabs">
            <button class="tab-btn active" data-tab="overview">
                <i class="fas fa-user"></i>
                Overview
            </button>
            <button class="tab-btn" data-tab="security">
                <i class="fas fa-shield-alt"></i>
                Security
            </button>
            <button class="tab-btn" data-tab="activity">
                <i class="fas fa-history"></i>
                Activity
            </button>
            <button class="tab-btn" data-tab="preferences">
                <i class="fas fa-sliders-h"></i>
                Preferences
            </button>
        </div>

        <!-- Overview Tab -->
        <div class="tab-content active" id="overview">
            <div class="content-grid">
                <div class="info-card">
                    <div class="card-header">
                        <h3>Personal Information</h3>
                        <button class="edit-btn" data-section="personal">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="info-group">
                            <label>Full Name</label>
                            <span class="info-value">{{ auth()->user()->name ?? 'Admin User' }}</span>
                        </div>
                        <div class="info-group">
                            <label>Email Address</label>
                            <span class="info-value">{{ auth()->user()->email ?? 'admin@example.com' }}</span>
                        </div>
                        <div class="info-group">
                            <label>Phone Number</label>
                            <span class="info-value">+1 (555) 123-4567</span>
                        </div>
                        <div class="info-group">
                            <label>Location</label>
                            <span class="info-value">New York, USA</span>
                        </div>
                        <div class="info-group">
                            <label>Joined Date</label>
                            <span class="info-value">{{ auth()->user()->created_at->format('M d, Y') ?? 'Jan 15, 2024' }}</span>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-header">
                        <h3>Professional Details</h3>
                        <button class="edit-btn" data-section="professional">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="info-group">
                            <label>Department</label>
                            <span class="info-value">Information Technology</span>
                        </div>
                        <div class="info-group">
                            <label>Position</label>
                            <span class="info-value">System Administrator</span>
                        </div>
                        <div class="info-group">
                            <label>Employee ID</label>
                            <span class="info-value">EMP-2024-001</span>
                        </div>
                        <div class="info-group">
                            <label>Manager</label>
                            <span class="info-value">John Smith</span>
                        </div>
                        <div class="info-group">
                            <label>Work Schedule</label>
                            <span class="info-value">Monday - Friday, 9:00 AM - 6:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-activity-card">
                <div class="card-header">
                    <h3>Recent Activity</h3>
                    <a href="#" class="view-all-link">View All</a>
                </div>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon bg-success">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <p>Added new product "Wireless Headphones"</p>
                            <span class="activity-time">2 hours ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-info">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-content">
                            <p>Updated user permissions for Marketing team</p>
                            <span class="activity-time">5 hours ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <p>System maintenance completed</p>
                            <span class="activity-time">1 day ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tab -->
        <div class="tab-content" id="security">
            <div class="content-grid">
                <div class="info-card">
                    <div class="card-header">
                        <h3>Password & Authentication</h3>
                    </div>
                    <div class="card-body">
                        <div class="security-item">
                            <div class="security-info">
                                <h4>Password</h4>
                                <p>Last changed 30 days ago</p>
                            </div>
                            <button class="btn btn-outline" id="changePasswordBtn">Change Password</button>
                        </div>
                        <div class="security-item">
                            <div class="security-info">
                                <h4>Two-Factor Authentication</h4>
                                <p>Add an extra layer of security</p>
                            </div>
                            <div class="toggle-switch">
                                <input type="checkbox" id="twoFactorToggle">
                                <label for="twoFactorToggle"></label>
                            </div>
                        </div>
                        <div class="security-item">
                            <div class="security-info">
                                <h4>Login Notifications</h4>
                                <p>Get notified of new sign-ins</p>
                            </div>
                            <div class="toggle-switch">
                                <input type="checkbox" id="loginNotifications" checked>
                                <label for="loginNotifications"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-header">
                        <h3>Active Sessions</h3>
                    </div>
                    <div class="card-body">
                        <div class="session-item current">
                            <div class="session-info">
                                <div class="session-device">
                                    <i class="fas fa-desktop"></i>
                                    <span>Current Session - Chrome on Windows</span>
                                </div>
                                <div class="session-details">
                                    <span>New York, USA</span>
                                    <span>Active now</span>
                                </div>
                            </div>
                            <span class="current-badge">Current</span>
                        </div>
                        <div class="session-item">
                            <div class="session-info">
                                <div class="session-device">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>iPhone Safari</span>
                                </div>
                                <div class="session-details">
                                    <span>New York, USA</span>
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-sm">Revoke</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Tab -->
        <div class="tab-content" id="activity">
            <div class="activity-filters">
                <select class="filter-select">
                    <option>All Activities</option>
                    <option>Login Activities</option>
                    <option>Product Changes</option>
                    <option>User Management</option>
                    <option>System Changes</option>
                </select>
                <input type="date" class="filter-date" value="{{ date('Y-m-d') }}">
            </div>

            <div class="activity-timeline">
                <div class="timeline-item">
                    <div class="timeline-marker bg-success"></div>
                    <div class="timeline-content">
                        <h4>Product Added</h4>
                        <p>Added new product "Wireless Bluetooth Speaker" to Electronics category</p>
                        <span class="timeline-time">Today, 2:30 PM</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-marker bg-info"></div>
                    <div class="timeline-content">
                        <h4>User Role Updated</h4>
                        <p>Changed user role for john.doe@example.com from Editor to Manager</p>
                        <span class="timeline-time">Today, 11:15 AM</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-marker bg-warning"></div>
                    <div class="timeline-content">
                        <h4>System Maintenance</h4>
                        <p>Performed scheduled database optimization and cache clearing</p>
                        <span class="timeline-time">Yesterday, 3:00 AM</span>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-marker bg-primary"></div>
                    <div class="timeline-content">
                        <h4>Login Activity</h4>
                        <p>Successful login from Chrome browser (IP: 192.168.1.100)</p>
                        <span class="timeline-time">Yesterday, 9:00 AM</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preferences Tab -->
        <div class="tab-content" id="preferences">
            <div class="content-grid">
                <div class="info-card">
                    <div class="card-header">
                        <h3>Appearance</h3>
                    </div>
                    <div class="card-body">
                        <div class="preference-item">
                            <label>Theme</label>
                            <select class="form-select">
                                <option>Light</option>
                                <option>Dark</option>
                                <option>Auto</option>
                            </select>
                        </div>
                        <div class="preference-item">
                            <label>Language</label>
                            <select class="form-select">
                                <option>English</option>
                                <option>Spanish</option>
                                <option>French</option>
                                <option>German</option>
                            </select>
                        </div>
                        <div class="preference-item">
                            <label>Timezone</label>
                            <select class="form-select">
                                <option>UTC-5 (Eastern Time)</option>
                                <option>UTC-8 (Pacific Time)</option>
                                <option>UTC+0 (GMT)</option>
                                <option>UTC+1 (Central European Time)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-header">
                        <h3>Notifications</h3>
                    </div>
                    <div class="card-body">
                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Email Notifications</h4>
                                <p>Receive email updates about important activities</p>
                            </div>
                            <div class="toggle-switch">
                                <input type="checkbox" id="emailNotifications" checked>
                                <label for="emailNotifications"></label>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Push Notifications</h4>
                                <p>Get browser notifications for real-time updates</p>
                            </div>
                            <div class="toggle-switch">
                                <input type="checkbox" id="pushNotifications">
                                <label for="pushNotifications"></label>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Weekly Reports</h4>
                                <p>Receive weekly summary reports via email</p>
                            </div>
                            <div class="toggle-switch">
                                <input type="checkbox" id="weeklyReports" checked>
                                <label for="weeklyReports"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal" id="editProfileModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Profile</h3>
            <button class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editProfileForm">
                @csrf
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="name" value="{{ auth()->user()->name ?? 'Admin User' }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email ?? 'admin@example.com' }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="+1 (555) 123-4567">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="New York, USA">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" name="department">
                        <option>Information Technology</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                        <option>Human Resources</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="System Administrator">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelEdit">Cancel</button>
            <button type="submit" form="editProfileForm" class="btn btn-primary">
                <span class="btn-text">Save Changes</span>
                <span class="btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </span>
            </button>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal" id="changePasswordModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Change Password</h3>
            <button class="modal-close" id="closePasswordModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="changePasswordForm">
                @csrf
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <div class="password-input">
                        <input type="password" id="currentPassword" name="current_password" required>
                        <button type="button" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="password-input">
                        <input type="password" id="newPassword" name="password" required>
                        <button type="button" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-bar">
                            <div class="strength-fill"></div>
                        </div>
                        <span class="strength-text">Password strength</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password</label>
                    <div class="password-input">
                        <input type="password" id="confirmPassword" name="password_confirmation" required>
                        <button type="button" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelPasswordChange">Cancel</button>
            <button type="submit" form="changePasswordForm" class="btn btn-primary">
                <span class="btn-text">Update Password</span>
                <span class="btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </span>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin-profile.js') }}"></script>
@endpush
