const registrationForm = document.getElementById('registrationForm');
const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navLinks = document.querySelector('.nav-links');
const header = document.querySelector('.header');

document.addEventListener('DOMContentLoaded', function() {
    initializeEventListeners();
    initializeScrollEffects();
    initializeFormValidation();
    initializeSmoothScrolling();
});

function initializeEventListeners() {
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    }

    if (registrationForm) {
        registrationForm.addEventListener('submit', handleFormSubmission);
    }

    const formInputs = document.querySelectorAll('#registrationForm input, #registrationForm select');
    formInputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearFieldError);
    });

    const phoneInput = document.getElementById('telefone');
    if (phoneInput) {
        phoneInput.addEventListener('input', formatPhoneNumber);
    }
}

function toggleMobileMenu() {
    navLinks.classList.toggle('mobile-open');
    const icon = mobileMenuToggle.querySelector('i');
    
    if (navLinks.classList.contains('mobile-open')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
}

function initializeScrollEffects() {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        revealOnScroll();
    });
}

function revealOnScroll() {
    const reveals = document.querySelectorAll('.reveal');
    
    reveals.forEach(element => {
        const windowHeight = window.innerHeight;
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < windowHeight - elementVisible) {
            element.classList.add('active');
        }
    });
}

function initializeSmoothScrolling() {
    const navLinks = document.querySelectorAll('a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                const headerHeight = header.offsetHeight;
                const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                if (navLinks.classList.contains('mobile-open')) {
                    toggleMobileMenu();
                }
            }
        });
    });
}

function initializeFormValidation() {
    const requiredFields = document.querySelectorAll('#registrationForm [required]');
    requiredFields.forEach(field => {
        const label = document.querySelector(`label[for="${field.id}"]`);
        if (label && !label.textContent.includes('*')) {
            label.innerHTML += ' <span class="required-indicator">*</span>';
        }
    });
}

function validateField(event) {
    const field = event.target;
    const fieldName = field.name;
    const fieldValue = field.value.trim();
    
    clearFieldError(event);
    
    let isValid = true;
    let errorMessage = '';
    
    if (field.hasAttribute('required') && !fieldValue) {
        isValid = false;
        errorMessage = 'Este campo é obrigatório';
    }
    
    switch (fieldName) {
        case 'nome':
            if (fieldValue && fieldValue.length < 2) {
                isValid = false;
                errorMessage = 'Nome deve ter pelo menos 2 caracteres';
            } else if (fieldValue && !/^[a-zA-ZÀ-ÿ\s]+$/.test(fieldValue)) {
                isValid = false;
                errorMessage = 'Nome deve conter apenas letras e espaços';
            }
            break;
            
        case 'email':
            if (fieldValue && !isValidEmail(fieldValue)) {
                isValid = false;
                errorMessage = 'Por favor, insira um e-mail válido';
            }
            break;
            
        case 'telefone':
            if (fieldValue && !isValidPhone(fieldValue)) {
                isValid = false;
                errorMessage = 'Por favor, insira um telefone válido';
            }
            break;
            
        case 'experiencia':
            if (fieldValue === '') {
                isValid = false;
                errorMessage = 'Por favor, selecione uma área de experiência';
            }
            break;
            
        case 'termos':
            if (!field.checked) {
                isValid = false;
                errorMessage = 'Você deve concordar com os termos de uso';
            }
            break;
    }
    
    if (!isValid) {
        showFieldError(field, errorMessage);
    } else {
        showFieldSuccess(field);
    }
    
    return isValid;
}

function clearFieldError(event) {
    const field = event.target;
    field.classList.remove('error', 'success');
    
    const errorElement = field.parentNode.querySelector('.error-message');
    if (errorElement) {
        errorElement.style.display = 'none';
    }
    
    const successElement = field.parentNode.querySelector('.success-message');
    if (successElement) {
        successElement.style.display = 'none';
    }
}

function showFieldError(field, message) {
    field.classList.add('error');
    field.classList.remove('success');
    
    let errorElement = field.parentNode.querySelector('.error-message');
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        field.parentNode.appendChild(errorElement);
    }
    
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

function showFieldSuccess(field) {
    field.classList.add('success');
    field.classList.remove('error');
    
    const errorElement = field.parentNode.querySelector('.error-message');
    if (errorElement) {
        errorElement.style.display = 'none';
    }
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;
    return phoneRegex.test(phone);
}

function formatPhoneNumber(event) {
    const input = event.target;
    let value = input.value.replace(/\D/g, '');
    
    if (value.length <= 2) {
        value = value.replace(/(\d{0,2})/, '($1');
    } else if (value.length <= 7) {
        value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
    } else if (value.length <= 10) {
        value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    } else {
        value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    }
    
    input.value = value;
}

function handleFormSubmission(event) {
    event.preventDefault();
    
    const formInputs = document.querySelectorAll('#registrationForm input, #registrationForm select');
    let isFormValid = true;
    
    formInputs.forEach(input => {
        const fieldEvent = { target: input };
        if (!validateField(fieldEvent)) {
            isFormValid = false;
        }
    });
    
    const termosCheckbox = document.getElementById('termos');
    if (!termosCheckbox.checked) {
        const fieldEvent = { target: termosCheckbox };
        validateField(fieldEvent);
        isFormValid = false;
    }
    
    if (isFormValid) {
        submitForm();
    } else {
        const firstError = document.querySelector('.error');
        if (firstError) {
            firstError.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
            firstError.focus();
        }
        
        showNotification('Por favor, corrija os erros no formulário', 'error');
    }
}

