<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">
                    <span class="logo-text">2º SEMIN SAÚDE E SEG AV</span>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-links',
                    'container' => false,
                    'fallback_cb' => 'seminario_default_menu'
                ));
                ?>
                <a href="#cadastro" class="btn-cadastro-header">Inscreva-se</a>
            </nav>
        </div>
    </header>

<?php
function seminario_default_menu() {
    // Menu mobile removido
}
?>