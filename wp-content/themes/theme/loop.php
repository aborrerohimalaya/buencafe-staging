<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<?php 
  $categorias = get_the_terms ( $post->ID, 'tipo_blog' );
  if($categorias){
    foreach ($categorias as $categoria) {
      $color = $categoria->slug;
      $category = $categoria->name;
    }
  }
  else{
    $color = "otros";
    $category = "Otros";
  }
?>

<article class="post">
  <h2 class="color-<?php echo $color ?>"><?php echo $category ?></h2>
    <?php 
      if(!$image){ 
        if( $img_pagina = get_field('imagen_encabezado') ){
    ?>
      <a href="<?php the_permalink(); ?>"><img src="<?php echo $img_pagina; ?>" alt="<?php the_title(); ?>" /></a>
    <?php
        }
      }
      else{
      ?>
      <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
      <?php
      }
    ?>
  <div class="content color-<?php echo $color ?>">
    <h1><?php the_title(); ?></h1>
  </div>
</article>