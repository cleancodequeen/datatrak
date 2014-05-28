<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db161188_datatrak');

/** MySQL database username */
define('DB_USER', 'db161188');

/** MySQL database password */
define('DB_PASSWORD', 'db161188');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '8%#Hy@+ZtOUd/xj*D9]~=:H!C<`d1/+|,|&I%1YK~V7DuiPH=_cuegog(>-W?ev(');
define('SECURE_AUTH_KEY',  '7Y&{YU>aOGrTfNkDf$:ZHCC0mC0j*~dEVMkogDz/#|h`#-=:3cj(o8;qO1HGA4gd');
define('LOGGED_IN_KEY',    ' a.,O,+l6*J`/|-3|tjW<% vUX@/OsbeBNH;XD_s8;?)O9[2?Gg^lO#3O?Vsr3Z8');
define('NONCE_KEY',        '1GPGPELf6;KM[kL3p[%QFNs?vM%;3$l~T Sjf(99O!n+|`>!2JHMF=v[--Q+d+G1');
define('AUTH_SALT',        '^IaGf`j^tAh t.|Az{ G&sxL).X7AimT{2h-u+s)Mi>Mnw79x:t93bS|rj}?D@?D');
define('SECURE_AUTH_SALT', 'FH.xmgfqKVN`yy.< 41.A5#q4eq/v/0q}7|0J[/Ft<54a(2onTT)22b2/|uyh1Hi');
define('LOGGED_IN_SALT',   '(!C/gfi&e$1tuOpX#T!8{{+i,a/`W7UP5<?>IRc-k{3es#ZfOL?xa+z0,-F=P3>1');
define('NONCE_SALT',       '`AWkB7+U)Tyw-5#v$m5/|8[.9jYox-VNw8W_M8pla+tDh9FI<rt9U0Q0ggFUX+`p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
