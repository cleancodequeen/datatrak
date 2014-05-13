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
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2.1
 * @filesource     wp-content/themes/responsive/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
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
	wp_enqueue_style( 'datatrak-style', get_template_directory_uri() . '/core/css/style.css', false, $datatrak['Version'] );
}

add_action( 'wp_enqueue_scripts', 'datatrak_css' );
