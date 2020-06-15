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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testsite' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zx;QWm%1bXo;H O>/kIG3<hq#W%qghs Tq4-B5e5Xj8b17MII s)<P+8|n=YYvw9' );
define( 'SECURE_AUTH_KEY',  '@~[CI+4geLc3$0{8K!_iu0e[% zG+aHiD*.3_:S!2f-O[WIx<XtbsLo+.e877=M4' );
define( 'LOGGED_IN_KEY',    'e?1gXfEUgd7GS7xCC4rx6xhpGM0]HF#,pyt81H?(g1O%@gX7i&j?ZwyuZ@~ln IB' );
define( 'NONCE_KEY',        'DOZ(PyL+FYfpuD8osVAxM3U-EAOo&eMmc,y{03=v)OpJTjY9pY$kArUU.+_!DU9r' );
define( 'AUTH_SALT',        '%s)2hscm7yfr2|w(Vy2,WvEfL~J6Eii[jp3OzvN{xG$mgs1t*?0d5z6L7*K2J#58' );
define( 'SECURE_AUTH_SALT', 'o}j4;ax=h)+59>S)-y]=;4@5Gnu7eJC8LGI>r6NBi%wR2yO9hP?4^+PP6-&HQQ95' );
define( 'LOGGED_IN_SALT',   '0L*Z7{ARo#t>@NQD4MBFZ,P6OSG5:[QY$!xe#.@Sq4iX5Uz!`MSOn9|JkE7AY-_l' );
define( 'NONCE_SALT',       'hzHCbA.VZ[w1~ QOO+^gG4]xfpf.Pj4P=!tPwsWoJ}EN[JBVhjg6`03!lKIC r0|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
