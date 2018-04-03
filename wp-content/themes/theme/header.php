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

<!DOCTYPE html>
<html lang="<?php if($english == true): echo "en"; elseif($japanese == true): echo "ja"; elseif($chinese == true): echo "zh-hant"; else: echo "es"; endif;  ?>">
 <!--<html lang="<?php echo ($english == true)?'en':'es';  ?>">--> 
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- META DATA -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="author" content="Buencaf&eacute;">
    <meta name="keywords" content=""/>
    <meta name="description" content="<?php bloginfo('description'); ?>">


 	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/ico/favicon.png">

 	<!-- STYLES -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fonts.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/idangerous.swiper.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.jscrollpane.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/timeline.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sss.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/colorbox.css" /> -->
        <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css">
<script src="<?php bloginfo('template_url'); ?>/js/contactManagerInvoker.js"></script>

	<title><?php wp_title(); ?></title>
	
   <?php
	 if(is_front_page()){
    ?>
    
    <script type="text/javascript">
	 function verificaridioma() {
	 
		var ln = x=window.navigator.language||navigator.browserLanguage;
		
		console.log(ln)
	
		
		if(ln == 'en' || ln == 'en-US' || ln == 'ru' || ln == 'uk'){
		 location.replace("http://www.buencafe.com/en");
		  sessionStorage.setItem("idioma", "ingles");
		
		}
		
		if(ln == 'es'){
		  location.replace("http://www.buencafe.com/es");
		  sessionStorage.setItem("idioma", "español");
		
		}
		
		if(ln == 'ja'){
		 location.replace("http://www.buencafe.com/ja");
		  sessionStorage.setItem("idioma", "japones");
		
		}
		return false;
	}
	 
	var datostorage = sessionStorage.getItem("idioma");
	
	console.log(datostorage )
	
	if(datostorage == null){
	  verificaridioma();
	}
	
	
	
      </script>
    
    <?php    
    
    }
    ?>

<?php wp_head(); ?>


<!-- Hotjar Tracking Code for http://www.buencafe.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:752707,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-57DHDQM');</script>
<!-- End Google Tag Manager -->

</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57DHDQM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <header>
        <a href="<?php echo get_home_url(); ?>" class="Logo">
            <!--<h1 class="noText">Buencafé</h1>-->
            <!--<h2 class="noText">Liofilizado de Colombia</h2>-->
            <span class="noText logo">Buencafé</span>
            <span class="noText slogan">Liofilizado de Colombia</span>
        </a>
        <div>
            <div class="language">
                 <select id="language">
                    <option value="/es" <?php echo (($english == false))?'selected':'' ; ?>>Español</option>
                    <option value="/en" <?php echo (($english == true))?'selected':'';  ?>>English</option>
		    <option value="/ja" <?php echo (($japanese == true))?'selected':'';  ?>>日本の</option>
		    <option value="/zh-hant" <?php echo (($chinese == true))?'selected':'';  ?>>简体中文</option><!-- 繁體中文 -->
                </select> 

                <?php// do_action('icl_language_selector'); ?>
            </div>
            <form method="get" id="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                <input type="text" name="s"  name="search">
                <a class="submit"></a>
                <input type="submit" name="submit">
            </form>

            <div>
                <a target="_blank" class="noText in" href="https://www.linkedin.com/company/buencaf%C3%A9-%E2%80%93-colombian-coffee-growers-federation-fnc-">Linkedin</a>
                <a target="_blank" class="noText yt" href="https://www.youtube.com/user/BuenCafeChannel">Youtube</a>
          	<a class="noText mail" href="<?php bloginfo('url'); if( $english ){ echo 'contact-us'; }elseif( $japanese ){ echo'/contact-us-ja'; }elseif( $chinese ){ echo'联系我们'; }else{ echo'/contactanos'; } ?>">Mail</a>
            <?php if(($english) || ($japanese) || ($chinese)): ?>
                <a target="_blank" class="noText fam" href="https://www.federaciondecafeteros.org/particulares/en/familia/">Familia</a>
            <?php else: ?>
                <a target="_blank" class="noText fam" href="http://www.federaciondecafeteros.org/particulares/es/familia/">Familia</a>
            <?php endif; ?>
            </div>
        </div>
    <button class="c-hamburger c-hamburger--htx">
        <span>menu</span>
    </button>
         <nav>
            <ul>
                <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo '/products'; }elseif($chinese){echo '/产品';}else{ echo'/productos'; } ?>"> 
                <?php if( $english ) echo 'Products';elseif( $japanese ) echo '商品';elseif( $chinese ) echo '产品'; else echo 'Productos' ?></a></li>
                <!-- <li><a href="<?php bloginfo('url'); if( $english or $japanese or $chinese){ echo 'colombian-coffee'; }else{ echo'/cafe-de-colombia'; } ?>"> -->
                <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo 'colombian-coffee'; }elseif($chinese){echo '哥伦比亚咖啡';}else{ echo'/cafe-de-colombia'; } ?>">
                <?php if( $english ) echo 'Colombian Coffee';elseif( $japanese ) echo 'コロンビアコーヒー';elseif( $chinese ) echo '哥伦比亚咖啡'; else echo 'Café de Colombia' ?></a></li>
                <li><a href="<?php bloginfo('url'); if( $english or $japanese){ echo 'brand-experience'; }elseif($chinese){echo '品牌经验';}else{ echo'/experiencias-de-marca'; } ?>">
                <?php if( $english ) echo 'Brand Experience';elseif( $japanese ) echo 'ブランド';elseif( $chinese ) echo '品牌经验';else echo 'Experiencias de marca' ?></a></li>
                <li><a href="<?php bloginfo('url'); if( $english or $japanese ){ echo 'innovation'; }elseif($chinese){echo '创新';}else{ echo'/innovacion'; } ?>">
                <?php if( $english ) echo 'Innovation';elseif( $japanese ) echo 'イノベーション';elseif( $chinese) echo '创新'; else echo 'Innovación' ?></a></li>
                <li><a href="<?php bloginfo('url'); if( $english or $japanese){ echo 'who-we-are'; }elseif($chinese){echo '关于我们';}else{ echo'/quienes-somos'; } ?>">
                <?php if( $english ) echo 'Who we are';elseif( $japanese ) echo '会社紹介';elseif( $chinese ) echo '关于我们';else echo 'Quiénes somos' ?></a></li>
                <li><a href="<?php bloginfo('url'); if( $english ){ echo 'blog-en'; }elseif( $japanese ){ echo 'blog'; }elseif( $chinese ){ echo '博客'; }else{ echo '/blog'; } ?>">
                <?php if( $english ) echo 'Blog';elseif( $japanese ) echo 'ブログ';elseif( $chinese) echo '博客'; else echo 'Blog' ?></a></li>
                <li class="buscador">
                    <form method="get" id="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <input type="text" name="s"  name="search">
                        <a class="submit"></a>
                        <input type="submit" name="submit">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <?php 
    $categorias = get_terms('tipo_blog');

    /* ----- LINKS ----- */

    /* paginas del blog */

    if ( in_array("blog", $link_actual ) ){
        $link_b = true;
    }

    if ( in_array(strtolower (urlencode ("博客")), $link_actual )  ){
        $link_b = true;
    }


    if ( in_array("blogs", $link_actual ) ){
        $link_bs = true;
    }

    /* Registro */
    if ( in_array("registro", $link_actual) ) {
        $link_r = true;
    }

    /* Login y Recupero */
    if ( (in_array("login", $link_actual)) || (in_array(strtolower (urlencode ("登入")), $link_actual)) || (in_array("recuperar-contrasena", $link_actual)) || (in_array(strtolower (urlencode ("寻回密码")), $link_actual)) ) {
            $link_lgre = true;
    }

    /* En ingles */
    if ( in_array("blog-en", $link_actual ) ){
        $link_b_en = true;
    }
      if ( in_array("register", $link_actual) ) {
        $link_r_en = true;
    }
    if ( (in_array("login-en", $link_actual)) || (in_array("recover-password", $link_actual)) ) {
            $link_lgre_en = true;
        }

    /* Categorias */
    foreach ($categorias as $categoria) {
        if (in_array($categoria->slug, $link_actual)) {
            $link_c = true;
        }
    }

