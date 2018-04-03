<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>

<?php
    $link_actual = explode("/", get_permalink( $post->ID ));
    /* Detectar si esta en ingles */
    if ( in_array("en", $link_actual ) ){
        $english = true;
    }
?>

<?php
/* CREAR UN WPQUERY, BUSCAR POR CATEGORIA Y ASIGNALE LOS POST PER PAGE */
  if ($_GET['month'] != "" ) { $month = $_GET['month']; }
  if ($_GET['anio'] != "") { $anio = $_GET['anio']; }

  $categorias = get_the_terms ( $post->ID, 'tipo_blog' );
  foreach ($categorias as $categoria) {
    $nombre_categoria = $categoria->name;
    $slug_categoria = $categoria ->slug;
  }
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
    <h2 class="text-color-<?php echo $slug_categoria; ?>"><?php echo $nombre_categoria; ?></h2>
    <h3> <?php if( !$english ) echo "Realiza tu busqueda mediante los filtros "; else echo "Make your search using filters"; ?></h3>

    <?php
  if (get_post_type() == "blog" ) {
    // $taxonomies = 'tipo_blog';
    $url = 'tipo_blog/'.$slug_categoria;
  }
  ?>

  <form id="buscar">
        <input type="hidden" value="<?php  bloginfo("url") ?>/<?php echo $url; ?>" id="url">
        <select id="month">
        <?php if( !$english ){
        ?>
          <option value="">Mes</option>
          <option id="mes" value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        <?php
        }
        else{
        ?>
          <option value="">Month</option>
          <option id="mes" value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">Septembrer</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        <?php
        }
        ?>
        </select>
         <select id="year">
            <option value=""><?php if( !$english ) echo "Año"; else echo "Year"; ?></option>
            <option value="2016">2016</option> 
            <option value="2015">2015</option> 
        </select>

    <a class="submit"><?php echo icl_translate('wpml_custom', 'Buscar', 'Buscar') ?></a>
    <input type="submit" value="<?php echo icl_translate('wpml_custom', 'Buscar', 'Buscar') ?>">
  </form>
  <a class="close"></a>

<section class="blog infinite">
  <?php
  if ( !isset($month) && !isset($anio) ) { /* Si no se realiza ninguna busqueda se muentran todos los blogs */
    // if( $blogs->have_posts() ){
      while( have_posts() ){
        the_post();
        $imagen = get_field('miniatura');
  ?>
    <!-- <div class="box"> -->
      <article class="box">
        <h2 class="color-<?php echo $slug_categoria; ?>"><?php echo $nombre_categoria; ?></h2>
        <img src="<?php echo $imagen; ?>" alt="<?php echo get_the_title(); ?>">
        <div class="content color-<?php echo $slug_categoria; ?>">
            <h3><?php echo get_the_date(); ?></h3>
            <h1><?php echo get_the_title(); ?></h1>
        </div>
        <a href="<?php echo get_the_permalink(); ?>" class="color-<?php echo $slug_categoria; ?>">+</a>
        <div class="postit color-<?php echo $slug_categoria; ?>">
            <span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews( get_the_ID() ); ?></span></span>
            <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() ); ?></span></span>
            <?php get_template_part( 'includes/favorites'); ?>
            <?php get_template_part( 'includes/share'); ?>
        </div>
    </article>
  <!-- </div> -->
  <?php
    // echo do_shortcode('[ajax_load_more post_type="blog" taxonomy="tipo_blog" transition="slide" taxonomy_terms="'.$slug_categoria.'" taxonomy_operator="IN" posts_per_page="3" ]');
      }
  //     wp_reset_postdata();
    }
  // }
  else{ /* si se realiza una busqueda */
    $args['post_type'] = "blog";
    $args['taxonomy'] = "tipo_blog";
    $args['post'] = "tipo_blog";
    $args['term'] = $nombre_categoria;
    
    if ( $month && !isset($anio) ) { /* Si se busca solo por mes */
      $args['date_query'] = array( 'month' => $month );
    }
    else{
      if ( $anio && !isset($month) ) { /* Si se busca solo por año */
        $args['date_query'] = array( 'year' => $anio );
      }
      else{ /* Si se busca por ambos */
        $args['date_query'] = array( 'month' => $month, 'year' => $anio );
      }
    }
    $busqueda = new WP_Query( $args );

    if( isset($busqueda) ) {
      if ( $busqueda->have_posts() ) {
        while ( $busqueda->have_posts() ) {
        $busqueda->the_post();
        $imagen = get_field('miniatura');
?>
          <!-- <div class="box"> -->
            <article class="post">
              <h2 class="color-<?php echo $slug_categoria; ?>"><?php echo $nombre_categoria; ?></h2>
              <img src="<?php echo $imagen; ?>" alt="<?php echo get_the_title(); ?>" >
              <div class="content color-<?php echo $slug_categoria; ?>">
                  <h3><?php echo get_the_date(); ?></h3>
                  <h1><?php echo get_the_title(); ?></h1>
              </div>
              <a href="<?php echo get_the_permalink(); ?>" class="color-<?php echo $slug_categoria; ?>">+</a>
              <div class="postit color-<?php echo $slug_categoria; ?>">
                  <span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews( get_the_ID() ); ?></span></span>
                  <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() ); ?></span></span>
                  <?php get_template_part( 'includes/favorites'); ?>
                  <?php get_template_part( 'includes/share'); ?>
              </div>
          </article>
        <!-- </div> -->
<?php
        } /* fin while */
      }
      else{ /* Si no se encontro nada */
        echo "<span class='msj'>".icl_translate('wpml_custom', 'No_se_han_encontrado_resultados', 'No se han encontrado resultados')."</span>";
      }
    }
  } /* fin else */
  ?>
</section> 
<nav class="paginador">
  <?php if($paged > 1): ?>
    <a class="siguiente" href="<?php bloginfo('url'); ?>/tipo_blog/<?php echo $slug_categoria; ?>/page/<?php echo $paged-1 ?>"><?php echo $paged-1 ?></a>
  <?php endif ?>
    <a class="anterior" href="<?php bloginfo('url'); ?>/tipo_blog/<?php echo $slug_categoria; ?>/page/<?php echo $paged+1 ?>"><?php echo $paged+1 ?></a>
</nav>
<?php wp_reset_postdata(); ?>