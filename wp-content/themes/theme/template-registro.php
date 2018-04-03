<?php
/*
Template Name: Registro
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
	    	<a href="<?php bloginfo('url'); if( $english ){ echo '/login-en'; }else{ echo'/login'; }?>"><?php echo $frase; ?></a>
		<?php
	    	}
	    ?>
	    	</h3>
	    <?php
		}
	?>
    <!-- <form action="" method="post" id="formRegistro">
		<div><input type="text" required="" placeholder="<?php echo icl_translate('wpml_custom', 'Nombre', 'Nombre') ?>" name="first_name" id="first_name"></div>
		<div><input type="text" required="" placeholder="<?php echo icl_translate('wpml_custom', 'Apellido', 'Apellido') ?>" name="last_name" id="last_name"></div>            
		<div><input type="email" required="" placeholder="E-mail" name="email" id="email"></div>
	    <div><input type="password" minlength="3" required="" placeholder="<?php echo icl_translate('wpml_custom', 'contrasena', 'Contraseña') ?>" name="user_pass" id="user_pass"></div>
	    <div><input type="password" minlength="3" required="" placeholder="<?php echo icl_translate('wpml_custom', 'confirmar_contrasena', 'Confirmar contraseña') ?>" name="user_pass2" id="user_pass2"></div>
	    <input type="hidden" value="forever" name="rememberme">
	    <input type="hidden" value="" name="redirect_to"> -->
	    <!-- <div><input type="checkbox" value="informe" id="recibir_info"><label for="recibir_info">Deseo recibir información a mi correo.</label></div> -->
	    <!-- <div><input type="checkbox" value="terms" id="terms_and_conditions" required=><label for="terms_and_conditions"><?php echo icl_translate('wpml_custom', 'Acepto_terminos_y_condiciones_y_politicas_de_privacidad', 'Acepto terminos y condiciones y políticas de privacidad') ?>.</label></div>
	    <a class="submit"><?php echo icl_translate('wpml_custom', 'Registrar', 'Registrar') ?></a>
	    <input type="submit" name="wp-submit" value="<?php echo icl_translate('wpml_custom', 'Registrar', 'Registrar') ?>">
    </form> -->

    <?php echo do_shortcode('[cr_custom_registration]'); ?>
</section> <!-- Cierre section con id blog -->

<?php
  /* Verificacion de existencia del email */
  $email = $_POST['email'];
  $exists = email_exists($email);

  if( $exists ){
  	echo "El email ingreasado ya ha sido registrado.";
  		$error =true;
  }
  else{
	  if( $_POST['user_pass'] != $_POST['user_pass2'] ){
		$error =true;
	  	echo "Las contraseñas no coinciden.";
	  }
	  else
	  	$error = false;
  }
  if( $error != true && isset($_POST['wp-submit']) ) {
	$user_id = wp_insert_user(
	array(
		'user_login'	=>	$_POST['email'], /* username */
		'user_pass'		=>	$_POST['user_pass'],
		'first_name'	=>	$_POST['first_name'],
		'last_name'		=>	$_POST['last_name'],
		'display_name'	=>	$_POST['first_name'] . ' ' . $_POST['last_name'],
		'nickname'		=>	$_POST['first_name'] . ' ' . $_POST['last_name'],
		'role'			=>	'subscriber'
		)
	);
  }

  if (isset($user_id)) {
  	echo "Se ha registrado correctamente";
  }
?>

<?php get_footer(); ?>