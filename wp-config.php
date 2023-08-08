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
define( 'DB_NAME', 'reisedurstig_database' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '>>j,aSF4#3I9i_C+>V:PQ&vWJv3h433ma:e.2T?=:2;19O,y*9X%:8e6G~jXr=3d' );
define( 'SECURE_AUTH_KEY',  'q(g*@@R)CEr{C|]R5m^*%),:Lr)O5M2dI<7u^UePd<%E0?>Vo{<QE}el(v[!r3 4' );
define( 'LOGGED_IN_KEY',    'A$%Cs[8;x@NqePZ8h4UQpY~)XoJV_IwxKG;`{6Sljz<$zNN?L,RfP;M*zAylc^OR' );
define( 'NONCE_KEY',        'Xv8RyG<d*O$3sDhhnqycS?[c:YZ6Qksh[aiAY/aDK{a.k6,L0cct}^Q[3p<Z**L#' );
define( 'AUTH_SALT',        '(YUX&hS?T]HC^bB5yHyYaf%5PU&?>D)20W0UnAow_zHf&@yOLaCB1;=s#bMs[KAu' );
define( 'SECURE_AUTH_SALT', 'Z|asCj6BG~J7EN9ngGX$BOE~_K[-(_#@%>/JArXvB&.Q@3VokBi> yDfPx vii3.' );
define( 'LOGGED_IN_SALT',   'w7})se:Q@(Z:49iN&to6qukT4}/RpVu!9+^gS=GU]y,^)rY3Y9b5jF@l&5Cbl^E6' );
define( 'NONCE_SALT',       'UInz-0DfJ5.7rL<l2_-)4nUi#OcC(pZWl^%Qiq4{Aj+`c:O1zwau4l+zS&g3L0u8' );


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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);


/* Add any custom values between this line and the "stop editing" line. */

@ini_set( 'upload_max_filesize', '100M' ); // Ändere '100M' auf den gewünschten Wert in Megabytes
@ini_set( 'post_max_size', '100M' ); // Ändere '100M' auf den gewünschten Wert in Megabytes

/* That's all, stop editing! Happy publishing. */


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
