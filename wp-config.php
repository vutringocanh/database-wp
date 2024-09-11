<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fonicweb_pana');

/** MySQL database username */
define('DB_USER', 'fonicweb_pana');

/** MySQL database password */
define('DB_PASSWORD', 'MatKhau@314!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o2|fX44N.7oEu@+olwz-ZmlJq$8fYgCQIbEOK{^WZT=M((nj1=0VYbR`Q?mw)}W[');
define('SECURE_AUTH_KEY',  '.zEMHl{1UBP4[Zu1Ch!7lSIhr_R#5aVXxDZU:v1#?ycn>Lw=4$!Bz6#uJ3OK+_QF');
define('LOGGED_IN_KEY',    'xf1|AK&!0pIk|-D:k,4<J*w{b} Nn y;f5t:Ot&>[`~:VKd%hmS,{H0Xm8dgORvB');
define('NONCE_KEY',        'O45mVL^_aN+4c$/JXX<C5PwfSys#.(]Jg;xhF2m<ne%c6/KyhKDt)yisV<z_iUM>');
define('AUTH_SALT',        '~mDlWi&ha[0ChhW}1(,KDB+ Nn-ezB{P/x=_x{a$,xhI_1^;^q9aBbfQu2)@.[ve');
define('SECURE_AUTH_SALT', 'AR;eC=RRL2n4gkl=aM]#@eq}IuM,_K T}]l!+Q-*OL:%qH~Cjuai;o*hUJ.xY4g-');
define('LOGGED_IN_SALT',   'i?{*5(Q4Ck]UqD6t@SGXk0AGs.TP,JM9!0<S_qMKA&%8,uS9q&n]YFk_VTpx`MdK');
define('NONCE_SALT',       'f0GKuF{mma_qyFJ9-?#Il^I{iv]f5(}=9eEVgTMg56Bk/!Dw#>_W[.4eEZ;1z,a)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG',false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
