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
//create a admin area menu item
function rh_user_profile_menu() {
  //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', string $icon_url = '', int|float $position = null ): string
  add_menu_page( 'Rhodian User Profile', 'Rhodian User Profile', 'manage_options', 'rh-user-profile', 'rh_user_profile_admin', 'dashicons-admin-users', 2 );
}
add_action( 'admin_menu', 'rh_user_profile_menu' );
//create the admin area options page
function rh_user_profile_admin(){
  require_once( plugin_dir_path( __FILE__ ) . 'rh-user-profile-admin.php' );
}
//simple link options for login and logout links in elementor widget
function rh_user_profile_elementor_widget_init() {
  //check if elementor is active and if not, deactivate plugin
  if ( class_exists('Elementor\\Widget_Base') ) {
    require_once( plugin_dir_path( __FILE__ ) . 'rh-user-profile-elementor-widget.php' );
  }
}
add_action( 'elementor/widgets/widgets_registered', 'rh_user_profile_elementor_widget_init' );
//generate a logout link
function rh_user_profile_logout_link() {
  $logout_url = wp_logout_url( home_url() );
  $logout_link = '<a href="' . $logout_url . '">' . __( 'Logout', 'rh-user-profile' ) . '</a>';
  return $logout_link;
}
//Enqueue scripts
require_once( plugin_dir_path( __FILE__ ) . 'enqueue-scripts.php' );
//Reditect users to login page if they are not logged in
function admin_redirect() {
if ( !is_user_logged_in()) {
  //check if the current page is the login page
  if( !is_page('membership-login') ) {
    //if not, redirect to the login page
    wp_redirect( home_url('/membership-login/') );
    exit;
  }
}
}
add_action('get_header', 'admin_redirect');