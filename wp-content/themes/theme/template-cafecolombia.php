<?php
/* Template Name: Cafe Colombia */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>

<section id="cafe-de-colobia" class="intern">
	<?php
	/* --------------- Encabezado --------------- */ 
	if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('imagen_encabezado'); ?>) no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
	<?php
	}
	?>
    <article id="reconocimiento">
    <?php
    /* --------------- Reconocimiento --------------- */ 
	if( $titulo = get_field('titulo_reconocimiento') ){
	?>
		<h1><?php echo $titulo; ?></h1>
	<?php
	}
	if( $descripcion = get_field('descripcion_reconocimiento') ){
	?>
		<p><?php echo $descripcion; ?></p>
	<?php
	}
	/* ----- Galeria ----- */
	if( $galeria = get_field('galeria_reconocimiento') ){
		for ($i=0; $i < count($galeria); $i++) {
			// $titulo = $galeria[$i]['titulo_imagen_reconocimiento'];
			$imagen = $galeria[$i]['imagen_reconocimiento'];
			$descripcion = $galeria[$i]['descripcion_reconocimiento'];
	?>
			<div>
				<img src="<?php echo $imagen ?>">
				<p><?php echo $descripcion ?></p>
			</div>
	<?php
		}
	}

	/* --------------- Diversidad --------------- */
	if( $diversidad = get_field('datos_diversidad') ) {
		for ($i=0; $i < count($diversidad); $i++) { 
			$titulo = $diversidad[$i]['titulo_diversidad'];
			$imagen = $diversidad[$i]['imagen_diversidad'];
	?>
		<!-- CONTENIDO DIVERSIDAD -->
	<?php
		}
	}
	?>
    </article>
    <div class="wrapper">
    	<?php
    		/* --------------- Diversidad --------------- */
			if( $diversidad = get_field('datos_diversidad') ) {
				for ($i=0; $i < count($diversidad); $i++) { 
					$titulo = $diversidad[$i]['titulo_diversidad'];
					$imagen = $diversidad[$i]['imagen_diversidad'];
					$destino = $diversidad[$i]['destino_diversidad'];
					$frase = $diversidad[$i]['frase_diversidad'];
		?>
				<article class="diversity">
		            	<h1><?php echo $titulo; ?></h1>
		            <div>
		            	<a href="<?php echo $destino; ?>" target="_blank">
		            		<img src="<?php echo $imagen; ?>">
		            		<p><?php echo $frase; ?></p>
		            	</a>
		            </div>
		        </article>
		<?php
				}
			}
			/* --------------- Proceso --------------- */
			if( $proceso = get_field('datos_proceso') ) {
				for ($i=0; $i < count($proceso); $i++) { 
					$titulo = $proceso[$i]['titulo_proceso'];
					$video = $proceso[$i]['video_proceso'];
			?>
		        <article class="process">
		            <h1><?php echo $titulo; ?></h1>
		            <iframe width="590" height="376" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
		        </article>
			<?php
				}
			}
		?>
    </div>
    <?php 
	    /* --------------- Detalles --------------- */
		// $fondo = get_field('imagen_fondo');
	?>
	<!-- STYLE LINEA 5609 -->
    <div class="wrapper" style="background:rgba(0, 0, 0, 0) url(<?php echo $fondo; ?>) no-repeat scroll center 0;">
    <?php 
		if( $detalles = get_field('datos_detalle') ) {
			for ($i=0; $i < count($detalles); $i++) {
	?>
		<article>
        	<?php
			if($titulo = $detalles[$i]['titulo_detalle']){
			?>
				<h1><?php echo $titulo; ?></h1>
			<?php
			}
			?>
            <div class="swiper-container">
                <div class="swiper-wrapper">
				<?php
				/* ----- Slider ----- */
				if( $slider = $detalles[$i]['slider_detalle'] ){
					for ($j=0; $j < count($slider); $j++) { 
						$imagen = $slider[$j]['imagen_slider'];
						$titulo = $slider[$j]['titulo_slider'];
						$descripcion = $slider[$j]['descripcion_slider'];
				?>
                    <article  class="swiper-slide">
                        <img src="<?php echo $imagen; ?>">
                        <p><strong><?php echo $titulo; ?></strong> <?php echo $descripcion; ?></p>
                    </article>
				<?php
					}
				?>
                    
				<?php
				}
				?>
                </div>
                 <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </article>
        <?php
			}
		}
    ?>
    </div>
    <div class="wrapper">
		<?php
			/* --------------- Valor de Marca y Nuestros Productos --------------- */
			if( $seccion = get_field('datos_seccion_3') ) {
				for ($i=0; $i < count($seccion); $i++) {
					$titulo = $seccion[$i]['titulo_seccion_3'];
					$imagen = $seccion[$i]['imagen_seccion_3'];
					$destino = $seccion[$i]['destino_seccion_3'];
					$texto = $seccion[$i]['texto_seccion_3'];
					$frase = $seccion[$i]['frase_destino'];
					$abrir = $seccion[$i]['otra_pestaña'];
			?>
	        <article>
	            <h1><?php echo $titulo; ?></h1>
	            <a <?php if($abrir == 1) echo 'target="_blank"'; ?> href="<?php echo $destino; ?>"><img src="<?php echo $imagen; ?>"></a>
	            <?php 
	            	if( $texto ){
	            ?>
	            	<p><?php echo $texto; ?></p>
	            <?php
	            	}
	    
	            ?>
	            <a <?php if( $abrir == 1 ) echo 'target="_blank"'; ?> href="<?php echo $destino; ?>"><?php echo $frase; ?></a>
	        </article>
			<?php
				}
			}
		?>
    </div>
    <?php get_template_part( 'includes/contacto'); ?>
    <div id="contacto"></div>
   </section>
<?php get_footer() ?>