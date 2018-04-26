<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'desk-dog-development' ); ?></a>

<header id="masthead" class="site-header">

  <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'desk-dog-development' ); ?></button>
    <?php
    wp_nav_menu( array(
      'theme_location' => 'menu-1',
      'menu_id'        => 'primary-menu',
    ) );
    ?>
  </nav><!-- #site-navigation -->
</header><!-- #masthead -->
