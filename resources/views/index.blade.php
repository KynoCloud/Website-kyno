<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}</title>
    <link rel="icon" href="{{ asset('fav.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assets/css/index/app.css') }}">
    <script src="{{ asset('assets/js/index/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta property="og:title" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
    <meta property="og:description" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }} Invite only biolink page. Join our discord: https://discord.gg/kyno">
    <meta property="og:image" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}/fav.png">
    <meta property="og:url" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
    <meta name="theme-color" content="#5e9dfcff">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
    <meta name="twitter:description" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }} Invite only biolink page. Join our discord: https://discord.gg/kyno">
    <meta name="twitter:image" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}/fav.png">
    <meta name="twitter:domain" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
    <meta property="og:type" content="Biography">
    <meta property="og:image:width" content="150">
    <meta property="og:image:height" content="150">
    <meta name="twitter:image:width" content="150">
    <meta name="twitter:image:height" content="150">

</head>
<body>
    <div class="bg-animation"></div>
    <div class="particles" id="particles"></div>
    
    <!-- Main Container -->
    <div class="auth-container">
        <!-- Brand/Info Panel -->
        <div class="brand-panel">
            <div class="brand-content">
                <div class="logo">
                    <i class="fas fa-cloud"></i>
                    KynoCloud
                </div>
                
                <h1 class="brand-title">Reliable Hosting</h1>
                <p class="brand-subtitle">
                    High-performance hosting built for speed, stability, and uptime. 
                    Deploy fast, scale easily, and stay online without babysitting servers.
                </p>
                
                <ul class="features-list">
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-text">
                            <div class="feature-title">High Uptime & DDoS Protection</div>
                            <div class="feature-desc">99.9% SLA with enterprise-grade security</div>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="feature-text">
                            <div class="feature-title">Full Control Panel Access</div>
                            <div class="feature-desc">Complete server management from anywhere</div>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="feature-text">
                            <div class="feature-title">Enterprise-Grade Hardware</div>
                            <div class="feature-desc">SSD storage and high-performance CPUs</div>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="feature-text">
                            <div class="feature-title">Real-Time Feedback</div>
                            <div class="feature-desc">Monitor performance with live analytics</div>
                        </div>
                    </li>
                </ul>
                
                <div class="server-stats">
                    <div class="stat">
                        <span class="stat-value" id="uptime-stat">99.9%</span>
                        <span class="stat-label">Uptime</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value" id="server-stat">12,540</span>
                        <span class="stat-label">Active Servers</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value" id="support-stat">24/7</span>
                        <span class="stat-label">Support</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Auth Panel -->
        <div class="auth-panel">
            <div class="auth-content">
                <div class="auth-header">
                    <h2 class="auth-title" id="auth-title">Welcome Back</h2>
                    <p class="auth-subtitle" id="auth-subtitle">Sign in to access your server dashboard</p>
                </div>
                
                <div class="auth-tabs">
                    <button class="auth-tab active" id="login-tab">Login</button>
                    <button class="auth-tab" id="register-tab">Register</button>
                </div>
                
                <!-- Login Form -->
                <form class="auth-form active" id="login-form">
                    <div class="form-group">
                        <label class="form-label" for="login-email">Email Address</label>
                        <input type="email" id="login-email" class="form-input" placeholder="you@example.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="login-password">Password</label>
                        <div class="password-container">
                            <input type="password" id="login-password" class="form-input" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="login-toggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <div class="form-check">
                            <div class="checkbox" id="remember-check">
                                <i class="fas fa-check"></i>
                            </div>
                            <label class="checkbox-label" for="remember-check">Remember me</label>
                        </div>
                        <a href="#" class="forgot-link">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="login-submit">
                        <span class="btn-text">ENTER CONSOLE</span>
                        <span class="loading-spinner">
                            <i class="fas fa-circle-notch fa-spin"></i>
                        </span>
                    </button>
                    
                    <div class="auth-switch">
                        Don't have an account?
                        <span class="switch-link" id="to-register">Register</span>
                    </div>
                </form>
                
                <!-- Register Form -->
                <form class="auth-form" id="register-form">
                    <div class="form-group">
                        <label class="form-label" for="register-username">Username</label>
                        <input type="text" id="register-username" class="form-input" placeholder="Choose a username" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="register-email">Email Address</label>
                            <input type="email" id="register-email" class="form-input" placeholder="you@example.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="register-email-confirm">Confirm Email</label>
                            <input type="email" id="register-email-confirm" class="form-input" placeholder="you@example.com" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="register-password">Password</label>
                        <div class="password-container">
                            <input type="password" id="register-password" class="form-input" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="register-toggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="password-requirements">
                        <div class="requirements-title">Password must contain:</div>
                        <div class="requirement" id="req-length">
                            <i class="fas fa-circle"></i>
                            At least 8 characters
                        </div>
                        <div class="requirement" id="req-lowercase">
                            <i class="fas fa-circle"></i>
                            At least one lowercase letter
                        </div>
                        <div class="requirement" id="req-number">
                            <i class="fas fa-circle"></i>
                            At least one number
                        </div>
                        <div class="requirement" id="req-uppercase">
                            <i class="fas fa-circle"></i>
                            At least one uppercase letter
                        </div>
                    </div>
                    
                    <div class="form-check">
                        <div class="checkbox" id="terms-check">
                            <i class="fas fa-check"></i>
                        </div>
                        <label class="checkbox-label">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="register-submit">
                        <span class="btn-text">CREATE ACCOUNT</span>
                        <span class="loading-spinner">
                            <i class="fas fa-circle-notch fa-spin"></i>
                        </span>
                    </button>
                    
                    <div class="auth-switch">
                        Already have an account?
                        <span class="switch-link" id="to-login">Login</span>
                    </div>
                </form>
                
                <div class="form-footer">
                    By continuing, you agree to KynoCloud's <a href="#">Terms of Service</a> 
                    and acknowledge that you have read our <a href="#">Privacy Policy</a>.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
