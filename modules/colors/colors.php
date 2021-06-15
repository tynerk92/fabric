<?php

  /**
   * TODO Modify this by adding any other color settings you need.
   */
  class XXXX_Colors_Module extends XXXX_Customizer_Base {
    const DEFAULT_COLOR = '#4ed983';
    const SECTION = 'XXXX-colors';
    const PRIMARY_COLOR_SETTING = 'XXXX-colors-primary-setting';

    protected function registerSection( $wp_customize ) {
      $wp_customize->add_section(
        self::SECTION ,
        array(
          'panel' => parent::THEME_PANEL,
    		  'title' => __( 'Site Colors', 'XXXX' )
        )
      );
    }

    protected function registerSettings( $wp_customize ) {
      $wp_customize->add_setting(
        self::PRIMARY_COLOR_SETTING,
        array( 'default' => self::DEFAULT_COLOR )
      );
    }

    protected function registerControls( $wp_customize ) {
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'XXXX-colors-primary-control',
          array (
        		'label'     => __( 'Primary Color', 'XXXX' ),
        		'section'   => self::SECTION,
        		'settings'  => self::PRIMARY_COLOR_SETTING
    	    )
        )
      );
    }

    protected function registerStyles() {
      require_once( dirname(__FILE__) . '/styles.php' );
    }
  }

  // Initialize this module
  new XXXX_Colors_Module();
?>
