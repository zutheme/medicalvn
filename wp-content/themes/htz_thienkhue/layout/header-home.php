 <!--top header start-->
        <div class="md_header_wrapper">
            <div class="top_header_section hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="top_header_add">
                                <ul>
                                   <li><a href="<?php echo get_field('idfacebook','customizer'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo get_field('idyoutube','customizer'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo get_field('intagram','customizer'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo get_field('twiter','customizer'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="right_side_main_warpper">
                                <div class="md_right_side_warpper">
                                    <ul>
                                        <li><div class="block-search">
                                        <form class="frm-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Tìm kiếm"/>
                                                <button class="bt-search" type="submit"> <i class="fa fa-search"></i></button>
                                            </form>
                                        </div></li>
                                    </ul>
                                    <!-- <div class="block-search">
                                        <form class="frm-search" role="search" method="get" action="<?php //echo esc_url( home_url( '/' ) ); ?>">
                                                <input type="text" value="<?php //echo get_search_query(); ?>" name="s" id="s" placeholder="Từ khóa"/>
                                                <button class="bt-search" type="submit"> <i class="fa fa-search"></i></button>
                                        </form>
                                    </div> -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $logo = get_field('logo','customizer'); ?>
            <div class="middle_header_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="md_logo hidden-xs hidden-sm">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img class="logo-head" src="<?php echo $logo['url']; ?>" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 hidden-xs">
                            <div class="md_share_info_wrapper">
                                <ul>
                                    <li>
                                        <div class="lv_header_icon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                        <p><span>Thứ hai-chủ nhật</span>
                                            <br>08:00-22:00</p>
                                    </li>
                                    <li>
                                        <div class="lv_header_icon">
                                            <img class="icon-header" src="<?php bloginfo('template_directory');?>/images/icon/icon-phone1.png" alt="Icon" title="Icon">
                                            <!-- <i class="fa fa-phone-square"></i> -->
                                        </div>
                                        <p> <span>Liên hệ</span>
                                            <br><?php echo get_field('header_phone1','customizer'); ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="appointmnt_wrapper hidden-xs">
                                <div class="appoint_btn">
                                    <ul>
                                        <li><a class="btn-popup" href="javascript:void(0);"><span class="hidden-xs hidden-sm"><i class="fa fa-calendar"></i>Đặt lịch </span>hẹn</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--top header end-->
             <!--header menu wrapper-->
              <?php $logo_mobile = get_field('logo_mobile','customizer'); ?>
        <div class="menu_wrapper header-area hidden-menu-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!--Start of menu-->
                        <?php //get_template_part('layout/navbar-menu-1'); ?>
                        <?php get_template_part('layout/navbar-menu-2'); ?>
                        <?php //echo do_shortcode('[multilevel_navigation_menu]'); ?>
                        <div class="rp_mobail_menu_main_wrapper visible-xs">
                            <div class="row">
                                <div class="col-xs-12 center">
                                    <div class="gc_logo logo_hidn">
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo_mobile['url']; ?>" class="img-responsive" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 hidden-xs"> 
                                    <!-- <div id="toggle"> -->
                                    <div id="toggle">
                                      
                                    </div>
                                </div>
                            </div>
                            <div id="sidebar">
                                <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo['url']; ?>" class="img-responsive" alt="logo"></span></a>
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
        <!--header wrapper end-->