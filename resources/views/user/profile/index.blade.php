@extends('user.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="page-container">
    <div class="page-header" data-aos="fade-up">
        <h1 class="page-title">Profile Settings</h1>
        <p class="page-subtitle">Manage your account information</p>
    </div>

    <div class="profile-container">
        <!-- Profile Card -->
        <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
            <div class="profile-header">
                <div class="profile-avatar-section">
                    <div class="profile-avatar">
                        <img src="/placeholder.svg?height=100&width=100" alt="Profile">
                        <button class="avatar-edit-btn">
                            <i class="icon-camera"></i>
                        </button>
                    </div>
                </div>
                
                <div class="profile-info">
                    <h2 class="profile-name">{{ Auth::user()->name ?? 'John Doe' }}</h2>
                    <p class="profile-email">{{ Auth::user()->email ?? 'john@example.com' }}</p>
                    <div class="profile-badges">
                        <span class="badge verified">Verified</span>
                        <span class="badge premium">Premium Member</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="form-card" data-aos="fade-up" data-aos-delay="300">
            <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
            </div>
            
            <form class="profile-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-input" value="John" placeholder="Enter first name">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-input" value="Doe" placeholder="Enter last name">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-input" value="john@example.com" placeholder="Enter email">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-input" value="+1 234 567 8900" placeholder="Enter phone">
                    </div>
                    
                    <div class="form-group full-width">
                        <label class="form-label">Bio</label>
                        <textarea class="form-textarea" rows="4" placeholder="Tell us about yourself"></textarea>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn-minimal secondary">Cancel</button>
                    <button type="submit" class="btn-minimal primary">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Security Settings -->
        <div class="form-card" data-aos="fade-up" data-aos-delay="400">
            <div class="card-header">
                <h3 class="card-title">Security Settings</h3>
            </div>
            
            <div class="security-options">
                <div class="security-item">
                    <div class="security-info">
                        <h4>Change Password</h4>
                        <p>Update your password to keep your account secure</p>
                    </div>
                    <button class="btn-minimal secondary">Change</button>
                </div>
                
                <div class="security-item">
                    <div class="security-info">
                        <h4>Two-Factor Authentication</h4>
                        <p>Add an extra layer of security to your account</p>
                    </div>
                    <div class="toggle-switch">
                        <input type="checkbox" id="2fa" class="toggle-input">
                        <label for="2fa" class="toggle-label"></label>
                    </div>
                </div>
                
                <div class="security-item">
                    <div class="security-info">
                        <h4>Login Notifications</h4>
                        <p>Get notified when someone logs into your account</p>
                    </div>
                    <div class="toggle-switch">
                        <input type="checkbox" id="notifications" class="toggle-input" checked>
                        <label for="notifications" class="toggle-label"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
