<?php
/*
Template Name: Home
*/
?>

<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>

<?php
    /* ----- LINK ACTUAL ----- */
    $link_actual = get_permalink( $post->ID );
    $link_actual = explode("/", $link_actual);

    /* Detectar si esta en otro idioma */
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

<?php get_header(); ?>


 <section class="home">

    <?php
                        /* ----- SLIDER ----- */
        if ( $datos_slider = get_field('datos_slider') ) :
    ?>
        <section id="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
    <?php
                    foreach ($datos_slider as $datos) :
    ?>
                    <article  class="swiper-slide">
                        <a href="<?php echo $datos['destino']; ?>" data-descarga="<?php echo $datos['descargar_slider'];?>"><img src="<?php echo $datos['imagen_slider']; ?>" title="<?php echo $datos['titulo_slider']; ?>"></a>
                    </article>
    <?php
                    endforeach;
    ?>
                </div>    
                <div class="swiper-pagination"></div> 
            </div>    
        </section>
        <section id="title-page" class="container-fluid">
            <div class="row">
                <div class="col-md-4 title">
                    <h1><?php the_field('titulo_home');?></h1>
                </div>
                <div class="col-md-8 description">
                    <?php the_field('descripcion_home');?>
                </div>
            </div>
        </section>

    <?php
        endif;
                                /* ----- PRODUCTOS ----- */
        get_template_part('includes/productos');
    ?>
        <?php               /* ----- SECCIONES ----- */
            if ( $datos_secciones= get_field('datos_secciones') ) :
                $i = 0;
                foreach ($datos_secciones as  $clave => $seccion) :
                $i++;
        ?>
        <section class="section-<?php echo $clave ?>">
            <h1><?php echo $seccion['titulo_seccion']; ?></h1>
            <h2><?php echo $seccion['subtitulo_seccion']; ?></h2>
            <p style="background: url( <?php echo $seccion['imagen_seccion']; ?> ) no-repeat 
                <?php if( $i == 1) echo "center"; else echo "left;" ?> center">
                <?php echo $seccion['descripcion_seccion']; ?>
            </p>
            <a class="noText" href="<?php echo $seccion['destino_seccion']; ?>">+</a>
        </section>
        <?php
            endforeach;
           endif; 
        ?>
        
                                <!-- BLOGS -->
    <section class="blog">
        <?php
            if ( $datos_blog= get_field('datos_blog') ) :
        ?>
        <h1><?php echo $datos_blog[0]['titulo_blog']; ?></h1>
        <h2><?php echo $datos_blog[0]['subtitulo_blog']; ?></h2>
        <?php
            endif; 
        ?>
    <div class="masonry">
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

            if ( $blogs->have_posts() ) {
                while ( $blogs->have_posts() ) {
                $blogs->the_post();
                if(get_field('mostrar')){
                $imagen = get_field('miniatura');
        ?>
        <article>
            <img src="<?php echo $imagen; ?>" alt="<?php echo get_the_title(); ?>">
            <h1><?php echo get_the_title(); ?></h1>
            <div class="postit">
                <span class="see"><i class="noText">Ver</i> <span><?php echo getPostViews( $post->ID ); ?></span></span>
                <span class="comment"><i class="noText">Comentarios</i> <span><?php echo get_comments_number( $post->ID ); ?></span></span>
                <?php get_template_part( 'includes/favorites'); ?>
                <?php get_template_part( 'includes/share'); ?>
            </div>
            <a href="<?php echo get_the_permalink(); ?>"><?php if( $english ){ echo 'Learn More'; }elseif( $japanese ){ echo'詳細'; }elseif( $chinese){ echo'了解更多'; }else{ echo'Conocer más'; } ?></a>


        </article>
        <?php
                }
                }
                wp_reset_postdata();
            }
        ?>
    </div>
    <div class="view-more">
        <a href="<?php echo get_field('url_blog') ?>">
            <?php echo icl_translate('wpml_custom', 'ver_mas_blog', 'Ver más articulos+') ?>
        </a>
        <span class="b_2"></span>
        <span class="b_3"></span>
    </div>
    </section>
    <?php get_template_part( 'includes/recetas-home'); ?>
 <?php get_template_part( 'includes/contacto'); ?>
    <section class="slogan" style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('pre_footer_fondo'); ?>) no-repeat scroll center top;">
        <h1><?php echo get_field('pre_footer_frase'); ?></h1>
        <a href="<?php echo get_field('pre_footer_destino'); ?>" target="_blank"><?php echo get_field('pre_footer_frase_destino'); ?></a>
    </section>
</section>

<div class="overlay"></div>



<?php #get_template_part( 'includes/portfolio'); ?>
<div class="portafolio-nuevo portafolio-cf7">
     <?php get_template_part('includes/portafolio-cf7'); ?>
</div>

<?php get_footer(); ?>

<script>
    $('.swiper-button-prev').on('click',function(){
        swiper2.swipePrev();
    });
    $('.swiper-button-next').on('click',function(){
        swiper2.swipeNext();
    });
</script>