<?php

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/* BEGIN Theme Support */
  function XXXX_theme_setup() {
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );

    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post formats */
    $post_formats = array( 'aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status' );
    add_theme_support( 'post-formats', $post_formats );

    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );

    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );

    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );

    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
  }
  add_action('after_setup_theme','XXXX_theme_setup');
/* END Theme Support */


/**
 * This is useful for determining which template will be used to render the page
 * TODO Remove this for production
 *
 * @return string The current page type string
 */
function get_page_type() {
  global $wp_query;
  $page = 'notfound';

  if ( $wp_query->is_page ) {
    $page = is_front_page() ? 'front' : 'page';
  } elseif ( $wp_query->is_home ) {
        $page = 'home';
    } elseif ( $wp_query->is_single ) {
        $page = ( $wp_query->is_attachment ) ? 'attachment' : 'single';
    } elseif ( $wp_query->is_category ) {
        $page = 'category';
    } elseif ( $wp_query->is_tag ) {
        $page = 'tag';
    } elseif ( $wp_query->is_tax ) {
        $page = 'tax';
    } elseif ( $wp_query->is_archive ) {
        if ( $wp_query->is_day ) {
            $page = 'day';
        } elseif ( $wp_query->is_month ) {
            $page = 'month';
        } elseif ( $wp_query->is_year ) {
            $page = 'year';
        } elseif ( $wp_query->is_author ) {
            $page = 'author';
        } else {
            $page = 'archive';
        }
    } elseif ( $wp_query->is_search ) {
        $page = 'search';
    } elseif ( $wp_query->is_404 ) {
        $page = 'notfound';
    }

    return $page;
}

/*
    SECTION -- Utility Functions
 */

/**
 * Includes a template-part with the provided variables available to it.
 *
 * @param  string $fileName  The name of the template to include
 * @param  array  $variables Data that will be accessed inside the template
 * @return void
 */
function includeTemplatePart( $fileName, $variables = [] ) {
  extract( $variables );
  include( $fileName );
}

/**
 * Loads a customization module from the 'modules' directory.
 *
 * The module must be inside a subdirectory and the module .php file must have
 * the same name as the subdirectory.
 *
 * Example directory structure for loadModule( 'colors' )
 * |-modules
 *  |-colors
 *   |-colors.php
 *   |-styles.php
 *
 * @param  string $fileName Name/path of the file within the 'modules' directory
 * @param  string $subDirectoryPath The path within the 'modules' directory where the module exists
 * @return void
 */
function loadModule( $moduleName ) {
  include( dirname(__FILE__) . '/modules/' . $moduleName . '/' . $moduleName . '.php');
}

/**
 * Gets this theme's css directory uri, instead of the uri of the required file 'style.css'
 * @return string The uri of the folder that contains all non-root css stylesheets
 */
function get_css_uri() {
  return get_stylesheet_directory_uri() . '/assets/css';
}

/*
    SECTION -- WP Hooks - See http://rachievee.com/the-wordpress-hooks-firing-sequence/
 */

/**
 * Load any built-in and custom scripts (.js)
 */
function XXXX_enqueue_scripts() {
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'XXXX_enqueue_scripts' );

/**
 * Registers menu locations in the theme.
 * Can be used in templates:
 *     wp_nav_menu( array( 'theme_location' => 'header-menu' ) )
 */
function XXXX_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'XXXX' )
    )
  );
}
add_action( 'init', 'XXXX_register_menus' );

/**
 * Loads the root section that will contain all module sections/settings/controls
 *
 * @param WP_Customize_Manager $wp_customize
 *  The customization manager that we will add sections/settings/controls to
 */
function XXXX_load_root_customizer_section( $wp_customize ) {
  // TODO Edit the title to reflect your theme's name
  $wp_customize->add_panel( 'XXXX-theme-panel',
    array (
      'title'       => __( '<ThemeName> Customization', 'XXXX' ),
      'priority'    => 10,
      'description' => __( 'All available theme options', 'XXXX' )
    )
  );
}
add_action( 'customize_register', 'XXXX_load_root_customizer_section' );

/**
 * Load customization modules.
 */
function XXXX_load_modules() {
  loadModule( 'colors' );
  loadModule( 'nav-waves' );
  loadModule( 'hero' );
}
add_action( 'after_setup_theme', 'XXXX_load_modules', 20 );

/*
    SECTION - DO NOT EDIT BELOW THIS
 */

/**
 * DO NOT MODIFY - Loads the base module as a foundation for importing other modules
 */
function XXXX_load_base_module() {
  /* Loads the XXXX_Customizer_Base class */
  require_once( dirname(__FILE__) . '/modules/customizer-base.php' );
}
add_action( 'after_setup_theme', 'XXXX_load_base_module' );

/**
 * DO NOT MODIFY - Allows custom CSS in customizer to be applied
 */
function XXXX_register_editor_css() {
  add_editor_style();
}
add_action( 'admin_init', 'XXXX_register_editor_css' );
?>
