
<?php get_header(); ?>

        <main class="section contenedor">

                <?php 
                    $categoria = get_queried_object();

                    // echo "<pre>";
                    //  var_dump($categoria);
                    // echo "</pre>";
                ?>  

                <h2 class="text-primary text-center" style="padding:20px 0;">
                    Categoria: <?php echo $categoria->name; ?>
                </h2>

            
                <ul class="listado-grid">
                      
                <?php 

                        while(have_posts()) : the_post();

                                         get_template_part('template-parts/blog');
                        endwhile;

                ?>
                </ul>
        </main>

<?php get_footer();?>