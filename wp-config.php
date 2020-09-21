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
define('DB_NAME', 'databasename');

/** MySQL database username */
define('DB_USER', 'username');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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

define('AUTH_KEY',         'nXcO6WB28r7aUnYLasdoEYQn0mEaZGm0PYJzmYGLnjsnY8ZniArxGoIA2Tp1LP5P');
define('SECURE_AUTH_KEY',  'X14uaTIwXZhK5NoE5ijAPydEinCJ035R2cjJHUH7cz5w7Xkqno6UctzCkHEos6A7');
define('LOGGED_IN_KEY',    'ZVcDHlK7HLtOxuqXFjB6uxJO1EA2FsOhMud5m3k7AZRO8htDLiJlSgTrgvmzk2sK');
define('NONCE_KEY',        'kFvyGGus4stexIoYeUWisHc3T9nKBOZw4d5trAPMmwAovsjL5av5dWmwS6dnGVBV');
define('AUTH_SALT',        'l1hqYejc9HfBzIpXKisbxofZJUa7XC9Iq39tn7JXHp2DUi3J4fyerFOOywr7kr17');
define('SECURE_AUTH_SALT', 'xyB1xKiDR3jx3Q0FWJr1nLvhTqgZeS6VPnLfNBHAbA5umaZOgQRWPlQMCjMSDKRz');
define('LOGGED_IN_SALT',   '9q7tlZDls6xID5JmxLhgpJkwGElrzzivagHdH73dBMXE6dypb1BCWzTaDPDERvAU');
define('NONCE_SALT',       'Ryf0sdpGsttaxKDt06D04AQKUdbRith9icjIDLgTTGlXuYG2AjwYVO43kuoTOh5J');
define('WP_TEMP_DIR',      '/storage/content/92/176392/kundchatten.se/public_html/wp-content/uploads');

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
