<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page Template
 *
 *
 * @file           page.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/page.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php the_breadcrumb(); ?>

<div id="page" class="content">
	<?php if( have_posts() ) : ?>
		<div class="copy full">
		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-header' ); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
				
				<?php the_content( __( 'Read more &#8250;', 'datatrak' ) ); ?>

			</div><!-- end of #post-<?php the_ID(); ?> -->

		<?php
		endwhile;
		?>
		</div>
	<?php
	else :

		//get_template_part( 'loop-no-posts' );

	endif;
	?>
</div>

<?php get_footer(); ?>