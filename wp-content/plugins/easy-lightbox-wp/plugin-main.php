<?php
/*
Plugin Name: Easy Lightbox Wordpress
Plugin URI: http://lazypersons.com/plugins/easy-lightbox-wordpress
Description: This plugin will enable an awesome lightbox in your wordpress site. 
Author: Lazy Persons
Author URI: http://lazypersons.com
Version: 1.0
*/

/* Adding Latest jQuery from Wordpress */
function lazy_p_wp_lightobx_free_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'lazy_p_wp_lightobx_free_jquery');

/*Some Set-up*/
define('LAZY_P_WP_LIGBTBOX_FREE', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );



/* Including all files */
function lazy_p_wp_lightbox_free_files() {
wp_enqueue_script('lazy-p-lightbox-image-l-js', LAZY_P_WP_LIGBTBOX_FREE.'js/images-loaded.min.js', array('jquery'), 1.0, true);
wp_enqueue_script('lazy-p-lightbox-main-js', LAZY_P_WP_LIGBTBOX_FREE.'js/litebox.min.js', array('jquery'), 1.0, true);
wp_enqueue_style('lazy-p-lightbox-main-css', LAZY_P_WP_LIGBTBOX_FREE.'css/litebox.css');
}
add_action( 'wp_enqueue_scripts', 'lazy_p_wp_lightbox_free_files' );


function lughtbox_hin_head() {?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery(".litebox").liteBox();		
				jQuery("div[id^=gallery] a").liteBox();	

				jQuery('div.gallery a').attr('data-litebox-group', 'galone');
				
			});
		</script>
<?php

}
add_action('wp_head', 'lughtbox_hin_head');


?>