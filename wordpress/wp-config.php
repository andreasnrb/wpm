<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'backpress');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

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
define('AUTH_KEY',         '20h_AN1<rMz5)O<H,_=h/rbLc[|bUIHdQ-c8t+m3Jx3O?QKsX-S|;lWW;u(s9-,+');
define('SECURE_AUTH_KEY',  '/B+|D#.xPq-yAkYGv}aIChq6s+XWft-#wM2DoB+zo@]08gX6m6V&me)a*<As[he+');
define('LOGGED_IN_KEY',    '5iRIY[i7*naQ55^}hb|9D|Q |83o/%ls|mNJb[|U~H_be|~t~/RH6ZLD/+bsvjCN');
define('NONCE_KEY',        '[LXpZ%R!QJ-_M!rz-lGg6pQ-L~^_:+6_9#U{ UI$PNm|Xy3liF?Sn2ic27ejQ)][');
define('AUTH_SALT',        's<,C;1BqK#[z(NCq@sF5G*6jr}Lc7&w-+.qso&0DL;D!Y?os}AYc ;2@9+%?P|2&');
define('SECURE_AUTH_SALT', 'wO7)YQw5i<wze^|14R^G}tR>PDvGyYD(c9#nVj 3R--}6]O& wP3/YFi79GR{%b|');
define('LOGGED_IN_SALT',   'ZuFgAvfe}*>gglG3lEs*zx?rd/R*xHK^KO#QZLKePbN:TFmq3P}aI-?DnfVN7&TW');
define('NONCE_SALT',       'x7>KadS*ny)U 5{N0~){Pj:rMQ4FpA+5FW-|)x]b#Jid^~oM9 d-EoSD]lQ2+*5+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