function submitForm() {
    const submitButton = document.querySelector('.submit-button');
    const originalText = submitButton.innerHTML;
    
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
    submitButton.disabled = true;
    
    setTimeout(() => {
        registrationForm.reset();
        
        const formFields = document.querySelectorAll('#registrationForm input, #registrationForm select');
        formFields.forEach(field => {
            field.classList.remove('error', 'success');
        });
        
        const errorMessages = document.querySelectorAll('.error-message, .success-message');
        errorMessages.forEach(message => {
            message.style.display = 'none';
        });
        
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
        
        showSuccessModal();
        
    }, 2000);
}

function showSuccessModal() {
    const modalHTML = `
        <div class="success-modal-overlay" id="successModal">
            <div class="success-modal">
                <div class="success-modal-content">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Cadastro Realizado com Sucesso!</h3>
                    <p>
                        Obrigado por se inscrever no Seminário de Saúde e Segurança no Audiovisual.
                        Você receberá um e-mail de confirmação em breve com mais detalhes sobre o evento.
                    </p>
                    <div class="success-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar"></i>
                            <span>15 de Dezembro, 2025</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>8h às 18h</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Centro de Convenções - São Paulo</span>
                        </div>
                    </div>
                    <button class="modal-close-btn" onclick="closeSuccessModal()">
                        <i class="fas fa-times"></i>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    `;
    
    const modalStyles = `
        <style>
            .success-modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10000;
                animation: fadeIn 0.3s ease-out;
            }
            
            .success-modal {
                background: white;
                border-radius: 20px;
                padding: 3rem 2rem;
                max-width: 500px;
                width: 90%;
                text-align: center;
                animation: slideUp 0.4s ease-out;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            }
            
            .success-icon {
                font-size: 4rem;
                color: #27ae60;
                margin-bottom: 1.5rem;
            }
            
            .success-modal h3 {
                font-size: 1.8rem;
                font-weight: 700;
                color: var(--primary-black);
                margin-bottom: 1rem;
            }
            
            .success-modal p {
                color: #666;
                line-height: 1.6;
                margin-bottom: 2rem;
            }
            
            .success-details {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                margin-bottom: 2rem;
                padding: 1.5rem;
                background: #f8f9fa;
                border-radius: 10px;
            }
            
            .detail-item {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                color: var(--text-dark);
                font-weight: 500;
            }
            
            .detail-item i {
                color: var(--primary-yellow);
                width: 20px;
            }
            
            .modal-close-btn {
                background: var(--gradient-yellow);
                color: var(--primary-black);
                border: none;
                padding: 1rem 2rem;
                font-size: 1.1rem;
                font-weight: 600;
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                margin: 0 auto;
            }
            
            .modal-close-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @media (max-width: 480px) {
                .success-modal {
                    padding: 2rem 1.5rem;
                }
                
                .success-details {
                    padding: 1rem;
                }
                
                .detail-item {
                    font-size: 0.9rem;
                }
            }
        </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', modalStyles);
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    document.body.style.overflow = 'hidden';
    
    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSuccessModal();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSuccessModal();
        }
    });
}

function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.animation = 'fadeOut 0.3s ease-out';
        setTimeout(() => {
            modal.remove();
            document.body.style.overflow = '';
        }, 300);
    }
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    const notificationStyles = `
        <style>
            .notification {
                position: fixed;
                top: 100px;
                right: 20px;
                background: white;
                border-radius: 10px;
                padding: 1rem 1.5rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                z-index: 9999;
                animation: slideInRight 0.3s ease-out;
                max-width: 400px;
            }
            
            .notification-error {
                border-left: 4px solid #e74c3c;
            }
            
            .notification-success {
                border-left: 4px solid #27ae60;
            }
            
            .notification-content {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            
            .notification-error .notification-content i {
                color: #e74c3c;
            }
            
            .notification-success .notification-content i {
                color: #27ae60;
            }
            
            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(100%);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            @keyframes slideOutRight {
                from {
                    opacity: 1;
                    transform: translateX(0);
                }
                to {
                    opacity: 0;
                    transform: translateX(100%);
                }
            }
        </style>
    `;
    
    if (!document.querySelector('#notification-styles')) {
        const styleElement = document.createElement('style');
        styleElement.id = 'notification-styles';
        styleElement.textContent = notificationStyles.replace(/<\/?style>/g, '');
        document.head.appendChild(styleElement);
    }
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }, 5000);
}

const mobileMenuStyles = `
    @media (max-width: 768px) {
        .nav-links {
            position: fixed;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--primary-black);
            flex-direction: column;
            padding: 2rem;
            gap: 1rem;
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .nav-links.mobile-open {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        
        .header.scrolled {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(10px);
        }
    }
`;

const styleElement = document.createElement('style');
styleElement.textContent = mobileMenuStyles;
document.head.appendChild(styleElement);

const additionalStyles = `
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
`;

const additionalStyleElement = document.createElement('style');
additionalStyleElement.textContent = additionalStyles;
document.head.appendChild(additionalStyleElement);