<?php 
                    $cate = single_cat_title("", false);
                    $cate_min = strtolower($cate);
                    $args1 = array(
                        'posts_per_page' => 1,
                        'category_name' => $cate,
                        'tag' => $cate_min
                    );
                    $postDest = new WP_Query($args1);
                ?>
                <?php if ($postDest->have_posts()) : while($postDest->have_posts()): $postDest->the_post();  ?>
                <div class="row">
                    <div class="col">
                        <div class="card mb-3 card-principal" style="border: none;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <p class="card-text"><small class="text-muted">Por: <?php the_author();?> - <?php the_date(); ?> </small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php the_post_thumbnail('destacada1', array('class' => 'img-fluid'));?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata();?>
                <?php else : ?>
                    <p><?php _e( 'Aún no hay ningún post destacado' ); ?></p>
                <?php endif; ?>