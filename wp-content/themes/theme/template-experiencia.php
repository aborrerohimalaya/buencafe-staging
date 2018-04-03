<?php
/* Template Name: Experiencia de Marca */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>
<section id="experiencia" class="intern">
<?php
	/* --------------- Encabezado --------------- */
	if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
	?>
		<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado'); ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
	<?php
	}
?>
<article class="videos">
	<?php
		/* --------------- Videos --------------- */
		if( get_field('titulo_experiencia') && get_field('descripcion_experiencia') ){
	?>
	    <h1><?php echo get_field('titulo_experiencia'); ?></h1>
	    <p><?php echo get_field('descripcion_experiencia'); ?></p>
	<?php
		}	 
	?>
   <div class="wrapper">
   	 <div>
    	<!-- <video id="videoActual" width="590" controls src=""></video> -->
   	<iframe id="videoActual" src="" width="590" height="421" frameborder="0" allowfullscreen></iframe>
       <p><strong></strong><span></span></p>
   </div>
		<ul>
			<?php
			function format_uri( $string, $separator = '-' ){
                $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
                $special_cases = array( '&' => 'and', "'" => '');
                $string = mb_strtolower( trim( $string ), 'UTF-8' );
                $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
                $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
                $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
                $string = preg_replace("/[$separator]+/u", "$separator", $string);
                return $string;
            } 
			if( $videos = get_field('videos_experiencia') ){
				for ($i=0; $i < count($videos); $i++) {
					$video = $videos[$i]['video'];
					$titulo_video = $videos[$i]['titulo_video'];
					$descripcion_video = $videos[$i]['descripcion_video'];
			?>
		        <li>
		        	<img src="<?php echo $videos[$i]['miniatura_video']; ?>">
		        	<a data-video="<?php echo $video; ?>" data-titulo="<?php echo $titulo_video; ?>" data-descripcion="<?php echo $descripcion_video; ?>">
		        		<?php echo $titulo_video; ?>
		        	</a>
		        </li>
			<?php
				}
			} 
			?>
       </ul>
   </div>
</article>
<article class="recetas">
	<?php 
		/* --------------- Recetas de Liofilizado --------------- */
		if( get_field('titulo_relaciones') ){
			?>
				<h1><?php echo get_field('titulo_relaciones'); ?></h1>
			<?php
			$args = array( 'orderby' => 'date',
	      	  'order' => 'DESC',
		      'post_type' => 'receta',
		      'post_status' => 'publish',
		      'tag' => 'liofilizado',
		      'suppress_filters' => false,
		      'posts_per_page'=> 3
		    );
			$recetas = new WP_Query($args); 
			
			if ( $recetas->have_posts() ) {
				while ( $recetas->have_posts() ) {
					$recetas->the_post();
					$imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
		?>
				    	
				    <div class="liofilizado">
				    	<img src="<?php echo $imagen[0]; ?>">
				    	<a href="<?php echo get_the_permalink(); ?>"><span>+</span></a>
				    </div>
		<?php
				}
				wp_reset_postdata();
		?>
				    <a href="<?php echo get_field('destino_recetario'); ?>"><?php echo get_field('ver_recetario'); ?></a>
		<?php
			}
		?>
		<?php
		}
	?>
</article>
<article class="slider-experiencia">
	<?php 
		/* --------------- El Mundo --------------- */
		if( $titulo = get_field('titulo_mundo') ){
		?>
    		<h1><?php echo $titulo; ?></h1>
		<?php
		}
		if( $descripcion = get_field('descricion_mundo') ){
		?>
    		<p><?php echo $descripcion; ?></p>
		<?php
		}
	?>
	<?php
		if( $slider = get_field('slider_mundo') ){
		?>
		    <div class="swiper-container">
		        <div class="swiper-wrapper">
		        	<?php
		        		foreach ($slider as $img) {
		        	?>
			        	<a href="<?php echo $img ['link_slider_mundo']; ?>" class="swiper-slide">
				            <article>
				                <img src="<?php echo $img ['imagen_mundo']; ?>">
				            </article>
			        	</a>
		        	<?php
		        		}
		        	?>
		        </div>    
		    </div>    
		    <div class="swiper-pagination"></div>  
		<?php
		}
	?>
</article>
<?php get_template_part( 'includes/contacto'); ?>
<div id="contacto"></div>
</section>
<?php get_footer() ?>
<script src="<?php bloginfo('template_url'); ?>/js/video.js"></script>