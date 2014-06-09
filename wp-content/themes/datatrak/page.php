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

<?php 

	if ( ( get_post_meta( get_the_ID(), 'cta_1_label', true ) && get_post_meta( get_the_ID(), 'cta_1_url', true ) ) ||
		 ( get_post_meta( get_the_ID(), 'cta_2_label', true ) && get_post_meta( get_the_ID(), 'cta_2_url', true ) ) || 
		 ( get_post_meta( get_the_ID(), 'cta_3_label', true ) && get_post_meta( get_the_ID(), 'cta_3_url', true ) ) ) {

		$hasCTA = true;
	} else {
		$hasCTA = false;
	}

	$copyClass = $hasCTA ? 'partial' : 'full';
?>

<div id="page" class="content group">
	<?php if( have_posts() ) : ?>
		<div class="copy <?php echo $copyClass; ?>">
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
			if ($hasCTA) {
				get_template_part( 'loop-sidebar' );
			} 
		?>
	<?php
	else :

		//get_template_part( 'loop-no-posts' );

	endif;
	?>
</div>

<?php get_footer(); ?>