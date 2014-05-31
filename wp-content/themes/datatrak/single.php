<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Template
 *
 *
 * @file           single.php
 * @package        Datatrak
 * @author         Andrew Nida
 * @copyright      2014 Fig Company
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/datatrak/single.php
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php the_breadcrumb(); ?>

<div id="page">
i'm a the single!
</div>

<?php get_footer(); ?>