<?php /* Template Name: Quienes Somos */
/*** @package Wordpress* @subpackage Adamantium - Starter Kit* @author Bitopia Digital Agency*/?>

<?php get_header(); ?>
<?php
	$link_actual = get_permalink( $post->ID );  $link_actual = explode("/", $link_actual);
    /* Detectar si esta en ingles */
    if ( in_array("en", $link_actual ) ){        $english = true;    }
    if ( in_array("ja", $link_actual ) ){        $japanese = true;    }
    if ( in_array("zh-hant", $link_actual ) ){   $chinese = true;    }
?>
<section id="quienes-somos" class="intern">
	<?php	/* --------------- Encabezado --------------- */	if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado') ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
	<?php
	}
	/* --------------- Gremio --------------- */
	?>
	<article class="gremio">
		<?php
		if( $titulo = get_field('titulo_gremio') ) {
		?>
            <h1><?php echo $titulo; ?></h1>
		<?php
		}
		?>
         <div id="empresas">
         	 <a href="#" data-empresa="cenicafe">Cenicafe</a>
             <a href="#" data-empresa="alma-cafe">Alma-cafe</a>
             <a href="#" data-empresa="cooperativas">Cooperativas</a>
             <a href="#" data-empresa="manuel-mejia">Manuel Mejia</a>
             <a href="#" data-empresa="comites">Comites</a>
             <a href="#" data-empresa="federacion">Federacion</a>
         	 <div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-cenicafe.jpg" data-empresa="cenicafe">
	         	 	<a class="btn_cerrar" href="#"></a>
	         	 	<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/cenicafe-en.png'; elseif ($japanese) echo '/img/cenicafe-ja.png'; elseif ($chinese) echo '/img/cenicafe-ch.png';  else echo '/img/cenicafe.png'; ?>">
         	 	</div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-almacafe.jpg" data-empresa="alma-cafe">
         	 		<a class="btn_cerrar" href="#"></a>
         	 		<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/almaCafe-en.png'; elseif ($japanese) echo '/img/almaCafe-ja.png';elseif ($chinese) echo '/img/almaCafe-ch.png';  else echo '/img/almaCafe.png' ?>">
         	 	</div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-cooperativas.jpg" data-empresa="cooperativas">
         	 		<a class="btn_cerrar" href="#"></a>
         	 		<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/cooperativas-en.png'; elseif ($japanese) echo '/img/cooperativas-ja.png';elseif ($chinese) echo '/img/cooperativas-ch.png';  else echo '/img/cooperativas.png' ?>">
         	 	</div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-federacionmanuel.jpg" data-empresa="manuel-mejia">
					<a class="btn_cerrar" href="#"></a>
	         	 	<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/federacionmanuel-2-en.png';elseif ($japanese) echo '/img/manuel-mejia-2-ja.png';elseif ($chinese) echo '/img/manuel-mejia-2-ch.png';  else echo '/img/manuel-mejia-2.png' ?>">
         	 	</div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-comites.jpg" data-empresa="comites">
	         	 	<a class="btn_cerrar" href="#"></a>
	         	 	<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/comites-en.png';elseif ($japanese) echo '/img/comites-ja.png';elseif ($chinese) echo '/img/comites-ch.png';  else echo '/img/comites.png' ?>">
         	 	</div>
         	 	<div class="grande" data-mascara="<?php bloginfo('template_url'); ?>/img/bg-federacion.jpg" data-empresa="federacion">
	         	 	<a class="btn_cerrar" href="#"></a>
	         	 	<img src="<?php bloginfo('template_url'); ?><?php if ($english) echo '/img/federacion-en.png'; elseif ($japanese) echo '/img/federacion-ja.png';  elseif ($chinese) echo '/img/federacion-ch.png';  else echo '/img/federacion.png' ?>">
	         	 	<a id="link_federacion" target="_blank" href=" http://www.federaciondecafeteros.org/"></a>
         	 	</div>
         	 </div>
         </div>
    </article>
	<div class="wrapper">
		<article class="Sostenibilidad">
			<?php
				/* --------------- Sostenibilidad --------------- */
				if( $titulo = get_field('titulo_sostenibilidad') ) {
				?>
            	<h1><?php echo $titulo; ?></h1>
				<?php
				}
				if( $imagen = get_field('imagen_sostenibilidad') ) {
				?>
            	<a target="_blank" href="<?php echo get_field('destino_sostenibilidad') ?>"><p><?php echo icl_translate('wpml_custom', 'Conocer_mas_sobre_informe_de_sostenibilidad_de_fnc', 'CONOCER MÁS SOBRE INFORME DE SOSTENIBILIDAD DE FNC') ?></p><img src="<?php echo $imagen; ?>"></a>
				<?php
				}
			?>
        </article>
       <article class="section_buencafe">
       		<?php
			/* --------------- Buencafe --------------- */
			if( $logo = get_field('logo') ) {
			?>
            <h1 class="Logo img-responsive" style=" background: rgba(0, 0, 0, 0) url(<?php echo $logo ?>) no-repeat scroll center center;">Buencafe</h1>
			<?php
			}
			?>
            <h2 class="Logo img-responsive"  style="background: rgba(0, 0, 0, 0) url( http://www.buencafe.com/wp-content/uploads/2016/02/elementos.png) no-repeat scroll center center;"> Buencafe </h2>
			<?php
			if( $descripcion = get_field('descripcion_buencafe') ) {
			?>
            <p class="desc_quienes_somos"><?php echo $descripcion; ?></p>
			<?php
			}
			?>
			
			<div class="politicas_buencafe">
				
				
				<?php echo get_field( 'politica_buen_cafe' ); ?>
			</div>
			<?php
		
			if( $video = get_field('video_buencafe') ) {
			?>
            <iframe src="<?php echo $video; ?>" width="100%" height="600" frameborder="0" allowfullscreen></iframe>
			<?php
			}
       		?>
        </article>
        <article class="timeline-quienes">
        	<?php
			/* --------------- Timiline --------------- */
			if( $titulo = get_field('titulo_timeline') ) {
			?>
			<h1><?php echo $titulo; ?></h1>
			<?php
			}
			if( $slider = get_field('slider_timeline') ) {
			?>
			<section class="cd-horizontal-timeline">
	              <div class="events-content">
                        <ol>
                        	<?php
								for ($i=0; $i < count($slider); $i++) {
									$imagen = $slider[$i]['imagen_timeline'];
							?>
                            <li <?php if($i==0) echo 'class="selected"'; ?> data-date="<?php echo $i; ?>/01/2000"><img src="<?php echo $imagen; ?>"></li>
                        	<?php } ?>
                        </ol>
                       	<div class="ant"></div>
	                	<div class="sig"></div>
                    </div> <!-- .events-content -->
				<div class="timeline">
	                <div class="events-wrapper">
	                    <div class="events">
	                        <ol>
	                        	<?php
									for ($i=0; $i < count($slider); $i++) {
										$anio = $slider[$i]['anio'];
								?>
	                            	<li><a href="#0" <?php if($i==0) echo 'class="selected"'; ?> data-date="<?php echo $i; ?>/01/2000"><?php echo $anio ?></a></li>
								<?php
									}
								?>
	                        </ol>

	                        <span class="filling-line" aria-hidden="true"></span>
	                    </div> <!-- .events -->
	                </div> <!-- .events-wrapper -->

	                <ul class="cd-timeline-navigation">
	                    <li><a href="#0" class="prev inactive">Prev</a></li>
	                    <li><a href="#0" class="next">Next</a></li>
	                </ul> <!-- .cd-timeline-navigation -->
	            </div> <!-- .timeline -->
	        </section>
	        <?php
			}
        	?>
        </article>
	</div><!-- wrapper -->
    <div class="wrapper">
        <article class="Certificaciones">
        	<?php
			/* --------------- Certificaciones --------------- */
			if( $titulo = get_field('titulo_certificaciones') ) {
			?>
            <h1><?php echo $titulo; ?></h1>
			<?php
			}
			if( $slider = get_field('slider_certificaciones') ) {
			?>
            <div class="slider">
			<?php
				for ($i=0; $i < count($slider); $i++) {
					$imagen = $slider[$i]['imagen_certificaciones'];
			?>
            		<img src="<?php echo $imagen; ?>" />
			<?php
				}
			?>
            </div>
            <?php
			}
        	?>
        </article>
        <article class="Productos">
			<?php
			/* --------------- Nuestros Productos --------------- */
			if( $titulo = get_field('titulo_productos') ) {
			?>
            <h1><?php echo $titulo; ?></h1>
			<?php
			}
			if( $imagen = get_field('imagen_productos') ) {
			?>
            <a href="<?php echo get_field('destino_productos'); ?>"><img src="<?php echo $imagen ?>"></a>
			<?php
			}
			?>
        </article>
    </div>
</section> <!-- Fin quienes somos -->
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>

<?php get_footer() ?>
<script src="<?php bloginfo('template_url'); ?>/js/timeline.js"></script>
<script>
jQuery(function($) {
$('.slider').sss();
});
</script>
