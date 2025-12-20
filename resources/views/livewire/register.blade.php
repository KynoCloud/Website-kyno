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
                <div class="logo-text"><b>KynoCloud</b></div>
            </div>

            <h2 class="login-title">Start your journey!</h2>
            <p class="login-register nocopy">
                Already Have an Account?
                <b><a href="/login" class="register-link nocopy">Login</a></b>
            </p>
        </div>

        <!-- 🔥 SINGLE FORM ONLY -->
        <form wire:submit.prevent="authenticate" novalidate autocomplete="off">

            <!-- USERNAME -->
            <div class="form-group">
                <label class="form-label nocopy" for="username">Username</label>
                <input
                    id="username"
                    type="text"
                    class="form-input @error('username') error @enderror"
                    placeholder="Choose a username"
                    wire:model.defer="username"
                    autocomplete="off"
                >
                @error('username')
                    <span class="error-message nocopy">{{ $message }}</span>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label class="form-label nocopy" for="email">Email Address</label>
                <input
                    id="email"
                    type="email"
                    class="form-input @error('email') error @enderror"
                    placeholder="you@example.com"
                    wire:model.defer="email"
                    autocomplete="off"
                >
                @error('email')
                    <span class="error-message nocopy">{{ $message }}</span>
                @enderror
            </div>

            <!-- CONFIRM EMAIL -->
            <div class="form-group">
                <label class="form-label nocopy" for="confirm_email">Confirm Email Address</label>
                <input
                    id="confirm_email"
                    type="email"
                    class="form-input @error('confirmEmail') error @enderror"
                    placeholder="you@example.com"
                    wire:model.defer="confirmEmail"
                    autocomplete="off"
                >
                @error('confirmEmail')
                    <span class="error-message nocopy">{{ $message }}</span>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label class="form-label nocopy" for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    class="form-input @error('password') error @enderror"
                    placeholder="Enter your password"
                    wire:model.defer="password"
                    autocomplete="new-password"
                >
                @error('password')
                    <span class="error-message nocopy">{{ $message }}</span>
                @enderror
            </div>

            <div class="password-hint nocopy">
                <p><b>Password must contain:</b></p>
                <ul>
                    <li>- At least 8 characters</li>
                    <li>- At least one lowercase letter</li>
                    <li>- At least one number</li>
                </ul>
            </div>

            <!-- TERMS OF SERVICE -->
            <div class="form-options nocopy">
                <label class="remember-me">
                    <input type="checkbox" class="checkbox" wire:model="tos">
                    <span class="checkbox-label">I agree to the <a href="/terms" target="_blank">Terms of Service</a></span>
                </label>
                @error('tos')
                    <span class="error-message nocopy">{{ $message }}</span>
                @enderror
            </div>

            

            <button type="submit" class="login-button nocopy">
                Register
            </button>

        </form>
    </div>
</div>