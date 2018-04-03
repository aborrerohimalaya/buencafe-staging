<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php setPostViews(get_the_ID()); /* Funcion para contar la cantidad de entradas */ ?>
<?php 
	$categorias = get_the_terms ( $post->ID, 'tipo_blog' ); 
	$imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>


<section id="blog" class="intern detail">
	<?php 
		foreach ($categorias as $categoria){ /* Siempre es 1 */
	?>
			<!-- <h2 class="text-color-<?php echo $categoria->slug; ?>"><?php echo $categoria->name; ?></h2> -->
			<article>
			<div class="color-<?php echo $categoria->slug; ?> category_stripe"><span><?php echo $categoria->name; ?></span></div>
				<img src="<?php echo $imagen[0]; ?>">
				<div class="content color-<?php echo $categoria->slug; ?>">
					<h3><?php echo get_the_date(); ?></h3>
				</div>
					<h1 class=" color-<?php echo $categoria->slug; ?>"><?php echo get_the_title(); ?></h1>
				<div class="description">
					<?php the_content();  /* Obtengo el contenido */ ?>
				</div>
				<div class="tags">
					<?php
						$tags = get_the_tags(); /* Obtengo todos los tags de la entrada */
						if($tags) {
							foreach($tags as $tag) {
					?>
								<a href="#"><?php echo $tag->name; ?></a>
					<?php 
							}
						}
					?>
				</div>
				<div class="postit">
					<span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews(get_the_ID());?></span></span>
					<span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() ); ?></span></span>
					<?php get_template_part( 'includes/favorites'); ?>
                	<?php get_template_part( 'includes/share'); ?>
				</div>
				<section id="comments">
					<div class="comment-respond" id="respond">
						<?php comments_template(); /* Añade los comentarios */ ?>
					</div>
				</section>
			</article>
</section>
	<?php
		}
	?>
</section>

<script type="text/javascript">
<?php if (get_field('intereses')): ?>
var ids = [<?php foreach ( get_field('intereses') as $interes ) {  echo strstr($interes, ':', true) .',';} ?>];
invokeContactManagerInterestHit(ids);
<?php endif; ?>
</script> 
<?php get_footer(); ?>