<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php wp_footer(); /* this is used by many Wordpress features and plugins to work properly */ ?>
<?php 
    /* ----- LINK ACTUAL ----- */
    $link_actual = get_permalink( $post->ID );
    $link_actual = explode("/", $link_actual);

    /* Detectar si esta en ingles */
    if ( in_array("en", $link_actual ) ){
        $english = true;
    }

    /* Detectar si esta en japones */
    if ( in_array("ja", $link_actual ) ){
        $japanese = true;
    }

    /* Detectar si esta en chino */
    if ( in_array("zh-hant", $link_actual ) ){
        $chinese= true;
    }

?>
<footer>
    <ul>
        <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo 'contact'; }elseif( $chinese ) {echo '联系我们';}else{ echo'/contacto'; } ?>">
          <?php if( $english ) echo 'Contact us';elseif( $japanese ) echo 'お問い合わせ'; elseif( $chinese ) echo '联系我们'; else echo 'Contacto ' ?></a></li>
        <li><a href="<?php bloginfo('url'); if( $english or $japanese){ echo 'frequent-questions'; }elseif( $chinese ) {echo '常见问答';}else{ echo'/preguntas-frecuentes'; } ?>">
          <?php if( $english ) echo 'Frequent Asked Questions';elseif( $japanese ) echo 'よくある質問';elseif( $chinese ) echo '常见问答'; else echo 'Preguntas Frecuentes' ?></a></li>     
        <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo 'map'; }elseif( $chinese ) {echo '网站地图';}else{ echo'/mapa'; } ?>">
          <?php if( $english ) echo 'Site Map';elseif( $japanese ) echo 'サイト案内';elseif( $chinese ) echo '网站导航'; else echo 'Mapa del Sitio' ?></a></li>
         <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo 'privacy-policy'; }elseif( $chinese ) {echo '隐私权政策';}else{ echo'/politica-de-privacidad'; } ?>">
          <?php if( $english ) echo 'PRIVACY POLICY';elseif( $japanese ) echo 'プライバシー規約';elseif( $chinese ) echo '隐私权政策';    else echo 'POLITICA DE PRIVACIDAD' ?></a></li>
        <?php 
          // if( !$english ){
          ?>
            <!-- <li>
              <a href="<?php bloginfo('url') ?>/politica-de-privacidad"> POLITICA DE PRIVACIDAD</a>
            </li>
            <li><a href="<?php bloginfo('url') ?>/terminos-y-condiciones">TERMINOS Y CONDICIONES</a></li> -->
          <?php
          // }
        ?>
        <!-- <li>a<span>&copy 2017 BUENCAF&Eacute;</span></li> -->

         <li><a href="<?php bloginfo('url'); if( $english or $japanese or $chinese){ echo 'terms-and-conditions'; }else{ echo'/terminos-y-condiciones'; } ?>">
          <?php if( $english ) echo 'TERMS AND CONDITIONS';elseif( $japanese ) echo '条件';elseif( $chinese ) echo '条款和条件';else echo ' TERMINOS Y CONDICIONES' ?></a></li>
	<li><span>&copy 2017 BUENCAF&Eacute;</span></li>
    </ul>
    <a href="<?php echo get_home_url(); ?>" class="noText">Buencafé</a>
</footer>

<!-- SCRIPTS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/acordeon.js"></script>
<!--<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.2.min.js"></script> -->
<script src="<?php bloginfo('template_url'); ?>/js/idangerous.swiper.min.js" type="text/javascript"></script>
<!-- <script src="<?php bloginfo('template_url'); ?>/js/swiper.min.js" type="text/javascript"></script>  --> 
<script src="<?php bloginfo('template_url'); ?>/js/jquery.ddslick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.js" type="text/javascript"></script>   
<script src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js" type="text/javascript"></script>   
<script src="<?php bloginfo('template_url'); ?>/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>   
<script src="<?php bloginfo('template_url'); ?>/js/infinitScroll.js"></script>

  <script src="<?php bloginfo('template_url'); ?>/js/jquery.mobile.custom.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/sss.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sss.css" type="text/css" media="all">
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>




<script type="text/javascript">/*
(function(d){
  var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
  p.type = 'text/javascript';
  p.async = true;
  p.src = '//assets.pinterest.com/js/pinit.js';
  f.parentNode.insertBefore(p, f);
}(document));*/
</script>

<!-- GOOGLE ANALYTICS -->
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-66706187-1', 'auto');
 ga('send', 'pageview');

</script>
</body>
</html>