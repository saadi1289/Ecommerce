<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <!-- Background Animation -->
        <div class="bg-animation">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
                <div class="shape shape-5"></div>
                <div class="shape shape-6"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="auth-content">
            <!-- Left Side - Branding -->
            <div class="auth-brand">
                <div class="brand-content">
                    <div class="logo-container">
                        <div class="logo-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <h1 class="brand-name">{{ config('app.name', 'Store') }}</h1>
                    </div>
                    <p class="brand-tagline">Join thousands of happy customers</p>
                    
                    <!-- Animated Illustration -->
                    <div class="illustration">
                        <div class="user-avatar">
                            <div class="avatar-circle">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="welcome-badge">
                                <span>Welcome!</span>
                            </div>
                        </div>
                        <div class="floating-benefits">
                            <div class="benefit benefit-1">
                                <i class="fas fa-shipping-fast"></i>
                                <span>Free Shipping</span>
                            </div>
                            <div class="benefit benefit-2">
                                <i class="fas fa-shield-alt"></i>
                                <span>Secure</span>
                            </div>
                            <div class="benefit benefit-3">
                                <i class="fas fa-gift"></i>
                                <span>Rewards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="auth-form-container">
                <div class="auth-form">
                    <div class="form-header">
                        <h2>Create Account</h2>
                        <p>Fill in your information to get started</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="register-form">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-user input-icon"></i>
                                    <input 
                                        type="text" 
                                        name="first_name" 
                                        id="first_name" 
                                        class="form-input @error('first_name') error @enderror" 
                                        value="{{ old('first_name') }}" 
                                        required 
                                        autocomplete="given-name" 
                                        autofocus
                                        placeholder=" "
                                    >
                                    <label for="first_name" class="form-label">First Name</label>
                                    <div class="input-border"></div>
                                </div>
                                @error('first_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-user input-icon"></i>
                                    <input 
                                        type="text" 
                                        name="last_name" 
                                        id="last_name" 
                                        class="form-input @error('last_name') error @enderror" 
                                        value="{{ old('last_name') }}" 
                                        required 
                                        autocomplete="family-name"
                                        placeholder=" "
                                    >
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <div class="input-border"></div>
                                </div>
                                @error('last_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <i class="fas fa-envelope input-icon"></i>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-input @error('email') error @enderror" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
                                    placeholder=" "
                                >
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-border"></div>
                            </div>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <i class="fas fa-phone input-icon"></i>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phone" 
                                    class="form-input @error('phone') error @enderror" 
                                    value="{{ old('phone') }}" 
                                    autocomplete="tel"
                                    placeholder=" "
                                >
                                <label for="phone" class="form-label">Phone Number (Optional)</label>
                                <div class="input-border"></div>
                            </div>
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <i class="fas fa-lock input-icon"></i>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-input @error('password') error @enderror" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder=" "
                                >
                                <label for="password" class="form-label">Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="input-border"></div>
                            </div>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill"></div>
                                </div>
                                <span class="strength-text">Password strength</span>
                            </div>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <i class="fas fa-lock input-icon"></i>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    class="form-input" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder=" "
                                >
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="input-border"></div>
                            </div>
                        </div>

                        <div class="form-options">
                            <label class="checkbox-container">
                                <input type="checkbox" name="terms" required>
                                <span class="checkmark"></span>
                                <span class="checkbox-text">
                                    I agree to the <a href="#" class="terms-link">Terms of Service</a> and 
                                    <a href="#" class="terms-link">Privacy Policy</a>
                                </span>
                            </label>
                            
                            <label class="checkbox-container">
                                <input type="checkbox" name="newsletter">
                                <span class="checkmark"></span>
                                <span class="checkbox-text">Subscribe to our newsletter for updates and offers</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-primary">
                            <span class="btn-text">Create Account</span>
                            <div class="btn-loader">
                                <div class="spinner"></div>
                            </div>
                            <i class="fas fa-arrow-right btn-icon"></i>
                        </button>
                    </form>

                    <div class="divider">
                        <span>or continue with</span>
                    </div>

                    <div class="social-login">
                        <button class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                        </button>
                        <button class="social-btn facebook-btn">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </button>
                    </div>

                    <div class="auth-switch">
                        <p>Already have an account? <a href="{{ route('login') }}" class="switch-link">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
