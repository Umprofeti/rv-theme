<div class="container ">
<?php 
                
                $args = array(

                    'post_type' => 'entretenimiento',
                    'post_per_page' => 8,
    
                );
                $entretenimiento_post = new WP_Query($args);
                ?>
                <h3  class="TitleCat" >RENDEZ-VOUS Te recomienda</h3>
                <h4 class="TitleCat" >Entretenimiento</h4>
            </div>
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="EntretenimientoWrapper">
                        <?php  if($entretenimiento_post->have_posts()) : while ($entretenimiento_post -> have_posts()): $entretenimiento_post->the_post();  ?>
                        <?php $link_entretenimiento =  get_the_excerpt();  ?>
                            <a href="<?php echo $link_entretenimiento ?>">
                                <div class="circle">
                                    <?php the_post_thumbnail('entretenimiento', array('class' => 'Entretenimiento-IMGContainer'));?>
                                </div>
                            </a>   
                            <?php endwhile; ?>
                                    <?php wp_reset_postdata();?>
                                <?php else : ?>
                                    <p><?php _e( 'No hay Recomendaciones disponibles' ); ?></p>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>