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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testsite' );

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
define( 'AUTH_KEY',         'fvK4l1:k(%1$ak]sY>?<<{TJ87$]jR,KUqGJ%O~p;$riw1nKx1lf!{Y9p|yk91lj' );
define( 'SECURE_AUTH_KEY',  'Abf8^:Dw;2I?r,}d?#t+HTOtU{bei__L54P=ahQR1q?u(S6vy)+Be>p#I=lY`*}H' );
define( 'LOGGED_IN_KEY',    'jaDgQKeEt :z(93dB94v@KH6.1/GmHja*+P+*[5Ay@h3ksI@]F1+YsW$K4$sX$>#' );
define( 'NONCE_KEY',        'Gl(c{qA[%j%1<75P]i<r|/Xki*YYfsxMSfkcdi8g^vy2ul4d^&o9x=aQp653#rTJ' );
define( 'AUTH_SALT',        '90$6dwm$ rBWJYsU~F?3issaLCr{A_B0>-xhK%6^fl~}F0raeW@ox<|ZLz9-Tq8h' );
define( 'SECURE_AUTH_SALT', 'b7+mM7O-toSnj4sgjL%hyq??ZE= #80kh1@*59)OmMZ>l8*F[R}JR}p|TA,O>&W&' );
define( 'LOGGED_IN_SALT',   'O+z`LA%q@U/vc|Tv&/K4cck$_CpVb<e0|uU3 ?XBf*n7M/{|ltdjMB*,/;846l5y' );
define( 'NONCE_SALT',       'HOlBi7F2-@;n0>B-HOU-#E?Q%Y2E,*AY<Tpd6^W>?:t)oEH`uIc{lS2Lg@p5*NjG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
