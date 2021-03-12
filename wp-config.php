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
define( 'DB_NAME', 'digital-book' );

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
define( 'AUTH_KEY',         '#Vu$3^,x(*z l4m@uJ w$=:cq?0WjiCZe[PE:`6|8#LaV&6V%0<Bi!t$I2hslvy$' );
define( 'SECURE_AUTH_KEY',  'qdz66&)th,m{z(01a#xnBO%p;!Pbo<9`*@pf<J2<z*nYT+y$VF~I[c,zN(J#~r%j' );
define( 'LOGGED_IN_KEY',    '07h_.UD#(<66N,K*,CY}zkx1n3k:SAAFve`^2XV?@PiS}7psD1GCex(,aIv+j3kT' );
define( 'NONCE_KEY',        'YCk~e#Jx3b&y9ZB:DptfBo/ojlF,_l U7A4ato`UxQA#F.bvy[6R9DR>Q=oyf-<A' );
define( 'AUTH_SALT',        'VT{0k N[7[f)tB 3EbjvflCtVgI8nt:tVLKR]%#3~(y+okYz?>^[,]C60;9@N^`v' );
define( 'SECURE_AUTH_SALT', '}z*mO;mW|_ TO8WK^4DceXF&:BRQOQ]:W<[!T~zukK:U>F20%NF&nT]}J_-!S;7g' );
define( 'LOGGED_IN_SALT',   'NY ^FDRiFDvVEbxb$.!S0)WGk&aF#8z|i:Ze+R~*gId[k>_.!}?Y3@1UH*/):yeI' );
define( 'NONCE_SALT',       '08g09:x}y[w>s}Tx~`a#]ekS@%#,Qiz*t$$do|)p!UtN194V01_v?l7BKkixWZk>' );

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
