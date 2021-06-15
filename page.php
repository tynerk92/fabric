<!-- Displayed when home page is set to a static page -->
<?php get_header() ?>
<?php
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/content' );
  }
?>
<?php get_footer() ?>
