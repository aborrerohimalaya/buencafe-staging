<?php
/*
  Plugin Name: Custom Registration
  Plugin URI: http://code.tutsplus.com
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */
  function registration_form($password, $password2, $email, $first_name, $last_name ) { 
    echo '
    <form action="" method="post" id="formRegistro">
    <div><input type="text" required="" placeholder="'.icl_translate('wpml_custom', 'Nombre', 'Nombre').'" name="first_name" id="first_name" value="' . ( isset( $_POST['first_name']) ? $first_name : null ) . '"></div>
    <div><input type="text" required="" placeholder="'.icl_translate('wpml_custom', 'Apellido', 'Apellido').'"  name="last_name" id="last_name" value="' . ( isset( $_POST['last_name']) ? $last_name : null ) . '"></div>
    <div><input type="email" required="" placeholder="E-mail" name="email" id="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '"></div>

    <div><input type="password" minlength="3" required="" placeholder="'.icl_translate('wpml_custom', 'contrasena', 'Contraseña') .'" name="user_pass" id="user_pass" value="' . ( isset( $_POST['user_pass'] ) ? $password : null ) . '"></div>
    <div><input type="password" minlength="3" required="" placeholder="'.icl_translate('wpml_custom', 'confirmar_contrasena', 'Confirmar contraseña').'" name="user_pass2" id="user_pass2" value="' . ( isset( $_POST['user_pass2'] ) ? $password2 : null ) . '"></div>
     
    <input type="hidden" value="forever" name="rememberme">
	    <input type="hidden" value="" name="redirect_to">
	    '.apply_filters( 'gglcptch_display_recaptcha', '', 'my_custom_form' ).'
	    <div><input type="checkbox" value="terms" name="terms" id="terms_and_conditions" required=><label for="terms_and_conditions">'.icl_translate('wpml_custom', 'Acepto_terminos_y_condiciones_y_politicas_de_privacidad', 'Acepto terminos y condiciones y políticas de privacidad').'.</label></div>
	    <input type="submit" class="submit" name="submit" value="'.icl_translate('wpml_custom', 'Registrar', 'Registrar').'">
    </form>
    ';
}
function registration_validation( $password,  $password2, $email, $first_name, $last_name )  {
	global $reg_errors;
	$reg_errors = new WP_Error;

	if ( empty(  $password2 ) || empty( $password ) || empty( $email ) ) {
	    $reg_errors->add('field', 'Required form field is missing');
	}

	if ( username_exists( $email ) )
    	$reg_errors->add('user_name', 'Sorry, that username already exists!');

   	if ( strcmp($password, $password2) !== 0 )
    	$reg_errors->add('passwprd', 'Password don´t match!');


	if ( 5 > strlen( $password ) ) {
	        $reg_errors->add( 'password', 'Password length must be greater than 5' );
	    }

	if ( !is_email( $email ) ) {
	    $reg_errors->add( 'email_invalid', 'Email is not valid' );
	}
	if ( email_exists( $email ) ) {
	    $reg_errors->add( 'email', 'Email Already in use' );
	}
	$check_result = apply_filters( 'gglcptch_verify_recaptcha', true, 'string', 'my_custom_form' );
	if ( true !== $check_result ) { /* the reCAPTCHA answer is right */
		$reg_errors->add( 'captcha', 'Incorrect captcha' );
	}

	if ( is_wp_error( $reg_errors ) ) {
	 
	    foreach ( $reg_errors->get_error_messages() as $error ) {
	     
	        echo '<div class="message_return">';
	        echo '<strong>ERROR</strong>:';
	        echo $error . '<br/>';
	        echo '</div>';
	         
	    }
	 
	}
}

function complete_registration() {
    global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $email,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        );
        $user = wp_insert_user( $userdata );
        echo '<div class="message_return" >Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.</div>';   
    }
}
function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['user_pass'],
        $_POST['user_pass2'],
        $_POST['email'],
        $_POST['first_name'],
        $_POST['last_name']
        );
         
        // sanitize user form input
        global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        $password   =   esc_attr( $_POST['user_pass'] );
        $password2   =   esc_attr( $_POST['user_pass2'] );
        $email      =   sanitize_email( $_POST['email'] );
        $first_name =   sanitize_text_field( $_POST['first_name'] );
        $last_name  =   sanitize_text_field( $_POST['last_name'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $password,
        $password2,
        $email,
        $first_name,
        $last_name
        );
    }
 
    registration_form(
        $password,
        $password2,
        $email,
        $first_name,
        $last_name
        );
}