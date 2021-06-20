<main id="post-<?php the_ID() ?>">
  <div class="content-wrapper">
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>
    <?php wp_link_pages( array(
      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'XXXX' ) . '</span>',
      'after'       => '</div>'
      ) );
    ?>
    <?php the_tags() ?>
    <?php // Display comments if they are available
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    ?>
  </div>
</main>
