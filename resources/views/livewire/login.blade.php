<div class="container">
    <!-- LEFT PANEL -->
    <div class="left-panel nocopy">
        <div class="hero-content">
            <h1 class="hero-title">
                KynoCloud<br>
                <span class="floating">Reliable</span> Hosting
            </h1>

            <p class="hero-subtitle">
                High-performance hosting built for speed, stability, and uptime. Deploy fast, scale easily, and stay online without babysitting servers.
            </p>

            <div class="features nocopy">
                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">High uptime & DDoS protection</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">Full control panel access</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">Enterprise-grade hardware</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">Real Time Feedback</div>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
        <div class="login-header nocopy">
            <div class="logo">
                <div class="logo-icon"></div>
                <div class="logo-text"><b>Kyno Cloud</b></div>
            </div>

            <h2 class="login-title">Sign in to your dashboard</h2>
            <p class="login-register" class="nocopy"> Don't have an account? <b><a href="/register" class="register-link nocopy">Register</a></b></p>
        </div>

        <!-- 🔥 SINGLE FORM ONLY -->
        <form wire:submit.prevent="authenticate">

            <div class="form-group">
                <label class="form-label nocopy">Email Address</label>
                <input
                    type="email"
                    class="form-input"
                    placeholder="you@example.com"
                    wire:model.defer="email"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label nocopy">Password</label>
                <input
                    type="password"
                    class="form-input"
                    placeholder="Enter your password"
                    wire:model.defer="password"
                    required
                >
            </div>

            <div class="form-options nocopy">
                <label class="remember-me">
                    <input type="checkbox" class="checkbox" wire:model="remember">
                    <span class="checkbox-label">Remember me</span>
                </label>

                <a href="#" class="forgot-password nocopy">Forgot password?</a>
            </div>

            <button type="submit " class="login-button nocopy">
                Enter Console
            </button>

        </form>
    </div>


</div>

