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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database' );

/** Database username */
define( 'DB_USER', 'mysql' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

/** Database hostname */
define( 'DB_HOST', 'custom' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'E#2c5n}_;PJZR![n3x3HO]#B92Rrk_GhHrrjh-I,v{*4|vZ)XmYO5M|]*up|YJ6B' );
define( 'SECURE_AUTH_KEY',   'khxd,VoB$tf~FuB)7IDO?&0Wq5<m}o~#U+br{10an-iTnFq$z?A0%@ +3jD*diI=' );
define( 'LOGGED_IN_KEY',     'nxF:D<qJ<bix`&q EDO9xos|jfLyNTurnEty,KXif{5R:9-b(~03s(<=bYSm&x> ' );
define( 'NONCE_KEY',         'YH7,Nzk!W%.sg) 6+-8Rb-_pt<M6MrG45=,e?aR?ut#Mr$<9) W!0 2oY96^7B>m' );
define( 'AUTH_SALT',         'U;=yhKiLUZ1xdgy0Lpws&--.z=R46cWXtOk>G~{~.V]7^6Er2xdB|&. B:UYgPWl' );
define( 'SECURE_AUTH_SALT',  'PA$X/X!T;Rki]:m8Fc;%P%;kygWa*bcNlIe0hNKM^$Ww;+X38mD`KpdI,.}<VWea' );
define( 'LOGGED_IN_SALT',    '%gr/WGL/_gIQO<2*V{Rf9P1aK(Waz0;|;tmmc(<Nv+Rr;.a.^Feo_<>:V3~{bb~^' );
define( 'NONCE_SALT',        'b1@&nDD>}s9c[]0Wxz+yBu@C94om*sYL`l:{yq^5%6x10i7WR^A$qV5dG&eF%*LD' );
define( 'WP_CACHE_KEY_SALT', 'nad&h8SzD{d<N52i(vn{Yv`mF+h]mHVZ)-ccdiq(SWDRk*mdN=9n:lcxV]:]-y!7' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'plm_';

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
