<main class="content-none">
  <h1><?php _e( 'No Results', 'XXXX' )?></h1>
  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
    <a href="<?php esc_url( admin_url( 'post-new.php' ) ) ?>">
      <?php _e( 'Ready to write your first post?', 'XXXX' ) ?>
    </a>
  <?php
    } elseif ( is_search() ) {
      _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'XXXX' );
    } else {
      _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'XXXX' );
      get_search_form();
    }
  ?>

</main>
