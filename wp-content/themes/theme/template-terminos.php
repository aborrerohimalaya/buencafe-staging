<?php
/*
Template Name: Terminos y Condiciones
*/
?>
<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>
<section id="terminoscondiciones" class="intern">
	<?php 
		/* --------------- Encabezado --------------- */ 
		if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
		?>
			<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
		<?php
		}
	?>
	<div class="wrapper">
	    <div class="terminos">
	    	<?php the_content(); ?>                           
	    </div>
	</div>        
</section>
    
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>
<?php get_footer(); ?>