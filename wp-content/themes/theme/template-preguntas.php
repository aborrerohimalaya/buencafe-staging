<?php
/* Template Name: Preguntas Frecuentes */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>
<?php get_header(); ?>
<section id="faq" class="intern">
		<?php
		/* --------------- Encabezado --------------- */ 
		if( get_field('imagen_encabezado') && $titulo_encabezado = get_field('titulo_encabezado') ) {
		?>
			<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
		<?php
		}
		?>
        <div class="wrapper">
            <ul class="preguntas">
            <?php 
            	if( $preguntas = get_field('preguntas') ){
					for ($i=0; $i < count($preguntas); $i++) { 
						$pregunta = $preguntas[$i]['pregunta'];
						$respuesta = $preguntas[$i]['respuesta'];
				?>
					<li>
	                    <h2><?php echo $pregunta; ?></h2>
	                    <p><?php echo $respuesta; ?></p>
	                </li>
				<?php
					}
				}
            ?>                             
            </ul>
        </div>
       <?php get_template_part('includes/productos') ?>
</section>
<?php get_template_part( 'includes/portfolio'); ?>
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>    
<?php get_footer() ?>