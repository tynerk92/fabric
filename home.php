<!-- Displayed when home page is set to display posts -->
<?php get_header() ?>
  <?php if ( have_posts() ) { ?>
    <main> <!-- Display Top Posts -->
      <div class="content-wrapper">
        <?php while ( have_posts() ) { ?>
          <?php the_post() ?>
          <!-- TODO Create some way for users to view the individual post here -->
          <div id="post-summary-<?php the_ID() ?>" <?php post_class( "post-summary" ) ?>>
            <h2>
              <?php if ( empty(get_the_title()) ) { ?>
                (No Title)
              <?php } else { ?>
                <?php the_title() ?>
              <?php } ?>
            </h2>
            <?php the_post_thumbnail() ?>
            <?php if ( has_excerpt() ) { ?>
              <p><?php the_excerpt() ?></p>
            <?php } else { ?>
              <p>
                <!--
                  FIXIT Create an option to turn this off and display the
                  default excerpt. Once this is done, the has_excerpt() check can
                  be removed.
                -->
                It is strongly recommended to create a unique excerpt in the post/page editor.
                You may turn this off to display the default excerpt by going to ********************
              </p>
            <?php } ?>
            <p>Published <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php echo get_the_date() ?></a></p>
            <span>Categorized as </span><?php the_category( ', ' ) ?>
          </div>
        <?php } ?>
        <div class="nav-previous alignleft">
          <?php next_posts_link( 'Older posts' ) ?>
        </div>
        <div class="nav-next alignright">
          <?php previous_posts_link( 'Newer posts' ) ?>
        </div>
      </div>
    </main> <!-- End Display Top Posts -->
  <?php } else { ?>
    <?php _e('Sorry, no posts matched your criteria.', 'XXXX') ?>
  <?php } ?>
<?php get_footer() ?>
