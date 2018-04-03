<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //

define('DB_NAME','buencafe_sitio_st1');

/* Tu nombre de usuario de MySQL */
define('DB_USER','buencafe_st1');

/* Tu contraseña de MySQL */
define('DB_PASSWORD','KxRAiE62OfP2EnuCqPh7');

/* Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/* Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

//print_r($_GET);


/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{0ZPS!gCYW:~sxc]I5uo]`P1=DdzxWx2NbmWMASJ!jAYYao[d~VLg*t>r_kdq+-8');
define('SECURE_AUTH_KEY',  ']5yxv.cq{x93)Z|,9|2^+UCvc[6:wmb[G+>Ax3{So-eH!sFY0!<[|?8u,f(%+F^*');
define('LOGGED_IN_KEY',    '|5e4DdRWzL_|,+/Kis3W.J6h<Ydhd>wk@-|2:.{OZ[vnwcipP@_t A[s764,1VRa');
define('NONCE_KEY',        '/y!Tpw0K|LZ^;2p35a-F!vw30wiwcT:[odqe+8.*rPw/YrFZ.XL5K5h$d17^HV #');
define('AUTH_SALT',        'zm}HwQt:hwRo.N.Whvua8iXa%_}3:[5:YN*]`Tq?`f{FB,KQ|q3V~dtIs} l3rXM');
define('SECURE_AUTH_SALT', '**Qd02-r3-$u5-ne`XIW;J_TzlCbMvg@QuUGe^!~cwVT_,}8 l3s8V]Miq%vN|{+');
define('LOGGED_IN_SALT',   ')^am@k>6AK~qY(lJ`PfG,IFZkR5wgy-l+0peMpb9[1_38]),qWV+VXKsz6Y@@yuj');
define('NONCE_SALT',       'TjN3/&qRd8nt0|kcw6rp`+QLG +]w(+jA;t-|-GAk9ima+G_=xGi @FvLy=qs8MZ');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
define('WP_CACHE_KEY_SALT', 'eSPiRjeLhgP957XDpx32+g');
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */

define('WP_DEBUG', false);

define( 'WP_MEMORY_LIMIT', '70M' );

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

//update_option( 'siteurl', 'http://buencafe.com/' );
//update_option( 'home', 'http://buencafe.com/' );
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

