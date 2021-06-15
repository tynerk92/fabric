<form action="<?php echo home_url( '/' ) ?>" method="get">
    <label for="search"><?php _e( 'Search this site', 'XXXX' ) ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>
