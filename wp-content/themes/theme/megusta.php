<?php
/*
Template Name: Me gusta
*/
?>
<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php
  //require_once('../../../wp-load.php');
  global $wpdb;

function megusta(){
    global $wpdb;
    $count = $wpdb->get_var("select count(*) from wp_megusta where `user_id` ='".$_GET['user_id']."' AND `post_id` = '".$_GET['post_id']."'");

    if($count > 0){ return true; }else{ return false; }

}
    if(megusta()){
      $wpdb->delete( 'wp_megusta', array( 'user_id' => $_GET['user_id'],'post_id' => $_GET['post_id'] ) );
    }else{
    $wpdb->insert( 'wp_megusta', array( 'user_id' => $_GET['user_id'],'post_id' => $_GET['post_id'] ) );

      $table_name = $wpdb->prefix . 'notificaciones';

      $wpdb->insert( $table_name, array( 
        'user_id' => $_GET['user_id'],
        'post_ID' => $_GET['post_id'],
        'comment_ID' => 0
        ) );

// Retrieve the options f
    $post = get_post( $_GET['post_id'] );
    $user_info = get_userdata( $post->post_author );
   // if ($user_info->notificaciones != 1) {

    require_once( ABSPATH . 'PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer;

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'contacto@cumplearcor.com';                   // SMTP username
  $mail->Password = 'Contacto!!2015.cumple';               // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
  $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
  $mail->setFrom('contacto@cumplearcor.com', 'Cumple Arcor');     //Set who the message is to be sent from
 // $mail->addAddress(get_the_author_meta( 'user_email', $post->post_author ));  // Add a recipient
  $mail->addAddress(get_the_author_meta( 'user_email', $post->post_author ));  // Add a recipient
  //$mail->addAddress('nferreyra@bitopia.com.ar');  // Add a recipient
//$mail->AddBCC('nferreyra@bitopia.com.ar');


  $subject = 'Nueva notificación en la Comunidad Cumple Arcor';
  $mail->Subject =  $subject;

 $message = '<p style="font-family: Calibri, Arial, Helvetica, sans-serif;"><img src="http://www.cumplearcor.com/cumplearcor.jpg"><br><br><br>Hola '.$user_info->first_name.', a '.get_the_author_meta( 'first_name', $_GET['user_id'] ).' '.get_the_author_meta( 'last_name', $_GET['user_id'] ).' le gusta tu publicación.  Enterate más ingresando <a  style="font-family: Calibri, Arial, Helvetica, sans-serif;" href="'.get_post_permalink($info->comment_post_ID ).'">aqu&iacute;</a>.<br><br>¡Gracias por formar parte de nuestra Comunidad!<br><br>Conocé las mejores ideas para los festejos de cumple en <a style="font-family: Calibri, Arial, Helvetica, sans-serif;" href="http://www.cumplearcor.com">www.cumplearcor.com</a>.</p>';

  $mail->Body = $message;
$mail->CharSet = 'UTF-8';

  $mail->IsHTML(true);   
  $mail->header  = 'MIME-Version: 1.0' . "\r\n";

  $mail->header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

  $mail->header .= 'From: '.$from_name.' <'.$from_email.'>';
$mail->send();

  //}
  }
?>