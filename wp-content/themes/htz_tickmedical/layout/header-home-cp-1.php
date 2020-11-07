 <!--top header start-->
        <div class="md_header_wrapper">
            <div class="top_header_section hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="top_header_add">
                                <ul>
                                   <!--  <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Địa chỉ :</span> -số 7, trần quang diệu, p 14, q3, TP HCMC</li> -->
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> thammythienkhue@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="right_side_main_warpper">
                                <div class="md_right_side_warpper">
                                    <ul>
                                        <!-- <li>follow us :</li> -->
                                        <li><a href="https://www.youtube.com/channel/UCYL62gmqAL1kp2Q6WlW7cBA"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                            <li><a href="https://www.instagram.com/thienkhueclinic/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="https://twitter.com/thienkhueclinic"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="https://www.facebook.com/thammyvienthienkhue/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle_header_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="md_logo hidden-xs hidden-sm">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_attr( get_option('contact-logo') ); ?>" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="md_share_info_wrapper">
                                <ul>
                                    <li>
                                        <div class="lv_header_icon">
                                            <img src="<?php bloginfo('template_directory');?>/images/Icon_clock_1.png" alt="Icon" title="Icon">
                                        </div>
                                        <p><span>Thời gian làm việc</span>
                                            <br>thứ hai-chủ nhật 08:00-22:00</p>
                                    </li>
                                    <li>
                                        <div class="lv_header_icon">
                                            <img src="<?php bloginfo('template_directory');?>/images/icon_cll_1.png" alt="Icon" title="Icon">
                                        </div>
                                        <p> <span>Gọi chúng tôi</span>
                                            <br>1900 1768</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="appointmnt_wrapper hidden-xs">
                                <div class="appoint_btn">
                                    <ul>
                                        <li><a class="btn-consultant" href="javascript:void(0);"><span class="hidden-xs hidden-sm"><i class="fa fa-calendar"></i>Đặt lịch </span>hẹn</a>
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
        <div class="menu_wrapper header-area hidden-menu-bar stick">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <nav class="navbar hidden-xs">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
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
                                <?php //echo do_shortcode('[multilevel_navigation_menu]'); ?>
                                  <?php 
                                  wp_nav_menu( array(

                                  'theme_location'    => 'menu-1',

                                  'menu'              => 'menu-1',

                                  'depth'             => 3,

                                  'container'         => '',

                                  'container_class'   => '',

                                  'container_id'      => '',

                                  'menu_id'           => '',

                                  'menu_class'        => 'nav navbar-nav',

                                  'fallback_cb'       => 'wp_bootstrap_navwalker_desktop::fallback',

                                  'walker'            => new wp_bootstrap_navwalker_desktop(),
                                  'items_wrap' => '<ul id="nav_filter" class="%2$s">%3$s</ul>'

                              ) );
                          ?>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                        <div class="rp_mobail_menu_main_wrapper visible-xs">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="gc_logo logo_hidn">
                                        <img src="<?php bloginfo('template_directory');?>/images/logo-thienkhue-1.png" class="img-responsive" alt="logo">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div id="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewbox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                            <g>
                                                <g>
                                                    <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="white"></path>
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="white"></path>
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="white"></path>
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="white"></path>
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="white"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div id="sidebar">
                                <h1><a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory');?>/images/logo-thienkhue-1.png" class="img-responsive" alt="logo"></span></a></h1>
                                <div id="toggle_close">&times;</div>
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