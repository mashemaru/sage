<header class="navigation-header" role="banner">
    <div>
      <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
         <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Logo" />
      </a>
      
    </div>
    <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">Menu</a>
    <nav role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'navigation-menu show',
          'menu_id' => 'js-navigation-menu']);
      endif;
      ?>
    </nav>
</header>