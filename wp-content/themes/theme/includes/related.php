<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Alan Gabriel Dawidowicz - www.alandawi.com.ar
 */
?>
<?php
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
	$first_tag = $tags[0]->term_id;
	$args=array(
	//'tag__in' => array($first_tag),
	'post__not_in' => array($post->ID),
	'post_type'=>  get_post_type($post->ID),
	'posts_per_page'=>6
	//'caller_get_posts'=>1
	);

	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
?>

<section id="relacionadas">
<h1>Notas Relacionadas</h1>
<div class="posts">
<?php 
	$i = 0;
		$j = 0;

		if (!isset($i)) {
			$i = 0;
		}

		if (!isset($j)) {
			$j = 0;
		}
 ?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($j == 0) echo '<div class="box">';
		$i = 1;
		?>
	<article class="post largo">
		<?php 
	       $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
	       if ($image) { 
	    ?>
	       <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
	    <?php } else { ?>
	       <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/bg.jpg" alt="<?php the_title(); ?>" /></a>
	    <?php } ?>
       <div class="text">
       	<?php 
	        if (get_field('color_titulo') == "defecto") {
	          $colorTitulo = '';
	        } else if (get_field('color_titulo') == "azul") {
	          $colorTitulo = 'style="color: #1B24DF;"';
	        } else if (get_field('color_titulo') == "blanco") {
	          $colorTitulo = 'style="color: #FFFFFF;"';
	        } else if (get_field('color_titulo') == "rojo") {
	          $colorTitulo = 'style="color: #DF1B1B;"';
	        }

	        if (get_field('color_subtitulo') == "defecto") {
	          $colorSubTitulo = '';
	        } else if (get_field('color_subtitulo') == "azul") {
	          $colorSubTitulo = 'style="color: #1B24DF;"';
	        } else if (get_field('color_subtitulo') == "blanco") {
	          $colorSubTitulo = 'style="color: #FFFFFF;"';
	        } else if (get_field('color_subtitulo') == "rojo") {
	          $colorSubTitulo = 'style="color: #DF1B1B;"';
	        }
	      ?>
	      <h2 <?php echo $colorSubTitulo; ?>><?php the_field('subtitulo'); ?></h2>
	      <h1 <?php echo $colorTitulo; ?>><?php the_title(); ?></h1>
       </div>
       <div class="btn">
          <a class="noText ir" href="<?php the_permalink(); ?>">Ir</a>
       </div>
    </article>
    <?php
		$j++;
		if($j == 2) {
			$i = 0;
			echo '</div>';
			$j = 0;
		}?>
<?php endwhile; ?>
</div>
</div>
</section>
<?php	}
	wp_reset_query();
	}
?>
