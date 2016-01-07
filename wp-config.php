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
define('DB_NAME', 'leander_db');

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


/** Lokaal uploaden van plugins mogelijk maken*/
define('FS_METHOD', 'direct');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Tg/iFMRvXyH.PtIEYb8~IlfT]pIY4Y69ghw_UOr0%7;|$kdKg3Y5|(:Q0}SW|+2L');
define('SECURE_AUTH_KEY',  'zkn?2&;nK3-J<T@`6$h{+QstMB(h@i!D?7|+7@1+t%%V 9~)JN^Vf+I+EVV5&.tU');
define('LOGGED_IN_KEY',    '$JN2dkcf+?/-n1w+aBuqShKigx[2(-b/*nDb2{``OTm3L-q~LR1O%Sb~t6s(MWnb');
define('NONCE_KEY',        'KcrG rupP77EhiX6SB)vi?apC/uKb*B]mzYe&BdB|X$V_woq||00S=&U7s1Y[CJf');
define('AUTH_SALT',        '/ab%?7Y8W>KJGjtvoM3o:75#a)Vwu94W;3F`DwWr_i#>fnLZ]8@|vUGk85|:aa2l');
define('SECURE_AUTH_SALT', '1o+S9zA)pD`t]/h|e3+KIHlV3K@a-@>{^;sbBL}R*dSDm|Sy_.pL2o4~o(^SW{+o');
define('LOGGED_IN_SALT',   '[d6)Ks+2W{VL@0+%+>0!WmPr4+r-0t5)N3S=#qMq(m WTem|/xD]SK85Rs-C-?tX');
define('NONCE_SALT',       '08`fceJ[Uoy1)M,HXNE@EGBC)R/ W>&C_n1DorGYGp]+f>+;/9No9^Ai( WocS>+');

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
