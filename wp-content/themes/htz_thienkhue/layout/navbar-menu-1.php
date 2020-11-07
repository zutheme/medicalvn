 <nav class="navbar hidden-xs">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <div class="col-xs-3 col-sm-12">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
      </div>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling collapse navbar-collapse nav_response-->
    <div class="collapse navbar-collapse nav_response" id="bs-example-navbar-collapse-1">
        <div class="et_navbar_search_wrapper hidden-xs">
            <div class="et_search_bar" id="search_button"> <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div id="search_open" class="et_search_box">
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Từ khóa"/>
                <button type="submit"> <i class="fa fa-search"></i></button>
                </form>
               
            </div>
        </div>
       <?php 
          wp_nav_menu( array(

          'theme_location'    => 'menu-1',

          'menu'              => 'menu-1',

          'depth'             => 3,

          'container'         => '',

          'container_class'   => '',

          'container_id'      => '',

          'menu_id'           => '',

          'menu_class'        => 'nav navbar-nav navbar-right navbar-nav-custom',

          'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

          'walker'            => new wp_bootstrap_navwalker_desktop(),
          'items_wrap' => '<ul id="nav_filter" class="%2$s">%3$s</ul>'

      ) );
          ?>
   
    </div><!-- end of navbar-collapse -->
</nav>