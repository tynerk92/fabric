<?php

    /**
     * This class, when extended, provides a self-contained module that can be
     * easily loaded into the customizer.
     */
    abstract class XXXX_Customizer_Base {
      const THEME_PANEL = 'XXXX-theme-panel';

      protected $name;

      public function __construct( $name ) {
        $this->name = $name;
        add_action( 'customize_register', array( $this, 'registerModuleCustomization' ), 20 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
      }

      abstract protected function registerSection( $wp_customize );
      abstract protected function registerSettings( $wp_customize );
      abstract protected function registerControls( $wp_customize );

      private function registerStyles() {
        require_once( dirname(__FILE__) . '/' . $this->name . '/styles.php' );
      }

      /**
       * Registers a self-contained module as a new customizer section.
       *
       * WARNING This function has to be public for WP to call it.
       * It should not be called from anywhere else unless you REALLY know what
       * you're doing.
       *
       * @param  WP_Customize_Manager $wp_customize
       * @return void
       */
      public function registerModuleCustomization( $wp_customize ) {
        $this->registerSection( $wp_customize );
        $this->registerSettings( $wp_customize );
        $this->registerControls( $wp_customize );
      }

      /**
       * Allows customization options to be used in page styling.
       *
       * WARNING This function has to be public for WP to call it.
       * It should not be called from anywhere else unless you REALLY know what
       * you're doing.
       *
       * @return void
       */
      public function enqueueScripts() {
        $this->registerStyles();
      }
    }

    function renderModule( $name ) {
      include( dirname(__FILE__) . '/' . $name . '/template.php' );
    }

?>
