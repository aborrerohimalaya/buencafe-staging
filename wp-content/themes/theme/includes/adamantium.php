<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
	add_theme_support( 'post-thumbnails' );

	function adamantium_filter_ptags_on_images($content){
	   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'adamantium_filter_ptags_on_images');

	function adamantium_excerpt_more($more) {
		global $post;
		return '...  <a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
	}
	add_filter('excerpt_more', 'adamantium_excerpt_more');

	function filter_search($query) {
	    if ($query->is_search) {
		$query->set('post_type', array('post', 'receta', 'candybar', 'deco', 'descargable', 'juegos'));
	    };
	    return $query;
	};
	add_filter('pre_get_posts', 'filter_search');

	function adamantium_custom_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/custom-login-logo.png) !important; }
	    </style>';
	}
	add_action('login_head', 'adamantium_custom_login_logo');

	/*function adamantium_SearchFilter($query) {
		if ($query->is_search) {
				$query->set('post_type', 'post');
			}
		return $query;
	}
	add_filter('pre_get_posts','adamantium_SearchFilter');*/

	function adamantium_admin_bar(){ return false; }
	add_filter( 'show_admin_bar' , 'adamantium_admin_bar');

    function adamantium_remove_version() {
        return '<!--built on the Adamantium Starter Kit -->';
    }
    add_filter('the_generator', 'adamantium_remove_version');

	function adamantium_remove_comment_author_class( $classes ) {
	    foreach( $classes as $key => $class ) {
	        if(strstr($class, "comment-author-")) {
	            unset( $classes[$key] );
	        }
	    }
	    return $classes;
	}
	add_filter( 'comment_class' , 'adamantium_remove_comment_author_class' );

	add_filter('login_errors', create_function('$a', "return null;"));

	remove_action('wp_head', 'wp_generator');

	function adamantium_remove_feed_generator() {
		return '';
	}
	add_filter('the_generator', 'adamantium_remove_feed_generator');

	function adamantium_restrict_access_admin_panel(){
	  global $current_user;
	  get_currentuserinfo();
	  if ($current_user->user_level <  4) {
	    wp_redirect( get_bloginfo('url') );
	    exit;
	  }
	}
	add_action('admin_init', 'adamantium_restrict_access_admin_panel', 1);

	function elements() { global $current_user; get_currentuserinfo(); 
	if($current_user->ID != 1) { ?>
    <style> #toplevel_page_edit-post_type-acf, #toplevel_page_wp_wplfta_setting, #toplevel_page_ajax-load-more, #menu-media, #menu-plugins, #menu-appearance > ul > li.wp-first-item.current, #menu-appearance > ul > li:nth-child(3), #menu-appearance > ul > li:nth-child(4), #menu-appearance > ul > li:nth-child(7), #menu-appearance > ul > li:nth-child(8) { display:none; } </style>
    <?php } } add_action('admin_head', 'elements');

	function adamantium_remove_recent_comments_style() {
	  global $wp_widget_factory;
	  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	  }
	}
	add_action('wp_head', 'adamantium_remove_recent_comments_style', 1);

	function adamantium_gallery_style($css) {
	  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
	}
	add_filter('gallery_style', 'adamantium_gallery_style');

	function adamantium_posts_columns_id($defaults){
	    $defaults['wps_post_id'] = __('ID');
	    return $defaults;
	}
	function adamantium_posts_custom_id_columns($column_name, $id){
	  if($column_name === 'wps_post_id'){
	          echo $id;
	    }
	}
	add_filter('manage_posts_columns', 'adamantium_posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'adamantium_posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'adamantium_posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'adamantium_posts_custom_id_columns', 5, 2);

	add_image_size( 'admin-list-thumb', 150, 150, false );
	add_filter('manage_posts_columns', 'adamantium_add_post_thumbnail_column', 5);
	add_filter('manage_pages_columns', 'adamantium_add_post_thumbnail_column', 5);

	function adamantium_add_post_thumbnail_column($cols){
	  $cols['adamantium_post_thumb'] = __('Featured Image');
	  return $cols;
	}
	add_action('manage_posts_custom_column', 'adamantium_display_post_thumbnail_column', 5, 2);
	add_action('manage_pages_custom_column', 'adamantium_display_post_thumbnail_column', 5, 2);

	function adamantium_display_post_thumbnail_column($col, $id){
	  switch($col){
	    case 'adamantium_post_thumb':
	      if( function_exists('the_post_thumbnail') )
	        echo the_post_thumbnail( 'admin-list-thumb' );
	      else
	        echo 'Not supported in theme';
	      break;
	  }
	}
?>