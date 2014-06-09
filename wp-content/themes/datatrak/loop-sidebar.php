<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loop Sidebar Template
 *
 *
 * @file           loop-sidebar.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/loop-sidebar.php
 * @since          available since Release 1.0
 */

?>
<div class="sidebar">
	<?php 
		if ( function_exists('ssb_social_icon') ) {

		?>
	<div class="sidebar-social">
	<?php
			echo ssb_social_icon();
		} 
	?>
	</div>
	<?php
		if ( get_post_meta( get_the_ID(), 'cta_1_label', true ) && get_post_meta( get_the_ID(), 'cta_1_url', true ) ) {
			?>
		<div class="cta">
			<a href="<?php echo get_post_meta( get_the_ID(), 'cta_1_url', true ); ?>" target="_blank">
			<div class="cta-btn first">
				<h4><?php echo get_post_meta( get_the_ID(), 'cta_1_label', true ); ?></h4>
			</div>
			</a>
		<?php
		if ( get_post_meta( get_the_ID(), 'cta_1_details', true ) ) {
			?>
		<h6><?php echo  get_post_meta( get_the_ID(), 'cta_1_details', true ); ?></h6>
		<?php } ?>
		</div>
			<?php
		}
	?>
	<?php
		if ( get_post_meta( get_the_ID(), 'cta_2_label', true ) && get_post_meta( get_the_ID(), 'cta_2_url', true ) ) {
			?>
		<div class="cta">
			<a href="<?php echo get_post_meta( get_the_ID(), 'cta_2_url', true ); ?>" target="_blank">
			<div class="cta-btn second">
				<h4><?php echo get_post_meta( get_the_ID(), 'cta_2_label', true ); ?></h4>
			</div>
			</a>
		<?php
		if ( get_post_meta( get_the_ID(), 'cta_2_details', true ) ) {
			?>
		<h6><?php echo  get_post_meta( get_the_ID(), 'cta_2_details', true ); ?></h6>
		<?php } ?>
		</div>
			<?php
		}
	?>
	<?php
		if ( get_post_meta( get_the_ID(), 'cta_3_label', true ) && get_post_meta( get_the_ID(), 'cta_3_url', true ) ) {
			?>
		<div class="cta">
			<a href="<?php echo get_post_meta( get_the_ID(), 'cta_3_url', true ); ?>" target="_blank">
			<div class="cta-btn third">
				<h4><?php echo get_post_meta( get_the_ID(), 'cta_3_label', true ); ?></h4>
			</div>
			</a>
		<?php
		if ( get_post_meta( get_the_ID(), 'cta_3_details', true ) ) {
			?>
		<h6><?php echo  get_post_meta( get_the_ID(), 'cta_3_details', true ); ?></h6>
		<?php } ?>
		</div>
			<?php
		}
	?>
</div>