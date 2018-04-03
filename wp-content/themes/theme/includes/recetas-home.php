<?php
/* ----- RECETAS ----- */
$args = array( 'orderby' => 'date',
  'order' => 'DESC',
  'post_type' => 'receta',
  'post_status' => 'publish',
  'suppress_filters' => false,
  'posts_per_page' => 3
);

            // The Query
$recetas = new WP_Query( $args );
?>
<section id="recetas-home">
    <?php
    if ( $datos_receta = get_field('datos_receta') ) :
        ?>
        <h1><?php echo $datos_receta[0]['titulo_receta']; ?></h1>
        <?php
    endif; 
    ?>
    <p> <?php echo $datos_receta[0]['subtitulo_receta']; ?>  </p>
    <?php 
    if ( $recetas->have_posts() ) : ?>
    <?  while ( $recetas->have_posts() ) :
    $recetas->the_post();
    $imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    ?>
    <article class="col-md-4 <?php echo join( ' ', get_post_class() ); ?>" > 
        <a href="<?php echo get_the_permalink(); ?>">
            <div class="image-article">
                <img src="<?php echo $imagen[0]; ?>" alt="<?php echo get_the_title(); ?>" class="img-responsive">
                <div class="overlay"></div>
            </div>
            <div class="title">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
            <span>+</span> 
        </a>
    </article>

<?php endwhile; ?>

<?php endif; ?>



<?php 
wp_reset_postdata();
    if ( $datos_receta = get_field('datos_receta') ) :
?>
<a href="<?php echo $datos_receta[0]['destino_recetario']; ?>" class="view-more"><?php echo $datos_receta[0]['frase_recetario']; ?><span>+</span></a>
<?php
    endif;
?>
</section>