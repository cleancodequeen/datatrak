<?php

/**
 * Template Name: Events
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Events Category Template
 *
 *
 * @file           category-events.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/category-events.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php the_breadcrumb(); ?>

<div id="events" class="category-content group">

<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>

	<?php
	endwhile; endif;
	?>
	<br>
	<div class="posts">
<?php 
	$posts = get_posts('category_name=events&numberposts=-1');
	
	foreach($posts as $post) {
?> 
	<?php the_title('<h6><a target="_blank" href="'.get_permalink().'">', '</a></h6>', true); ?>
	<?php the_excerpt(); ?>
<?php }; ?>
	</div>
</div><!-- end of #blog -->

<?php get_footer(); ?>
