<?php
/**
 * WordPress Configuration for Production (modeaiarts.com)
 * 
 * This file should be renamed to wp-config.php on the production server
 * Database credentials should be updated with actual Bluehost values
 */

// ** Database settings - Bluehost configuration ** //
define( 'DB_NAME', 'ezfjslmy_WPIDO' );
define( 'DB_USER', 'ezfjslmy_WPIDO' );
define( 'DB_PASSWORD', 'a.DNOdL2qj^Dz{rFi' );
define( 'DB_HOST', 'localhost' ); // Try localhost first, may need server IP
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ** Authentication Unique Keys and Salts ** //
// Generated fresh from: https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'R[i ZT1nnGo=*d+-3Cj!zolJrR~dh!tqgldoSyU+*=Pq-D2RyBx;e(g6mX86!kn8');
define('SECURE_AUTH_KEY',  'g2N}X-y@S) )-9`2T?V&SST`v7]J-dl)B_@6|}M=9`DX7OhPE]w# 9m Z24=3]/O');
define('LOGGED_IN_KEY',    '&n=K4]hgqc~%|UAd&%V#<LfAvd1x+Nd;CfJaW`#3TEp)RmFYC_a%va.EJ{92p).K');
define('NONCE_KEY',        ':R>l@z<*D:ew,G1iccoX7K5P^43dy?5L[FHPY |eh-3|[QNy9E]xCn+S]V$HX!ma');
define('AUTH_SALT',        'gu[YCBuQWoRD|>:|v}n%#f8@z:rwswE35A RL*E/z@L SM,,:5RSGL<E0h,s)]0s');
define('SECURE_AUTH_SALT', '6>PWwizOHvD3rc/sB5yJ5w4@%)vvK)uY`Y@eF>|2l2S.-#9&2*0SdPXx8E2MpL-5');
define('LOGGED_IN_SALT',   './H%i8mK_(0-/<l12Q*PGW4,6*[|T8bg92mt;Ufr}x(SF%-eK;ZyGP+_{rm7>h:)');
define('NONCE_SALT',       'wE]d>E*|c`+3(0=!!%qdFV#eDB7c*!)*D8J@zC<7EJYXr/4?cZ@lI7w&KM)E7^sW');

// ** WordPress Database Table prefix ** //
$table_prefix = 'wp_';

// ** WordPress Environment ** //
define('WP_ENVIRONMENT_TYPE', 'production');

// ** Performance and Security Settings ** //
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);

// Increase memory limit for AI portrait processing
define('WP_MEMORY_LIMIT', '512M');

// Security enhancements
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', false); // Allow plugin/theme updates
define('FORCE_SSL_ADMIN', true);

// Auto-updates
define('WP_AUTO_UPDATE_CORE', 'minor');

// Caching (if using a caching plugin)
define('WP_CACHE', true);

// File permissions
define('FS_CHMOD_DIR', (0755 & ~ umask()));
define('FS_CHMOD_FILE', (0644 & ~ umask()));

// WordPress URLs - Update these to your actual domain
define('WP_HOME', 'https://modeaiarts.com');
define('WP_SITEURL', 'https://modeaiarts.com');

// ** AI Portraits Theme Specific Settings ** //
// Google Analytics 4 (will be set via WordPress admin)
// define('AI_PORTRAITS_GA_ID', 'G-XXXXXXXXXX');

// Image upload settings for portraits
@ini_set('upload_max_size', '32M');
@ini_set('post_max_size', '32M');
@ini_set('max_execution_time', '300');

// ** SSL and HTTPS Settings ** //
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Force HTTPS
if (!is_ssl() && !is_admin()) {
    $redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    wp_redirect($redirectURL, 301);
    exit();
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
?>