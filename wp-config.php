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

/**
 * Setup White Lion Environments Flags
 */
if ((bool)(strpos($_SERVER['SERVER_NAME'], 'wliondev.com') !== FALSE)) {
	define('IS_DEV', TRUE);
	define('IS_STAGING', FALSE);
} elseif ((bool)(strpos($_SERVER['SERVER_NAME'], 'staging') !== FALSE)) {
	define('IS_DEV', FALSE);
	define('IS_STAGING', TRUE);
} else {
	define('IS_DEV', FALSE);
	define('IS_STAGING', FALSE);
}

/**
 * Setup Database Credentials
 */
if (IS_DEV) {
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', '');
} elseif (IS_STAGING) {
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', '');
} else {
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', '');
}
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
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wl_';

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
 * Set default paths because of the GIT integration
 */
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
define('WP_CONTENT_DIR', __dir__ . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');

/**
 * Disable external requests
 *
 * This is so that users dont see update requests since things are managed through git
 */
define('WP_HTTP_BLOCK_EXTERNAL', true);

/**
 * Disable theme and plugin editing/instalation in the admin
 */
define('DISALLOW_FILE_MODS',true);
define('DISALLOW_FILE_EDIT',true);

/**
 * Force SSL on login and admin pages
 */
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', IS_DEV);
if (WP_DEBUG) {
	define('WP_DEBUG_LOG', true);
	define('WP_DEBUG_DISPLAY', false);
	@ini_set('display_errors',0);
	define('SAVEQUERIES', true);
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
