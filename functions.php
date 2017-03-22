<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function add_to_head() {

// 1st parameter is the handle
// 2nd parameter is the url (ex. below gets the absolute path then concatenates the rest)
// 3rd parameter dependecies if jquery is reauired then use this: array('jquery')
// 4th parameter is the version
// 5th parameter places script in the footer if (true) then script run in footer else (false) then header

// register scripts
//wp_enqueue_script('jquery'); // wordpress already has jquery no need to register it just enque it
wp_register_script('console-log', '/wp-content/themes/sage/assets/scripts/console-log.js', array('jquery'), '', true);
wp_enqueue_script('console-log');

// register styles
// all parameters are the same as wp_enqueue_script except the 5th parameter is for media
//wp_register_style('custom-styles', '/wp-content/themes/sage/custom-styles.css', '', '', 'screen');
//wp_enqueue_style('custom-styles');

}

add_action( 'wp_enqueue_scripts', 'add_to_head' ); // hooks our custom function into the wp_enque_scripts function