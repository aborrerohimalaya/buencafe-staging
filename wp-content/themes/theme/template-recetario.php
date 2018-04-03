<?php
/* Template Name: Recetario */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>
<section id="recetas" class="intern">
<?php 
	/* --------------- Encabezado --------------- */ 
	if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><?php echo get_field('titulo_encabezado'); ?></h1>
	<?php
	}

	/* --------------- Galeria --------------- */
	$args = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'post_type' => 'receta',
			'post_status' => 'publish',
			'suppress_filters' => false,
			'posts_per_page' => -1
		);
	// Query
	$recetas = new WP_Query($args);
?>
<?php 
	if ( $recetas->have_posts() ) {
		while ( $recetas->have_posts() ) {
			$recetas->the_post();
			$imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
			$tipos = get_the_terms ( $post->ID, 'tipo_receta' );
			// if( $tipos ){
			// 	foreach ($tipos as $tipo) {
			// 		if (function_exists('wp_get_terms_meta')){ 
			// 		   $color = wp_get_terms_meta($tipo->term_id, 'color-hexadecimal' ,true);
			// 		} 
			// 	}
			// }
?>	
          	<article>
	            <div class="cover"><img src="<?php echo $imagen[0]; ?>" alt="<?php echo get_the_title(); ?>"></div>
	            <a href="<?php echo get_the_permalink(); ?>"><span>+</span></a>
	            <h1><span><?php echo get_the_title(); ?></span></h1>
        	</article>
<?php
		}
		wp_reset_postdata();
	}
?>
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>
</section>
<?php get_footer() ?>