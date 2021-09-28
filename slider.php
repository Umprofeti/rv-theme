<div class="container">
            <div class="row">
                <?php 
                
                $args = array(

                    'post_type' => 'slider',
                    'post_per_page' => 4,
    
                );

                $slider = new WP_Query($args);

                $args2 = array(
                    'post_type' => 'slider',
                    'post_per_page' => 1,
                    'order' => 'asc'
                );

                $slider_post = new WP_Query($args2);
                ?>
                <div class="col">
                    <div  class="carousel slide carrusel carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-inner">
                            <?php $slider_post -> the_post(  ); ?>
                            <?php $link_publi = get_the_excerpt();?>
                            <div class="carousel-item active">
                                <a href="<?php echo $link_publi ?>"><?php the_post_thumbnail('slider', array('class' => 'd-block w-25 img-fluid img-slider'));?></a>
                            </div>
                            <?php wp_reset_postdata();?>
                            <?php  if($slider->have_posts()) : while ($slider -> have_posts()): $slider->the_post();  ?>
                            <?php $link_publi2 =  get_the_excerpt();  ?>
                            <div class="carousel-item">
                                <a href="<?php echo $link_publi2 ?>"><?php the_post_thumbnail('slider', array('class' => 'd-block w-25 img-fluid img-slider'));?></a>
                            </div>
                            <?php endwhile; ?>
                                <?php wp_reset_postdata();?>
                            <?php else : ?>
                                <p><?php _e( 'Aún no hay anuncios disponibles' ); ?></p>
                            <?php endif; ?>
                        </div>
                      </div>
                </div>
            </div>
        </div>