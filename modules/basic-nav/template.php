<header class="basic-nav <?php echo ( get_theme_mod( 'XXXX-basic-nav-sticky-setting' ) == 'yes' ? 'sticky' : '' ); ?>">
  <div class="page-wrapper">
    <section class="site-description">
      <?php if ( display_header_text() ) : ?>
        <h1 id="site-title">
          <a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo( "name" ) ?></a>
        </h1>
        <h2 id="site-description"><?php bloginfo( "description" )?></h2>
      <?php endif ?>
      <?php
        if ( function_exists( "the_custom_logo" ) && has_custom_logo() ) {
          the_custom_logo();
        }
      ?>
    </section>
    <nav class="desktop">
      <?php wp_nav_menu( array( "theme_location" => "header-menu" ) ) ?>
    </nav>
    <nav class="mobile">
      <div class="menu-toggle">
        <div class="hamburger-menu"></div>
      </div>
      <?php wp_nav_menu( array( "theme_location" => "header-menu" ) ) ?>
    </nav>
  </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const mobileToggleElement = document.querySelector('.basic-nav .mobile .menu-toggle');

    // Fix the header's offset on initial page load as well as window resize
    window.onresize = fixHeader;
    fixHeader();

    mobileToggleElement.addEventListener('click', () => {
      mobileToggleElement.classList.toggle('open');
    })
  })

  function fixHeader() {
    const header = document.querySelector('.basic-nav');
    const headerHeight = header.offsetHeight;

    if (header.classList.contains('sticky')) {
      const body = document.querySelector('body');
      body.style.position = `static`;
      body.style.paddingTop = `${headerHeight}px`;
      header.style.top = '0';
      if (body.classList.contains('admin-bar')) {
        header.style.top = `${document.getElementById('wpadminbar').offsetHeight}px`;
      }
    }
  }
</script>
