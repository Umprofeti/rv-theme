        <?php 
        
        $args = array(

            'post_type' => 'libro',
            'post_per_page' => 3,

        );

        $libros = new WP_Query($args);


        ?>
        <div class="container seccion">
           <h4 class="TitleCat">Libros</h4>
            <div class="Box mt-5 mb-5">
                <div class="wrap">
                <?php  if($libros->have_posts()) : while ($libros -> have_posts()): $libros->the_post();  ?>
                    <div class="Tarjeta-Libros ml-2">
                        <div class="img-containerBook">
                        <?php the_post_thumbnail('libro', array('class' => 'img-book'));?>
                        </div>
                        <div class="DescBook">
                            <span class="TitleBook"><?php the_title(); ?></span>
                            <p class="AuthorBook"><?php 
                                                        $author = get_post_meta(get_the_ID(), 'web1', true);
                                                        echo $author;
                                                        ?></p>
                            <p class="BookDesc"><?php the_excerpt('libro'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                    <?php wp_reset_postdata();?>
                <?php else : ?>
                    <p><?php _e( 'Aún no hay libros disponibles' ); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div>