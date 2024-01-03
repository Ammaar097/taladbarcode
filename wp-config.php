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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'taladbc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ']u%_vAI4i_zkX>&N$X^8fBmT0@hk+m<5$1G`g*6`Fo.#m9o-rFV0fp}9@l[u/vRx' );
define( 'SECURE_AUTH_KEY',  '`X~cG/UlR0I0hQx^~C U@dvRnTvzRsx^CH@!aGH]|-5w)U%3As^-(i%YnK33(>9M' );
define( 'LOGGED_IN_KEY',    'zggKmVYpaawOd[No8YIYHNd-KhF}yHuT@V2]5a&:F4jDib<W`z7k9x%M6#o,V/mX' );
define( 'NONCE_KEY',        '*`n1{%1UV%hCL!6iYt[ni;eZD:6m? LT{P@Z]Y;5%5!;G9I10/@{Wz_]]}rE,w*v' );
define( 'AUTH_SALT',        'h0ggk>)s$eV#Tcvtw`Y8jc|l+F$ws;fm*5r~qA/guy7,FSWf1%S0R>R[SHOZ!H@k' );
define( 'SECURE_AUTH_SALT', '?N)c6&z^;aKeXao:0F F|)e:_c;f]LSO!15Z?q)eyvxvpgSf@wp#F&A_SYx#9>OT' );
define( 'LOGGED_IN_SALT',   ']I9;>w^I |OKA7L[Zi(,.rK?r!@ wy-SemTSuBSD|o{4WSuu)sOy*3zy8zT9v|{Z' );
define( 'NONCE_SALT',       '#zXW{X^/k}[XHAN.i*J4*,/sD%Ks+^;_3bdBy[9nZCM1QHnWn[]3<FO,hu*n/&KC' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'talad_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
