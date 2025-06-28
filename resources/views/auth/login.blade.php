<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
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
                    <p class="brand-tagline">Welcome back to your favorite shopping destination</p>
                    
                    <!-- Animated Illustration -->
                    <div class="illustration">
                        <div class="shopping-cart">
                            <div class="cart-body"></div>
                            <div class="cart-handle"></div>
                            <div class="cart-wheels">
                                <div class="wheel wheel-1"></div>
                                <div class="wheel wheel-2"></div>
                            </div>
                        </div>
                        <div class="floating-items">
                            <div class="item item-1"><i class="fas fa-laptop"></i></div>
                            <div class="item item-2"><i class="fas fa-headphones"></i></div>
                            <div class="item item-3"><i class="fas fa-mobile-alt"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="auth-form-container">
                <div class="auth-form">
                    <div class="form-header">
                        <h2>Sign In</h2>
                        <p>Enter your credentials to access your account</p>
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

                    @if (session('status'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        
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
                                    autofocus
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
                                <i class="fas fa-lock input-icon"></i>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-input @error('password') error @enderror" 
                                    required 
                                    autocomplete="current-password"
                                    placeholder=" "
                                >
                                <label for="password" class="form-label">Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="input-border"></div>
                            </div>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-options">
                            <label class="checkbox-container">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                <span class="checkbox-text">Remember me</span>
                            </label>
                            
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-primary">
                            <span class="btn-text">Sign In</span>
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
                        <p>Don't have an account? <a href="{{ route('register') }}" class="switch-link">Create one</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
