<?php
/*
Template Name: Recuperar
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
	    	<a href="<?php bloginfo('url'); if( $english ){ echo '/login-en'; }else{ echo'/login'; } ?>"><?php echo $frase; ?></a>
		<?php
	    	}
	    ?>
	    	</h3>
	    <?php
		}
	?>
    <form method="post" id="formrecuperar">
        <div><input type="email" required="" id="email" name="email" placeholder="<?php echo icl_translate('wpml_custom', 'Por_favor_escriba_su_email', 'Por favor escriba su email') ?>"></div>    
        <input type="hidden" value="reset" name="action">
        <a class="submit"><?php echo icl_translate('wpml_custom', 'Enviar', 'Enviar') ?></a>
        <input type="submit" class="enviar" value="<?php echo icl_translate('wpml_custom', 'Enviar', 'Enviar') ?>">
    </form>
        <?php
	/* declaro variable global */
	global $wpdb;

	$error = '';
	$success = '';

	if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) {
		$email = $_POST['email'];
				/* El e-mail es el nombre de usuario */
		if( ! username_exists( $email ) ) { /* Si no existe el mail en la bd */
			echo 'No hay nadie registrado con ese e-mail.';
		} 
		else {
			$random_password = wp_generate_password( 12, false ); /* Se genera una contraseña random */
			$user = get_user_by( 'login', $email ); /* busco por nombre de usuario */

			/* Actualizo la bd */
			$update_user = wp_update_user( array (
				'ID' => $user->ID, 
				'user_pass' => $random_password
				)
			);


			if( $update_user ) { /* Si se actualizo se procede a enviar el email de recuperacion */

					 require('phpmailer/PHPMailerAutoload.php'); // Add the path as appropriate
					  $Mail = new PHPMailer();
					  // $Mail->IsSMTP(); // Use SMTP
					  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
					  //$Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
					  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
					  $Mail->Port       = 587;                   
				 	  $Mail->SMTPSecure = "tls";    
					  $Mail->Username    = 'redmine@lyncros.com'; // SMTP account username
					  $Mail->Password    = 'krugger1'; // SMTP account password
					  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
					  $Mail->CharSet     = 'UTF-8';
					  $Mail->Encoding    = '8bit';
					  $Mail->Subject     = 'Recuperar Contrasena';
					  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
					  $Mail->From        = 'redmine@lyncros.com';
					  $Mail->FromName    = 'Buencafe';
					  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line
					  $Mail->AddAddress( $email ); // To:
					  $Mail->isHTML( TRUE );
					  $Mail->Body    = '  Su nueva contraseña es: '.$random_password.' ';
					  $Mail->Send();
					  $Mail->SmtpClose();

					  if ( $Mail->IsError() ) { 
					    $error = 'Lo sentimos no se ha podido enviar el correo. Intente nuevamente en unos minutos.';
					  }
					  else {
					    $success = 'Se le ha enviado un correo con su nueva contraseña.';
					  }
				// if($mail->send())
				// 	$success = 'Se le ha enviado un correo con su nueva contraseña.';
		}
		else {
		 	$error = 'Lo sentimos ha ocurrido un error en la actualizacion de si contraseña. Intente nuevamente en unos minutos.';
		}

		if( ! empty( $error ) ){
?>
			<div><strong>Error:</strong><p><?php echo $error; ?></p></div>
<?php
		}

		if( ! empty( $success ) ){ /* Si no ocurrio ningun error */
?>
			<div><p><?php echo $success; ?></p></div>
<?php
		}
	}
}
?>
</section>

<?php get_footer(); ?>