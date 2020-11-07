 <nav role="navigation" class="navbar navbar-default mainmenu">
<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse navbar-desktop">
         <?php 
          wp_nav_menu( array(

          'theme_location'    => 'menu-1',

          'menu'              => 'menu-1',

          'depth'             => 3,

          'container'         => '',

          'container_class'   => '',

          'container_id'      => '',

          'menu_id'           => '',

          'menu_class'        => 'nav navbar-nav dropdown',

          'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

          'walker'            => new wp_bootstrap_navwalker_desktop(),
          'items_wrap' => '<ul id="nav_filter" class="%2$s">%3$s</ul>'

      ) );
          ?>
    </div>
</nav>