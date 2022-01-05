<?php 


$args = array(

    'post_type' => 'hotel',
    'post_per_page' => 6,

);

$hotel = new WP_Query($args);

?>

        <div class="container seccion">
            <h4 class="TitleCat">Hoteles, Restaurantes, Aerolineas</h4>
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="wrapper">
                    <?php  if($hotel->have_posts()) : while ($hotel -> have_posts()): $hotel->the_post();  ?>
                    <?php $link = get_post_meta(get_the_ID(), 'link', true) ?>
                        <a href="<?php echo $link?>" style="color: #000; text-decoration: none;">
                            <div class="col HoResAe mr-3">
                                <div class="img-containerHoltel">
                                <?php the_post_thumbnail('hotel', array('class' => 'img-Hotel'));?>
                                </div>
                                <div class="HotelContainerDesc">
                                    <span class="TitleHotel"><?php the_title(); ?></span>
                                    <p class="Starts"><?php 
                                                            $estrellas = get_post_meta(get_the_ID(), 'web1', true);
                                                            echo $estrellas.' ';
                                                            if ($estrellas <= '0.4'){
                                                                echo 
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '0.4' && $estrellas <= '0.9'){
                                                                echo '<i class="bi bi-star-half"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '0.9' && $estrellas <= '1'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '1' && $estrellas <= '1.4'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '1.4' && $estrellas <= '1.9'){
                                                            echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-half"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas >= '2' && $estrellas <= '2.4'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '2.4' && $estrellas <= '2.9'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-half"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '2.9'&& $estrellas <= '3'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '3' && $estrellas <= '3.4'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '3.4' && $estrellas <= '3.9'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-half"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '3.9' && $estrellas <='4.4'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star"></i>';
                                                            }
                                                            if($estrellas > '4.4' && $estrellas <= '4.9'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-half"></i>';
                                                            }
                                                            if($estrellas > '4.9' && $estrellas == '5'){
                                                                echo '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>'.
                                                                '<i class="bi bi-star-fill"></i>';
                                                            }
                                                            ?></p>
                                    <p class="DescHotel"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();?>
                    <?php else : ?>
                        <p><?php _e( 'Aún no hay recomendaciones' ); ?></p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>