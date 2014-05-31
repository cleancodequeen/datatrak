<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/search.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php the_breadcrumb(); ?>

<div id="content-search" class="">

	<?php if( is_search() ) {
		echo "this is a search";
	} ?>

	<?php if( have_posts() ) : ?>


		<?php while( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="post-entry">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

			</div><!-- end of #post-<?php the_ID(); ?> -->

		<?php
		endwhile;


	else :


	endif;
	?>

</div><!-- end of #content-search -->

<?php get_footer(); ?>
