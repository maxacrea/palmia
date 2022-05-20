<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/* Database settings - You will get these credentials from your web host. */

/* The name of the database for WordPress */
define( 'DB_NAME', 'dbs5537589' );

/* Database username */
define( 'DB_USER', 'dbu2870378' );

/* Database password */
define( 'DB_PASSWORD', '.rn3hSR!t.cU9!G' );

/* Database server address */
define( 'DB_HOST', 'db5006692746.hosting-data.io' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'z D&_QS99p/<*%`0NORz};2u?yd4#_LezvpFfP)sCy/ifB_eRQfCZ6]b-=z-jIa2' );
define( 'SECURE_AUTH_KEY',  '941e3Q8cJLwRK_wg~G=9,[L];vW3$On]HGG<vj#h%ibC3n+Kb@BrHKLXm{G?Nzdq' );
define( 'LOGGED_IN_KEY',    '-^Yau$5@.UA~cPnLBW^PRb#Q%2Ns]]F3evH5>5uw.9#-{anl~hWs&q<~3-SyS-g5' );
define( 'NONCE_KEY',        '#F}ZPIt)B4.?qs!nFaKX)X?=A(0Fhx08L@_||-2! >Xzsh+6oHX-5l1KVG`oH#+2' );
define( 'AUTH_SALT',        '2fKj6Z/bA1H^^h2EX{A8^0J8_wq|kd94a>B4]L&l7JYZCstD!~r<rHe9{=<$pkkM' );
define( 'SECURE_AUTH_SALT', 'c|U)m[C7f~]F-sO*7cD|]T~j;AW)z8j$+g3l*bLds[pu%gOd5A{}E00g2h0RoDyW' );
define( 'LOGGED_IN_SALT',   '-?XOafRUa./lF$Z87JE,I~|q48M@6VwtA>W%&Fym<~u%qS F4^l}0r6=`QMykscu' );
define( 'NONCE_SALT',       ']5s~j0:RnXO.6:9 s{Q^q TS0?V12H B8+IWgR#Ccz|r[Ciy7rr< *;Mpc%{QfiB' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tPaWYaMP';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
