<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="right_blog_category_wrapper">
        <h4 class="med_bottompadder10">Dịch vụ liên quan</h4>
        <img src="<?php bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
        <div class="right_blog_category_list_wrapper menu-service-general">
            <?php 
              wp_nav_menu( array(

                  'theme_location'    => 'menu-3',

                  'menu'              => "menu-3",

                  'depth'             => 1,

                  'container'         => '',

                  'container_class'   => '',

                  'container_id'      => '',

                  'menu_id'           => '',

                  'menu_class'        => '',

                  'fallback_cb'       => 'wp_bootstrap_navwalker_footer::fallback',
                  'walker'            => new wp_bootstrap_navwalker_footer(),
                  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'

                ) );
            ?>
        </div>
        <div class="right_blog_category_list_wrapper menu-service-curent">
           </div>
    </div>
</div>