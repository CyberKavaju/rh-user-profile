<?php
class Rh_User_Profile_Elementor_Widget extends \Elementor\Widget_Base {
  public function get_name() {
    return 'rh-user-profile';
  }
  public function get_title() {
    return __( 'Rhodian User Profile', 'rh-user-profile' );
  }
  public function get_icon() {
    return 'fa fa-lock';
  }
  public function get_categories() {
    return [ 'general' ];
  }
  protected function _register_controls(){
    $this->start_controls_section(
      'section_content',
      [
        'label' => __( 'Content', 'rh-user-profile' ),
      ]
    );
    $this->add_control(
      'login_text',
      [
        'label' => __( 'Login Text', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Login', 'rh-user-profile' ),
      ]
    );
    $this->add_control(
      'login_url',
      [
        'label' => __( 'Login URL', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'http://example.com/login', 'rh-user-profile' ),
      ]
    );
    $this->add_control(
      'logout_text',
      [
        'label' => __( 'Logout Text', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Logout', 'rh-user-profile' ),
      ]
    );
    $this->add_control(
      'logout_url',
      [
        'label' => __( 'Logout URL', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'http://example.com/logout', 'rh-user-profile' ),
      ]
    );
  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    if ( is_user_logged_in() ) {
      //generate button with settings
      echo '<a href="' . $settings['logout_url'] . '" class="btn btn-primary">' . $settings['logout_text'] . '</a>';
     /* echo '
      <div class="user-navbar-nav" id="userDropdown">
        <ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . wp_get_current_user()->display_name . '</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="' . $settings['logout_url'] . '">' . $settings['logout_text'] . '</a>
            </div>
          </li>
        </ul>
      </div>
      ';*/
    } else {
      //generate button with settings
      echo '<a href="' . $settings['login_url'] . '" class="btn btn-primary">' . $settings['login_text'] . '</a>';
    }
  }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rh_User_Profile_Elementor_Widget() );

