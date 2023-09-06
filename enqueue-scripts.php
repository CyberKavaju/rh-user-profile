<?php 
//enqueue bootstrap css and js from CDN
function rh_user_profile_enqueue_scripts() {
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3', true );
}
add_action( 'wp_enqueue_scripts', 'rh_user_profile_enqueue_scripts' );
//enqueue custom css
function rh_user_profile_enqueue_custom_css() {
  wp_enqueue_style( 'rh-user-profile', plugin_dir_url( __FILE__ ) . 'css/rh-user-profile.css' );
}
add_action( 'wp_enqueue_scripts', 'rh_user_profile_enqueue_custom_css' );
