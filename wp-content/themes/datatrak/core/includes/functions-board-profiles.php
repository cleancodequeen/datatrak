<?php
/**
 * Board Members profiles
 *
 * Create a "Board Members" page in WordPress using 
 * custom post types, taxonomies, and Advanced Custom
 * Fields
 */
if ( !class_exists('BoardProfiles') ):

class BoardProfiles
{
	/**
	 * Initialize & hook into WP
	 */
	public function __construct() {
		add_action( 'init', array($this, 'register_post_type'), 0 );
		add_action( 'admin_notices', array($this, 'admin_notice') );
		add_action( 'after_setup_theme', array($this, 'after_setup_theme') );
	}
	
	
	/**
	 * Dependencies check
	 *
	 * Check to make sure we have the required plugin(s) 
	 * installed.
	 */
	public function dependencies_check() {
	   return ( is_plugin_active('advanced-custom-fields/acf.php') ) ? true : false;
	}
	
	
	/**
	 * Theme setup
	 *
	 * Create a custom thumbnail size for our team avatars
	 */
	public function after_setup_theme() {
	  add_image_size('team-thumb', 100, 100, true); // 100px x 100px with hard crop enabled
	}
	
	
	/**
	 * Dependencies notifications
	 *
	 * Required plugin isn't installed, notify user
	 */
	public function admin_notice() {
	
		// Check for required plugins
		if ( $this->dependencies_check() )
			return;
		
		// Display message
		$install_link = admin_url('plugin-install.php?tab=search&type=term&s=Advanced+Custom+Fields&plugin-search-input=Search+Plugins');
		$html =  '<div class="error"><p>';
		$html .= '<strong>Board Members Profiles</strong> needs the <a href="http://www.advancedcustomfields.com/" target="_blank">Advanced Custom Fields</a> plugin to work. Please <a href="' . $install_link . '">install it now</a>.';
		$html .= '</p></div>';
		
		echo $html;
	}


	/**
	 * Register post type
	 */
	public function register_post_type() {
	   
	   // Labels
		$labels = array(
			'name' => _x("Board Members", "post type general name"),
			'singular_name' => _x("Member", "post type singular name"),
			'menu_name' => 'Member Profiles',
			'add_new' => _x("Add New", "member item"),
			'add_new_item' => __("Add New Member"),
			'edit_item' => __("Edit Member"),
			'new_item' => __("New Member"),
			'view_item' => __("View Member"),
			'search_items' => __("Search Members"),
			'not_found' =>  __("No Members Found"),
			'not_found_in_trash' => __("No Members Found in Trash"),
			'parent_item_colon' => ''
		);
		
		// Register post type
		register_post_type('board_member' , array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'menu_icon' => get_stylesheet_directory_uri() . '/core/images/team-icon.png',
			'rewrite' => false,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
		) );
	}
	
	
	/**
	 * Display the cached HTML
	 */
	static function display() {
	
		global $post;
	
		// Caching, re-run query if not found or expired
		$transient_label = __CLASS__ . "_" . __FUNCTION__; // Transient label will be 'TeamProfiles_display'
		if ( false === ( $html = get_transient($transient_label) ) ) {

		   // Get 'team' posts
			$team_posts = get_posts( array(
				'post_type' => 'board_member',
				'posts_per_page' => -1, // Unlimited posts
				'orderby' => 'menu_order', // Order alphabetically by name
				'order' => 'ASC',
			) );
			
			$html = null;
			if ( $team_posts ):
			
			// Gather output
		   ob_start();
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
						<div class="photo" style="background-image: url(<?php echo the_field('board_member_photo');?>);"></div>
						<?php 
						if ( get_field('board_member_position') ) { 
						?>
						<h6><?php echo the_title(); ?>,</h6>
						<h6><?php echo the_field('board_member_position'); ?></h6>
						<?php } else { ?>
						<h6><?php echo the_title(); ?></h6>
						<?php } ?>
						</li>
				<?php endforeach; ?>
					</ul>
				</div>
			</nav>
			<div class="bios group">
			<?php 
				$first = true;
				foreach ( $team_posts as $post ): 
			?>
				<div class="bio-container <?php if ($first) echo 'active'; $first = false; ?>">
				<?php
					setup_postdata($post);
				?>
					<div class="photo" style="background-image: url(<?php echo the_field('board_member_photo');?>);"></div>
					<?php 
					if ( get_field('board_member_position') ) { 
					?>
					<h4><?php echo the_title(); ?>, <?php echo the_field('board_member_position'); ?></h4>
					<?php } else { ?>
					<h4><?php echo the_title(); ?></h4>
					<?php } ?>
					<?php the_content(); ?>
				</div>
			<?php endforeach; ?>
			</div>
			<?php 
			// Save output
		   $html = ob_get_contents();
		   ob_end_clean();
		   
			endif; // end if $team_posts

		   // Store output in cache
		   set_transient( $transient_label, $html, DAY_IN_SECONDS );
		}
		
		// Output the HTML if it exists
		return ( $html ) ? $html : false;
	}
}

$BoardProfiles = new BoardProfiles();

endif;