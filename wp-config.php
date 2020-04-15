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

define('DB_NAME', "beautybyarmando");

/** MySQL database username */

define('DB_USER', "root");

/** MySQL database password */

define('DB_PASSWORD', "root");

/** MySQL hostname */

define('DB_HOST', "localhost");


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

define('AUTH_KEY', '510c7321bd31f9db66a8b14c667b19e7890d1cdecf5596e8011c5060efe7a4a9');
define('SECURE_AUTH_KEY', 'aa22da90e525840bb3726dcd74df30c81d6ca2da0ef846c413253104abb3fc58');
define('LOGGED_IN_KEY', '55af27a9705427616887d797c49ee9d637d9943b96655242766090b8a1544847');
define('NONCE_KEY', '87883b3ad054619a485720c42f294d45b0652e00aee891f2a88c257d5b75c436');
define('AUTH_SALT', 'a86bd61f523c1eb7352ab4b63f615cb268959de44a7ff4215803cec7e6f65c35');
define('SECURE_AUTH_SALT', '5242896698879a6ec5852b8ef9c8678f1d36d70761e9952472de0eb81681bf0c');
define('LOGGED_IN_SALT', '5541cae8a965c249a0201c8f4d552d5119fa0664b6f74f7cc6a9607e94b8f286');
define('NONCE_SALT', '840e5cdbd563b6a74503ace74addf2c222a7fbc1bba224e6a74ed46e93eb9216');

/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = '_LMV_';

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



// Settings modified by hosting provider
define( 'WP_CRON_LOCK_TIMEOUT', 120   );
define( 'AUTOSAVE_INTERVAL',    300   );
define( 'WP_POST_REVISIONS',    5     );
define( 'EMPTY_TRASH_DAYS',     7     );
define( 'WP_AUTO_UPDATE_CORE',  true  );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

