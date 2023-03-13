
<?php get_header(); ?>

    <section class="bienvenida seccion contenedor text-center">
            <h2 class="text-primary">
                <?php the_field('encabezado_bienvenida'); ?>
            </h2>
            <p><?php the_field('texto_encabezado_bienvenida'); ?></p>
    </section>

    <section class="areas">
        <div class="area">
            <?php 
                $area1 = get_field('area1'); 
                $area1Img = $area1['imagen']['sizes']['medium_large'];
                $areaText = $area1['texto'];
            
                // echo "<pre>";
                //     var_dump($area1);
                // echo  "</pre>";
            
            ?>
            
            
            <img src="<?php echo esc_attr($area1Img) ;?>" alt="imagen de <?php echo esc_attr($areaText);?>">
            <p><?php echo esc_html($areaText);?></p>
        </div>
        <div class="area">
            <?php 
                $area2 = get_field('area_2'); 


                // echo "<pre>";
                //     var_dump($area2);
                // echo  "</pre>";
                
                $imagen = $area2['imagen']['sizes']['medium_large'];
                $texto = $area2['texto'];

            ?>
            
            
            <img src="<?php echo esc_attr($imagen) ;?>" alt="imagen de <?php echo esc_attr($texto);?>">
            <p><?php echo esc_html($texto);?></p>
        </div>
        <div class="area">
            <?php 
                $area3 = get_field('area_3'); 
                // echo "<pre>";
                //     var_dump($area3);
                // echo  "</pre>";

                $imagen = $area3['imagen']['sizes']['medium_large'];
                $texto = $area3['texto'];

            ?>
            
            
            <img src="<?php echo esc_attr($imagen) ;?>" alt="imagen de <?php echo esc_attr($texto);?>">
            <p><?php echo esc_html($texto);?></p>
        </div>
        <div class="area">
            <?php 
                $area4 = get_field('area_4'); 

                $imagen = $area4['imagen']['sizes']['medium_large'];
                $texto = $area4['texto'];

            ?>
            
            
            <img src="<?php echo esc_attr($imagen) ;?>" alt="imagen de <?php echo esc_attr($texto);?>">
            <p><?php echo esc_html($texto);?></p>
        </div>
    </section>

    <main class="contenedor seccion"> 
        <h2 class="text-center text-primary">
            Nuestras Clases
        </h2>

        <?php  gymfitness_lista_clases(4); ?>
        <div class="contenedor-boton">
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Nuestras Clases'))); ?>" class="boton boton-primary">
                Ver todas las clases
            </a>
        </div>
      
    </main>


<?php get_footer();?>
