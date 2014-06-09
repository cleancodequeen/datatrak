<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/index.php
 * @since          available since Release 1.0
 */
?>
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'search&hellip;', 'datatrak' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="" />
</form>