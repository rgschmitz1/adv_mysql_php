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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'project5');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'lnZ!zt)2h=e;y.n:3H^_CXI/7YrZN3q<)>nn0T7TnBbt*WN^tX)J[}Ib3rJ_Ti3S');
define('SECURE_AUTH_KEY',  'kibshXeC@mX3D%|EJ}8Z)oCd;R3Da0N=x}s$GkBL]Q]$1`okwEEQ=Y_dyYEt:|g/');
define('LOGGED_IN_KEY',    '0x(luo!xX/.7zD9oa}l18g~Kf,PCs1QvH3&w&+|TZU:UwrZC?YF[i|Su8@(4&J4P');
define('NONCE_KEY',        'HT}i:]!t^<rf)~]}TO9kRzDR%N^pHvw^ecK--P,rsEBL:LfH}0|DW7M96)!;TI c');
define('AUTH_SALT',        'ke-ZLi[#[kRyDW:x{/3B.Cwch4cQs><ra|F&c-Is3~ed3(OCL<iLIRwTUXIy&Mn8');
define('SECURE_AUTH_SALT', '3ls89OGbsHOMy=@^E0&GAhO[mEu&!QPTL^;?XK`%bN=AO%{I2@G#Kgau}DL&(yaD');
define('LOGGED_IN_SALT',   'up(f~V[7az*XIr9<O-:]fqT[AEZ>]LO>xr(Rc]!)ie{a=?7-yB[.<Jg(OOw]_b?w');
define('NONCE_SALT',       '-0RlG0BpN{j?}qX_x]F,Owryt]}T]SR,]!3A;#~RSVp8/I!qF.`.U?54h[iDp_RJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'proj5_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
