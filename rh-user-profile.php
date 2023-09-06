<?php
/*
Plugin Name: Rhodian User Profile
Plugin URI: http://rhodian.net
Description: A plugin to add simple login and logout links to a WordPress site.
Version: 1.0
Author: William Wright
Author URI: http://rhodian.net
License: GPL2
*/
//simple link options for login and logout links in elementor widget
function rh_user_profile_elementor_widget_init() {
  //check if elementor is active and if not, deactivate plugin
  if ( class_exists('Elementor\\Widget_Base') ) {
    require_once( plugin_dir_path( __FILE__ ) . 'rh-user-profile-elementor-widget.php' );
  }
}
add_action( 'elementor/widgets/widgets_registered', 'rh_user_profile_elementor_widget_init' );


require_once( plugin_dir_path( __FILE__ ) . 'enqueue-scripts.php' );