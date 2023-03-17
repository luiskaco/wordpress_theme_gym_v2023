<?php 

// Importamos widgets
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';



// Habiliar imagen destacado
function gymfitness_setup(){

    // hablitamos imagen destacada
    add_theme_support( 'post-thumbnails' );

    // Titulos para seo - dinamico en html
    add_theme_support('title-tag');

  
}

add_action( 'after_setup_theme', 'gymfitness_setup' );


// Anadimos menu
function gymfitness_menus(){
    register_nav_menus(
        array(
            'menu-principal' => __('Menu Principal','gymfitness'),
            'redes-sociales' => __('Redes Sociales','gymfitness'),
            // Nombre del anclav / dominio apra traducion
        )
    ); // habilitamos el menu
}

//inicializa, crea el menu
add_action('init', 'gymfitness_menus');

// Habilitamos estilos
function gymfitness_scripts_styles()  {

    // Archivo css

    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');

    // Add ligbox
    wp_enqueue_style('lightboxCss', get_template_directory_uri() .'/css/lightbox.min.css', array(), '2.11.3');
    
    wp_enqueue_style('swipperCss', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), '9.1.0');
    
    // importando css swipper
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '2.0.12');


    // Archivos JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('lightboxJs',  get_template_directory_uri().'/JS/lightbox.min.js', array('jquery'), '2.11.3', true);
    
    //Importando swipper
    wp_enqueue_script('swipperJs',  'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), '9.1.0', true);
    
    wp_enqueue_script('animeJs',  'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);


    //Importanod scripps
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('swipperJs','animeJs'), '1.0.2', true);
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');


// Definimos zona de widget 
function gymfitness_widgets() {
        // deinimos zona de widget
        register_sidebar(array(
            'name' => 'sidebar-1',
            'id' => 'sidebar_1',
            'before_widget_init' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-center"',
            'after_title' => '</h3>'
        ));

        register_sidebar(array(
            'name' => 'sidebar-2',
            'id' => 'sidebar_2',
            'before_widget_init' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-center"',
            'after_title' => '</h3>'
        ));
}

add_action('widgets_init', 'gymfitness_widgets');


// Crear shortcode 

function gymfitness_ubicacion_shortcode(){
     ?> 
        <div class="mapa"> 
            <?php 
                if(is_page('contacto')){
                    the_field('ubicacion');
                }
            ?>
        </div>

        <h2 class="text-center text-primary">
            Formulario de Contacto
        </h2>
     <?php

    
    // Re renderizar shortcode
    echo do_shortcode('[contact-form-7 id="81" title="Formulario de contacto 1"]');
}

add_shortcode('gymfitness_ubicacion','gymfitness_ubicacion_shortcode');


/* IMAGENES DINAMICAS COMO BACKGROUND */


function gymfitness_hero_imagen() {
    // Obtener el ID de la pagina de inciio

    $front_id = get_option('page_on_front');  // Obtenemos el id de la pagina principal
    // get_option consulta el archivo /options.php

    // var_dump( $front_id );

    // Obtener la imagene
    $imagen_id = get_field('hero_imagen', $front_id);  // Pasamos el ID de la pagina 

    // var_dump($imagen_id);

    // Obtener la ruta de la imagen

    $imagePAth = wp_get_attachment_image_src($imagen_id,'full')[0];

    // var_dump($imagePAth);
    
    // Crear el css
    wp_register_style('custome', false); // Registra pero le decimos que no existe
            //Creando una hoja de estilo virtual

    wp_enqueue_style('custome'); // La agregamos

    $imagen_destacada_css = "
        body.home .header {
            background-image: linear-gradient( rgb(0 0 0 / .75), rgb(0 0 0 / .75)), url($imagePAth);
        }
    ";


    // Inyectar el csss

    wp_add_inline_style('custome', $imagen_destacada_css);


}

add_action('init', 'gymfitness_hero_imagen' );



