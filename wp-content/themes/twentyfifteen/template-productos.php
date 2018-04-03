<?php
/* Template Name: Productos */

/**
* @package Wordpress
* @subpackage Adamantium - Starter Kit
* @author Bitopia Digital Agency
*/
?>

<?php get_header(); ?>

<section id="product">
		<?php
		if ( get_field('titulo_encabezado') && $img_encabezado = get_field('imagen_encabezado') ) {
		?>
        	<h1 style="background: rgba(0, 0, 0, 0) url('<?php echo $img_encabezado; ?>') no-repeat scroll 0 0;"><?php echo get_field('titulo_encabezado'); ?></h1>
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
            ?>
            <div class="active1"> 
                <div class="active Aglomerado">
             <h3><a>Tipo de café</a></h3>
             <a href="#" data-product="extracto">Extracto</a>
             <a href="#" data-product="atomizado">Atomizado</a>
             <a href="#" data-product="aglomerado">Aglomerado</a>
             <a href="#" data-product="liofilizado">Liofilizado</a>
             <a href="#" data-product="roasted-instant">Roasted Instant</a>
         </div>
         <div  data-producto="perfil-sensorial" class="Sensorial">
             <h3><a>Perfil sensorial</a></h3>
         </div>
         <div  data-producto="niveles-de-tostacion" class="Tostacion">
             <h3><a>Niveles de tostación</a></h3>
         </div>
         <div  data-producto="certificaciones-de-materia-prima" class="Certificacion">
             <h3><a>Certificaciones de materia prima</a></h3>
         </div>
         <div  data-producto="portafolio-de-empaques" class="Empaques">
             <h3><a>Portafolio de empaques</a></h3>
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
        </section>

<?php get_footer() ?>