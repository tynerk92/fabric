<?php

  class XXXX_Hero_Module extends XXXX_Customizer_Base {
    const SECTION = 'XXXX-hero-section';
    const HERO_ENABLE_SETTING = 'XXXX-hero-enable-setting';
    const HERO_IMAGE_URL_SETTING = 'XXXX-hero-image-setting';
    const HERO_BG_IMAGE_URL_SETTING = 'XXXX-bg-hero-image-setting';

    protected function registerSection( $wp_customize ) {
      $wp_customize->add_section(
        self::SECTION ,
        array(
          'panel' => parent::THEME_PANEL,
    		  'title' => __( 'Hero Settings', 'XXXX' )
        )
      );
    }

    protected function registerSettings( $wp_customize ) {
      $wp_customize->add_setting( self::HERO_ENABLE_SETTING, [ 'default' => 'yes' ] );
      $wp_customize->add_setting( self::HERO_IMAGE_URL_SETTING, [] );
      $wp_customize->add_setting( self::HERO_BG_IMAGE_URL_SETTING, [] );
    }

    protected function registerControls( $wp_customize ) {
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'XXXX-hero-enable-control',
          array(
            'label'       => __( 'Display Hero Section?', 'XXXX' ),
            'section'     => self::SECTION,
            'settings'    => self::HERO_ENABLE_SETTING,
            'type'        => 'radio',
            'choices'     => array(
              'yes' => __( 'Yes, display it', 'XXXX' ),
              'no'  => __( "No, don't display it", 'XXXX' )
            )
          )
        )
      );

      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'XXXX-hero-image-control',
          array (
        		'label'     => __( 'Hero Image', 'XXXX' ),
        		'section'   => self::SECTION,
        		'settings'  => self::HERO_IMAGE_URL_SETTING
    	    )
        )
      );

      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'XXXX-bg-hero-image-control',
          array (
        		'label'     => __( 'Hero Background Image', 'XXXX' ),
        		'section'   => self::SECTION,
        		'settings'  => self::HERO_BG_IMAGE_URL_SETTING
    	    )
        )
      );
    }

    protected function registerStyles() {
      require_once( dirname(__FILE__) . '/styles.php' );
    }
  }

  new XXXX_Hero_Module();

  function the_hero() {
    echo '
    <section class="hero">
      <img class="hero-bg" src="' . get_theme_mod( 'XXXX-bg-hero-image-setting' ) . '" alt="">
      <div class="content-wrapper">
        <img class="hero-image" src="' . get_theme_mod( 'XXXX-hero-image-setting' ) . '" alt="">
        <div class="hero-text">
          <h0>Design With Fabric</h0>
          <h3>The Tightly-Woven Foundation Theme</h3>
        </div>
      </div>
    </section>
    ';
  }
?>
