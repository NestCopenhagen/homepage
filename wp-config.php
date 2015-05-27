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
define('DB_NAME', 'nestwp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'V]L{S]|?qn|D02@N>MPc6i8tV-gx?y6z|d&*FDs*%FS6oh:5hT0{ZkA|WSye:J <');
define('SECURE_AUTH_KEY',  'FOc%xt,A|V29A]8&N-gqjGr&u|4Y*)A`XskGZX_I[~h`s>SaC$be1&v-!8/m:Y82');
define('LOGGED_IN_KEY',    '[Y_kPIx<-{;i8$]Kc`O}]-I(4;OCtj!]]f9_P4{-R~LsUQ>[I|?~tQDD_0xPL8BX');
define('NONCE_KEY',        '-+wC14-dS8^|Hra>q;Cj!`Bmkx^{R+XDBq}s|@W=2LZ2Inig!~l[TX:|k.MB)e;F');
define('AUTH_SALT',        '%-m(WR(sgNs+1CYWB!rY)$i<Gu./CGgj]/3%3Xk4j}L.9_jgfs+{jnK_Hk;0FV,T');
define('SECURE_AUTH_SALT', 'I8gZW7gFm),&ne$NgdOcM,UqwVqpM0d3 oosw16q8|<e1pJ3()_f,^!db|v96lLd');
define('LOGGED_IN_SALT',   'f`;s>wq<=7ay+PU ZTUyKG]e|!+qTL)(I<?ker#,>-GH)?n,Y?M-e.[+%v<mXWg-');
define('NONCE_SALT',       'zG0enLd)j2+Jx):HV+`WkK>tlw8qz<0-1p% RbH3Q)IsW@Is,376Xm[TUY,462tn');

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
