     <section id="productos">
            <?php
             $link_actual = get_permalink( $post->ID );
            $link_actual = explode("/", $link_actual);
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
                                    <div style="display:none;"><?php
                                     var_dump($link_actual); 
                                     if(in_array("ja",$link_actual)){
                                     	echo "sirve japones";
                                     }
                                     
                                     ?></div>
                                     <?php if(in_array("ja",$link_actual) or in_array("zh-hant",$link_actual) ): ?>
                                        <a class="producto" <?php if( $destino = get_field('destino_producto') ) echo 'href= "'.$destino.'#'.trim($descripcion).'"' ?> 
                                         <?php if( $descarga = get_field('descargar') ) echo 'data-descarga = "'.$descarga.'"'; 
                                              else echo 'data-product = "'.$descripcion.'"' ?> >
                                         <span>+</span></a>
                                     <?php else: ?>
                                         <a class="producto" <?php if( $destino = get_field('destino_producto') ) echo 'href= "'.$destino.'#'.format_uri($descripcion).'"' ?> 
                                         <?php if( $descarga = get_field('descargar') ) echo 'data-descarga = "'.$descarga.'"'; 
                                              else echo 'data-product = "'.$descripcion.'"' ?> >
                                         <span>+</span></a>
                                     <?php endif; ?>
                                   
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