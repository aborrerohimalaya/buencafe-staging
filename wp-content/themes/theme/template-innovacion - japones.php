<?php
/* Template Name: Innovacion - japones */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>
<section id="innovacion" class="intern">
	<?php
	/* --------------- Encabezado --------------- */ 
	if( get_field('imagen_encabezado') && $titulo_encabezado = get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
	<?php
	}
	?>
	<div class="wrapper">
	   <article class="Entidades">
	   	<?php 
		/* --------------- Entidades --------------- */ 
		if( $titulo = get_field('titulo_entidades') ){
		?>
	        <h1><?php echo $titulo; ?></h1>
		<?php
		}
		if( $imagen = get_field('imagen_entidades') ){
		?>
	        <img src="<?php echo $imagen; ?>">
		<?php
		}
		if( $texto = get_field('texto_entidades') ){
		?>
	        <p><?php echo $texto; ?></p>
		<?php
		}
	   	?>
	    </article>
	    <article class="Investigacion">
	    	<?php 
			/* --------------- Lineas de Investigacion --------------- */
			if( $titulo = get_field('titulo_investigacion') ){
			?>
				<h1><?php echo $titulo; ?></h1>
			<?php
			}
	    	?>
	    	<div class="accordion">
            
            <div class="secciones productos-consumo">
            <div class="accord-header">
            	<?php 
            		/* ----- Productos ----- */
					if( get_field('titulo_productos_consumo') && get_field('imagen_titulo_productos') ){
					?>
						<h2 style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('imagen_titulo_productos') ?>) no-repeat "><?php echo get_field('titulo_productos_consumo') ?></h2>
					<?php
					}
            		?></div>
            	<div class="accord-content">
                <div class="Left">
                       	<?php
                        if( $listado = get_field('listado') ){
						?>
	                	<ul>
	                		<?php 
	                		for ($i=0; $i < count($listado); $i++) { 
	                		?>
	                		<li><h3><?php echo $listado[$i]['item_listado']; ?></h3>
	                		<p><?php echo $listado[$i]['descripcion_item']; ?>
	                			<?php
	                			if( $listado[$i]['link_seccion'] && $listado[$i]['frase_del_link'] ){
	                			?>
								<spam><a href="<?php echo $listado[$i]['link_seccion']; ?>"><?php echo $listado[$i]['frase_del_link']; ?></a></spam>
	                			<?php
	                			}
	                			?>
	                		</p></li>
	                		<?php
	                		}
	                		?>
	                    </ul>
						<?php
						}
                        ?>
                          </div>            
                <div class="Right"><img src="<?php echo get_field('imagen_productos_consumo'); ?>"></div>
                </div>
            </div>

            <div class="secciones materia-prima">
            <div class="accord-header">
            	<?php
            	/* ----- Materia ----- */
				if(get_field('titulo_materia') && get_field('imagen_titulo_materia') ){
				?>
					<h2 style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('imagen_titulo_materia') ?>) no-repeat "><?php echo get_field('titulo_materia'); ?></h2>
				<?php
				}
            	?>
            	</div>
            	<div class="accord-content">
            	<?php 
            		if($contenido = get_field('contenido')){
            		for ($i=0; $i < count($contenido); $i++) { 
            		?>
	                <div <?php if ($i==0)echo 'class="Left"';else echo 'class="Right"' ?>>
	                	<h3><?php echo $contenido[$i]['titulo_contenido'] ?></h3>
	                    <a target="_blank" href="<?php echo $contenido[$i]['destino_contenido'] ?>">
	                    	<img src="<?php echo $contenido[$i]['imagen_contenido']; ?>">
	                    </a>
	                	<p><?php echo $contenido[$i]['descripcion_contenido'] ?></p>
	                </div>
            		<?php
            		}
            		}
            	?>
                </div>
            </div>
            <div class="secciones procesos">
            <div class="accord-header">
            	<?php
            	/* ----- Procesos ----- */
				if( get_field('titulo_procesos') && get_field('imagen_titulo_proceso') ){
				?>
					<h2 style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('imagen_titulo_proceso') ?>) no-repeat"><?php echo get_field('titulo_procesos') ?></h2>
				<?php
				}
            	?></div>
            	<div class="accord-content">
                <div class="Left">
                	<p><?php echo get_field('descripcion_proceso'); ?></p>
                    <h4><?php echo get_field('subtitulo_proceso'); ?></h4>
                </div>
	                <div class="Infografia">
                	<?php 
                	if( $infografia = get_field('imagenes_infografia') ){
                	?>
	                	<?php 
	                	for ($i=0; $i < count($infografia); $i++) { 
	                		$imagen = getimagesize($infografia[$i]['imagen_info']);    //Sacamos la información
						  	$ancho = $imagen[0];              //Ancho
						  	$alto = $imagen[1];               //Alto
						  	$_width = 225 * 100 / $ancho; /* 225px es el ancho de la zona de la informacion */
	                	?>
	                	<a class="more m<?php echo $i+1 ?> group1 popup-modal" href=".mfp-<?php echo $i+1 ?>"><img src="<?php echo $infografia[$i]['simbolo']; ?>"></a>
	                	<div class="info-seccion mfp-<?php echo $i+1 ?> mfp-hide" style="max-width: <?php echo $ancho; ?>px; height: <?php echo $alto; ?>px;">
							<div style="height: <?php echo $alto; ?>px; width: <?php echo $_width; ?>%;">
								<h1><?php echo $infografia[$i]['numero_de_seccion']; ?></h1>
								<h3><?php echo $infografia[$i]['titulo_info']; ?></h3>
							</div>
								<p><?php echo $infografia[$i]['texto_info']; ?></p>
							<a class="popup-modal-cerrar mfp-close" href=".Infografia"></a>
	                		<img src="<?php echo $infografia[$i]['imagen_info']; ?>">
						</div>
	                	<?php
	                	}
                	}
                	?>
	                	<img src="<?php echo get_field('infografia'); ?>">
	                </div>
                </div>

                
            </div>
        </div>
	    </article>
	</div>
</section>
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.js"></script>

<script>
	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		modal: true,
	});
	$(document).on('click', '.popup-modal-cerrar', function (e) {
		e.preventDefault();
	});
</script>
<?php get_footer() ?>