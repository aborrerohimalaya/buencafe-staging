<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>

<?php get_header(); ?>
<?php the_post(); ?>

<section id="page" class="page">
  <div class="wrapper">
  <h1 id="titulo"><?php the_title(); ?></h1>
  <div class="descripcion"><?php the_content(); ?></div>
  </div>
</section>

<?php get_footer(); ?>