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
define('DB_NAME', 'films');

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
define('AUTH_KEY',         '^0b`V~E#Tf&jHR-YVWcCMjO+|nXDh.)A> !<g$[nbDUU!lN^,VU5+J%L>R`~7w>B');
define('SECURE_AUTH_KEY',  ' &_+bN^~=/o~b/2C/MFNDe]Bf$*%+`^|>;yYimvu1fqi>s~&n$GWl`Pl;&N+c4Uh');
define('LOGGED_IN_KEY',    'g}:sXDM&d_(j&8?oPTjPyhBPu~Q)?iZSKki1XAM#vgk*DS}*#zlD]sh+UL#rqH:y');
define('NONCE_KEY',        '^`4T>q_W)`@A!~]xB|z2Uz-3a3Na {~H7|<kZq:w0O`DG@+PUr1UU td(Z5z ;Bh');
define('AUTH_SALT',        'Nd3-x0UOW[{aDI_,B ?^8`s(WCrFK(&FM;CI.i= R}?uvcLfIo@ztGME?2R9t+?[');
define('SECURE_AUTH_SALT', ']j`R(I;F4>_$Q*!3WMCxkMCq:M4Yn,jk,E$scJ;M]vBm/!~!Zx&sM[2gkD#x+ H.');
define('LOGGED_IN_SALT',   'Tv_}#M|ypFUA&Cmot(~/Gig4Z!OAL(ERsjg{dNlP^x }w{,d&&.d9M&-M,!aw=PB');
define('NONCE_SALT',       '!~pVYL;pU!3t8B,?nL#ExQu2rDLqDceiz)4jPe[^!Dkw3{mDke_U?~zq[S~F# d`');

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
