<?php get_header( );?>
    <main>
        <?php  get_template_part('slider');?>
        <?php dynamic_sidebar('mostrar_cat1'); ?>
        <?php dynamic_sidebar('mostrar_cat2'); ?>
        <?php dynamic_sidebar('mostrar_cat3'); ?>
        <?php get_template_part('entretenimiento');?>
        <?php get_template_part('libros'); ?>
        <?php get_template_part('Hotel'); ?>
        <?php dynamic_sidebar('rv_cart_edit'); ?>
    </main>
<?php get_footer(); ?>