<?php
/********************************************************************************
 *
 * Plugin Name: Feature Me - CTA Widget
 * Plugin URI: http://www.phase-change.org/plugins/feature-me
 * Description: A simple widget that allows you to feature any page or post on your website.
 * Author: Ian Banks
 * Version: 1.1.3
 * Author URI: http://www.phase-change.org
 * License: GNU General Public License, version 2
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Tags: feature, widget, featured-post, featured-page, feature-me, feature-widget,cta, call to action,
 * featured post, feature me, call to action widget, feature me cta widget, feature me cta widget
 *
 *
 * Copyright 2012-2013 Ian Banks
 *
 ********************************************************************************
 *
 *      Table of Contents
 *
 *      1.0 - Initialize Plugin
 *          1.1 - Include files
 *          1.2 - Setup Plugin
 *      2.0 - Enqueue Widget Files
 *          2.1 - add_admin_scripts
 *      3.0 - Display Message
 *          3.1 - Compare Versions
 *          3.2 - fm_activate_msg
 *          3.3 - set_fm_message
 *      4.0 - Remove Options
 *          4.1 -fm_unset_options
 *
 ********************************************************************************/

/********************************************************************************
 * 1.0 - Initialize Plugin
 * Initializes Widget, options, and any messages.
 *
 * @since 1.1.0
 ********************************************************************************/


/**
 * 1.1 - Include files
 *
 * @since 1.1.0
 */
include_once (plugin_dir_path(__FILE__).'classes/featuremeSetup.php');
include_once (plugin_dir_path(__FILE__).'classes/featuremeWidget.php');
wp_enqueue_script('jquery');

/**
 * 1.2 - Setup Plugin
 * Creates the $fm object and runs the init method to setup the widget.
 *
 * @since 1.1.0
 */
$fm = new fmSetup();
$fm->init();


/********************************************************************************
 * 2.0 - Enqueue Widget Files
 *
 * @since 1.1.0
 ********************************************************************************/

/**
 * 2.1 - add_admin_scripts
 * Enqueue's widget files to be used only on the widgets page
 *
 * @param $hook
 */
function add_admin_scripts( $hook ) {
    if ( $hook == 'widgets.php' ) {
        wp_enqueue_script('featureMeWidget',plugin_dir_url(__FILE__).'js/featureMeWidget.js');
    }
}
add_action('admin_enqueue_scripts','add_admin_scripts',10,1);


/********************************************************************************
 * 3.0 - Display Message
 *
 * @since 1.1.0
 ********************************************************************************/

/**
 * 3.1 - Compare Versions
 * Display message if the versions are different. ie. just installed or upgraded.
 * Launches fm_activate_msg
 *
 * @since 1.1.0
 */
if($fm->compare_versions() == false){
    add_action('widgets_init', 'fm_activate_msg');
}

/**
 * 3.2 - fm_activate_msg
 * Sets a message (set_fm_message) when admin_notices hook is performed
 *
 * @since 1.1.0
 */
function fm_activate_msg(){
    add_action('admin_notices','set_fm_message');
}

/**
 * 3.3 - set_fm_message
 * Returns the message
 * Updates option fields to match so the messages only displays once upon
 *  plugin installation
 *
 * @since 1.1.0
 */
function set_fm_message(){
    global $fm;
    echo $fm->display_message();

    update_option('featureme_v',$fm->get_version());
    update_option('featureme_v_new',$fm->get_version());
}


/********************************************************************************
 * 4.0 - Remove Options
 *
 * @since 1.1.0
 ********************************************************************************/

/**
 * 4.1 -fm_unset_options
 * Deletes Feature Me options if the plugin is disabled to cleanup the databse.
 *
 * @since 1.1.0
 */
function fm_unset_options(){
    delete_option('featureme_v');
    delete_option('featureme_v_new');
}
//add_action('deactivate_plugin', 'fm_unset_options');