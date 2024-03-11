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
define( 'DB_NAME', 'patrono_seguros' );

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

define( 'WP_HOME', 'http://localhost/patronoseguros' );
define( 'WP_SITEURL', 'http://localhost/patronoseguros' );

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
define( 'AUTH_KEY',         '>tE;;LFCHPB2Cf {B|X4^M:f|3VqX!i.=.@?$)566v-TnXER7U~YOQn|6l$CQG+X' );
define( 'SECURE_AUTH_KEY',  'fw0Yw_27FgfSco&&w*$xq|yq;<Hd(1x1Y8}(4Ijn k]TSEw,c6>Cld`7hIKM::BF' );
define( 'LOGGED_IN_KEY',    'tgXVB0ocFEu-3|1|rN]IA^Gg4>%8%LZ_XJx:A%)afD[=n=Em Kq#Legv!HFpY9XZ' );
define( 'NONCE_KEY',        'p$:%`ATA2-74<z`?(WcN>6pHVa0[CwuUaAQ=:X,fMFs{I[3^8~2oBZ} SJw<&I_H' );
define( 'AUTH_SALT',        ',CotQ>HR&-*-bdAo>5|aTyfs6PwpkI;l/?uE=-f8xC/gUfo_yk5eE|6X6t6J^C(b' );
define( 'SECURE_AUTH_SALT', '#Oh.*>F?QQ97tYq-g,_8|rFd7H+lznYaZxL &}y3>5pNRZU#7IE&EP=a_S$AB*Et' );
define( 'LOGGED_IN_SALT',   'kb)A~GQM^Vei<6nm4[)ml,68~W02bHmD:7Icl:zNqgecZN~fU-3QxWK`z[DmxOuj' );
define( 'NONCE_SALT',       '9,E9=dV1P<4d.nE#n+M]6wl}FHTp4^(KLMeG)c4(p3/2xF!X^w4CSjiIb]e,`_i+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ps_';

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
