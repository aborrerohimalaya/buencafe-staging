<?php
/*
Template Name: Perfil
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

<section id="perfil">
  <?php get_template_part( 'includes/user'); ?>

  <?php
/*
$users = new WP_User_Query(array(
    'order' => 'DESC',
));
foreach($users->results as $user){
  update_user_meta($user->ID, 'notificaciones', 1);
}*/

  function dni_exists($dni){

    global $wpdb;

    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->usermeta WHERE meta_key = 'dni_usuario' AND meta_value = %d", $dni));

    if($count == 1){ return true; }else{ return false; }

  }
  if($_POST['updateUsuario'] == true) {

if ($current_user->user_email !=$_POST['user_email'] && email_exists($_POST['user_email'])) {
      $msgRegistro = "El email ya existe.";

} else if (get_field('dni_usuario', 'user_'.$current_user->ID) != $_POST['dni_usuario'] && dni_exists($_POST['dni_usuario'])) {
    $msgRegistro = "El DNI ya fue registrado.";

  }else{

      //var_dump($_POST);

  $user_id = $current_user->ID;

  update_user_meta($user_id, 'first_name', $_POST['first_name']);
  update_user_meta($user_id, 'last_name', $_POST['last_name']);
  update_user_meta($user_id, 'user_email', $_POST['user_email']);
  update_user_meta($user_id, 'dni_usuario', $_POST['dni_usuario']);
  update_user_meta($user_id, 'telefono_usuario', $_POST['telefono_usuario']);
  update_user_meta($user_id, 'telefono_usuario2', $_POST['telefono_usuario2']);
  update_user_meta($user_id, 'provincia_usuario', $_POST['user_provincia']);
  update_user_meta($user_id, 'ciudad_usuario', $_POST['user_ciudad']);
  update_user_meta($user_id, 'fechanacimiento_usuario', $_POST['fechanacimiento_usuario']);
  update_user_meta($user_id, 'notificaciones', $_POST['terminos']);

  if ($_POST['user_nombre_hijo1']) { updateMetaHijos($user_id, "1"); }

  if ($_POST['user_nombre_hijo2']) { updateMetaHijos($user_id, "2"); }

  if ($_POST['user_nombre_hijo3']) { updateMetaHijos($user_id, "3"); }

  if ($_POST['user_nombre_hijo4']) { updateMetaHijos($user_id, "4"); }

  if ($_POST['user_nombre_hijo5']) { updateMetaHijos($user_id, "5"); }

  if ($_POST['user_nombre_hijo6']) { updateMetaHijos($user_id, "6"); }


  if ($_POST['user_pass'] != "") {
    update_user_meta($user_id, 'user_pass', $_POST['user_pass']);
  }


  if (array_key_exists('avatar', $_FILES)) {
    $file_info = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $file_name = md5($_FILES['avatar']['name']).time().'.'.$file_info;

    if( move_uploaded_file( $_FILES["avatar"]["tmp_name"], getcwd() . "/wp-content/uploads/avatars/" . $file_name)) {

      $urlAvatar = get_bloginfo('url') . "/wp-content/uploads/avatars/" . $file_name;

      update_user_meta($user_id, 'foto_usuario', $urlAvatar);
    } else {
          //die('problema con el archivo');
    }
  }
  }

}
$provincias = $wpdb->get_results("select * from provincias"); 
$localidades = $wpdb->get_results("select * from localidades"); 

?>

  <?php if (isset($msgRegistro)): ?>
    <p class="mensajeRegistro"><?php echo @$msgRegistro; ?></p>
  <?php endif ?>
