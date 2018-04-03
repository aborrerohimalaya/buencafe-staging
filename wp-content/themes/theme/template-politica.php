<?php
/*
Template Name: Politica de privacidad
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
<section id="politicaprivacidad" class="intern">
	    <?php 
			/* --------------- Encabezado --------------- */ 
			if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
			?>
				<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
			<?php
			}
		?>
        <div class="wrapper">
            <h1 class="Titulo"><span><?php echo icl_translate('wpml_custom', 'Politica_de_tratamiento_de_datos_personales', 'Política de tratamiento de datos personales') ?></span></h1>
            <div class="terminos">
            	<?php the_content(); ?>  
            </div>
             
        </div>        
        
    </section>
    
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>
<?php get_footer(); ?>