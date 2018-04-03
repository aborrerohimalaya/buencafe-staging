<?php
/*
Template Name: Contact Form
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
<?php #the_post(); ?>
<?php
    $link_actual = explode("/", get_permalink( $post->ID ));
    /* Detectar si esta en ingles */
    if ( in_array("en", $link_actual ) ){
        $english = true;
    }

    if ( in_array("ja", $link_actual ) ){
        $japanese = true;
    }

    if ( in_array("zh-hant", $link_actual ) ){
        $chinese= true;
    }


?>


<main role="main">
		<!-- section -->
		
<section id="contact" class="intern detail">

			<?php
  /* --------------- Encabezado --------------- */ 
  if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
  ?>
    <h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado') ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
    <?php
  }
  ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class('flex-row'); ?>>

			<h2 class="titulo">
				<?php the_field('titulo') ?>
			</h2>
			<div class="descripcion">
				<?php the_field('descripcion') ?>
			</div>
			<h3 class="subtitulo">
				<?php the_field('subtitulo'); ?>
			</h3>
			<div class="content">
				<?php the_content(); ?>
			</div>
			<section id="map">
      <div id="gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.7042432315657!2d-75.61008538528034!3d4.988719440481951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x4c6e13fa6e819611!2sFabrica+de+Cafe+Liofilizado!5e0!3m2!1ses-419!2sbr!4v1456890171980" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
      <h3><strong><?php echo get_field('titulo_contacto'); ?></strong><?php echo get_field('ubicacion');?><br><?php echo get_field('telefono'); echo get_field('fax'); ?>
      </h3>
  </section>

</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php #get_sidebar(); ?>

<?php get_footer(); ?>