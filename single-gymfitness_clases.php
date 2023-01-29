
<?php get_header(); ?>

<main class="contenedor seccion con-sidebar"> 
    <section>
        <?php 
            get_template_part('template-parts/clase')
        ?>
    </section>

    <?php 
        // Busca el archivo llamado sidebar
        // get_sidebar();
    
        // Buscar el archivo llamado sidebar pero que contenta la clase clases
        get_sidebar('clases'); 
    ?>
</main>


<?php get_footer();?>