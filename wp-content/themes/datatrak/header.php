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
			<?php if (is_home()) { ?> Here is the homepage title  <?php  } else { wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); } ?>
		</title>

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div id="indicators">
        <!-- <p class="hr-show">Hires</p> -->
        <p class="l-show">Large</p>
        <!-- <p class="d-show">Default</p> -->
        <p class="tl-show">Tablet</p>
        <p class="hl-show">Handheld</p>
        <!-- <p class="h-show">Handheld Portait</p> -->
    </div>
	<div id="container">
		<div id="header" class="group">
			<a href="<?php echo home_url(); ?>"><div id="logo">
			</div></a>
			<p id="slogan"><?php echo __( 'from Concept to Cure.', 'datatrak' ); ?></p>
			<div id="contact-btn"><a href="#" target="_blank"><div><?php echo __( 'GET IN TOUCH', 'datatrak' ); ?></div></a></div>
			<?php get_search_form(); ?>
		</div>
		<?php if (is_home()) { ?><div id="subheader"></div> <?php  } ?>
		<nav class="menu-main">
    		<?php
				//wp_nav_menu (
				//	array (
				//		'theme_location' => 'primary',
				//		'container' => false
				//	)
				//);
			?>

			<ul id="menu-default-navigation-menu" class="menu group">
				<li id="menu-item-39" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-39">
					<a href="http://local.datatrak.com/unified-experience/">Unified Experience</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-42" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-42">
					<a href="http://local.datatrak.com/products/">Products</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-46" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-46">
					<a href="http://local.datatrak.com/markets/">Markets</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-49" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-49">
					<a href="http://local.datatrak.com/services/">Services</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-52" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-52">
					<a href="http://local.datatrak.com/resources/">Resources</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-55" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-55">
					<a href="http://local.datatrak.com/partners/">Partners</a>
					<div class="active-arrow"></div>
				</li><li id="menu-item-58" class="primary menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
					<a href="http://local.datatrak.com/company/">Company</a>
					<div class="active-arrow"></div>
				</li>
			</ul>

			<div class="menu-sub-wrapper">
				<nav class="menu-sub">
					<ul>
						<li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62">
							<a href="http://local.datatrak.com/company/company-subpage/">Company Subpage</a>
						</li>
					</ul>
				</nav>
			</div>
		</nav>