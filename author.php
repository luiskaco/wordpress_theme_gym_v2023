
<?php get_header(); ?>

        <main class="section contenedor">

                <?php 
                    $autor = get_queried_object();

                    // echo "<pre>";
                    //  var_dump($categoria);
                    // echo "</pre>";
                ?>  

                <h2 class="text-primary text-center" style="padding:20px 0;">
                    Autor: <?php echo $autor->data->display_name; ?>
                </h2>
                <p class="text-center">
                    <?php echo get_the_author_meta('description', $autor->data->ID)?>
                </p>

            
                <ul class="listado-grid">
                      
                <?php 

                        while(have_posts()) : the_post();

                                         get_template_part('template-parts/blog');
                        endwhile;

                ?>
                </ul>
        </main>

<?php get_footer();?>