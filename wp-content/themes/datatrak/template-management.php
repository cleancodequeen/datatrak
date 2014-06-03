<?php

/**
 * Template Name: Management
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Management Template
 *
 *
 * @file           template-management.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/template-management.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php the_breadcrumb(); ?>

<div id="management" class="team">

<?php 
	the_post();

	// Get 'team' posts
	$team_posts = get_posts( array(
		'post_type' => 'team',
		'posts_per_page' => -1, // Unlimited posts
		'orderby' => 'menu_order', // Order alphabetically by name
		'order' => 'ASC',
	) );

	if ( $team_posts ):
	?>
	<nav class="team-members">
		<div class="header">
			<h2><?php echo the_title(); ?></h2>
		</div>
		<div class="items group">
			<ul>
			<?php 
			$first = true;
			foreach ( $team_posts as $post ): 
			?>
				<li <?php if ($first) echo "class='active'"; $first = false; ?>>
				<?php
				setup_postdata($post);
				?>
				<div class="photo" style="background-image: url(<?php echo the_field('management_photo');?>);"></div>
				<h6><?php echo the_title(); ?>,</h6>
				<h6><?php echo the_field('management_position'); ?></h6>
				</li>
		<?php endforeach; ?>
			</ul>
		</div>
	</nav>
	<div class="bios">
	<?php 
		$first = true;
		foreach ( $team_posts as $post ): 
	?>
		<div class="bio-container <?php if ($first) echo 'active'; $first = false; ?>">
		<?php
			setup_postdata($post);
		?>
			<div class="photo" style="background-image: url(<?php echo the_field('management_photo');?>);"></div>
			<h4><?php echo the_title(); ?>, <?php echo the_field('management_position'); ?></h4>
			<?php the_content(); ?>
		</div>
	<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>