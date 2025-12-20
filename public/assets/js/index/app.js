// ============= WELCOME PAGE INTERACTIONS =============

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all welcome page functionality
    initWelcomePage();
});

function initWelcomePage() {
    // Initialize button glow effects
    initButtonGlowEffects();
    
    // Initialize smooth scrolling
    initSmoothScrolling();
    
    // Initialize stats counter animation
    initStatsCounter();
    
    // Initialize feature hover effects
    initFeatureHoverEffects();
    
    // Initialize typing effect for demo
    initTypingEffect();
}

// ============= BUTTON GLOW EFFECTS =============
function initButtonGlowEffects() {
    const buttons = document.querySelectorAll('.primary-button, .nav-button, .cta-button.primary');
    
    buttons.forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const rect = btn.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            
            btn.style.setProperty('--mouse-x', `${x}%`);
            btn.style.setProperty('--mouse-y', `${y}%`);
        });
        
        // Add CSS for dynamic glow
        const style = document.createElement('style');
        style.textContent = `
            .primary-button, .nav-button, .cta-button.primary {
                position: relative;
                overflow: hidden;
                z-index: 1;
            }
            
            .primary-button::before, .nav-button::before, .cta-button.primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(
                    circle 150px at var(--mouse-x, 50%) var(--mouse-y, 50%),
                    rgba(255, 170, 64, 0.4) 0%,
                    rgba(255, 170, 64, 0.2) 25%,
                    transparent 70%
                );
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: -1;
                pointer-events: none;
            }
            
            .primary-button:hover::before, .nav-button:hover::before, .cta-button.primary:hover::before {
                opacity: 1;
            }
        `;
        document.head.appendChild(style);
    });
}

// ============= SMOOTH SCROLLING =============
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ============= STATS COUNTER ANIMATION =============
function initStatsCounter() {
    const statElements = document.querySelectorAll('.stat-info h3');
    
    if (!isElementInViewport(document.querySelector('.stats-card'))) {
        return;
    }
    
    statElements.forEach(stat => {
        const target = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
        const suffix = stat.textContent.replace(/[0-9]/g, '');
        
        animateCounter(stat, 0, target, 1500, suffix);
    });
}

function animateCounter(element, start, end, duration, suffix) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        
        element.textContent = current.toLocaleString() + suffix;
        
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// ============= FEATURE HOVER EFFECTS =============
function initFeatureHoverEffects() {
    const features = document.querySelectorAll('.feature');
    
    features.forEach(feature => {
        feature.addEventListener('mousemove', e => {
            const rect = feature.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            feature.style.setProperty('--feature-x', `${x}px`);
            feature.style.setProperty('--feature-y', `${y}px`);
        });
        
        // Add CSS for feature glow
        const style = document.createElement('style');
        style.textContent = `
            .feature {
                position: relative;
                overflow: hidden;
            }
            
            .feature::after {
                content: '';
                position: absolute;
                top: var(--feature-y, 0);
                left: var(--feature-x, 0);
                width: 200px;
                height: 200px;
                background: radial-gradient(
                    circle 100px at center,
                    rgba(59, 130, 246, 0.1) 0%,
                    transparent 70%
                );
                transform: translate(-50%, -50%);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                z-index: 1;
            }
            
            .feature:hover::after {
                opacity: 1;
            }
        `;
        document.head.appendChild(style);
    });
}

// ============= TYPING EFFECT FOR DEMO =============
function initTypingEffect() {
    const demoContent = document.querySelector('.demo-content');
    if (!demoContent) return;
    
    const lines = [
        "Initializing KynoCloud Platform...",
        "✓ Authentication System Ready",
        "✓ Database Connection Established",
        "✓ API Gateway Online",
        "✓ Load Balancer Configured",
        "✓ Security Layer Activated",
        "Platform ready. Welcome to KynoCloud."
    ];
    
    // Clear demo content
    demoContent.innerHTML = '';
    
    // Create lines with typing effect
    lines.forEach((line, index) => {
        const lineElement = document.createElement('div');
        lineElement.className = 'demo-line typing-line';
        demoContent.appendChild(lineElement);
        
        // Add typing effect with delay
        setTimeout(() => {
            typeWriter(lineElement, line, 0);
        }, index * 1000);
    });
}

function typeWriter(element, text, i) {
    if (i < text.length) {
        element.textContent += text.charAt(i);
        setTimeout(() => {
            typeWriter(element, text, i + 1);
        }, 30);
    }
}

// ============= SCROLL REVEAL ANIMATIONS =============
function initScrollReveal() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, observerOptions);
    
    // Observe elements to reveal
    document.querySelectorAll('.feature, .stat-item, .cta-section').forEach(el => {
        observer.observe(el);
    });
}

// ============= PARTICLE BACKGROUND =============
function initParticles() {
    const canvas = document.createElement('canvas');
    canvas.className = 'particle-canvas';
    document.querySelector('.background-effects').appendChild(canvas);
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    const particles = [];
    const particleCount = 50;
    
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 1;
            this.speedX = Math.random() * 0.5 - 0.25;
            this.speedY = Math.random() * 0.5 - 0.25;
            this.color = Math.random() > 0.5 ? 'rgba(59, 130, 246, 0.3)' : 'rgba(255, 170, 64, 0.3)';
        }
        
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            
            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }
        
        draw() {
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    // Create particles
    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }
    
    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        
        requestAnimationFrame(animateParticles);
    }
    
    animateParticles();
    
    // Handle resize
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

// ============= INITIALIZE EVERYTHING =============
function initWelcomePage() {
    initButtonGlowEffects();
    initSmoothScrolling();
    initStatsCounter();
    initFeatureHoverEffects();
    initTypingEffect();
    initScrollReveal();
    initParticles();
    
    // Listen for scroll to trigger stats counter
    window.addEventListener('scroll', () => {
        if (isElementInViewport(document.querySelector('.stats-card'))) {
            initStatsCounter();
        }
    });
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', initWelcomePage);