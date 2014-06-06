<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
<?php

/**
 * Add featured image support.
 */


add_theme_support( 'post-thumbnails' );

/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */

function datatrak_css() {
	$theme      = wp_get_theme();
	$datatrak = wp_get_theme( 'datatrak' );
	wp_enqueue_style( 'datatrak-style', get_template_directory_uri() . '/core/css/master.css', false, $datatrak['Version'] );
}

add_action( 'wp_enqueue_scripts', 'datatrak_css' );

/**
 * Proper way to enqueue scripts and styles
 */
function datatrak_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/core/js/site.js', array(), $datatrak['Version'], true );
}

add_action( 'wp_enqueue_scripts', 'datatrak_scripts' );

/**
 * Adding desktop navigation menu
 */

function datatrak_register_theme_menu() {
	register_nav_menu( 'primary', 'Main Navigation Menu' );
	register_nav_menu( 'footer', 'Footer Navigation Menu' );
}

add_action( 'init', 'datatrak_register_theme_menu' );

/**
 * Remove comments and tools from admin menu
 */

function datatrak_remove_menus() {
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'datatrak_remove_menus' );

function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> <div class="crumb"></div> </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> <div class="crumb"></div> </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> <div class="crumb last"></div> </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator"><div class="last crumb"></div></li>';
                }
                echo $output;
                echo '<li>'.$title.'</li>';
            } else {
                echo '<li>'.get_the_title().'</li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    
    if (is_search()) {
    	echo"<li>Search Results"; echo'</li>';
    }
    echo '</ul>';
}

function datatrak_new_excerpt_more( $more ) {
    return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'datatrak') . '</a>';
}
add_filter( 'excerpt_more', 'datatrak_new_excerpt_more' );

?>
