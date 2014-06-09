<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
		<div id="footer-widget" class="group">
			<?php if( is_active_sidebar( 'footer-widget' ) ) : ?>

				<?php dynamic_sidebar( 'footer-widget' ); ?>

			<?php endif; ?>
		</div>
	</div>
	<div id="footer">
		<nav id="sitemap">
		<?php
			wp_nav_menu (
				array (
					'theme_location' => 'footer',
					'container' => false,
					'depth' => 0,
					'walker' => new Footer_Site_Map(),
					'menu_class'      => 'group'
				)
			);
		?>
		</nav>
		<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
	</div>
<?php wp_footer(); ?>
</body>
</html>