<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
	<!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class=<?php language_attributes(); ?>> <!--<![endif]-->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>
			<?php //if (is_home()) { ?><?php  //} else { wp_title('&laquo;', true, 'right'); ?> <?php //bloginfo('name'); } ?>
			DATATRAK International : Clinical Trials Data Management Systems - www.datatrak.com	
		</title>

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<!-- <div id="indicators"> -->
        <!-- <p class="hr-show">Hires</p> -->
        <!-- <p class="l-show">Large</p> -->
        <!-- <p class="d-show">Default</p> -->
        <!-- <p class="tl-show">Tablet</p> -->
        <!-- <p class="hl-show">Handheld</p> -->
        <!-- <p class="h-show">Handheld Portait</p> -->
    <!-- </div> -->
	<div id="container">
		<div id="header" class="group">
			<a href="<?php echo home_url(); ?>"><div id="logo">
			</div></a>
			<p id="slogan"><?php echo __( 'from Concept to Cure.', 'datatrak' ); ?></p>
			<div id="contact-btn"><a href="#" target="_blank"><div><?php echo __( 'GET IN TOUCH', 'datatrak' ); ?></div></a></div>
			<?php get_search_form(); ?>
		</div>
		<?php if (!is_front_page()) { ?><div id="subheader"></div> <?php  } ?>
		<nav class="menu-main">
    		<?php
				wp_nav_menu (
					array (
						'theme_location' => 'primary',
						'container' => false,
						'depth' => 1,
						'after' => '<div class="active-arrow"></div>'
					)
				);
			?>
			<div class="group"></div>
			<nav class="menu-sub">
				<?php
					wp_nav_menu (
						array (
							'theme_location' => 'primary',
							'container' => false,
							'depth' => 0,
							'walker' => new Menu_With_Description()
						)
					);
				?>
			</nav>
		</nav>
		<nav class="menu-mobile">
			<?php
				wp_nav_menu (
					array (
						'theme_location' => 'primary',
						'container' => false,
						'depth' => 0,
						'walker' => new Mobile_Menu()
					)
				);
			?>
		</nav>