<form action="" method="POST" enctype='multipart/form-data'>
  <input name="first_name" value="<?php echo $current_user->user_firstname; ?>" type="text"  required placeholder="Nombre" placeholder="Nombre">
  <input name="last_name" value="<?php echo $current_user->user_lastname; ?>" type="text"  required placeholder="Apellido" placeholder="Apellido">
  <input name="user_email" value="<?php echo $current_user->user_email; ?>" type="email"  required placeholder="Email" maxlength="35" placeholder="Email">
  <input name="dni_usuario" value="<?php the_field('dni_usuario', 'user_'.$current_user->ID); ?>" type="text" class="number" required placeholder="DNI  (solo números)" pattern="^[0-9]{8}$" maxlength="8"  >
  <input name="user_pass" placeholder="Contraseña  (6 - 10 caracteres)" type="text"  maxlength="10" minlength="3" >
  <input name="re-contraseña" placeholder="Repita su contraseña" type="text" maxlength="10" minlength="3">

  <div class="select"><select name="user_provincia" id="user_provincia"  required/>
    <option value="">Seleccionar provincia</option>
    <?  foreach($provincias as $provincia){
      echo '<option value="'.$provincia->id.'" '.((get_field('provincia_usuario', 'user_'.$current_user->ID) == $provincia->id)?'selected':'').'>'.$provincia->provincia.'</option>';
    }?>
  </select></div>

  <div class="select"><select name="user_ciudad" id="user_ciudad"  required/>
    <option value="">Seleccionar ciudad</option>
    <?  foreach($localidades as $localidad){
      echo '<option value="'.$localidad->id.'" '.((get_field('ciudad_usuario', 'user_'.$current_user->ID) == $localidad->id)?'selected':'').'>'.$localidad->localidad.'</option>';
    }?>
  </select></div>

  <label class="telefono">Teléfono</label>
  <input type="text" class="number" id="user_phone" name="telefono_usuario"  placeholder="011" required maxlength="40"  value="<?php the_field('telefono_usuario', 'user_'.$current_user->ID); ?>"/>
  <input type="text" class="number" id="user_phone2" name="telefono_usuario2" placeholder="42458885" required maxlength="40"  value="<?php the_field('telefono_usuario2', 'user_'.$current_user->ID); ?>"/>
  <input name="fechanacimiento_usuario" value="<?php echo $current_user->fechanacimiento_usuario; ?>" type="text"  required placeholder="Fecha Nacimiento" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <div class="bt-examinar"><a id="avatar-pc">Cambiar foto</a> <input type="file" name="avatar" id="avatar" value="Subir foto"></div>


  <?php if (!empty($current_user->user_nombre_hijo1)): ?>
  <input name="user_nombre_hijo1" value="<?php echo $current_user->user_nombre_hijo1; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo1" value="<?php echo $current_user->user_fecha_hijo1; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo1" value="<?php echo $current_user->user_dni_hijo1; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>

<?php if (!empty($current_user->user_nombre_hijo2)): ?>
  <input name="user_nombre_hijo2" value="<?php echo $current_user->user_nombre_hijo2; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo2" value="<?php echo $current_user->user_fecha_hijo2; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo2" value="<?php echo $current_user->user_dni_hijo2; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>

<?php if (!empty($current_user->user_nombre_hijo3)): ?>
  <input name="user_nombre_hijo3" value="<?php echo $current_user->user_nombre_hijo3; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo3" value="<?php echo $current_user->user_fecha_hijo3; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo3" value="<?php echo $current_user->user_dni_hijo3; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>

<?php if (!empty($current_user->user_nombre_hijo3)): ?>
  <input name="user_nombre_hijo3" value="<?php echo $current_user->user_nombre_hijo3; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo3" value="<?php echo $current_user->user_fecha_hijo3; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo3" value="<?php echo $current_user->user_dni_hijo3; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>

<?php if (!empty($current_user->user_nombre_hijo4)): ?>
  <input name="user_nombre_hijo4" value="<?php echo $current_user->user_nombre_hijo4; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo4" value="<?php echo $current_user->user_fecha_hijo4; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo4" value="<?php echo $current_user->user_dni_hijo4; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>

<?php if (!empty($current_user->user_nombre_hijo5)): ?>
  <input name="user_nombre_hijo5" value="<?php echo $current_user->user_nombre_hijo5; ?>" type="text" placeholder="Nombre del menor">
  <input name="user_fecha_hijo5" value="<?php echo $current_user->user_fecha_hijo5; ?>" type="text" placeholder="Fecha de nacimiento (DD/MM/AAAA)" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
  <?php /*<input name="user_dni_hijo5" value="<?php echo $current_user->user_dni_hijo5; ?>" type="text" placeholder="DNI" pattern="^[0-9]{8}$"> */?>
<?php endif ?>
  <label class="terminos"><input type="checkbox" id="terminos" name="terminos" class="hijos" value="1" <?php echo  ($current_user->notificaciones == 1)?'checked':''; ?> >Recibir notificaciones por E-mail.</label>

<span class="submit">Guardar</span>
<input type="submit" name="updateUsuario" value="Guardar" class="enviar">
<p><a href="<?php echo wp_logout_url( home_url() ); ?>">Ó salir</a></p>
</form>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
function updated() {
  if ( $('#avatar').val() !== undefined ) {
    $('#avatar-pc').html($('#avatar').val());
  }else{
    $('#avatar-pc').html('Cambiar foto');
  }
}
var el = document.getElementById('avatar');
el.onchange = updated;
</script>