<?php 


function gymfitness_lista_clases($cantidad = -1) {
            ?>
                 <ul class="listado-grid">
                        <?php 
                        $args = array(
                            'post_type' => 'gymfitness_clases',
                            'posts_per_page' => $cantidad
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

            <?php
}