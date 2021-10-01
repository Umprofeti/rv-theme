<?php 
//Menú de navegación
add_action( 'after_setup_theme', 'rv_registrar_menu' );
function rv_registrar_menu() {
    register_nav_menu( 'menu-principal', 'Menu Principal' );
}
$menurv = array(

    'menu' => '',
    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0 separador2',
    'menu_id' => 'menu-content',
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse text-center Ftransparente',
    'container_id' => 'navbarSupportedContent',
    'echo' => false,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '<a>',
    'link_after'      => '</a>',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'item_spacing'    => 'preserve',
    'depth'           => 0,
    'walker'          => '',
    'theme_location'  => ''

);
 wp_nav_menu($menurv);

 add_filter('nav_menu_link_attributes' , 'rv_a_class' , 10 , 2);

 function rv_a_class($classes, $item){
     $classes['class'] = 'nav-link active elemento-menu hvr-underline-from-left';
     return $classes;
 }

add_filter('nav_menu_css_class','rv_li_class',10,2);

function rv_li_class($classes, $item){

    $classes['class'] = 'nav-item mt-3 ms-3 me-3 text-center separador';
    return $classes;
}

add_filter('wp_nav_menu_args', 'rv_ul_class');

function rv_ul_class($class){
    $class['menu_class'] = 'navbar-nav me-auto mb-2 mb-lg-0 separador2';
    return $class;
}

add_filter('wp_nav_menu_args', 'rv_cont_class');

function rv_cont_class($class){
    $class['container_class'] = 'collapse navbar-collapse text-center Ftransparente';
    $class['container_id'] ='navbarSupportedContent';
    return $class;
}






//Tamaño de imagen Post
add_image_size('destacada', '261','174', true);
add_image_size('destacada1', '370','246.66', true);
add_image_size('logo-menu', '70','70', true);
//Etiqueda de titulo
add_theme_support('title-tag');

//Registrar estilos
add_action('wp_enqueue_scripts', 'rendez_enqueue_styles');
function rendez_enqueue_styles(){
    //Hoja de estilos
    wp_enqueue_style('style', get_template_directory_uri().'./css/styles.css');
    wp_enqueue_style('normalize',get_template_directory_uri().'/css/normalize.css');
    //Registrar Bootstrap
    wp_register_style('bootstrap_css','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_style('bootstrap-icons','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css');
    wp_enqueue_style( 'bootstrap_css');
    wp_enqueue_style( 'bootstrap-icons');
}


//Registrar Scripts
add_action( 'wp_enqueue_scripts', 'rendez_enqueue_scripts');
function rendez_enqueue_scripts(){
    wp_enqueue_script( 'popper_js','https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
    wp_enqueue_script( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js');
    wp_enqueue_script( 'mainjs', get_template_directory_uri(  ).'/js/main.js');
}

add_theme_support( 'custom-logo', array(

    //Alto
    'height' => 70,
    //Ancho
    'width' => 70,
    //PERMITIR FLEXIBILIDAD EN EL TAMAÑO
	'flex-height' => true,
    'flex-width'  => true,
    //
	'header-text' => array( 'site-title', 'site-description' )

) );

//filtro para el custom logo

add_filter('get_custom_logo_image_attributes', 'img_custom_logo_class');

function img_custom_logo_class($custom_logo_attr){
    $custom_logo_attr = array( 
            'class' => 'img-fluid image-menu imagen-menu navbar-brand',
            'width' => 70,
            'height' => 70
    );
    return $custom_logo_attr;
}


function remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
 
add_filter( 'post_thumbnail_html', 'remove_img_attr' );


function rv_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'rv_custom_excerpt_length', 999 );

function rv_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'rv_excerpt_more');

?>