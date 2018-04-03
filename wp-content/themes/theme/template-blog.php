<?php
/*
Template Name: Blog
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
<?php
   $args = array( 'orderby' => 'date',
                  'order' => 'DESC',
                  'post_type' => 'blog',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'suppress_filters' => false,
                );

 // The Query
$blogs = new WP_Query( $args );
?>

    <section class="blog">
        <h1><?php echo get_field('recientes'); ?></h1>
    <div class="masonry">
        <?php
            if( isset($blogs) ) {
                if ( $blogs->have_posts() ) {
                    while ( $blogs->have_posts() ) {
                    $blogs->the_post();
                    $categorias = get_the_terms ( $post->ID, 'tipo_blog' );
                    // $tipo_blog = array( "noticias","buencafe","infografias","reportes","tendencias","news-en","buencafe-en","infographics","reports","tendencies" );
                    $imagen = get_field('miniatura');
                      
        ?>
                    <article>
                        <?php
                            foreach ($categorias as $categoria) {
                        ?>
                        <h2 class="color-<?php echo $categoria->slug; ?>"><?php foreach( $categorias as $categoria ) echo $categoria->name; ?></h2>
                        <img src="<?php echo $imagen; ?>" alt="<?php echo get_the_title(); ?>">
                        <?php /*the_post_thumbnail( 'Mysize' );*/ ?>
                        <div class="content color-<?php echo $categoria->slug; ?>">
                            <h3><?php echo get_the_date(); ?></h3>
                            <h1><?php echo get_the_title(); ?></h1>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="color-<?php echo $categoria->slug; ?>">+</a>
                        <div class="postit color-<?php echo $categoria->slug; ?>">
                            <span class="see"><i class="noText">Ver</i>
                                <span>
                                    <?php
                                        $id = get_the_ID();
                                        echo $cantidadVisitas = getPostViews( $id ); 
                                        $visitas[] = array('id' => $id, 'visitas' => $cantidadVisitas); 
                                    ?>
                                </span>
                            </span>
                            <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() ); ?></span></span>
                            <?php get_template_part( 'includes/favorites'); ?>
                            <?php get_template_part( 'includes/share'); ?>
                        </div>
                        <?php
                            }
                        ?>
                    </article>
        <?php
                }
            }
            }
        ?>
	</div>
    </section>
    <?php
         /* Ordenamiento de los blogs mas visitados */
         // Obtengo una lista de columnas
        foreach ($visitas as $clave => $fila) {
            $Id[$clave] = $fila['id'];
            $Visitas[$clave] = $fila['visitas'];
        }

        // Ordenar los datos con visitas descendiente
        array_multisort($Visitas, SORT_DESC, $Id, SORT_ASC, $visitas);

        for ($i=0; $i < count($visitas); $i++) { 
            $BlogsMasVisitados[] = $visitas[$i]['id'];
        }
        
        wp_reset_postdata();
    ?>
     <section>
           
                <h1><?php echo get_field('mas_leidos'); ?></h1>
            <div id="slider3">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            /* BUSCO LOS POST DE TIPO BLOG MEDIANTE LOS ID */

                            $j = 0;
                            // for ($i=0; $i < count($BlogsMasVisitados)/2; $i++) { 
                                // $posts = get_post( $BlogsMasVisitados[$i] );
                            $args = array('meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                            'post_type' => 'blog',
                            'posts_per_page' => 40,
                            'post_status' => 'publish',
                            'post__in' => $BlogsMasVisitados,
                            'suppress_filters' => false,
                            );
                            $mas_leidos = new WP_Query($args);
                            if ( $mas_leidos->have_posts() ) {
                            while ( $mas_leidos->have_posts() ) {
                            $mas_leidos->the_post();
                            $imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Mysize' );
                            
                            if( $j==0 )
                                echo '<div class="swiper-slide">';
                            $j++;
                        ?>
                            <article>
                                <!-- <img src="<?php echo $imagen; ?>" alt="<?php echo get_the_title(); ?>" > -->
                                <?php the_post_thumbnail( 'Mysize' ); ?>
                                <?php $categorias = get_the_terms ( $post->ID, 'tipo_blog' ); 
                                    foreach ($categorias as $categoria) {
                               ?>
                                        <div>
                                        <h1 class="color-<?php echo $categoria->slug; ?>"><?php echo get_the_title(); ?></h1>
                                        <a href="<?php echo get_the_permalink(); ?>" class="color-<?php echo $categoria->slug; ?>">+</a>    
                                            <div class="postit color-<?php echo $categoria->slug; ?>">
                                                <span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews( get_the_ID() ); ?></span></span>
                                                <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() ); ?></span></span>
                                                <?php get_template_part( 'includes/favorites'); ?>
                                                <?php get_template_part( 'includes/share'); ?>
                                            </div>
                                        </div>
                                <?php
                                    }
                                ?>
                            </article>
                            <?php
                                if($j==2) $j=0;
                                if( $j==0 )
                                   echo '</div>';
                            // }
                            }
                            wp_reset_postdata();
                            }
                            ?>
                    </div>
                </div>
            </div>
        </section>
            <?php 
                if( is_user_logged_in() ) {
            ?>
                <section class="blog">
                    <h1><?php echo get_field('favoritos'); ?></h1>
                        <div class="masonry">
                    <?php
                    $user_favorites = wpfp_get_users_favorites();

                    if( $user_favorites != "" ){
                    $args = array('orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'blog',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'post__in' => $user_favorites,
                        'suppress_filters' => false,
                    ); 

                    $favoritos = new WP_Query($args);

                        if ( $favoritos->have_posts() ) {
                        while ( $favoritos->have_posts() ) {
                        $favoritos->the_post();
                        $imagen = get_field('miniatura');
                        $categorias_favoritos = get_the_terms ( $post->ID, 'tipo_blog' );
                    ?> 


                        <article>
                            <?php
                            foreach ($categorias_favoritos as $categoria) {
                            ?>
                                <h2 class="color-<?php echo $categoria->slug; ?>"><?php echo $name; ?></h2>
                                <img src="<?php echo $imagen ?>" alt="<?php echo get_the_title(); ?>" >
                                <?php /*the_post_thumbnail( 'Mysize' ); */?>
                                <div class="content color-<?php echo $categoria->slug; ?>">
                                    <h3><?php echo get_the_date(); ?></h3>
                                    <h1><?php echo get_the_title(); ?></h1>
                                </div>
                                <a href="<?php echo get_the_permalink(); ?>" class="color-<?php echo $categoria->slug; ?>">+</a>
                                <div class="postit color-<?php echo $categoria->slug; ?>">
                                    <span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews( get_the_ID() );?></span></span>
                                    <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( get_the_ID() );?></span></span>
                                    <?php get_template_part( 'includes/favorites'); ?>
                                    <?php get_template_part( 'includes/share'); ?>
                            <?php
                            }
                            ?>
                            </div>
                        </article>
                        <?php
                        }
                        wp_reset_postdata();
                        }
                        else{
                        ?>
                            <span class="sinFav">No posee favoritos</span>
                        <?php
                        }
                        ?>
                            </div>

                </section>
            <?php
                }
            }

            ?>
</section> <!-- CIERRE DEL SECTION ID="BLOG" (SE ENCUENTRA EN EL HEADER.PHP) -->



<?php get_footer(); ?>