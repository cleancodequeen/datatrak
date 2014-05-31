<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loop Header Template
 *
 *
 * @file           loop-header.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/loop-header.php
 * @since          available since Release 1.0
 */

?>
<div class="page-title page-copy">
	<h2><?php echo get_the_title(); ?> </h2>
</div>

<?php if ( get_post_meta( get_the_ID(), 'subtitle', true ) ) {
?>
<div class="page-subtitle page-copy">
	<h4><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></h4>
</div>
<?php } ?>