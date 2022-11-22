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
define('DB_NAME', 'onlinesl_plugin');

/** MySQL database username */
define('DB_USER', 'onlinesl_chris');

/** MySQL database password */
define('DB_PASSWORD', 'aKmaJCkaU6');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '_nUvKee&@+C9,cMtpqLLwL(8Zx^X&|QG]6%vtypIf_xq@doHM]g=il8`>H&44EeZ');
define('SECURE_AUTH_KEY',  'xy6*-IajioF3$w&i1415sd}9qgiO<kj$3J}TfL.STmwKIr|Ro$s_7|xNCD+j+|V3');
define('LOGGED_IN_KEY',    'L#1U6B!O3M0/>sg3Ho9!8+35YvS!:dPIqEH(6f[92ss8xEP^O47pYzQ3p|^i]}~o');
define('NONCE_KEY',        '*L7B!g*!FcRg]G3-h^CtAR6KB.#|- ~>Cty|%5}97]%ZWk2p)b0vH9P@+qpxd9(<');
define('AUTH_SALT',        '/`%sK`k8;yh|)+,UDFweoN_e^#<gQ#o<HEf#QI+)>pB1DD)Et>/,`aI>@%:xwFZo');
define('SECURE_AUTH_SALT', '2/s9Er}YW@a)aV?-%;@axEXhZn/;pluTM~_chDy>%SE3 `m~7y+o9P|N_dvP8mz.');
define('LOGGED_IN_SALT',   'L#xw|?01IlgCF40c?h mxpPcyh*j{mvnRv,8BGx&+uV&QdT<%Mrre1$e:B@xS(G4');
define('NONCE_SALT',       'cocYz_m{Zd;qs8#l~Eurq6l]GXxKVHL6jO`+*eT^!|K5:u$B|+`{_wY|FV$A5U<x');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');
