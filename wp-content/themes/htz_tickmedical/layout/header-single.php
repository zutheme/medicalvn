<?php $logo_mobile = get_field('logo_mobile','customizer'); ?>
 <!--top header start-->
        <div class="top_header_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="top_header_add">
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span></span> Số 9 Đường Đ5, Saigon Pearl, 92 Nguyễn Hữu Cảnh</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i><span>Gọi chúng tôi :</span> <?php echo get_field('header_phone1','customizer'); ?></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> <?php echo get_field('header_email','customizer'); ?></a></li>
                            </ul>
                        </div>
                        <div class="top_login">
                            <ul>
                                <li><i class="fa fa-sign-in" aria-hidden="true"></i><a class="btn-popup" href="#">Đăng ký tư vấn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $banner_logo = get_field('banner_single_logo','customizer'); ?>
         <!--header menu wrapper-->
        <div class="menu_wrapper header-area hidden-menu-bar stick">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow bounceInDown" data-wow-delay="0.6s">
                        <div class="header_logo">
                            <a href="<?php echo get_home_url(); ?>" class="hidden-xs"><img src="<?php echo $banner_logo['url'] ?>" alt="logo" title="logo" class="logo-banner img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <!--Start of menu-->
                             <?php get_template_part('layout/navbar-menu-2'); ?>
                            <!--End of menu-->
                        <div class="rp_mobail_menu_main_wrapper visible-xs">
                            <div class="row">
                                <div class="col-xs-12 center">
                                    <div class="gc_logo logo_hidn">
                                        <a href="<?php echo get_home_url(); ?>"><img class="single" src="<?php echo $logo_mobile['url']?>"></a>
                                    </div>
                                </div>
                            </div>
                            <?php //$logo = get_field('logo','customizer'); ?>
                            <div id="sidebar">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo_mobile['url']?>" class="single-logo" alt="logo"></span></a>
                        <div id="toggle_close" class="toggle_mobile_close">&times;</div>
                            <div id='cssmenu' class="wd_single_index_menu">
                            <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-2',

                                  'menu'              => "menu-2",

                                  'depth'             => 3,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => '',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_mobile::fallback',
                                  'walker'            => new wp_bootstrap_navwalker_mobile(),
                                  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'

                              ) );
                          ?>
                         
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>