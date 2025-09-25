<?php
/*
Template Name: Página Full Width (Elementor)
*/

get_header(); ?>

<main class="elementor-page-content">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>