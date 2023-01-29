<?php 

while(have_posts()) : the_post();

        the_title('<h1 class="text-center text-primary">','</h1>'); 
        
        if(has_post_thumbnail()):

            the_post_thumbnail('full', array('class'=> 'imagen-destacada'));
            // the_post_thumbnail();
            
        endif;

         if(is_single()):
            $horaInicio = get_field('hora_inicio');  
            $horaFin = get_field('hora_fin');  
        
                ?>
                    <p class="informacion-clase">
                        <?php the_field('dias_clases'); ?> - <?php echo $horaInicio . ' a ' . $horaFin;?> 
                    </p>
                <?php
        endif;
        the_content();
 endwhile;?>