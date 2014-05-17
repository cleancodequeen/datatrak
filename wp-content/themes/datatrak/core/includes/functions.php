<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
<?php

/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */

function datatrak_css() {
	$theme      = wp_get_theme();
	$datatrak = wp_get_theme( 'datatrak' );
	wp_enqueue_style( 'datatrak-style', get_template_directory_uri() . '/core/css/master.css', false, $datatrak['Version'] );
}

add_action( 'wp_enqueue_scripts', 'datatrak_css' );

/**
 * Proper way to enqueue scripts and styles
 */
function datatrak_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/core/js/site.js', array(), $datatrak['Version'], true );
}

add_action( 'wp_enqueue_scripts', 'datatrak_scripts' );

/**
 * Adding desktop navigation menu
 */

function datatrak_register_theme_menu() {
	register_nav_menu( 'primary', 'Main Navigation Menu' );
}

add_action( 'init', 'datatrak_register_theme_menu' );

?>
