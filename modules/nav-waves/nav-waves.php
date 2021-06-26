<?php

  class XXXX_Navigation_Waves_Module extends XXXX_Customizer_Base {
    const SECTION = 'XXXX-navigation-shape';
    const NAV_IMAGE_URL_SETTING = 'XXXX-navigation-shape-image-setting';

    protected function registerSection( $wp_customize ) {
      $wp_customize->add_section(
        self::SECTION ,
        array(
          'panel' => parent::THEME_PANEL,
    		  'title' => __( 'Navigation Shape Enhancement', 'XXXX' )
        )
      );
    }

    protected function registerSettings( $wp_customize ) {
      $wp_customize->add_setting( self::NAV_IMAGE_URL_SETTING, []);
    }

    protected function registerControls( $wp_customize ) {
      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'XXXX-navigation-shape-image-control',
          array (
        		'label'     => __( 'Navigation Shape Image', 'XXXX' ),
        		'section'   => self::SECTION,
        		'settings'  => self::NAV_IMAGE_URL_SETTING
    	    )
        )
      );
    }

    protected function registerStyles() {
      // Empty
    }

    protected function registerModule() { $this->name = 'nav-waves'; }
  }

  // Initialize this module
  new XXXX_Navigation_Waves_Module( 'nav-waves' );
?>
