<!doctype html>
<html <?php language_attributes(); ?> >
  <head>
    <title><?php bloginfo( 'name' ) ?></title>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_css_uri() . '/reset.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Truculenta:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Above the fold styles only -->
    <link rel="stylesheet" href="<?php echo get_css_uri() . '/abovethefold.css' ?>">

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
          <?php if ( display_header_text() ) { ?>
            <h1 id="site-title">
              <a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo( 'name' ) ?></a>
            </h1>
            <h2 id="tagline"><?php bloginfo( 'description' )?></h2>
          <?php } ?>
          <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
            <?php  the_custom_logo() ?>
          <?php } ?>
        </div>
        <!--
          TODO (optional) Add more information about the blog here.
          Look at bloginfo() documentation for more information.
          https://developer.wordpress.org/reference/functions/bloginfo/
        -->
        <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) ?>
        </nav>
      </div>
      <?php if ( get_theme_mod( 'XXXX-navigation-shape-image-setting' ) ) { ?>
        <div class="navigation-shape">
          <img src="<?php echo get_theme_mod( 'XXXX-navigation-shape-image-setting' ) ?>" >
        </div>
      <?php } ?>
    </header>
    <?php if ( get_theme_mod( 'XXXX-hero-enable-setting' ) == 'yes' ) : the_hero(); endif ?>
<!-- Leave the body tag open -->
