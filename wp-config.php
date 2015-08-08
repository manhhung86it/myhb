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
define('DB_NAME', 'myhb');

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
define('AUTH_KEY',         ']w.s5>y6;)l|Z^hVLuxFg}Wqaxc<Eh7{bm5[{K.Y+t!bv@sHY{WAKQKN&@J#-7-3');
define('SECURE_AUTH_KEY',  'i]AwiVLBpe-/X6nX;Q7iPZ[>Ti>im.+K+2[-9a(zV*eM;H#4ck|R-fSI]GdWA}@>');
define('LOGGED_IN_KEY',    '2,aT<LO~=HNkM3s*wU+`S3{TA#y;cpF`6]|R[;-n=kqH(B@`Ep>VwHt`5DI(CkMi');
define('NONCE_KEY',        '/dI-rq<*>cS;+=^79pgpMFokdgp,ISNs;-$nCWi|=(2/uii0Z4D%VA3CoM1-K:kO');
define('AUTH_SALT',        'lZfh>-A|=vYFyOHJdg}^PHf5OtL:i9,.7Ewnc!UMt6( d2f`Ld!+-5UzwWD)V`$x');
define('SECURE_AUTH_SALT', '|<#enq3+n!R<dMUFYG>L_89]xz.mR=l+EZQ-X-+k-eZx,2#+x.p[ahD+V+atxj,w');
define('LOGGED_IN_SALT',   ')XlnjK*%FskStln8RHJn[Tr$@U}Wh=[]j..3>)9Je+4H 51+v@BoBVvX38FctVI&');
define('NONCE_SALT',       'qL4kOacvo}gRA7Kpnb%P!U*B/1!j|WLSYw^%GsMmJ=?n-3Pkfn9];34s>=,&O5[<');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
