<div class="fliter_main_wrapper portfolio-hidden-desktop">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper text-center med_bottompadder40">
                    <!-- <h1 class="med_bottompadder20"><?php //echo esc_attr( get_option('home-portfolio-header') ); ?></h1> -->
                    <h1 class="med_bottompadder20">TIN TỨC</h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                        <p><?php echo esc_attr( get_option('home-portfolio-caption') ); ?></p>
                    </div>
                </div>
                <div class="portfolio-area ptb-100">
                    <div class="container">
                        <div class="portfolio-filter clearfix text-center med_toppadder20">     
                             <?php 
                             wp_nav_menu( array(
                                'theme_location'    => 'menu-top-link',
                                'menu'    => 'menu-top-link',
                                'menu_id' => '',
                                //'submenu' => 'Tắm trắng Nano Cell White',
                                'container' => '',
                                //'items_wrap' => '%3$s',
                                'items_wrap' => '<ul id="filter2" class="%2$s">%3$s</ul>',
                                'depth'             => 1,
                                'container_class'   => '',
                                'container_id'      => '',
                                'menu_class'        => 'filter list-inline',
                                'fallback_cb'       => 'wp_bootstrap_navwalker_portfolio_item::fallback',
                                'walker'            => new wp_bootstrap_navwalker_portfolio_item(0),
                                //'echo' => FALSE,
                                //'fallback_cb' => '__return_false'
                            ) );
                        ?>
                        </div>
                        <div class="row three-column">
                            <div id="gridWrapper2" class="gridWrapper clearfix">
                                <?php
                                // foreach ($lst_slug as $key => $value) {
                                //     set_query_var( 'my_var', $value );
                                //     get_template_part('layout/loop-portfolio-menu'); 
                                // }  
                                ?>
                                 <?php 
                                     wp_nav_menu( array(
                                        'theme_location'    => 'menu-blog',
                                        'menu'    => 'menu-blog',
                                        'menu_id' => '',
                                        //'submenu' => 'Tắm trắng Nano Cell White',
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        //'items_wrap' => '<ul id="nav_filter" class="%2$s">%3$s</ul>'
                                        'depth'             => 2,
                                        'container_class'   => '',
                                        'container_id'      => '',
                                        'menu_class'        => '',
                                        'fallback_cb'       => 'WPDocs_Walker_portfolio::fallback',
                                        'walker'            => new WPDocs_Walker_portfolio(0),
                                        //'echo' => FALSE,
                                        //'fallback_cb' => '__return_false'
                                    ) );
                              
                                  $item_output = '                </ul>';
                                  $item_output .= '            </div>';
                                  $item_output .= '            <a href="#">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>';
                                  $item_output .= '        </div>';
                                  $item_output .= '    </div>';
                                  $item_output .= '</div>';
                                  $item_output .= '</div></div></div>';
                                  echo $item_output;
                            ?>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="gc_filter_btn">
                                    <ul>
                                        <li><a href="#">Xem thêm</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.container -->
                </div>
                <!--/.portfolio-area-->
            </div>
        </div>
    </div>
    <!--portfolio Wrapper End -->