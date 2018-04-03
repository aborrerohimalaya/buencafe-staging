<div class="popup2">
	<a class="cerrar"></a>
	<?php
	    /* ----- LINK ACTUAL ----- */
	    $link_actual = $_SERVER[REQUEST_URI];
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
	<!-- <h1>Temporarily out of service</h1> -->
	<?php if ($english) {
		echo do_shortcode('[contact-form-7 id="7691" title="Portafolio de Empaques EN"]');
	}elseif ($japanese) {
		echo do_shortcode('[contact-form-7 id="7692" title="Portafolio de Empaques JA"]');
	}elseif ($chinese) {
		echo do_shortcode('[contact-form-7 id="7693" title="Portafolio de Empaques ZA"]');
	} else{
		echo do_shortcode('[contact-form-7 id="7690" title="Portafolio de Empaques"]');
	}?>

</div>