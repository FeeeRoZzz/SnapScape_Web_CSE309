function toggleForm(formType) {
    const container = document.querySelector('.container');
    const formsContainer = document.querySelector('.forms-container');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');

    if (formType === 'signup') {
        formsContainer.style.transform = 'translateX(-50%)';
        loginForm.classList.remove('active');
        signupForm.classList.add('active');
    } else {
        formsContainer.style.transform = 'translateX(0)';
        signupForm.classList.remove('active');
        loginForm.classList.add('active');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.auth-form');
    
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const inputs = form.querySelectorAll('input');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    isValid = false;
                    input.parentElement.classList.add('invalid');
                } else {
                    input.parentElement.classList.remove('invalid');
                }
            });
            
            if (isValid) {
                // Simulate form submission
                console.log('Form submitted:', Object.fromEntries(new FormData(form)));
                alert('Form submitted successfully!');
                form.reset();
            }
        });
    });
});