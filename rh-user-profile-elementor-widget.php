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
    //buton style and size color controls
    $this->end_controls_section();
     $this->start_controls_section(
          'content_section',
          [
            'label' => __('Button Style', 'rh-user-profile'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
        );
    $this->add_control(
      'button_style',
      [
        'label' => __( 'Button Style', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'primary',
        'options' => [
          'primary' => __( 'Primary', 'rh-user-profile' ),
          'secondary' => __( 'Secondary', 'rh-user-profile' ),
          'success' => __( 'Success', 'rh-user-profile' ),
          'danger' => __( 'Danger', 'rh-user-profile' ),
          'warning' => __( 'Warning', 'rh-user-profile' ),
          'info' => __( 'Info', 'rh-user-profile' ),
          'light' => __( 'Light', 'rh-user-profile' ),
          'dark' => __( 'Dark', 'rh-user-profile' ),
          'link' => __( 'Link', 'rh-user-profile' ),
        ],
      ]
    );
    $this->add_control(
      'button_size',
      [
        'label' => __( 'Button Size', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'md',
        'options' => [
          'xs' => __( 'Extra Small', 'rh-user-profile' ),
          'sm' => __( 'Small', 'rh-user-profile' ),
          'md' => __( 'Medium', 'rh-user-profile' ),
          'lg' => __( 'Large', 'rh-user-profile' ),
          'xl' => __( 'Extra Large', 'rh-user-profile' ),
        ],
      ]
    );
    $this->add_control(
      'button_color',
      [
        'label' => __( 'Button Color', 'rh-user-profile' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#ffffff',
      ]
    );

    $this->end_controls_section();

  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    if ( is_user_logged_in() ) {
      //generate button with settings
      echo '<a href="' . $settings['logout_url'] . '" class="btn btn-' . $settings['button_style'] . ' btn-' . $settings['button_size'] . '" style="color:' . $settings['button_color'] . '">' . $settings['logout_text'] . '</a>';
    } else {
      //generate button with settings
      echo '<a href="' . $settings['login_url'] . '" class="btn btn-' . $settings['button_style'] . ' btn-' . $settings['button_size'] . '" style="color:' . $settings['button_color'] . '">' . $settings['login_text'] . '</a>';
    }
  }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rh_User_Profile_Elementor_Widget() );