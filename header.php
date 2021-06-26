<!doctype html>
<html <?php language_attributes(); ?> >
  <head>
    <title><?php bloginfo( 'name' ) ?></title>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Truculenta:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Above the fold styles only -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/abovethefold.css' ?>">

    <!-- Defer styles below the fold until the page has loaded -->
    <link rel="preload" href="<?php echo get_stylesheet_uri() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript> <!-- fallback in case javascript is disabled -->
      <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">
    </noscript>
  	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php if (class_exists('XXXX_Customizer_Base')) {
      renderModule( 'basic-nav' );
    } ?>
    <?php if ( get_theme_mod( 'XXXX-hero-enable-setting' ) == 'yes' ) : renderModule( 'hero' ); endif ?>
<!-- Leave the body tag open -->
