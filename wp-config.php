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
define('DB_NAME', '16462946_0000017');

/** MySQL database username */
define('DB_USER', '16462946_0000017');

/** MySQL database password */
define('DB_PASSWORD', 'blog2017;blog');

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
define('AUTH_KEY',         'SjKNp2;z:nu;+HzKy&`BxaD;]j80IWvF<b:wp}}<bY;h8# i^t(!CYsj-)u[dC4^');
define('SECURE_AUTH_KEY',  'Ca&AN*Ua~c5w-LgiZiQY@2hI%l#F!7p9-|:%Qq00HehV1ZFg+1,#@HXYX,K434b^');
define('LOGGED_IN_KEY',    'wR z;^}21|&$EoWe9EU]qmX4*3,C(p2?>bH?2:612nba@+$X ~->Xn,BO-Z3hS76');
define('NONCE_KEY',        '[J~9lY$iB`l-sV,HL*dD{]Fd+QkA*FtIw+!KKU;tTKeVuyFOdDb}W55Eeuf4`BeQ');
define('AUTH_SALT',        'gqf]45u8JTn9ie6a:C):,2LFT/Y:rpU#?Od_4#-Z<jMB/ho/*=q),pJhwg{%pQgK');
define('SECURE_AUTH_SALT', 'YwuFFOP| 3hq)gC e8a53KWr0yEfrNL>K)eTRgF_sQCu`Ny<>Oy&A!GLpOH!l!04');
define('LOGGED_IN_SALT',   'rfwWaNa9r_5/YVk&s;SZfD<6s&o`JM$ygDWUD8m,T<PiTstd2 I9v`cr6J:Y(/]t');
define('NONCE_SALT',       '/8r&P-a3grIzGz[+.<LY-S^{`( %B7b?&5ksKD>2HkY<+^hDLb.xF@gz[V^))xrd');

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
