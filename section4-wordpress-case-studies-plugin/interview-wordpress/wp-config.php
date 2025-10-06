<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_interview' );

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
define( 'AUTH_KEY',         'Bo:AOYj.N.|tRN8g![tF~<BOGx3Dc[z<|103{py#/zeG7@hM0;=5 1X=cP?nz]C:' );
define( 'SECURE_AUTH_KEY',  '%M6oiS}m{k?hn#+s]?9-QWO0{36af4]P5I6jgGX$X/^Sullq`lseD}3iwor_q~Cr' );
define( 'LOGGED_IN_KEY',    '>+: u1!hds#-ZEy8gT*Vln,MdyIb}MFV{EYKP<x8R[xI!r/%pgyEAw/vHua]J2iR' );
define( 'NONCE_KEY',        'E}!2/IfvHY)KV(btN3)R)J_qEWHR8JncjM!eceWgvs^giHXvSY2vJ-f?Fpc@4XO?' );
define( 'AUTH_SALT',        'r[:g&)FY*9|<S%EBfbU+pwudS?j~7[C4bDR89_D)[mcmn|,7T(x%@WTYW!XVgt7)' );
define( 'SECURE_AUTH_SALT', '_4wYa%%ThFJ)xln},3!p<O=y]Z(BM;d68U-0H6P]t2+VlpXQms?jsbD6R[ie7Aq-' );
define( 'LOGGED_IN_SALT',   'nn6>%PG7jRtR4&y]^>}MUu(0nF)sYc K&7@q/`yoTn~;+xPiTbV5B;9/%hd8|cBv' );
define( 'NONCE_SALT',       '@#S_uEu6aW3<!hWk1DRN=R%I{?vVvhhJSC$V0cd8uL6Ox2f}fsTxA~n>Xb{vVcM8' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
