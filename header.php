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
                <div class="nav-links">
                    <a href="#evento" class="nav-link">Evento</a>
                    <a href="#programacao" class="nav-link">Programação</a>
                    <a href="#palestrantes" class="nav-link">Palestrantes</a>
                    <a href="#apoiadores" class="nav-link">Apoiadores</a>
                    <a href="#exposicao" class="nav-link">Expositores</a>
                    <a href="#como-chegar" class="nav-link">Como Chegar</a>
                    <a href="#sobre-sindcine" class="nav-link">Sobre o Sindcine</a>
                </div>
                <a href="#cadastro" class="btn-cadastro-header">Inscreva-se</a>
            </nav>
        </div>
    </header>