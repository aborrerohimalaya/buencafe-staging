<section class="contacto-fijo" style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('fondo_contacto') ?>) no-repeat scroll center center;">
	<?php 
	/* --------------- Contacto --------------- */
	if( $titulo = get_field('titulo_contacto') ) {
	?>
    <a href="<?php echo get_field('destino_contacto');?>"><h3><?php echo $titulo; ?></h3></a>
	<?php
	}
	if( $descripcion = get_field('descripcion_contacto') ) {
	?>
    <p><?php echo $descripcion; ?></p>
	<?php
	}
	?>
</section>