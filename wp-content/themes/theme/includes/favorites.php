<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>

<?php if (function_exists('wpfp_link') && is_user_logged_in()) { wpfp_link(); } ?>
<?php if (function_exists('wpfp_link') && !is_user_logged_in()) { ?> 
	<a class="pin" href="<?php bloginfo("url") ?>/login" title="Login" rel="nofollow"></a>
<?php } ?>