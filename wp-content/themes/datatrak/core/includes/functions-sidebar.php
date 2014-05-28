<?php
/**
 * Functions Insatll
 *
 * Functions for installation & activation
 *
 * @package        Responsive
 * @license        license.txt
 * @copyright      2014 CyberChimps
 * @since          1.9.5.0
 *
 * Please do not edit this file. This file is part of the Responsive and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * WordPress Widgets start right here.
 */
function datatrak_widgets_init() {

	register_sidebar( array(
						  'name'          => __( 'Main Featured Widget', 'datatrak' ),
						  'description'   => __( 'Area 0 - Main Featured article for landing page', 'datatrak' ),
						  'id'            => 'main-featured-widget',
						  'before_link'   => '<div class="widget-link"><div class="link-title">',
						  'after_link'    => '</div><div class="arrow"></div></div>'
					  ) );

	register_sidebar( array(
						  'name'          => __( 'Secondary Featured Widget', 'datatrak' ),
						  'description'   => __( 'Area 1 - Secondary Featured articles for landing page', 'datatrak' ),
						  'id'            => 'secondary-featured-widget'
					  ) );

	register_sidebar( array(
						  'name'          => __( 'Landing Widget', 'datatrak' ),
						  'description'   => __( 'Area 2 - Widget for links with icons featured on the landing page', 'datatrak' ),
						  'id'            => 'landing-widget'
					  ) );

	register_sidebar( array(
						  'name'          => __( 'Footer Widget', 'datatrak' ),
						  'description'   => __( 'Area 3 - Latest News and Events from Datatrak', 'datatrak' ),
						  'id'            => 'footer-widget',
						  'before_title'  => '<div class="widget-title"><h5>',
						  'after_title'   => '</h5></div>',
						  'before_widget' => '<div id="%1$s" class="widget-area"><div class="widget-wrapper">',
						  'after_widget'  => '</div></div>'
					  ) );
}
add_action( 'widgets_init', 'datatrak_widgets_init' );
