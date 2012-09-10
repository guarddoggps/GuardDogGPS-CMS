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
define('DB_NAME', 'guarddoggps_cms');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', ''); //xtremek0864

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'S_dqQ8P^=k %)T FE!)x~X3=<nRkvBw6@%O!0+M+vdxMx$aZM<P+!RG207s75{5U');
define('SECURE_AUTH_KEY',  'mM<j?7eMk?N,K*+l`S+f*[0gNI_#$E HPI_Gb[xHE~O(<M*46tR);k6j@-:ZV+!T');
define('LOGGED_IN_KEY',    '|VgQs-VI*>s?!x-%=.^klL/?:|__9A^L AJ`GHous6-erx3+j!EPyI8g+7XC8vn-');
define('NONCE_KEY',        'b<]57LB8=bZ;aYGuP /i(6)]v-.Z(zA8e(bk+ `{lM2K5!p&q>p-#wfpUO!E,H{H');
define('AUTH_SALT',        'Os:n+=u_{yx#9m]B%h)Z6$q`%Z4Ny>suN)+dEDscIzQHXy.1ebf&HHV]|zi#+3t2');
define('SECURE_AUTH_SALT', 'K[sF9:||C<<|hR:z__E[-62R7+5C$rD6;[c^NP}[[u(LR/SpVb c#)_S>.FPjD-!');
define('LOGGED_IN_SALT',   'Lo>?akX8_;?e5S6Y,~1`;14hFgW`{>Fzprmscx-;|:xcYP G|&.O5:PffZ:|k2M{');
define('NONCE_SALT',       'uS3z.*JBbM0/JwZS9zQZOBUKU!8t|z}H>GZ-S2Ao&%(iIXvjo:oHKS8vZ?+)EIJX');
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
