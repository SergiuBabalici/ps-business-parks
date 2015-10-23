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
define('DB_NAME', 'psbusinessparks2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         'rSA-,0kq3NQ3W||ki/;8iUiNvDAzHvt,MZ6t5Z6l+j5e+-St9P|j*zU%-YZtYH}{');
define('SECURE_AUTH_KEY',  '.8h{%Ok2gUZk1gPyB2HOc$!Ps2-n~/t,8Joj,6mlI-wPAl<UJ?(;?I>;8i{f&){s');
define('LOGGED_IN_KEY',    '{F)Y(Cfp!PZ++_1/ERv3x$h_D3a6P!dl9*m5@K+(8Dg&dn8i7z:DLdUgp&N8z6-}');
define('NONCE_KEY',        '2+GT>T S.pB.:h*%cNXX%4Cw=G`#Ws_Yj;[bQf)2ePScV/TZSc*[Y3RiespWT%=Z');
define('AUTH_SALT',        't/>7?c-a=we?[C7<b(xSq^r-|No(+l_-e]{e1+8v&S5%|FD<zg09LjO+|K`dA&So');
define('SECURE_AUTH_SALT', 'T)+@&Elxp|>)]Fz-KsxKY0%AVBAAbL`AuVU)VFd(e5N}TnO5+wry)K{SqN5q4y-D');
define('LOGGED_IN_SALT',   ')fbxtXm$EU*RpnX6<O9d+#YG+HVVJizRM*UsHY[xcD=(i-pfgY2]j2`-tLe2GqX#');
define('NONCE_SALT',       'gb4j4bbUb{k7o=qNn|pt&pZ).-#R8d*,|kMb;Kwc;sg],V~e|=v*mk].C[w+lh#Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
