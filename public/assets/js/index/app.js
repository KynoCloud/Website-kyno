function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 40;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        const size = Math.random() * 80 + 20;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const duration = Math.random() * 20 + 15;
        const delay = Math.random() * 5;
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${left}%`;
        particle.style.top = `${top}%`;
        particle.style.animation = `float ${duration}s ease-in-out ${delay}s infinite`;
        
        container.appendChild(particle);
    }
}

// Tab switching functionality
const loginTab = document.getElementById('login-tab');
const registerTab = document.getElementById('register-tab');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const authTitle = document.getElementById('auth-title');
const authSubtitle = document.getElementById('auth-subtitle');
const toRegister = document.getElementById('to-register');
const toLogin = document.getElementById('to-login');

function switchToLogin() {
    loginTab.classList.add('active');
    registerTab.classList.remove('active');
    loginForm.classList.add('active');
    registerForm.classList.remove('active');
    authTitle.textContent = 'Welcome Back';
    authSubtitle.textContent = 'Sign in to access your server dashboard';
}

function switchToRegister() {
    registerTab.classList.add('active');
    loginTab.classList.remove('active');
    registerForm.classList.add('active');
    loginForm.classList.remove('active');
    authTitle.textContent = 'Start Your Journey';
    authSubtitle.textContent = 'Create your KynoCloud account in seconds';
}

loginTab.addEventListener('click', switchToLogin);
toLogin.addEventListener('click', switchToLogin);
registerTab.addEventListener('click', switchToRegister);
toRegister.addEventListener('click', switchToRegister);

// Password toggle functionality
function setupPasswordToggle(toggleId, passwordId) {
    const toggle = document.getElementById(toggleId);
    const password = document.getElementById(passwordId);
    let isVisible = false;
    
    toggle.addEventListener('click', () => {
        isVisible = !isVisible;
        password.type = isVisible ? 'text' : 'password';
        toggle.innerHTML = isVisible ? 
            '<i class="fas fa-eye-slash"></i>' : 
            '<i class="fas fa-eye"></i>';
    });
}

setupPasswordToggle('login-toggle', 'login-password');
setupPasswordToggle('register-toggle', 'register-password');

// Checkbox functionality
function setupCheckbox(checkboxId) {
    const checkbox = document.getElementById(checkboxId);
    
    checkbox.addEventListener('click', () => {
        checkbox.classList.toggle('checked');
    });
}

setupCheckbox('remember-check');
setupCheckbox('terms-check');

// Password validation
const passwordInput = document.getElementById('register-password');
const reqLength = document.getElementById('req-length');
const reqLowercase = document.getElementById('req-lowercase');
const reqNumber = document.getElementById('req-number');
const reqUppercase = document.getElementById('req-uppercase');

function validatePassword(password) {
    const hasLength = password.length >= 8;
    const hasLowercase = /[a-z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasUppercase = /[A-Z]/.test(password);
    
    // Update requirement indicators
    updateRequirement(reqLength, hasLength);
    updateRequirement(reqLowercase, hasLowercase);
    updateRequirement(reqNumber, hasNumber);
    updateRequirement(reqUppercase, hasUppercase);
    
    return hasLength && hasLowercase && hasNumber && hasUppercase;
}

function updateRequirement(element, isValid) {
    if (isValid) {
        element.classList.add('valid');
        element.innerHTML = '<i class="fas fa-check-circle"></i> ' + element.textContent.replace('•', '');
    } else {
        element.classList.remove('valid');
        element.innerHTML = '<i class="fas fa-circle"></i> ' + element.textContent.replace('✓', '');
    }
}

passwordInput.addEventListener('input', () => {
    validatePassword(passwordInput.value);
});

// Email confirmation validation
const emailInput = document.getElementById('register-email');
const emailConfirmInput = document.getElementById('register-email-confirm');

function validateEmailConfirmation() {
    if (emailInput.value && emailConfirmInput.value) {
        if (emailInput.value === emailConfirmInput.value) {
            emailConfirmInput.style.borderColor = 'var(--success)';
            return true;
        } else {
            emailConfirmInput.style.borderColor = 'var(--error)';
            return false;
        }
    }
    return false;
}

emailInput.addEventListener('input', validateEmailConfirmation);
emailConfirmInput.addEventListener('input', validateEmailConfirmation);

// Form submission with loading state
function setupFormSubmit(formId, submitId, successMessage) {
    const form = document.getElementById(formId);
    const submitBtn = document.getElementById(submitId);
    
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Show loading state
        submitBtn.classList.add('loading');
        
        // Simulate API call
        setTimeout(() => {
            submitBtn.classList.remove('loading');
            
            // Show success message
            const originalText = submitBtn.querySelector('.btn-text').textContent;
            submitBtn.querySelector('.btn-text').textContent = successMessage;
            submitBtn.style.background = 'var(--success)';
            
            // Reset after 2 seconds
            setTimeout(() => {
                submitBtn.querySelector('.btn-text').textContent = originalText;
                submitBtn.style.background = '';
                
                // For demo purposes, switch to login after registration
                if (formId === 'register-form') {
                    switchToLogin();
                }
            }, 2000);
        }, 1500);
    });
}

setupFormSubmit('login-form', 'login-submit', 'ACCESS GRANTED');
setupFormSubmit('register-form', 'register-submit', 'ACCOUNT CREATED');

// Animated stats
function animateStat(elementId, finalValue, suffix = '') {
    const element = document.getElementById(elementId);
    let currentValue = 0;
    const increment = finalValue / 50;
    
    const timer = setInterval(() => {
        currentValue += increment;
        if (currentValue >= finalValue) {
            element.textContent = finalValue + suffix;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(currentValue) + suffix;
        }
    }, 30);
}

// Initialize everything
document.addEventListener('DOMContentLoaded', () => {
    createParticles();
    
    // Animate stats on load
    setTimeout(() => {
        animateStat('server-stat', 12540);
        animateStat('uptime-stat', 99.9, '%');
    }, 500);
    
    // Add some interactive effects to form inputs
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', () => {
            input.parentElement.style.transform = 'translateY(0)';
        });
    });
    
    // Feature item hover effects
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const icon = item.querySelector('.feature-icon');
            icon.style.transform = 'scale(1.1) rotate(5deg)';
        });
        
        item.addEventListener('mouseleave', () => {
            const icon = item.querySelector('.feature-icon');
            icon.style.transform = 'scale(1) rotate(0)';
        });
    });
});