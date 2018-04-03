<?php
/*
Template Name: Proximamente
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
 <section id="proximamente" class="intern">
	 	<?php
		/* --------------- Encabezado --------------- */ 
		if( get_field('imagen_encabezado') && $titulo_encabezado = get_field('titulo_encabezado') ) {
		?>
			<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
		<?php
		}
		?>
        <div class="wrapper">
                <?php
                /* --------------- Contenido --------------- */ 
                if( get_field('proximamente') && get_field('texto_proximamente') ) {
                    $imagen = getimagesize(get_field('proximamente'));    //Sacamos la información
                    $ancho = $imagen[0];              //Ancho
                    $alto = $imagen[1]; 
                ?>
                <article style="height: <?php echo $alto; ?>px; width: <?php echo $ancho; ?>px; background:url(<?php echo get_field('proximamente'); ?>);">
                	<!-- <img src="<?php echo $contenido; ?>"> -->
                    <p><?php echo get_field('texto_proximamente'); ?></p>
                </article>
                <?php
                }
                ?>
        </div>
        <?php get_template_part('includes/productos') ?>
        </section>
<?php get_template_part( 'includes/portfolio'); ?>
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>
<?php get_footer(); ?>