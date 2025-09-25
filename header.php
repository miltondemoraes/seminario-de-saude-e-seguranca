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
                    <i class="fas fa-video"></i>
                    <span><?php 
                        $site_name = get_theme_mod('seminario_site_name', get_bloginfo('name'));
                        if ($site_name && $site_name !== 'My WordPress Website') {
                            echo $site_name;
                        } else {
                            echo 'Seminário AV';
                        }
                    ?></span>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-links',
                    'container' => false,
                    'fallback_cb' => 'seminario_default_menu'
                ));
                ?>
                <div class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

<?php
function seminario_default_menu() {
    echo '<div class="nav-links">';
    echo '<a href="#evento" class="nav-link">Evento</a>';
    echo '<a href="#programacao" class="nav-link">Programação</a>';
    echo '<a href="#palestrantes" class="nav-link">Palestrantes</a>';
    echo '<a href="#exposicao" class="nav-link">Exposição</a>';
    echo '<a href="#contato" class="nav-link">Contato</a>';
    echo '<a href="' . esc_url(get_page_link(get_page_by_path('patrocinio')->ID ?? '#')) . '" class="nav-link">Patrocínio</a>';
    echo '<a href="#como-chegar" class="nav-link">Como Chegar</a>';
    echo '<a href="#cadastro" class="nav-link btn-cadastro">Inscreva-se</a>';
    echo '</div>';
}
?>