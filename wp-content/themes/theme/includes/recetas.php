<?php
                            /* ----- RECETAS ----- */
            $args = array( 'orderby' => 'date',
                      'order' => 'DESC',
                      'post_type' => 'receta',
                      'post_status' => 'publish',
                      'suppress_filters' => false,
                    );

            // The Query
            $recetas = new WP_Query( $args );
        ?>
<section>
            <?php
                if ( $datos_receta = get_field('datos_receta') ) :
            ?>
            <h1><?php echo $datos_receta[0]['titulo_receta']; ?> <br><?php echo $datos_receta[0]['subtitulo_receta']; ?></h1>
            <?php
                endif; 
            ?>
            <div id="slider3">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            $tipo_clase = 0;
                            $j = 0;
                            if ( $recetas->have_posts() ) {
                                while ( $recetas->have_posts() ) {
                                $recetas->the_post();
                                if(get_field('mostrar')){
                                if( $j == 0 ){
                                    if( $tipo_clase == 0 )
                                        $clase=' class="swiper-slide big"';
                                    else
                                        $clase=' class="swiper-slide"';
                                    echo "<div ".$clase.">";
                                }
                                if(get_field('mostrar')){
                                $j++;
                            ?>
                            <article class= "<?php if( ( $j>1 && $j<=3 ) || ( $tipo_clase == 1) ) echo "small"; else echo ""?>" >
                               <?php 
                                    $imagen = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                               ?>
                                <img src="<?php echo $imagen[0]; ?>" alt="<?php echo get_the_title(); ?>">
                                <div class="receta">
                                    <?php 
                                        $categorias = get_the_terms ( $post->ID, 'tipo_receta' );
                                     ?>
                                    <h2>
                                        <?php 
                                            if( $categorias ) {
                                                foreach( $categorias as $categoria )
                                                    echo $categoria->name;
                                            }
                                        ?>
                                    </h2>
                                    <h1><?php echo get_the_title(); ?></h1>
                                    <span><a href="<?php echo get_the_permalink(); ?>"><?php echo $datos_receta[0]['frase_ver_receta']; ?></a></span>
                                    <span><a href="<?php echo get_the_permalink(); ?>">+</a></span>
                                </div>
                            </article>
                            <?php
                                }
                                if( ($tipo_clase == 0) && ($j == 4) ){
                                    $tipo_clase = 1;
                                    $j = 0;
                                }

                                if( ($tipo_clase == 1) && ($j == 2) ){
                                    $tipo_clase = 0;
                                    $j = 0;
                                }

                                if( $j == 0 ){
                                    echo "</div>";
                                }
                        }
                        }
                        /* Restauro la Post Data original */
                            wp_reset_postdata();
                            /* Si no hay mas recetas y no se completo algun div, lo cierro */
                             if( $j!=0 ){
                                echo"</div>";
                            }
                        }
                       
                        ?>
            </div>
        </div>
        <div class="hand"><span></span></div>
        <?php 
            if ( $datos_receta = get_field('datos_receta') ) :
        ?>
                <a href="<?php echo $datos_receta[0]['destino_recetario']; ?>"><?php echo $datos_receta[0]['frase_recetario']; ?><span>+</span></a>
        <?php
            endif;
        ?>
    </div>
    </section>