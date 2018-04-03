<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>

<?php get_header(); ?>

<section id="home">
	<h1 id="titulo_search">Resultados de: "<?php echo get_search_query(); ?>"</h1>
	<div class="posts">
		<div class="masonry">
			<?php  

			if ( have_posts() ) : while ( have_posts()  ) : the_post();

				get_template_part( 'loop');
			
			endwhile; 
			wp_reset_postdata(); 
			else: 
				endif;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>