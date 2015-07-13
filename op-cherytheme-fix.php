<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_CheryTheme_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress CheryTheme fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Removes theme script from LiveEditor pages
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       op-cherytheme-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
function remove_cherry_scripts(){
    if (function_exists('is_le_page')){
        if (is_le_page() || defined('OP_LIVEEDITOR')){
            remove_action('wp_enqueue_scripts', 'cherry_scripts');
            remove_action( 'wp_footer', 'cherry_cookie_banner', 1 );
            remove_action( 'wp_enqueue_scripts', 'theme45147_resources' );
        }
    }
}
add_action('wp_enqueue_scripts', 'remove_cherry_scripts',1);

function remove_cherry_cookie_banner(){
    if (function_exists('is_le_page')) {
        if (is_le_page() || defined('OP_LIVEEDITOR')) {
            remove_action( 'wp_footer', 'cherry_cookie_banner', 999 );
        }
    }
}
add_action( 'wp_footer', 'remove_cherry_cookie_banner' );