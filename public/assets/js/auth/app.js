document.addEventListener('DOMContentLoaded', function() {
    // Password toggle
    const toggleBtn = document.getElementById('togglePassword');
    if (toggleBtn) toggleBtn.addEventListener('click', function() {
        const input = document.querySelector('input[name="password"]');
        if (!input) return;
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        this.innerHTML = type === 'password'
            ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
            : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
    });

    // Button cursor glow
    document.querySelectorAll('.login-button').forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const rect = btn.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            
            // Set position as percentages so it stays proportional
            btn.style.setProperty('--x', `${x}%`);
            btn.style.setProperty('--y', `${y}%`);
        });
        

    });
});