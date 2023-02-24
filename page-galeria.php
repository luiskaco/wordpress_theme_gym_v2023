`<?php 
/*
   Template Name: Galeria
*/
 get_header(); 
 
 // Plantilla personalizada
 ?>


<main class="contenedor seccion"> 
    <?php
        while(have_posts()) : the_post();

        the_title('<h1 class="text-center text-primary">','</h1>'); 


        // the_content();

        // Obtener la galeria
        $galeria = get_post_gallery(get_the_ID(), false);  //obtener ela galeria del post actual,  
                                                        // Pasamos false porque queremos obtener sin html  
        // Obtener los IDs en un array
        $galeria_imagenes_id = explode("," , $galeria['ids']);

    
        // echo "<pre>"; 
        //     // var_dump($galeria['ids']);
        //      var_dump( $galeria_imagenes_id);
        // echo "</pre>";

        ?>
            <ul class="galeria-imagenes">
                <?php 
                    foreach($galeria_imagenes_id as $id){
                            $galeriaImagenssGrande = wp_get_attachment_image_src($id, 'large')[0];
                            $galeriaImagenssFull = wp_get_attachment_image_src($id, 'full')[0];

                            ?>

                                <li>
                                    <a data-lightbox="galeria" href="<?php echo $galeriaImagenssGrande ;?>">
                                     <img src="<?php  echo $galeriaImagenssFull; ?>" alt="image-galeria-<?php echo $id;?>">
                                    </a>
                                </li>


                            <?php 
                    }
                ?>
            </ul>

        <?php


        endwhile;?>
</main>


    <?php get_footer();?>
