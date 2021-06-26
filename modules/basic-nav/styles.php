<style>
  .basic-nav {
    position: relative;
  }

  .basic-nav.sticky {
    position: fixed;
    width: 100vw;
  }

  .basic-nav .page-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .basic-nav .custom-logo {
    height: 137px;
    width: auto;
  }

  .basic-nav .menu {
    font-family: var(--font-primary);
  }

  .basic-nav .menu a {
    text-decoration: none;
    color: var(--clr-secondary);
    font-weight: bold;
  }

  .basic-nav .desktop .menu li {
    display: inline-block;
    padding: 0 1rem;
  }

  .basic-nav .desktop .menu li li {
    padding: 0;
  }

  .basic-nav .desktop .menu li ul {
    padding-left: 0.5rem;
  }

  .basic-nav .desktop .menu li.current_page_item a {
    color: var(--clr-primary);
  }

  .basic-nav .desktop .menu a:hover {
    color: var(--clr-primary);
  }

  .basic-nav .desktop .menu li.page_item_has_children {
    position: relative;
    overflow: visible;
  }

  .basic-nav .desktop .menu li.page_item_has_children li {
    margin: 0.5rem 0;
    word-wrap: none;
  }

  .basic-nav .desktop .menu li.page_item_has_children ul {
    display: none;
    background-color: #fff;
  }

  .basic-nav .desktop .menu li.page_item_has_children > ul {
    margin: 0 0.5rem 0.5rem;
    font-size: 0.9em;
  }

  .basic-nav .desktop .menu > ul > li.page_item_has_children:hover > ul {
    display: block;
    position: absolute;
    width: 150%;
    left: -25%;
    filter: drop-shadow(0px 10px 5px rgba(0, 0, 0, 0.1));
  }

  .basic-nav .desktop .menu .children .children {
    margin: 0;
  }

  .basic-nav .desktop .menu .children * {
    display: block;
  }

  .basic-nav .desktop .menu li.page_item_has_children:hover ul .children {
    display: block;
    position: relative;
  }

  .basic-nav .desktop .menu li.page_item_has_children:hover li.page_item_has_children ul {
    display: block;
    position: relative;
  }

  .basic-nav .mobile {
    display: none;
  }

  @media all and (max-width: <?php echo get_theme_mod( 'XXXX-basic-nav-mobile-breakpoint-setting' ) ?>) {
    .basic-nav .desktop {
      display: none;
    }

    .basic-nav .mobile {
      display: block;
    }

    .basic-nav .mobile .menu {
      height: 0;
      overflow: hidden;
      position: absolute;
      left: 0;
      right: 0;
      transition: height 0.2s linear, padding 0.2s linear;
      background: #ddd;
      top: 100%;
    }

    .basic-nav .mobile .menu > ul {
      padding: 1rem;
      font-size: 24px;
    }

    .basic-nav .mobile .menu > ul ul {
      font-size: 0.8em;
      margin-left: 1rem;
    }

    .basic-nav .mobile .menu > ul li {
      margin: 0.5rem 0;
    }

    .basic-nav .mobile .menu > ul a:hover {
      color: var(--clr-primary);
    }

    .basic-nav .mobile .menu-toggle {
      width: 32px;
      height: 32px;
      position: relative;
      cursor: pointer;
      z-index: 2;
    }

    .basic-nav .mobile .hamburger-menu,
    .basic-nav .mobile .hamburger-menu:before,
    .basic-nav .mobile .hamburger-menu:after {
      content: '';
      width: 100%;
      height: 6px;
      border-radius: 2px;
      position: absolute;
      top: -13px;
      background-color: #000;
      transition: all 0.3s ease;
    }

    .basic-nav .mobile .hamburger-menu {
      top: calc(50% - 3px);
    }

    .basic-nav .mobile .hamburger-menu:after {
      bottom: -13px;
      top: unset;
    }

    .basic-nav .mobile .menu-toggle.open .hamburger-menu {
      background-color: transparent;
    }

    .basic-nav .mobile .menu-toggle.open .hamburger-menu:before {
      transform: translateY(13px) rotate(45deg);
    }

    .basic-nav .mobile .menu-toggle.open .hamburger-menu:after {
      transform: translateY(-13px) rotate(-45deg);
    }

    .basic-nav .mobile .menu-toggle.open + .menu {
      height: calc(100vh - 100%);
      width: 100vw;
      position: absolute;
      left: 0;
    }

    .basic-nav .mobile .menu > li {
      margin: 0.5rem;
    }
  }
</style>
