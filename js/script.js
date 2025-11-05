jQuery(document).ready(function($) {
    const registrationForm = $('#registrationForm');
    const mobileMenuToggle = $('.mobile-menu-toggle');
    const navLinks = $('.nav-links');
    const header = $('.header');

    initializeEventListeners();
    initializeScrollEffects();
    initializeFormValidation();
    initializeSmoothScrolling();
    initializeFormConditionalFields();

    function initializeEventListeners() {
        if (mobileMenuToggle.length) {
            mobileMenuToggle.on('click', toggleMobileMenu);
        }

        if (registrationForm.length) {
            registrationForm.on('submit', handleFormSubmission);
        }

        const formInputs = $('#registrationForm input, #registrationForm select');
        formInputs.each(function() {
            $(this).on('blur', validateField);
            $(this).on('input', clearFieldError);
        });

        const phoneInput = $('#telefone');
        if (phoneInput.length) {
            phoneInput.on('input', formatPhoneNumber);
        }
    }

    function initializeFormConditionalFields() {
        const areaAtuacaoSelect = $('#areaAtuacao');
        const audiovisualSection = $('#audiovisualSection');
        const outroAreaGroup = $('#outroAreaGroup');
        const funcaoAudiovisualSelect = $('#funcaoAudiovisual');
        const outroAudiovisualGroup = $('#outroAudiovisualGroup');

        // Show/hide other area field
        areaAtuacaoSelect.on('change', function() {
            if ($(this).val() === 'outro') {
                outroAreaGroup.slideDown(300);
                $('#outroArea').attr('required', true);
            } else {
                outroAreaGroup.slideUp(300);
                $('#outroArea').removeAttr('required').val('');
            }

            // Show/hide audiovisual section
            if ($(this).val() === 'audiovisual') {
                audiovisualSection.slideDown(300);
                $('#temDRT').attr('required', true);
                funcaoAudiovisualSelect.attr('required', true);
            } else {
                audiovisualSection.slideUp(300);
                $('#temDRT').removeAttr('required');
                funcaoAudiovisualSelect.removeAttr('required').val('');
                outroAudiovisualGroup.slideUp(300);
                $('#outroAudiovisual').removeAttr('required').val('');
            }
        });

        // Show/hide other audiovisual function field
        funcaoAudiovisualSelect.on('change', function() {
            if ($(this).val() === 'outro_audiovisual') {
                outroAudiovisualGroup.slideDown(300);
                $('#outroAudiovisual').attr('required', true);
            } else {
                outroAudiovisualGroup.slideUp(300);
                $('#outroAudiovisual').removeAttr('required').val('');
            }
        });
    }

    function toggleMobileMenu() {
        navLinks.toggleClass('mobile-open');
        const icon = mobileMenuToggle.find('i');
        
        if (navLinks.hasClass('mobile-open')) {
            icon.removeClass('fa-bars').addClass('fa-times');
        } else {
            icon.removeClass('fa-times').addClass('fa-bars');
        }
    }

    function initializeScrollEffects() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }

            revealOnScroll();
        });
    }

    function revealOnScroll() {
        const reveals = $('.reveal');
        
        reveals.each(function() {
            const windowHeight = $(window).height();
            const elementTop = $(this)[0].getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < windowHeight - elementVisible) {
                $(this).addClass('active');
            }
        });
    }

    function initializeSmoothScrolling() {
        const navLinks = $('a[href^="#"]');
        
        navLinks.on('click', function(e) {
            e.preventDefault();
            
            const targetId = $(this).attr('href').substring(1);
            const targetSection = $('#' + targetId);
            
            if (targetSection.length) {
                const headerHeight = header.outerHeight();
                const targetPosition = targetSection.offset().top - headerHeight;
                
                $('html, body').animate({
                    scrollTop: targetPosition
                }, 800);
                
                if (navLinks.hasClass('mobile-open')) {
                    toggleMobileMenu();
                }
            }
        });
    }

    function initializeFormValidation() {
        const requiredFields = $('#registrationForm [required]');
        requiredFields.each(function() {
            const field = $(this);
            const label = $('label[for="' + field.attr('id') + '"]');
            if (label.length && !label.text().includes('*')) {
                label.append(' <span class="required-indicator">*</span>');
            }
        });
    }

    // Initialize palestras checkbox selector
    function initializePalestrasCheckboxes() {
        const palestrasCheckboxes = $('.palestra-checkbox');
        const palestrasHidden = $('#palestras-hidden');
        const palestrasDropdownToggle = $('#palestrasDropdownToggle');
        const palestrasDropdownPanel = $('#palestrasDropdownPanel');
        const palestrasCount = $('#palestrasCount');

        // Handle checkbox changes
        palestrasCheckboxes.on('change', function() {
            const selectedValues = palestrasCheckboxes.filter(':checked').map(function() {
                return $(this).val();
            }).get();
            
            palestrasHidden.val(selectedValues.join(','));
            
            // Update count display
            const count = selectedValues.length;
            if (count > 0) {
                palestrasCount.text(count).show();
            } else {
                palestrasCount.hide();
            }
        });

        // Handle dropdown toggle
        palestrasDropdownToggle.on('click', function(e) {
            e.preventDefault();
            palestrasDropdownPanel.slideToggle(300);
            palestrasDropdownToggle.toggleClass('open');
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.palestras-group').length) {
                if (palestrasDropdownPanel.is(':visible')) {
                    palestrasDropdownPanel.slideUp(300);
                    palestrasDropdownToggle.removeClass('open');
                }
            }
        });
    }

    initializePalestrasCheckboxes();

    function validateField(event) {
        const field = $(event.target);
        const fieldName = field.attr('name');
        const fieldValue = field.val().trim();
        
        clearFieldError(event);
        
        let isValid = true;
        let errorMessage = '';
        
        if (field.prop('required') && !fieldValue) {
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

            case 'empresa':
            case 'cargo':
                if (fieldValue && fieldValue.length < 2) {
                    isValid = false;
                    errorMessage = 'Este campo deve ter no mínimo 2 caracteres';
                }
                break;
                
            case 'areaAtuacao':
                if (fieldValue === '') {
                    isValid = false;
                    errorMessage = 'Por favor, selecione uma área de atuação';
                }
                break;

            case 'outroArea':
                if ($('#areaAtuacao').val() === 'outro' && !fieldValue) {
                    isValid = false;
                    errorMessage = 'Por favor, especifique sua área de atuação';
                }
                break;

            case 'temDRT':
                if ($('#areaAtuacao').val() === 'audiovisual' && !field.prop('checked')) {
                    const anyRadioChecked = $('input[name="temDRT"]:checked').length > 0;
                    if (!anyRadioChecked) {
                        isValid = false;
                        errorMessage = 'Por favor, selecione uma opção';
                    }
                }
                break;

            case 'funcaoAudiovisual':
                if ($('#areaAtuacao').val() === 'audiovisual' && fieldValue === '') {
                    isValid = false;
                    errorMessage = 'Por favor, selecione sua função no audiovisual';
                }
                break;

            case 'outroAudiovisual':
                if ($('#funcaoAudiovisual').val() === 'outro_audiovisual' && !fieldValue) {
                    isValid = false;
                    errorMessage = 'Por favor, especifique sua função no audiovisual';
                }
                break;
                
            case 'termos':
                if (!field.prop('checked')) {
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
        const field = $(event.target);
        field.removeClass('error success');
        
        const errorElement = field.parent().find('.error-message');
        errorElement.hide();
        
        const successElement = field.parent().find('.success-message');
        successElement.hide();
    }

    function showFieldError(field, message) {
        field.addClass('error').removeClass('success');
        
        let errorElement = field.parent().find('.error-message');
        if (!errorElement.length) {
            errorElement = $('<div class="error-message"></div>');
            field.parent().append(errorElement);
        }
        
        errorElement.text(message).show();
    }

    function showFieldSuccess(field) {
        field.addClass('success').removeClass('error');
        
        const errorElement = field.parent().find('.error-message');
        errorElement.hide();
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
        const input = $(event.target);
        let value = input.val().replace(/\D/g, '');
        
        if (value.length <= 2) {
            value = value.replace(/(\d{0,2})/, '($1');
        } else if (value.length <= 7) {
            value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
        } else if (value.length <= 10) {
            value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        } else {
            value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
        }
        
        input.val(value);
    }

    function handleFormSubmission(event) {
        event.preventDefault();
        
        const formInputs = $('#registrationForm input, #registrationForm select');
        let isFormValid = true;
        
        formInputs.each(function() {
            const fieldEvent = { target: this };
            if (!validateField(fieldEvent)) {
                isFormValid = false;
            }
        });
        
        const termosCheckbox = $('#termos');
        if (!termosCheckbox.prop('checked')) {
            const fieldEvent = { target: termosCheckbox[0] };
            validateField(fieldEvent);
            isFormValid = false;
        }
        
        // Validar seleção de palestras (checkboxes)
        const palestrasSelected = $('.palestra-checkbox:checked').length;
        if (palestrasSelected === 0) {
            showNotification('Por favor, selecione pelo menos uma palestra', 'error');
            $('html, body').animate({
                scrollTop: $('.palestras-group').offset().top - 100
            }, 500);
            isFormValid = false;
        }
        
        if (isFormValid) {
            submitForm();
        } else {
            const firstError = $('.error').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
                firstError.focus();
            }
            
            if (palestrasSelected === 0) {
                return; // Já mostrou a notificação acima
            }
            
            showNotification('Por favor, corrija os erros no formulário', 'error');
        }
    }

    function submitForm() {
        const submitButton = $('.submit-button');
        const originalText = submitButton.html();
        
        submitButton.html('<i class="fas fa-spinner fa-spin"></i> Enviando...').prop('disabled', true);
        
        // Preparar dados do formulário
        const formData = {
            action: 'seminario_registration',
            nonce: $('#seminario_nonce').val(),
            nome: $('#nome').val(),
            email: $('#email').val(),
            telefone: $('#telefone').val(),
            empresa: $('#empresa').val(),
            cargo: $('#cargo').val(),
            areaAtuacao: $('#areaAtuacao').val(),
            outroArea: $('#outroArea').val(),
            temDRT: $('input[name="temDRT"]:checked').val(),
            funcaoAudiovisual: $('#funcaoAudiovisual').val(),
            outroAudiovisual: $('#outroAudiovisual').val(),
            newsletter: $('#newsletter').prop('checked') ? 1 : 0
        };
        
        $.ajax({
            url: seminario_ajax.ajax_url,
            type: 'POST',
            data: formData,
            timeout: 30000,
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response);
                
                if (response && response.success) {
                    registrationForm[0].reset();
                    
                    const formFields = $('#registrationForm input, #registrationForm select');
                    formFields.removeClass('error success');
                    
                    const errorMessages = $('.error-message, .success-message');
                    errorMessages.hide();
                    
                    // Resetar campos condicionais
                    $('#audiovisualSection, #outroAreaGroup, #outroAudiovisualGroup').slideUp(300);
                    
                    showSuccessModal();
                } else {
                    const errorMessage = response && response.data ? response.data : 'Erro ao enviar cadastro';
                    showNotification(errorMessage, 'error');
                    console.error('Error response:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', {xhr, status, error});
                
                let errorMessage = 'Erro de conexão. Tente novamente.';
                
                if (status === 'timeout') {
                    errorMessage = 'Tempo limite excedido. Tente novamente.';
                } else if (xhr.status === 403) {
                    errorMessage = 'Acesso negado. Recarregue a página e tente novamente.';
                } else if (xhr.status === 500) {
                    errorMessage = 'Erro interno do servidor. Tente novamente.';
                } else if (xhr.responseJSON && xhr.responseJSON.data) {
                    errorMessage = xhr.responseJSON.data;
                }
                
                showNotification(errorMessage, 'error');
            },
            complete: function() {
                submitButton.html(originalText).prop('disabled', false);
            }
        });
    }

    function showSuccessModal() {
        const modalHTML = `
            <div class="success-modal-overlay" id="successModal">
                <div class="success-modal">
                    <div class="success-modal-content">
                        <div class="success-icon">
                            ✓
                        </div>
                        <h3>Cadastro Realizado com Sucesso!</h3>
                        <p>
                            Obrigado por se inscrever no 2º Seminário de Saúde e Segurança no Audiovisual.
                            Você receberá um e-mail de confirmação em breve com mais detalhes sobre o evento.
                        </p>
                        <div class="success-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar"></i>
                                <span>25 e 26 de Novembro, 2025</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>9h às 18h</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Cinemateca Brasileira - São Paulo</span>
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
                    font-size: 5rem;
                    color: #27ae60;
                    margin-bottom: 1.5rem;
                    font-weight: bold;
                    line-height: 1;
                    font-family: Arial, sans-serif;
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
        
        $('head').append(modalStyles);
        $('body').append(modalHTML).css('overflow', 'hidden');
        
        $('#successModal').on('click', function(e) {
            if (e.target === this) {
                closeSuccessModal();
            }
        });
        
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSuccessModal();
            }
        });
    }

    window.closeSuccessModal = function() {
        const modal = $('#successModal');
        if (modal.length) {
            modal.css('animation', 'fadeOut 0.3s ease-out');
            setTimeout(function() {
                modal.remove();
                $('body').css('overflow', '');
            }, 300);
        }
    };

    function showNotification(message, type = 'info') {
        const notification = $('<div class="notification notification-' + type + '">').html(`
            <div class="notification-content">
                <i class="fas ${type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
                <span>${message}</span>
            </div>
        `);
        
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
                
                @keyframes fadeOut {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }
            </style>
        `;
        
        if (!$('#notification-styles').length) {
            $('head').append('<style id="notification-styles">' + notificationStyles.replace(/<\/?style>/g, '') + '</style>');
        }
        
        $('body').append(notification);
        
        setTimeout(function() {
            notification.css('animation', 'slideOutRight 0.3s ease-out');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Initialize additional features for new sections
    initializeExhibitionFeatures();
    initializeSponsorshipFeatures();
    initializeMapFeatures();

    function initializeExhibitionFeatures() {
        // Add hover effects for exhibitor cards
        $('.exhibitor-card').hover(
            function() {
                $(this).find('.exhibitor-logo').addClass('pulse');
            },
            function() {
                $(this).find('.exhibitor-logo').removeClass('pulse');
            }
        );

        // Smooth scroll for exhibition CTA button
        $('.exhibition-cta .cta-button-secondary').on('click', function(e) {
            e.preventDefault();
            const targetId = $(this).attr('href').substring(1);
            const targetSection = $('#' + targetId);
            
            if (targetSection.length) {
                const headerHeight = header.outerHeight();
                const targetPosition = targetSection.offset().top - headerHeight;
                
                $('html, body').animate({
                    scrollTop: targetPosition
                }, 800);
            }
        });
    }

    function initializeSponsorshipFeatures() {
        // Handle sponsorship form if on sponsorship page
        const sponsorshipForm = $('#sponsorshipForm');
        if (sponsorshipForm.length) {
            sponsorshipForm.on('submit', function(e) {
                e.preventDefault();
                handleSponsorshipFormSubmission($(this));
            });
        }

        // Add hover effects for sponsorship cards
        $('.sponsorship-card').hover(
            function() {
                $(this).find('.sponsorship-icon').addClass('rotate');
            },
            function() {
                $(this).find('.sponsorship-icon').removeClass('rotate');
            }
        );

        // Handle sponsor button clicks
        $('.sponsor-button').on('click', function(e) {
            const targetHref = $(this).attr('href');
            if (targetHref && targetHref.startsWith('#')) {
                e.preventDefault();
                const targetSection = $(targetHref);
                
                if (targetSection.length) {
                    const headerHeight = header.outerHeight() || 100;
                    const targetPosition = targetSection.offset().top - headerHeight;
                    
                    $('html, body').animate({
                        scrollTop: targetPosition
                    }, 800);
                }
            }
        });
    }

    function initializeMapFeatures() {
        // Handle external map links
        $('.map-link').on('click', function(e) {
            // Let external links work normally
            const link = $(this).attr('href');
            if (link && (link.includes('maps.google.com') || link.includes('waze.com'))) {
                // Analytics tracking could be added here
                console.log('External map link clicked:', link);
            }
        });

        // Add click tracking for transport options
        $('.transport-item').on('click', function() {
            const transportType = $(this).find('h4').text();
            console.log('Transport option viewed:', transportType);
            
            // Add a subtle highlight effect
            $(this).addClass('highlighted');
            setTimeout(() => {
                $(this).removeClass('highlighted');
            }, 2000);
        });
    }

    function handleSponsorshipFormSubmission(form) {
        const formData = new FormData(form[0]);
        const submitButton = form.find('button[type="submit"]');
        const originalText = submitButton.html();
        
        // Show loading state
        submitButton.html('<i class="fas fa-spinner fa-spin"></i> Enviando...');
        submitButton.prop('disabled', true);

        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
            // Show success message
            showFormMessage('success', 'Proposta enviada com sucesso! Entraremos em contato em breve.');
            form[0].reset();
            
            // Reset button
            submitButton.html(originalText);
            submitButton.prop('disabled', false);
        }, 2000);
    }

    function showFormMessage(type, message) {
        const messageClass = type === 'success' ? 'success-message' : 'error-message';
        const messageIcon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
        
        // Remove existing messages
        $('.form-message').remove();
        
        // Create new message
        const messageElement = $(`
            <div class="form-message ${messageClass}" style="
                display: flex; 
                align-items: center; 
                gap: 10px; 
                padding: 15px; 
                margin: 20px 0; 
                border-radius: 8px;
                background: ${type === 'success' ? '#d4edda' : '#f8d7da'};
                border: 1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'};
                color: ${type === 'success' ? '#155724' : '#721c24'};
            ">
                <i class="${messageIcon}"></i>
                <span>${message}</span>
            </div>
        `);
        
        // Add message to form
        $('#sponsorshipForm, #registrationForm').prepend(messageElement);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            messageElement.fadeOut(() => messageElement.remove());
        }, 5000);
    }

    // Add CSS animations dynamically
    const additionalStyles = `
        <style>
            .pulse {
                animation: pulse 1s infinite;
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            
            .rotate {
                animation: rotate 0.5s ease;
            }
            
            @keyframes rotate {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            .highlighted {
                background: rgba(255, 215, 0, 0.1) !important;
                border-left: 4px solid var(--primary-yellow) !important;
                transform: translateX(5px);
                transition: all 0.3s ease;
            }
            
            .form-message {
                animation: slideDown 0.3s ease;
            }
            
            @keyframes slideDown {
                0% { 
                    opacity: 0; 
                    transform: translateY(-20px); 
                }
                100% { 
                    opacity: 1; 
                    transform: translateY(0); 
                }
            }
        </style>
    `;
    
    $('head').append(additionalStyles);
    
    // ====================================
    // TERMS MODAL FUNCTIONALITY
    // ====================================
    
    const termsModal = $('#termsModal');
    const openTermsBtn = $('#openTermsModal');
    const closeTermsBtn = $('#closeTermsModal');
    const acceptTermsBtn = $('#acceptTermsBtn');
    const termsCheckbox = $('#termos');
    
    // Open modal when clicking on "termos de uso" link
    openTermsBtn.on('click', function(e) {
        e.preventDefault();
        termsModal.fadeIn(300);
        $('body').css('overflow', 'hidden');
    });
    
    // Close modal when clicking X button
    closeTermsBtn.on('click', function() {
        termsModal.fadeOut(300);
        $('body').css('overflow', 'auto');
    });
    
    // Close modal when clicking outside
    termsModal.on('click', function(e) {
        if ($(e.target).is('.terms-modal-overlay')) {
            termsModal.fadeOut(300);
            $('body').css('overflow', 'auto');
        }
    });
    
    // Accept terms - check checkbox and close modal
    acceptTermsBtn.on('click', function() {
        termsCheckbox.prop('checked', true);
        termsCheckbox.removeClass('error');
        
        // Remove error message if exists
        const errorElement = termsCheckbox.parent().find('.error-message');
        errorElement.hide();
        
        termsModal.fadeOut(300);
        $('body').css('overflow', 'auto');
        
        // Show success feedback
        showNotification('Termos aceitos com sucesso!', 'success');
    });
    
    // Close modal with ESC key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && termsModal.is(':visible')) {
            termsModal.fadeOut(300);
            $('body').css('overflow', 'auto');
        }
    });
});