/* ----- MENU ----- */
    if( ($link_b) || ($link_b_en) || ($link_bs) || ($link_r) || ($link_r_en) || ($link_lgre) || ($link_lgre_en) || ($link_c) ){
    ?>
        <section id="blog" <?php if($link_r) echo 'class="intern detail"'; if($link_c) echo 'class="intern"'; ?> >
        <h1><?php  if( $english ){ echo 'BLOG'; } elseif( $japanese ){ echo 'ブログ'; }elseif( $chinese){ echo '博客'; }else{ echo'BLOG';} ?></h1>
        <select id="category">
            <option value=""><?php  if( $english ){ echo 'Choose Category'; } elseif( $japanese ){ echo 'カテゴリー選択'; } elseif( $chinese){ echo 'Choose Category'; }else{ echo'Elige Categoria';} ?></option>
            <?php
                foreach ($categorias as $categoria) {
            ?>
                <option id="categoria" value="<?php bloginfo('url'); ?>/tipo_blog/<?php echo $categoria->slug; ?>">
                    <?php echo $categoria->name; ?>
                </option>
            <?php
                }
            ?>
        </select>      
    <?php
        if ( ($link_b) || ($link_b_en) || ($link_bs) || ($link_r) || ($link_r_en) || ($link_lgre) || ($link_lgre_en) || ($link_c) ) {
    ?>
            <div class="user">
                <?php if ( !is_user_logged_in() ) {
                ?> 
                <a href="<?php bloginfo('url'); if( $english ){ echo '/login-en'; }elseif($chinese){echo '/登入';}else{ echo'/login';} ?>">
                <?php if( $english ) echo 'Sign In';elseif( $japanese) echo 'ログイン'; else echo 'Inicia Sesión' ?></a> | <a href="<?php bloginfo('url'); if( $english ){ echo '/register'; }elseif( $japanese){ echo '/register'; }elseif( $chinese){ echo '/注册'; }else{ echo'/registro';} ?>">
                <?php if( $english ) echo 'Register';elseif( $japanese) echo '新規登録'; else echo 'Registrate' ?></a>
                <?php 
                }
                else{
                ?>
                    <a href="<?php echo wp_logout_url( home_url() ); ?>">
                    <?php if( $english ) echo 'Sign out'; elseif( $japanese) echo 'ログアウト'; else echo 'Salir' ?></a>
                <?php
                } 
                ?>
            </div>
    <?php
        }
    }
    ?>

