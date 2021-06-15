<?php get_header() ?>
	<main>
    <h1 class="page-title">
      <?php
        /* translators: %s: search query. */
        printf( esc_html__( 'Search Results for: %s', 'XXXX' ), '<span>' . get_search_query() . '</span>' );
      ?>
    </h1>
	<?php
		/* Start the Loop */
		while ( have_posts() ) {
      the_post();
			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );
		}
    if ( ! have_posts() ) {
      echo 'You do not have posts';
      get_template_part( 'template-parts/content', 'none' );
    }
  ?>
	</main><!-- #main -->
<?php get_footer() ?>
