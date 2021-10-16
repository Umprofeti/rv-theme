<?php get_header( );?>
<?php get_template_part('slider'); ?>
<main>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col">
                   <div class="contenedor-singlepage">
                    <div class="titulo-post">
                        <h5 class="titulo-post-single">
                            <i><?php the_title(); ?></i> 
                        </h5>
                        <p class="Author"><i>Fecha de publicación: <?php echo get_the_date(); ?></i></p>
                    </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col">
                    <div class="post-body">
                        <div class="post-content">
                            <p class="post-content">
                                <?php the_content('', array('class' => 'link')); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php dynamic_sidebar('rv_cart_edit'); ?>
    </main>
<?php get_footer(); ?>