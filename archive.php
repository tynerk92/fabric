<?php get_header() ?>
<?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();

      get_template_part( 'template-parts/content', get_post_format() );
      echo (get_post_format());
    }
  } else {
    get_template_part( 'template-parts/content', 'none' );
  }
?>
<?php get_footer() ?>
