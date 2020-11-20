 <!--top header start-->
<div class="md_header_wrapper">
    <div class="top_header_section hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="top_header_add">
                        <p><?php echo get_field('header_top','customizer'); ?></p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="right_side_main_warpper">
                        <div class="md_right_side_warpper">
                            <ul>
                               <li><a href="<?php echo get_field('idfacebook','customizer'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_field('idyoutube','customizer'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_field('intagram','customizer'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_field('twiter','customizer'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
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
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="md_logo hidden-xs hidden-sm">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="logo-head" src="<?php echo $logo['url']; ?>" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 hidden-xs">
                    <div class="md_share_info_wrapper">
                        <ul>
                            <li>
                                <div class="lv_header_icon">
                                    <a class="btn-popup" href="javascript:void(0);"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                </div>
                                <p><span>Đăng ký khám ngay</span>
                                    <br>Cùng chuyên gia</p>
                            </li>
                            <li>
                                <div class="lv_header_icon">
                                    <?php $string = get_field('header_phone1','customizer'); ?>
                                    <?php $phone = preg_replace('/[^0-9\-]/', '', $string); ?>
                                    <a href="tel:<?php echo $phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                </div>
                                <p> <span>Hotline</span>
                                    <br><?php echo get_field('header_phone1','customizer'); ?></p>
                            </li>
                            <li>
                                <div class="lv_header_icon">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <p><span>Email</span>
                                    <br>tickmedical@gmail.com</p>
                            </li>
                            
                        </ul>
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
                <?php //get_template_part('layout/navbar-menu-1'); ?>
                <?php get_template_part('layout/navbar-menu-2'); ?>
                <?php //echo do_shortcode('[multilevel_navigation_menu]'); ?>
                <div class="rp_mobail_menu_main_wrapper visible-xs">
                    <div class="row">
                        <div class="col-xs-12 center">
                            <div class="gc_logo logo_hidn">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo_mobile['url']; ?>" class="home-logo" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xs-6 hidden-xs"> 
                            <!-- <div id="toggle"> -->
                            <div id="toggle">
                              
                            </div>
                        </div>
                    </div>
                    <div id="sidebar">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo['url']; ?>" class="home-logo" alt="logo"></span></a>
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

                              ) ); ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>