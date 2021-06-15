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
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);

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

/**
 * Includes a template-part with the provided variables available to it.
 *
 * @param  string $fileName  The name of the template to include
 * @param  array  $variables Data that will be accessed inside the template
 * @return void
 */
function includeTemplatePart($fileName, $variables = []) {
  extract($variables);
  include($fileName);
}

function get_css_uri() {
  return get_stylesheet_directory_uri() . '/assets/css';
}

/*
  Enqueue scripts
 */
function XXXX_enqueue_scripts() {
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'XXXX_enqueue_scripts' );

function XXXX_register_editor_css() {
  add_editor_style();
}
add_action( 'admin_init', 'XXXX_register_editor_css' );

function XXXX_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'XXXX' )
    )
  );
}
add_action( 'init', 'XXXX_register_menus' );
?>
