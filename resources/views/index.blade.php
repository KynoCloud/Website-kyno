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

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bg-animation"></div>
    <div class="particles-container" id="particles"></div>
    
    <!-- Floating Elements -->
    <div class="floating-element" style="width: 400px; height: 400px; top: 10%; left: 5%;"></div>
    <div class="floating-element" style="width: 300px; height: 300px; bottom: 10%; right: 5%;"></div>
    
    <!-- Header -->
    <header>
        <div class="logo">
            <i class="fas fa-cloud"></i>
                KynoCloud
        </div>

        <nav class="welcome-nav">
            <div class="nav-container">
                <div class="logo">
                    <div class="logo-icon"></div>
                    <span class="logo-text nocopy">KynoCloud</span>
                </div>
                <div class="nav-links">
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="/login" class="nav-link">Login</a>
                    <a href="/register" class="nav-button">Start Free</a>
                </div>
            </div>
        </nav>

        <main class="welcome-main nocopy">
            <div class="container">
                <div class="left-panel">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Enterprise <span class="floating">Hosting Management</span> Platform
                        </h1>
                        <p class="hero-subtitle">
                            Powerful control panel for managing VPS servers, game hosting, and cloud infrastructure with ease.
                        </p>
                        
                        <div class="hero-buttons">
                            <a href="/register" class="primary-button">
                                <i class="fas fa-rocket"></i> Start Free Trial
                            </a>
                            <a href="#demo" class="secondary-button">
                                <i class="fas fa-play-circle"></i> View Demo
                            </a>
                        </div>

                        <div class="features">
                            <div class="feature">
                                <div class="feature-icon">⚡</div>
                                <div class="feature-content">
                                    <h3>VPS Management</h3>
                                    <p>Deploy and manage virtual private servers with full root access</p>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="feature-icon">🎮</div>
                                <div class="feature-content">
                                    <h3>Game Hosting</h3>
                                    <p>One-click game server deployment for Minecraft, FiveM, and more</p>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="feature-icon">💰</div>
                                <div class="feature-content">
                                    <h3>Billing System</h3>
                                    <p>Complete invoicing, payments, and subscription management</p>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="feature-icon">🛡️</div>
                                <div class="feature-content">
                                    <h3>Security First</h3>
                                    <p>Built-in fraud detection, abuse prevention, and DDoS protection</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-panel">
                    <div class="stats-card">
                        <div class="stats-header">
                            <h2>Platform Stats</h2>
                            <p>Real-time monitoring dashboard</p>
                        </div>
                        
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-icon">🚀</div>
                                <div class="stat-info">
                                    <h3>2,500+</h3>
                                    <p>Active Servers</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">👥</div>
                                <div class="stat-info">
                                    <h3>15,000+</h3>
                                    <p>Happy Customers</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">⚡</div>
                                <div class="stat-info">
                                    <h3>99.9%</h3>
                                    <p>Uptime SLA</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">🌍</div>
                                <div class="stat-info">
                                    <h3>12</h3>
                                    <p>Global Locations</p>
                                </div>
                            </div>
                        </div>

                        <div class="demo-preview">
                            <div class="demo-header">
                                <div class="demo-dots">
                                    <span class="demo-dot red"></span>
                                    <span class="demo-dot yellow"></span>
                                    <span class="demo-dot green"></span>
                                </div>
                                <span>spherepanel.kynocloud.com</span>
                            </div>
                            <div class="demo-content">
                                <div class="demo-line"></div>
                                <div class="demo-line short"></div>
                                <div class="demo-line"></div>
                                <div class="demo-line short"></div>
                                <div class="demo-line"></div>
                            </div>
                        </div>

                        <div class="cta-section">
                            <h3>Ready to get started?</h3>
                            <p>Join thousands of businesses using our platform</p>
                            <div class="cta-buttons">
                                <a href="/register" class="cta-button primary">
                                    <i class="fas fa-user-plus"></i> Create Account
                                </a>
                                <a href="/login" class="cta-button secondary">
                                    <i class="fas fa-sign-in-alt"></i> Sign In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="welcome-footer">
            <div class="footer-content">
                <p>© 2024 KynoCloud. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Documentation</a>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>