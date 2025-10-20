    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <i class="fas fa-video"></i>
                        <span><?php echo get_theme_mod('seminario_site_name', 'Seminário AV'); ?></span>
                    </div>
                    <p><?php echo get_theme_mod('seminario_footer_description', 'Promovendo saúde e segurança na indústria audiovisual.'); ?></p>
                </div>
                
                <div class="footer-section">
                    <h3><?php echo get_theme_mod('seminario_footer_contact_title', 'Contato Sindcine'); ?></h3>
                    <div class="contact-info">
                        <p><i class="fas fa-phone"></i> <?php echo get_theme_mod('seminario_footer_phone', '(011) 5539 0955'); ?></p>
                        <p><i class="fas fa-envelope"></i> <?php echo get_theme_mod('seminario_footer_email', 'contato@sindcine.com.br'); ?></p>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3><?php echo get_theme_mod('seminario_footer_participate_title', 'Participe'); ?></h3>
                    <div class="footer-links">
                        <p><a href="<?php echo get_theme_mod('seminario_footer_link1_url', '#cadastro'); ?>"><i class="fas fa-user-plus"></i> <?php echo get_theme_mod('seminario_footer_link1_text', 'Inscreva-se no Evento'); ?></a></p>
                        <p><a href="<?php echo get_theme_mod('seminario_footer_link2_url', 'mailto:contato@sindcine.com.br?subject=Interesse em ser Expositor'); ?>"><i class="fas fa-user-plus"></i> <?php echo get_theme_mod('seminario_footer_link2_text', 'Torne-se Expositor'); ?></a></p>
                        <p><a href="<?php echo get_theme_mod('seminario_footer_link3_url', 'https://sindcine.com.br/'); ?>" target="_blank"><i class="fas fa-info-circle"></i> <?php echo get_theme_mod('seminario_footer_link3_text', 'Sobre o Sindcine'); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('seminario_footer_copyright', '2º Seminário de Saúde e Segurança no Audiovisual. Todos os direitos reservados.'); ?></p>
                <p class="developer-credit">Desenvolvido por <a href="https://sepoltech.com.br/site/" target="_blank" rel="noopener">sepolTECH</a></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>