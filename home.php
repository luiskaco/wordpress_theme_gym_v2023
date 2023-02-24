
<?php get_header(); ?>

        <main class="section contenedor">
                <ul class="listado-grid">
                      
                <?php 

                        while(have_posts()) : the_post();

                                         get_template_part('template-parts/blog');
                        endwhile;

                ?>
                </ul>
        </main>

<?php get_footer();?>


