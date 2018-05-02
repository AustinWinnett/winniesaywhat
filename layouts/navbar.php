<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'desk-dog-development' ); ?></a>

<header id="masthead" class="site-header">

  <div class="container">
    <div class="row">
      <div class="navbar-logo column">
        <a href="<?php echo site_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/winnie-logo.png" alt="<?php echo get_bloginfo('name'); ?>"></a>
      </div>

      <nav id="site-navigation" class="navbar-nav column">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'desk-dog-development' ); ?></button>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
        ) );
        ?>
      </nav><!-- #site-navigation -->
    </div> <!-- /.row -->
  </div> <!-- /.row -->
</header><!-- #masthead -->
