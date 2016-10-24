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
define('DB_NAME', 'u875500772_dtb');

/** MySQL database username */
define('DB_USER', 'u875500772_user');

/** MySQL database password */
define('DB_PASSWORD', 'takara');

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
define('AUTH_KEY',         'Hw$|A,hC9 $zfJA#{:|WXowU6YJ&C!J(dUj4f5UQlRUSE0+;*,r8<+~QxFP@mD&;');
define('SECURE_AUTH_KEY',  '{qW*|5+A**DTY1GpGgS-%z%YvB Y5 p~@&gU90{7OLuyHDtQ|]TePB@z>h0n#G,H');
define('LOGGED_IN_KEY',    '~BWX{|uCw.IM@DdUpwcDeS8~^GxE]PL(~>g97$:c1vWU(2l`A/>#t%1b!m#CWR+%');
define('NONCE_KEY',        '|H70qn0`xWK:a+c!0uY%Y!1I>@F`*9=!FU|[&/).=i4057k2k/}nysH|3(-+<$-m');
define('AUTH_SALT',        'X-SbLE>oR~!Ppo=2dK( Dx@h1<d?XWWW`J9=;A<Is@xlWJ/!{V=WX2Em8O[BSyN_');
define('SECURE_AUTH_SALT', ']`35i u#UxM$0tns;$n~}lFuXfzP?1_.swW4+fc<u;#->a/i%#,]oB;h-MN,r.%l');
define('LOGGED_IN_SALT',   '$1v2xRi(]-Qf}q>yMdpYFB,~yU^i;{z!Wp^*`?Y.krLpZ1AD.t-?-q5nveQtT(bk');
define('NONCE_SALT',       '=U:kHbDUTRJScr?|DQpc@?M)m-f|_(GMgG-|Hzgh+!JwwT3s~d$~rx1DV{_Ai]e=');

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
