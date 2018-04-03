<?php
/* Template Name: Productos */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>
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
<?php if(isset($english) && !is_null($english)):?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109926129-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109926129-1');
</script>

<script type="text/javascript">
_linkedin_data_partner_id = "158633";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=158633&fmt=gif" />
</noscript>



<?php elseif(isset($japanese ) && !is_null($japanese )):?>

<?php elseif(isset($chinese) && !is_null($chinese)):?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109851941-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109851941-1');
</script>

<script type="text/javascript">
_linkedin_data_partner_id = "158633";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=158633&fmt=gif" />
</noscript>

<?php else:?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109927125-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109927125-1');
</script>

<script type="text/javascript">
_linkedin_data_partner_id = "158633";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=158633&fmt=gif" />
</noscript>

<?php endif;?>
<section id="product">
		<?php
		if ( get_field('titulo_encabezado') && $img_encabezado = get_field('imagen_encabezado') ) {
		?>
        	<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo $img_encabezado; ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
		<?php
		 } 
		?>
        <article>
            <?php 
            	if ( get_field('titulo_acerca_de') ) {
            ?>
            		<h1><?php echo get_field('titulo_acerca_de'); ?></h1>
            <?php
            	}
            	if ( get_field('descripcion_acerca_de') ) {
            ?>
            		<h2><?php echo get_field('descripcion_acerca_de'); ?></h2>
            <?php
            	}
                $link_actual = explode("/", get_permalink( $post->ID ));
                /* Detectar idioma */

                if ( in_array("en", $link_actual ) )
                    $idioma = "english";
		elseif ( in_array("ja", $link_actual ) )
                    $idioma = "japanese";
		elseif ( in_array("zh-hant", $link_actual ) )
                    $idioma = "chinese";
                else
                    $idioma = "spanish";
            ?>
            <div class="active1"> 
            <div  id="<?php echo ( in_array("es", $link_actual ) )?'tipos-de-cafe':'types-of-coffee'?>" class="active TipoDeCafe <?php echo $idioma; ?>" data-idioma="<?php echo $idioma; ?>">
             <h3><a><?php if( $producto = get_field('producto_1') ) echo $producto;?></a></h3>
             <a href="#" data-product="extracto">Extracto</a>
             <!-- <a href="#" data-product="atomizado">Atomizado</a> -->
             <!-- <a href="#" data-product="aglomerado">Aglomerado</a> -->
             <a href="#" data-product="liofilizado">Liofilizado</a>
             <a href="#" data-product="roasted-instant">Roasted Instant</a>
              <?php
              $tipos_cafe = get_field('tipos_cafe');
                for ($i=0; $i < count($tipos_cafe); $i++) { 
                    $titulo = $tipos_cafe[$i]['titulo_tipo_cafe'];
                    $descripcion = $tipos_cafe[$i]['descripcion_tipo_cafe'];
                ?>
                    <div class="info" data-product="<?php echo format_uri($titulo) ?>">
                        <div class="close">x</div>
                        <h1><?php echo $titulo; ?></h1>
                        <p><?php echo $descripcion; ?></p>
                    </div>
                <?php
                }
              ?>
         </div>
         <?php 
            function format_uri( $string, $separator = '-' ) {
                $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
                $special_cases = array( '&' => 'and', "'" => '');
                $string = mb_strtolower( trim( $string ), 'UTF-8' );
                $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
                $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
                $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
                $string = preg_replace("/[$separator]+/u", "$separator", $string);
                return $string;
            }
            $producto = get_field('producto_2');
            
         ?>
         <div  id="<?php echo ( in_array("es", $link_actual ) )?'perfil-sensorial':'cup-profile' ?>" data-producto="<?php echo ( in_array("zh-hant", $link_actual) or in_array("ja", $link_actual) )?$producto: format_uri($producto); ?>" data-idioma="<?php echo $idioma; ?>" class="Sensorial">
             <h3><a><?php echo $producto; ?></a></h3>
         </div>
         <?php $producto = get_field('producto_3'); ?>
         <div  id="<?php echo ( in_array("es", $link_actual ) )?'niveles-de-tostacion':'roasting-levels' ?>" data-producto="<?php echo ( in_array("zh-hant", $link_actual) or in_array("ja", $link_actual) )?$producto: format_uri($producto); ?>" data-idioma="<?php echo $idioma; ?>" class="Tostacion">
             <h3><a><?php echo $producto; ?></a></h3>
         </div>
         <?php $producto = get_field('producto_4'); ?>
         <div  id="<?php echo ( in_array("es", $link_actual ) )?'certificaciones-de-materia-prima':'raw-material-certifications' ?>" data-producto="<?php echo ( in_array("zh-hant", $link_actual) or in_array("ja", $link_actual) )?$producto: format_uri($producto); ?>" data-idioma="<?php echo $idioma; ?>" class="Certificacion">
             <h3><a><?php echo $producto; ?></a></h3>
             <a href="<?php echo get_field('certificaciones')?>" class="popup-certificados" data-type="image" data-fancybox="group1"></a>
         </div>
         <?php $producto = get_field('producto_5'); ?>
         <div  id="" data-producto="<?php echo ( in_array("zh-hant", $link_actual) or in_array("ja", $link_actual) )?$producto: format_uri($producto); ?>" data-idioma="<?php echo $idioma; ?>" class="Empaques">
             <h3><a><?php echo $producto; ?></a></h3>
             <div class="abrirPopUp"></div>
             <div class="abrirPopUp"></div>
         </div></div>
     </article>
     <div class="wrapper">
        <section class="video">
        	<?php 
            	if ( get_field('titulo_proceso') ) {
            ?>
            		<h1><?php echo get_field('titulo_proceso'); ?></h1>
			<?php
            	}
            	if ( get_field('descripcion_proceso') ) {
            	?>
            		<p><?php echo get_field('descripcion_proceso'); ?></p>
            	<?php
            	}
            	if ( get_field('video') ) {
            	?>
            		<iframe width="590" height="421" src="<?php echo get_field('video'); ?>" frameborder="0" allowfullscreen></iframe>
            	<?php	
            	}
            ?>
        </section>
        <section class="premios">
            <?php 
                if ( get_field('titulo_premio') ) {
            ?>
                    <h1><?php echo get_field('titulo_premio'); ?></h1>
            <?php
                }
                if ( get_field('descripcion_premio') ) {
                ?>
                    <p><?php echo get_field('descripcion_premio'); ?></p>
                <?php
                }
                if ( $galeria_premio = get_field('galeria_premios') ) {
                ?>
                <div id="sliderproducto">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php 
                                foreach ($galeria_premio as $galeria) {
                            ?>
                                <article  class="swiper-slide">
                                    <div><img src="<?php echo $galeria['imagen_premio']; ?>"></div>
                                    <p><?php echo $galeria['descripcion_galeria']; ?></p>
                                </article>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <?php
                }
                ?>

        </section>
    </div>
    <?php 
        if ( get_field('imagen_detalle') && get_field('titulo_detalle') ) {
    ?>
        <section class="value" style="background: #ffebd5 url('<?php echo get_field('imagen_detalle'); ?>') no-repeat scroll center 10px;">
            <h1><?php echo get_field('titulo_detalle'); ?></h1>
        </section>
    <?php
        }

        if ( $datos_menu = get_field('menus') ) {
    ?>
            <section class="detail">
    <?php
            foreach ( $datos_menu as $menu ) {
    ?>
                <article>
                    <h2><?php echo $menu['titulo_menu']; ?></h2>
                    <ul>
                        <?php
                            foreach ($menu['items_menu'] as $item) {
                        ?>
                            <li><?php echo $item['item']; ?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </article>
    <?php
            }
    ?>
            </section>
    <?php
        }
    ?>
    <?php #get_template_part( 'includes/portfolio'); ?>
    <div class="portafolio-nuevo portafolio-cf7">
         <?php get_template_part('includes/portafolio-cf7'); ?>
    </div>
    <div class="overlay"></div>
    <?php get_template_part( 'includes/contacto'); ?>
    <div id="contacto"></div>
    
   <?php 
   	if($idioma == "spanish"):?>
   		 <div class="btn-contacto"><a href="<?php echo get_permalink(7384); ?>"><img src="<?php echo get_template_directory_uri()?>/img/boton_contacto.png" alt="Contacto" title="Contacto"></a></div>
   	<?php elseif($idioma == "japanese"): ?>
   	  <div class="btn-contacto"><a href="<?php echo get_permalink(7393); ?>"><img src="<?php echo get_template_directory_uri()?>/img/boton-contacto-JAP.png" alt="Contacto" title="Contacto"></a></div>
   	<?php elseif($idioma == "chinese"): ?>
   	  <div class="btn-contacto"><a href="http://www.buencafe.com/zh-hant/联系我们"><img src="<?php echo get_template_directory_uri()?>/img/boton-contacto-CHI.png" alt="Contacto" title="Contacto"></a></div>
   	<?php else: ?>
   		<div class="btn-contacto"><a href="<?php echo get_permalink(7392); ?>"><img src="<?php echo get_template_directory_uri()?>/img/boton_contact.png" alt="Contacto" title="Contacto"></a></div>
   	<?php endif;  ?>
        </section>

<?php get_footer() ?>