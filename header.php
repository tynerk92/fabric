<!doctype html>
<html <?php language_attributes(); ?> >
  <head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_css_uri() . '/reset.css' ?>">
    <!-- Above the fold styles only -->
    <style>
      /*
        TODO Implement Above-the-fold CSS only.
        All of this is just an example.
      */

      #site-title {
        display: inline;
      }

      header {
        width: 100%;
        background: #ddd;
      }

      header nav ul li {
        display: inline-block;
        line-height: 80px;
      }

      header nav ul li.page_item_has_children > ul {
        display: none;
      }

      header .content-wrapper {
        display: flex;
        justify-content: space-between;
        margin: 0 5%;
      }

      .site-identity {
        display: flex;
        align-items: center;
      }

      .custom-logo {
        height: 64px;
        width: auto;
      }

      #tagline {
        display: inline;
      }
    </style>

    <!-- Defer styles below the fold until the page has loaded -->
    <link rel="preload" href="<?php echo get_stylesheet_uri() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript> <!-- fallback in case javascript is disabled -->
      <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">
    </noscript>
  	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
      <div class="content-wrapper">
        <div class="site-identity">
          <h1 id="site-title">
            <a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo( 'name' ) ?></a>
          </h1>
          <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
            <?php  the_custom_logo() // TODO uncomment this to display the custom site logo ?>
          <?php } ?>
          <p id="tagline"><?php bloginfo( 'description' )?></p>
        </div>
        <!--
          TODO (optional) Add more information about the blog here.
          Look at bloginfo() documentation for more information.
          https://developer.wordpress.org/reference/functions/bloginfo/
        -->
        <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) ?>
        </nav>
        <?php get_search_form() ?>
      </div>
    </header>
<!-- Leaving the body tag open for reuse -->
