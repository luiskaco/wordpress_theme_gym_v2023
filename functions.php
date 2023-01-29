<?php 

// Importamos widgets
require get_template_directory() . '/includes/widgets.php';


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

    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.11');

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