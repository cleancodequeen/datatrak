<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="landing-page">

	<div id="main-featured-widget" class="group">
		<?php if( is_active_sidebar( 'main-featured-widget' ) ) : ?>

			<?php dynamic_sidebar( 'main-featured-widget' ); ?>

		<?php endif; ?>
	</div>
	<div id="secondary-featured-widget" class="group">
		<?php if( is_active_sidebar( 'secondary-featured-widget' ) ) : ?>

			<?php dynamic_sidebar( 'secondary-featured-widget' ); ?>

		<?php endif; ?>
	</div>
	<div id="landing-widget" class="group">
		<?php if( is_active_sidebar( 'landing-widget' ) ) : ?>

			<?php dynamic_sidebar( 'landing-widget' ); ?>

		<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>