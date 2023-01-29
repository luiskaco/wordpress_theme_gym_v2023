<?php

if(!defined('ABSPATH')) die();

///Crear nuestro propio widge

class GymFitness_Clases_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gymfitness_widget',
			esc_html__( 'GymFitness Clases', 'gymfitness' ), 
			array( 'description' => esc_html__( 'Agrega las Clases como Widget', 'gymfitness' ), )
		);
	}

	public function widget( $args, $instance ) {
        // mostramos en el front
        // echo $instance['cantidad'];


        ?>  

               <ul class="clases-sidebar">
                    <?php
                           $args = array(
                                 'post_type' => 'gymfitness_clases',
                                 'posts_per_page' => $instance['cantidad'],
                                 'order' => 'ASC',
                                //  'orderBy'=>'title'


                                // 'orderBy'=>'rand' // aleatorio / consume mucho recurso
                               
                            );
                
                            $clases = new WP_Query($args);
                            
                            while($clases->have_posts()){
                                $clases->the_post();

                                ?>
                                            <li>
                                                <div class="imagen">
                                                        <?php the_post_thumbnail('thumbnail'); ?>
                                                </div>
                                                <div class="contenido-clases">
                                                       
                                                            <div class="contenido">
                                                                <a href="<?php  the_permalink(); ?>">
                                                                    <h3><?php the_title();?></h3>
                                                                    
                                                                    <?php 
                                                                        $horaInicio = get_field('hora_inicio');  
                                                                        $horaFin = get_field('hora_fin');  
                                                                    
                                                                    ?>
                                                                </a> 
                                                                <p><?php the_field('dias_clases'); ?> - <?php echo $horaInicio . ' a ' . $horaFin;?> </p>
                                                        </div>
                                                   
                                                </div>
                                            </li>  

                                <?php
                            }
                            wp_reset_postdata();
                    ?>
               </ul> 

        <?php 
	}

    public function form( $instance ) {

    // Mostramo en el backemnd
    $cantidad = !empty($instance['cantidad']) 
                ? $instance['cantidad'] : 'Cuantos clases deseas mostrar?';

            ?>

                <label for="<?php echo esc_attr($this->get_field_id('cantidad'));?>">
                    <?php 
                        esc_attr_e('Cuantos clases deseas mostrar?');
                        
                    ?>
                </label>
                <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('cantidad'))?>"
                    name="<?php echo esc_attr($this->get_field_name('cantidad'))?>"
                    type="number"
                    value="<?php echo esc_attr($cantidad) ?>"

                    />


            <?php
   	}

	public function update( $new_instance, $old_instance ) {
        

        //Actualizamos datos del backend
        $instance = array();

        $instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '' ;

        return $instance;
	}
} 

//Registra el widgets
function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_Widget' );
}
add_action( 'widgets_init', 'gymfitness_registrar_widget' );

