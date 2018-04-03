<?php
/*
Template Name: Newsletter
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

function newsletter_exist($news){
    global $wpdb;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM wp_newsletter WHERE `email` =  '".$news."'" ));

    if($count > 0){ return true; }else{ return false; }

}
  $table_name = $wpdb->prefix . 'newsletter';

  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

    $sql = "CREATE TABLE $table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      email varchar(255) DEFAULT NULL,
      UNIQUE KEY id (id)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
    dbDelta($sql);

  } else {
    if(newsletter_exist($_POST['emailsuscribite'])){
        echo  0;
    }else{
    // $_POST['consulta']
      $wpdb->insert( $table_name, array( 
        'email' => $_POST['emailsuscribite']
        ) );
              echo  1;

    }

  }
?>