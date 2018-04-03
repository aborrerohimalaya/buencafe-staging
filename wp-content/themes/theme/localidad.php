<?php
/*
Template Name: Localidad
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


$localidades = $wpdb->get_results("SELECT * FROM localidades WHERE id_privincia = '".$_POST['id']."'"); 
		echo '<option>Seleccionar Ciudad</option>';
	foreach($localidades as $localidad){
		echo '<option value="'.$localidad->id.'" >'.$localidad->localidad.'</option>';
	}
?>