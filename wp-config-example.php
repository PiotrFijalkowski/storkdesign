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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_name' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '@NW;OCj6mKIdg#NlN4Q;nT Ei&ze,lEdUJfJ=k#W^V0Y3uSdk22l6!UsapYrSew1' );
define( 'SECURE_AUTH_KEY',   '.eiOiHvWSm!hFh4wy:ChQj+urmj_tuie5HcrV1VL*.[6O?mHA~aInv*]rcDxYv_a' );
define( 'LOGGED_IN_KEY',     'Hh,AdW/_6@]^XQTG09Qv`2dp{zo^8!o[ZWdLMQV`i*jvB&D9lo1|9$to}-%Y}iI6' );
define( 'NONCE_KEY',         'kw`l*vi)*[=/Q_HV:-EqM?(dX+9X=S3wmYT]W`[ny[lSe~oO=uG XT+03]=PAo59' );
define( 'AUTH_SALT',         '{.;g V,~6$W&RF|i51{w|)A#4h[X4b%}I-&o^n%u`^1d3B06DjReCiGYWyU D6~O' );
define( 'SECURE_AUTH_SALT',  '{~ZY[mfn!<g~@kR>}0_{]{jp#p(,z}MVaqUIj/%u3C;W&|$=Qf6sFNUjIBII1r>*' );
define( 'LOGGED_IN_SALT',    'ZR?!9`#z,fiNlg ?&(v#wlB)t+4Lpwb#Ze/3kR6pR!@bqCOR9!{sI_,0ph9-o/Q-' );
define( 'NONCE_SALT',        'szGr]}6t9..F~zP7;6W]`+[ycUUCGU}LI(Jq ?wf.x4l?Rbk%;]OE^xpwSwUYShF' );
define( 'WP_CACHE_KEY_SALT', '.=gL: fHM4t*;E&h@5UWKub71#k:/3_vIn`up9%hO)2yYAn{FO_KN4N-.`|AeVWb' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'ALLOW_UNFILTERED_UPLOADS', true );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_HOME', 'http://localhost/dir_name' );
define( 'WP_SITEURL', 'http://localhost/dir_name/wp/' );
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/app' );
define( 'WP_CONTENT_URL', WP_HOME . '/app' );
define( 'WP_DIR', dirname(__FILE__) );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
