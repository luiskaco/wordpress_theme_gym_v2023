<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title();?></title>

    <?php 
        wp_head();
    ?>
</head>
<body>

<header class="header">
        <div class="contenedor barra-navegacion">
            <div class="loog">
                <a href="<?php echo site_url('/'); ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="">
                </a>
                
            </div>
           
            <?php 
                $args = array(
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal nav'
                );  
                
                wp_nav_menu($args);
            ?>
            
        </div>
</header>