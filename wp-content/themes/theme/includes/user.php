<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<div class="encabezado">
  <div>
    <?php $current_user = wp_get_current_user(); ?>
    <div class="usuario">
      <?php if (get_field('foto_usuario', 'user_'.$current_user->ID)): ?>
      <img alt="<?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>" src="<?php echo get_field('foto_usuario', 'user_'.$current_user->ID); ?>">
    <?php else: ?>
    <span><?php echo $current_user->user_firstname[0] . ' ' . $current_user->user_lastname[0] ; ?></span>
  <?php endif ?>
</div>
<strong><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></strong>
  <?php 
    $rows = $wpdb->get_results("select * from wp_notificaciones where `user_id` ='".$current_user->ID."' AND `show` != '2'");

    ?> 
<ul <?php if (count($rows)> 0) { echo 'class="n"'; } ?>>
  <li <?php if (is_page(18)) { echo 'class="activo"'; } ?>><a href="<?php bloginfo('url'); ?>/mi-perfil/">Mi Perfil</a></li>
  <li <?php if (is_page(89)) { echo 'class="activo"'; } ?>><a href="<?php bloginfo('url'); ?>/mi-perfil/mis-favoritos/">Favoritos</a></li>

    <?php if (count($rows)> 0): ?>
    <li  class="notificacion <?php if (is_page(1912)) { echo 'activo'; } ?>"><a href="<?php bloginfo('url'); ?>/notificaciones/">Notificaciones <span class="notificaciones"><?php echo count($rows) ?></span>
</a></li>
  <?php endif ?>
  <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Salir</a></li>
</ul>
</div>
</div>