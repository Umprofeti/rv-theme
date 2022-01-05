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


// Custom Post Types para la seccion de recomendados

function create_recomendacion_post_type(){

    $labels = array(

        'name' => __('Entretenimiento'),
        'singular_name' => __('Entretenimeinto'),
        'all_items'     => __('Todas las publicaciones'),
        'view_item'     => __('Ver los post'),
        'add_new_item'  => __('Agregar un nuevo post'),
        'add_new'       => __('Agregar un nuevo post'),
        'edit_item'     => __('Editar post'),
        'update_item'   => __('Actualizar post'),
        'search_items'  => __('Buscar post'),
        'search_items'  => __('Entretenimeinto')

    );

    $args = array(

        'labels'  => $labels,
        'description' => 'Agregar un nuevo contenido de tipo Entretenimiento',
        'menu_position' => 28,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array( 'slug' => false),
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ),

    );

    register_post_type('entretenimiento', $args);

}

add_action('init', 'create_recomendacion_post_type');

// Custom post Type para la sección de Libros

function create_libros_post_type(){

    $labels = array(

        'name' => __('Libros'),
        'singular_name' => __('Libros'),
        'all_items'     => __('Todas las publicaciones'),
        'view_item'     => __('Ver los post'),
        'add_new_item'  => __('Agregar un nuevo post'),
        'add_new'       => __('Agregar un nuevo post'),
        'edit_item'     => __('Editar post'),
        'update_item'   => __('Actualizar post'),
        'search_items'  => __('Buscar post'),
        'search_items'  => __('Libros')

    );

    $args = array(

        'labels'  => $labels,
        'description' => 'Agregar un nuevo contenido de tipo Libro',
        'menu_position' => 28,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array( 'slug' => false),
        'menu_icon' => 'dashicons-book',
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ),

    );

    register_post_type('libro', $args);

}

add_action('init', 'create_libros_post_type');

// Registrar un nuevo custom field para el autor de los libros

function registerAuthorField() {
	add_meta_box( 'AuthorBook', __( 'Autor', 'recomendacionLibro' ), 'twp_mi_display_callback', 'libro' );
}
add_action( 'add_meta_boxes', 'registerAuthorField' );


function twp_mi_display_callback( $post ) {
	
	$web1 = get_post_meta( $post->ID, 'web1', true );
	
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	wp_nonce_field( 'mi_meta_box_nonce', 'meta_box_nonce' );
	
	
	echo '<p><label for="web1_label">Nombre del autor: </label> <input type="text" name="web1" id="web1" value="'. $web1 .'" /></p>';
	
}

function twp_save_meta_box( $post_id ) {
	// Comprobamos si es auto guardado
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Comprobamos el valor nonce creado en twp_mi_display_callback()
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mi_meta_box_nonce' ) ) return;
	// Comprobamos si el usuario actual no puede editar el post
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Guardamos...
	if( isset( $_POST['web1'] ) )
	update_post_meta( $post_id, 'web1', $_POST['web1'] );
}
add_action( 'save_post', 'twp_save_meta_box' );

// Custom field para el link de los libros

function registerLinkBookField() {
	add_meta_box( 'LinkBook', __( 'Link', 'recomendacionLibro' ), 'linkLibroCallback', 'libro' );
}
add_action( 'add_meta_boxes', 'registerLinkBookField' );


function linkLibroCallback( $post ) {
	
	$link = get_post_meta( $post->ID, 'link', true );
	
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	wp_nonce_field( 'mi_meta_box_nonce', 'meta_box_nonce' );
	
	
	echo '<p><label for="link">Enlace:  </label> <input type="url" name="link" id="link" value="'. $link .'" /></p>';
	
}

function saveLinkBook( $post_id ) {
	// Comprobamos si es auto guardado
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Comprobamos el valor nonce creado en twp_mi_display_callback()
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mi_meta_box_nonce' ) ) return;
	// Comprobamos si el usuario actual no puede editar el post
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Guardamos...
	if( isset( $_POST['link'] ) )
	update_post_meta( $post_id, 'link', $_POST['link'] );
}
add_action( 'save_post', 'saveLinkBook' );


//Registrar un Custom Post Type para la seccion de Hoteles

function create_hoteles_post_type(){

    $labels = array(

        'name' => __('Hoteles'),
        'singular_name' => __('Hoteles'),
        'all_items'     => __('Todas las publicaciones'),
        'view_item'     => __('Ver los post'),
        'add_new_item'  => __('Agregar un nuevo post'),
        'add_new'       => __('Agregar un nuevo post'),
        'edit_item'     => __('Editar post'),
        'update_item'   => __('Actualizar post'),
        'search_items'  => __('Buscar post'),
        'search_items'  => __('Hoteles')

    );

    $args = array(

        'labels'  => $labels,
        'description' => 'Agregar un nuevo contenido de tipo Hotel',
        'menu_position' => 29,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array( 'slug' => false),
        'menu_icon' => 'dashicons-location',
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ),

    );

    register_post_type('hotel', $args);

}

add_action('init', 'create_hoteles_post_type');

//Custom field para la calificación del lugar


function registerStarField() {
	add_meta_box( 'Puntuacion', __( 'Puntuacion', 'recomendacionHotel' ), 'puntuacion_display_callback', 'hotel' );
}
add_action( 'add_meta_boxes', 'registerStarField' );


function puntuacion_display_callback( $post ) {
	
	$web1 = get_post_meta( $post->ID, 'web1', true );
	
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	wp_nonce_field( 'mi_meta_box_nonce', 'meta_box_nonce' );
	
	
	echo '<p><label for="web1_label">Puntuación (desde el 0 al 5): </label> <input type="number" name="web1" id="web1" value="'. $web1 .'" min="0" max="5" step="any" /></p>';
	
}

function Puntuacion_save_meta_box( $post_id ) {
	// Comprobamos si es auto guardado
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Comprobamos el valor nonce creado en twp_mi_display_callback()
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mi_meta_box_nonce' ) ) return;
	// Comprobamos si el usuario actual no puede editar el post
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Guardamos...
	if( isset( $_POST['web1'] ) )
	update_post_meta( $post_id, 'web1', $_POST['web1'] );
}
add_action( 'save_post', 'Puntuacion_save_meta_box' );

// Custom Field para el link de los hoteles, aerolínea etc

function registerLinkHotelField() {
	add_meta_box( 'LinkHotel', __( 'Link', 'recomendacionHotel' ), 'linkHotelCallback', 'hotel' );
}
add_action( 'add_meta_boxes', 'registerLinkHotelField' );


function linkHotelCallback( $post ) {
	
	$link = get_post_meta( $post->ID, 'link', true );
	
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	wp_nonce_field( 'mi_meta_box_nonce', 'meta_box_nonce' );
	
	
	echo '<p><label for="link">Enlace:  </label> <input type="url" name="link" id="link" value="'. $link .'" /></p>';
	
}

function saveLinkHotel( $post_id ) {
	// Comprobamos si es auto guardado
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Comprobamos el valor nonce creado en twp_mi_display_callback()
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mi_meta_box_nonce' ) ) return;
	// Comprobamos si el usuario actual no puede editar el post
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Guardamos...
	if( isset( $_POST['link'] ) )
	update_post_meta( $post_id, 'link', $_POST['link'] );
}
add_action( 'save_post', 'saveLinkHotel' );


?>