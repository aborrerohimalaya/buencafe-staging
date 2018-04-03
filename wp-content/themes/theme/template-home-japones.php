<?php
/*
Template Name: Home-japones
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

 <section class="home">
    <?php
                        /* ----- SLIDER ----- */
        if ( $datos_slider = get_field('datos_slider') ) {
    ?>
        <section id="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
    <?php
                    foreach ($datos_slider as $datos) {
    ?>
                    <article  class="swiper-slide">
                        <h1><?php echo $datos['titulo_slider']; ?></h1>
                        <a href="<?php echo $datos['destino']; ?>"><img src="<?php echo $datos['imagen_slider']; ?>"></a>
                    </article>
    <?php
                    }
    ?>
                </div>    
                <div class="swiper-pagination"></div> 
            </div>    
        </section>
    <?php
        }
                                /* ----- PRODUCTOS ----- */
    ?>
        <section>
            <?php
                if ( $titulo = get_field('titulo_producto') ) {
            ?>
            <h1><?php echo $titulo; ?></h1>
            <?php
                 } 
            ?>
            <?php
            $args = array( 'orderby' => 'date',
              'order' => 'DESC',
              'post_type' => 'producto',
              'post_status' => 'publish',
              'suppress_filters' => false,
            );

            // The Query
            $productos = new WP_Query( $args );
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
            ?>
            <div id="slider2">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if ( $productos->have_posts() ) {
                            while ( $productos->have_posts() ) {
                            $productos->the_post();
                            if(get_field('mostrar')){
                                $imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            ?>
                                <article  class="swiper-slide">
                                    <div class="cover"><img src="<?php echo $imagen[0]; ?>"></div>
                                    <h1><?php if( $descripcion = get_field('descripcion_prducto') ) echo $descripcion; ?></h1>
                                    <a class="producto" <?php if( $destino = get_field('destino_producto') ) echo 'href= "'.$destino.'#'. format_uri($descripcion).'"' ?> 
                                        <?php if( $descarga = get_field('descargar') ) echo 'data-descarga = "'.$descarga.'"'; 
                                              else echo 'data-product = "'.$descripcion.'"' ?> >
                                    <span>+</span></a>
                                </article>
                            <?php    
                            }
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <?php               /* ----- SECCIONES ----- */
            if ( $datos_secciones= get_field('datos_secciones') ) {
                $i = 0;
                foreach ($datos_secciones as $seccion) {
                $i++;
        ?>
        <section>
            <h1><?php echo $seccion['titulo_seccion']; ?></h1>
            <h2><?php echo $seccion['subtitulo_seccion']; ?></h2>
            <p style="background: url( <?php echo $seccion['imagen_seccion']; ?> ) no-repeat 
                <?php if( $i == 1) echo "center"; else echo "left;" ?> center">
                <?php echo $seccion['descripcion_seccion']; ?>
            </p>
            <a class="noText" href="<?php echo $seccion['destino_seccion']; ?>">+</a>
        </section>
        <?php
                }
           } 
        ?>
        
   
 <?php get_template_part( 'includes/contacto'); ?>
    <section style="background: rgba(0, 0, 0, 0) url(<?php echo get_field('pre_footer_fondo'); ?>) no-repeat scroll center top;">
        <h1><?php echo get_field('pre_footer_frase'); ?></h1>
        <a href="<?php echo get_field('pre_footer_destino'); ?>" target="_blank"><?php echo get_field('pre_footer_frase_destino'); ?></a>
    </section>
</section>
<div class="overlay"></div>

<?php get_template_part( 'includes/portfolio'); ?>

<?php get_footer(); ?>

<script>
    $('.swiper-button-prev').on('click',function(){
        swiper2.swipePrev();
    });
    $('.swiper-button-next').on('click',function(){
        swiper2.swipeNext();
    });
</script>