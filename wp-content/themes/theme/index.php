<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header();?>
<?php
    // $temp = $the_query;

    // $the_query = NULL;
    // $args = array();
    // $args['post_type'] = array('post', 'receta', 'producto');

    // $args['posts_per_page'] = -1;
    // $args['meta_key'] = 'destacado_home';
    // $args['meta_value'] = TRUE;
    // $args['orderby'] =  array( 'post_author' => DESC, 'ID' => DESC ) ;
    // $the_query = new WP_Query($args);
?>
<!--  <section class="home">
        <section id="slider">

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <article  class="swiper-slide">
                        <h1>Set your apart from <br> the competition with <strong>Superior</strong><br><span>soluble</span><br><strong>Colombian</strong><br><strong>Coffee</strong></h1>
                        <a href="#"><img src="img/slide-home1.jpg"></a>
                    </article>
                    <article  class="swiper-slide">
                        <h1>Innovation for your brand</h1>
                        <a href="#"><img src="img/slide-home2.jpg"></a>
                    </article>
                    <article  class="swiper-slide">
                        <h1>Lead the change of the industry through a differentiated portfolio</h1>
                        <a href="#"><img src="img/slide-home3.jpg"></a>
                    </article>
                    <article  class="swiper-slide">
                        <h1>Our expertise will contribute to improve your bottom line</h1>
                        <a href="#"><img src="img/slide-home4.jpg"></a>
                    </article>
                    <article  class="swiper-slide">
                        <h1>Adding Value to the colombian coffe growers families</h1>
                        <a href="#"><img src="img/slide-home5.jpg"></a>
                    </article>
                </div>    
                <div class="swiper-pagination"></div>  
            </div>    
        </section>
        <section>
            <h1>Conoce nuestro <br>portafolio de productos</h1>
            <div id="slider2">

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                        <article  class="swiper-slide">
                            <div class="cover"><img src="img/productos-home.jpg"></div>
                            <a href="#"><span>+</span></a>
                            <h1>Descargar el<br>portafolio de empaques</h1>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h1>Innovación</h1>
            <p> <span><span>Manos expertas</span>
                a las que se les suma el apoyo de 
                <span> tecnologías de avanzada</span>, 
                garantizan un producto final<br> 
                que conserva el aroma <br>
                y el sabor excepcional <br>
                que hace del café de Colombia <br>
                el mejor del mundo.<br>
                <strong>Estamos orgullosos 
                    ya que es fruto <br>
                    de nuestro esfuerzo <br>
                    y pasión por el café.
                </strong></span>
            </p>
            <a class="noText" href="#">+</a>
        </section>
        <section>
            <h1>Café de Colombia</h1>
            <h2>Expertos en calidad</h2>
            <p><span>Las condiciones de ubicación geográfica, <br>
                el clima, el relieve y la biodiversidad <br>
                han permitido que el café colombiano <br>
                tenga una ventaja comparativa, <br>
                y sea un café de características <br>
                organolépticas excepcionales.</span>
            </p>
            <a class="noText" href="#">+</a>
        </section>
        <section>
            <h1>Nuestras Recetas</h1>
            <div id="slider3">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide big">
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                ¿<img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>

                        </div>

                        <div class="swiper-slide">
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                        </div>
                       <div class="swiper-slide big">
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                ¿<img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>

                        </div>

                        <div class="swiper-slide">
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                        </div>
                         <div class="swiper-slide big">
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                ¿<img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>

                        </div>

                <div class="swiper-slide">

                    <article class="small">
                        <img src="img/recetas.jpg">
                        <div class="receta"> 
                            <h2>Clásicas</h2>
                            <h1>Galletas de ajedrez</h1>
                            <a href="#"><span>Ver preparación</span></a>
                            <span>+</span>
                        </div>
                    </article>
                    <article class="small">
                        <img src="img/recetas.jpg">
                        <div class="receta"> 
                            <h2>Clásicas</h2>
                            <h1>Galletas de ajedrez</h1>
                            <a href="#"><span>Ver preparación</span></a>
                            <span>+</span>
                        </div>
                    </article>
                </div>
               <div class="swiper-slide big">
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                ¿<img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article>
                                < class="receta"img src="img/recetas.jpg">
                                <div> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>

                        </div>

                <div class="swiper-slide">
                    <article class="small">
                        <img src="img/recetas.jpg">
                        <div class="receta"> 
                            <h2>Clásicas</h2>
                            <h1>Galletas de ajedrez</h1>
                            <a href="#"><span>Ver preparación</span></a>
                            <span>+</span>
                        </div>
                    </article>
                    <article class="small">
                        <img src="img/recetas.jpg">
                        <div class="receta"> 
                            <h2>Clásicas</h2>
                            <h1>Galletas de ajedrez</h1>
                            <a href="#"><span>Ver preparación</span></a>
                            <span>+</span>
                        </div>
                    </article>
                </div>
                <div class="swiper-slide big">
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                ¿<img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article class="small">
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>
                            <article>
                                <img src="img/recetas.jpg">
                                <div class="receta"> 
                                    <h2>Clásicas</h2>
                                    <h1>Galletas de ajedrez</h1>
                                    <a href="#"><span>Ver preparación</span></a>
                                    <span>+</span>
                                </div>
                            </article>

                        </div>

            </div>
        </div>
        <div class="hand"></div>
        <a href="recetas.html">Ver recetario <span>+</span></a>
    </section>
    <section class="blog">
        <h1>Blog</h1>
        <h2>Artículos destacados del blog.</h2>
        <article>
            <img src="img/blog.jpg">
            <h1>Café liofilizado, más amigable con el medio ambiente</h1>
            <div class="postit">
                <span class="see"><i class="noText">Ver</i> <span>43</span></span>
                <span class="comment"><i class="noText">Comentarios</i> <span>9</span></span>
                <span class="favorite off"><i class="noText">favorito</i></span>
                <span class="share"><span class="noText">Compartir</span><span><a href="#" class="fb">fb</a><a href="#" class="tw">tw</a></span></span>
            </div>
            <a href="#">Conocer más</a>
        </article>
        <article>
            <img src="img/blog.jpg">
            <h1>Café liofilizado, más amigable con el medio ambiente</h1>
            <div class="postit">
                <span class="see"><i class="noText">Ver</i> <span>43</span></span>
                <span class="comment"><i class="noText">Comentarios</i> <span>9</span></span>
                <span class="favorite off"><i class="noText">favorito</i></span>
                <span class="share"><span class="noText">Compartir</span><span><a href="#" class="fb">fb</a><a href="#" class="tw">tw</a></span></span>
            </div>
            <a href="#">Conocer más</a>
        </article>
        <article>
            <img src="img/blog.jpg">
            <h1>Café liofilizado, más amigable con el medio ambiente</h1>
            <div class="postit">
                <span class="see"><i class="noText">Ver</i> <span>43</span></span>
                <span class="comment"><i class="noText">Comentarios</i> <span>9</span></span>
                <span class="favorite off"><i class="noText">favorito</i></span>
                <span class="share"><span class="noText">Compartir</span><span><a href="#" class="fb">fb</a><a href="#" class="tw">tw</a></span></span>
            </div>
            <a href="#">Conocer más</a>
        </article>
    </section>
    <section>
        <h1><a href="contactenos.html">Contáctanos</a></h1>
        <p>Pueder dejarnos tu consulta o comentario. Estamos agradecidos de poder ayudarte.</p>
    </section>
    <section>
        <h1>Somos parte de la Gran Familia Café de Colombia</h1>
        <a href="about.html">Conoce más + </a>
    </section>
</section> -->
	<?php get_footer();?>