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
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'qug181');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'qug181');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'WPbotargo15');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'qug181.masiabotargo.com');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'm4zSSX n]t}BQCzn8dp|-+JOZv7d+k%r$7,!G02jBv<+Iq>OM<x (pU#+z||~3]i');
define('SECURE_AUTH_KEY', 'p`VA#KDIAcil_>U5m%CL!/]r[^F~OK2UmwX57i|Yy<IqLxh$<0msKcgf;/AO%Bkx');
define('LOGGED_IN_KEY', 'Q12j t)>C:12c0/n-*_Y}6G}$Q-Xf,gD*|d*!QDkz4X-+Q#*E^B(2BG]AMHJB#-A');
define('NONCE_KEY', 'E*<X4|dS<-_L4:axs}P&4~pB8_wa8ZaBx?!>+~4+%k9v6.|+B[(tGuE|l4TZ?|!x');
define('AUTH_SALT', 'dD/`)*dx[n=y:4}ML{+(- pJsZe/$N]aj_6$k9AFs8mt3Tti<jM(^D~)mpgTxeZE');
define('SECURE_AUTH_SALT', 'PO2k$#l>%pyQ1F&GfczehjaI+0!Jys[$0Ji|I:ckNP-<JWcDqc3n0[^2pz@#_|7s');
define('LOGGED_IN_SALT', '8U|-q7A 1|fDdJRmMDI]0*@L^rx%f67|}?tV,3G]MPO|x*.7uZ1|P.bt+Lo]Ij5;');
define('NONCE_SALT', 'k`8zY>Xa1/8;dekoO@`KR{`-xfB?#+fg.+?uCbj-LJ{|p<:,tt}~jFo1V`].gVAA');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

