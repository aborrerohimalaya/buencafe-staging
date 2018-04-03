<?php
/*
Template Name: Login
*/
?>
<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>

	<?php 
		if( $_GET['login'] == 'failed' ) {
	?>
		<p class="error">Los datos ingresasdos son incorrectos</p>
	<?php
		}

		/* ----- LINK ACTUAL ----- */
	    $link_actual = get_permalink( $post->ID );
	    $link_actual = explode("/", $link_actual);

	    /* Detectar si esta en ingles */
	    if ( in_array("en", $link_actual ) ){
	        $english = true;
	    }

		if ( $titulo = get_field('titulo_sesion') ) {
		?>
			<h2 class="text-color-noticias"><?php echo $titulo; ?></h2>
		<?php
		}
		if ( $subtitulo = get_field('subtitulo_sesion') ){
		?>
	    	<h3><?php echo $subtitulo; ?>
	    <?php
	    	if ( $frase = get_field('frase_link') ){
	    ?>
	    	<a href="<?php bloginfo('url'); if( $english ){ echo '/recover-password'; }else{ echo'/recuperar-contrasena'; }?>"><?php echo $frase; ?></a>
		<?php
	    	}
	    ?>
	    	</h3>
	    <?php
		}
	?>
	    <form action="<?php bloginfo('url') ?>/wp-login.php" method="post" id="formLogin">
	        <div><input type="text" required="" placeholder="E-mail" class="user_login" id="user_login" name="log"></div>
	        <div><input type="password" required="" placeholder="<?php echo icl_translate('wpml_custom', 'contrasena', 'Contraseña') ?>" class="user_pass" id="user_pass" name="pwd"></div>
	        <input type="hidden" value="forever" name="rememberme">
	        <input type="hidden" value="<?php the_permalink(); ?>" name="redirect_to">

	        <a class="submit"><?php echo icl_translate('wpml_custom', 'ingresar', 'Ingresar') ?></a>
	        <input type="submit" name="wp-submit" value="<?php echo icl_translate('wpml_custom', 'ingresar', 'Ingresar') ?>">
	    </form>
</section>

<?php get_footer(); ?>