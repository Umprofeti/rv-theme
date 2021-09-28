<?php get_header(); ?>
<?php get_template_part('slider'); ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="contenedor-singlepage">
                        <div class="category">
                            <p class="title-category mt-5">
                                <b><?php  echo single_cat_title("", false); ?></b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php 
                    $cate = single_cat_title("", false);
                    $args = array(
                        'posts_per_page' => 12,
                        'category_name' => $cate
                    );
            

                    $cat_page = new WP_Query($args);
                ?>
                <?php while($cat_page->have_posts()): $cat_page->the_post();  ?>
                <div class="col-sm-2 col-md-5 col-lg-3">
                    <div class="card mb-3  bg-body rounded" style="border: none;">
                    <?php the_post_thumbnail( 'destacada', array('class' => 'img-fluid card-img-top rounded-top') ) ?>
                        <div class="card-body">
                          <h5 class="card-title categoy-title"><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                          <p class="card-text category-description"><?php the_excerpt(); ?></p>
                          <p class="card-text Author"><small class="text-muted"><i>Por: <?php echo(the_author()); ?> - <?php echo(the_date()); ?></i></small></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata();?>
            </div>
        </div>
    </main>
<?php  get_footer();?>