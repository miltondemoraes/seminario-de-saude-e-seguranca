    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <i class="fas fa-video"></i>
                        <span>Seminário AV</span>
                    </div>
                    <p>Promovendo saúde e segurança na indústria audiovisual.</p>
                </div>
                
                <?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')): ?>
                    <?php if(is_active_sidebar('footer-1')): ?>
                        <div class="footer-section">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(is_active_sidebar('footer-2')): ?>
                        <div class="footer-section">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(is_active_sidebar('footer-3')): ?>
                        <div class="footer-section">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="footer-section">
                        <h3>Contato</h3>
                        <div class="contact-info">
                            <p><i class="fas fa-envelope"></i> contato@seminarioav.com.br</p>
                            <p><i class="fas fa-phone"></i> (11) 9999-9999</p>
                        </div>
                    </div>
                    <div class="footer-section">
                        <h3>Redes Sociais</h3>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Seminário de Saúde e Segurança no Audiovisual. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>