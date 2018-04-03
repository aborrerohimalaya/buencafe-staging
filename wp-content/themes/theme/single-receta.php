<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>

<section id="recetas" class="intern">
<?php
	/* --------------- Encabezado --------------- */ 
	if( $encabezado = get_field('header') ){
?>
		<h1 style="background: rgba(0, 0, 0, 0) url(<?php echo $encabezado ?>) no-repeat scroll 0 0;"><span><?php echo get_the_title(); ?></span></h1>
<?php
	}
?>
<div class="receta">
<?php
	/* --------------- Ingredientes --------------- */
	if( $ingredientes = get_field('ingredientes_receta') ){
		$imagen_ingredientes = get_field('imagen_ingrediente');
	?>
	<div class="info">
    <img src="<?php echo $imagen_ingredientes; ?>">
        <h2><?php echo get_field('titulo_ingredientes'); ?></h2>
		<ul>
	<?php
		for( $i=0; $i < count($ingredientes); $i++ ){
	?>
            <li><?php echo $ingredientes[$i]['ingrediente']; ?></li>
	<?php
		}
	?>
        </ul>
    </div>
    <?php
	}
	/* --------------- Preparacion --------------- */
	if( $tiempo = get_field('tiempo_preparacion') ){
	?>
	    <aside>
            <p><?php echo $tiempo; ?></p>
            <?php get_template_part( 'includes/shareReceta'); ?>
            <p><a href="#"><?php echo icl_translate('wpml_custom', 'Descargar_receta', 'Descargar receta') ?></a></p>
        </aside>
	<?php
	}
	if( $preparacion = get_field('preparacion_receta') ){
	?>
	<div class="content">
		<h1><?php echo get_field('preparacion_titulo'); ?></h1>
	<?php
		for( $i=0; $i < count($preparacion); $i++ ){
	?>
		<p><?php echo $preparacion[$i]['paso_receta']; ?></p>
	<?php
		}
	?>
	</div>
	<?php
	}
	?>
	</div>
	<div class="relation">
	<?php

	/* --------------- Recetas Relacionadas --------------- */
	/* ----- Tipos de receta ----- */
	// $tipos = get_the_terms ( $post->ID, 'tipo_receta' );
	// if( $tipos ){
	// 	foreach ($tipos as $tipo) {
	// 		if (function_exists('wp_get_terms_meta')){ 
	// 		   $color = wp_get_terms_meta($tipo->term_id, 'color-hexadecimal' ,true);
	// 		   $nombre = $tipo->name;
	// 		} 
	// 	}
	// }

	if( $titulo_relacionadas = get_field('recetas_relacionadas') /*&& $tipo*/ ){
	?>
		<h3><?php echo $titulo_relacionadas; ?></h3>
	<?php
		$tags = get_the_tags();
		$id=$post->ID;
		foreach ($tags as $tag) {
			$tag_id = array($tag->slug);
		}
	  	$args = array( 'orderby' => 'date',
	      'order' => 'DESC',
	      'post_type' => 'receta',
	      'post_status' => 'publish',
	      // 'term' => $nombre,
	      'tag_slug__in' => $tag_id,
	      'post__not_in' => array($id),
	      'suppress_filters' => false,
	    );

	    $recetas = new WP_Query($args);
	    if( $recetas->have_posts() ){
	    	while( $recetas->have_posts() ){
	    		$recetas->the_post();
	    		$imagen_receta = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
	?>
		<article>
	        <div class="cover"><img src="<?php echo $imagen_receta ?>"></div>
	        <a href="<?php get_the_permalink(); ?>"><span>+</span></a>
	        <h1><?php echo get_the_title(); ?></h1>
        </article>
	<?php
	    	}
	    	wp_reset_postdata();
	    }
	    else{
	 ?>
	 		<span>No se ha encontrado relaci&oacute;n con otras recetas</span>
	 <?php
	    }
	}
?>
	</div> <!-- Relation -->
	<?php get_template_part( 'includes/contacto'); ?>
	<div id="contacto"></div>
</section>

<?php get_footer(); ?>