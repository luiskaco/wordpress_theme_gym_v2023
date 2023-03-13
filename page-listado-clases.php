<?php 
/*
   Template Name: Listado de clase
*/
 get_header(); 
 
 // Plantilla personalizada
 ?>
<main class="contenedor seccion"> 
        <?php 
            get_template_part('template-parts/pagina')
        ?>
        <ul class="listado-grid">
            <?php 
            $args = array(
                'post_type' => 'gymfitness_clases',
                
                );

                $clases = new WP_Query($args);

                while( $clases->have_posts()) { $clases->the_post();
                    ?>
                    <li class="card">
                        <?php the_post_thumbnail();?>
                        <a href="<?php  the_permalink(); ?>">
                            <div class="contenido">
                                <h3><?php the_title();?></h3>
                                
                                <?php 
                                    $horaInicio = get_field('hora_inicio');  
                                    $horaFin = get_field('hora_fin');  
                                
                                ?>
                                <p><?php the_field('dias_clases'); ?> - <?php echo $horaInicio . ' a ' . $horaFin;?> </p>
                            
                            </div>
                        </a>

                    </li>
                <?php  } wp_reset_postdata(); ?>
        </ul>


        <?php gymfitness_lista_clases();?>
</main>
<?php get_footer();?>