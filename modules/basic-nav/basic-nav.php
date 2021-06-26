<?php
class XXXX_Basic_Nav_Module extends XXXX_Customizer_Base {
  const SECTION = 'XXXX-basic-nav-section';
  const NAV_STICKY_SETTING = 'XXXX-basic-nav-sticky-setting';
  const NAV_MOBILE_BREAKPOINT_SETTING = 'XXXX-basic-nav-mobile-breakpoint-setting';

  protected function registerSection( $wp_customize ) {
    $wp_customize->add_section(
      self::SECTION ,
      array(
        'panel' => parent::THEME_PANEL,
        'title' => __( 'Basic Nav Settings', 'XXXX' )
      )
    );
  }

  protected function registerSettings( $wp_customize ) {
    $wp_customize->add_setting( self::NAV_STICKY_SETTING, [ "default" => "yes" ] );
    $wp_customize->add_setting( self::NAV_MOBILE_BREAKPOINT_SETTING, [ "default" => "930px" ]);
  }

  protected function registerControls( $wp_customize ) {
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'XXXX-basic-nav-sticky-control',
        array(
          'label'       => __( 'Make Navigation Sticky?', 'XXXX' ),
          'section'     => self::SECTION,
          'settings'    => self::NAV_STICKY_SETTING,
          'type'        => 'radio',
          'choices'     => array(
            'yes' => __( 'Sticky', 'XXXX' ),
            'no'  => __( "Not Sticky", 'XXXX' )
          )
        )
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'XXXX-basic-nav-mobile-breakpoint-control',
        array(
          'label'       => __( 'Mobile Menu Breakpoint (include units)', 'XXXX' ),
          'section'     => self::SECTION,
          'settings'    => self::NAV_MOBILE_BREAKPOINT_SETTING,
          'type'        => 'text'
        )
      )
    );
  }

  protected function registerStyles() {
    // require_once( dirname(__FILE__) . '/styles.php' );
  }
}

new XXXX_Basic_Nav_Module( 'basic-nav' );
?>
