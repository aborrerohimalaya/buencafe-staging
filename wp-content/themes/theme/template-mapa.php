<?php
/* Template Name: Mapa */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>
<section id="mapa-del-sitio" class="intern">
	<?php
	/* --------------- Encabezado --------------- */
	if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
	<?php
	}
	?>
	<div class="wrapper">
		<sidebar>
			<?php 
			if( $titulo = get_field('titulo_secciones') ) {
			?>
        	<h2><?php echo $titulo; ?></h2>
        	<?php
        	} 
    		if ( $secciones = get_field('secciones_sitios') ){
    		?>
            <ul>
            	<?php 
            		for ($i=0; $i < count($secciones); $i++) {
            		$bullet = $secciones[$i]['bullet'];
            		$destino = $secciones[$i]['destino_seccion'];
            		$titulo = $secciones[$i]['titulo_seccion'];
            	?>
            		<li style="background: rgba(0, 0, 0, 0) url(<?php echo $bullet; ?>) no-repeat scroll 0 0;"><a href="<?php echo $destino; ?>"><?php echo $titulo; ?></a></li>
            	<?php
            		}
            	?>
            </ul>
    		<?php
    		}
        	?>
        </sidebar>
        <article class="Contenidos">
        	<?php
        	if( get_field('titulo_contenidos') ) {
        	?>
        	<h2><?php echo get_field('titulo_contenidos'); ?></h2>
        	<?php
        	}
        	if( $contenido = get_field('contenidos') ){
        		for ($i=0; $i < count($contenido); $i++) {
        			$imagen_item = $contenido[$i]['bullet'];
        			$item = $contenido[$i]['item_contenido'];
        	?>
	        	<ul>
	            	<li>
	                	<h3 style="background: rgba(0, 0, 0, 0) url(<?php echo $imagen_item ?>) no-repeat scroll 0 0; background-position: 20px 18px;">
	                		<?php echo $item; ?>
	                	</h3>
	                    <?php 
	                    	if( $subitems = $contenido[$i]['subitems'] ){
	                    ?>
		                    <ul>
		                    	<?php 
		                    		for ($j=0; $j < count($subitems); $j++) { 
		                    		?>
		                        	<li>
		                        		<?php
		                        		$seccion = $subitems[$j]['seccion_subitem'];
		                        		$destino = $subitems[$j]['destino_subitem'];
		                        		$color = $subitems[$j]['color_subitem'];

		                        		?>
		                        		<a <?php if($seccion) echo'href="'.$destino.'"' ?>>
		                        		<?php echo $subitems[$j]['subitem'];if($seccion)?><span class="<?php echo $color; ?>"><?php echo $seccion; ?></span>
		                        		</a><?php
		                        			if($nivel_3 = $subitems[$j]['tercer_nivel']){
		                        			?>
		                        			<ul>
		                        				<?php 
		                        				for ($x=0; $x < count($nivel_3); $x++) { 
		                        				?>
				                                <li><?php echo $nivel_3[$x]['item_3'] ?></li>
		                        				<?php
		                        				}
		                        				?>
				                            </ul>
		                        			<?php
		                        			}
		                        		?>
		                        	</li>
		                    		<?php
		                    		}
		                    	?>
		                    </ul>
	                    <?php
	                    	}
	                    ?>
	                </li>
	            </ul>
        	<?php
        		}
        	}
        	?>
        </article>
	</div>
	<?php get_template_part( 'includes/contacto'); ?>
	<div id="contacto"></div>
</section>
<?php get_footer() ?>