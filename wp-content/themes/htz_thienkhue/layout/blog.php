<!-- blog wrapper start-->
    <div class="blog_wrapper med_toppadder100 med_bottompadder90 blog-hidden-mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                        <h1 class="med_bottompadder20"><?php echo get_field('blog_header','customizer'); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                        <p><?php echo get_field('blog_decs','customizer'); ?></p>
                    </div>
                </div>
                
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
                                'fallback_cb'       => 'WPDocs_Walker_SubMenu::fallback',
                                'walker'            => new WPDocs_Walker_SubMenu(0),
                                //'echo' => FALSE,
                                //'fallback_cb' => '__return_false'
                            ) );
                      
                          $item_output = '                </ul>';
                          $item_output .= '            </div>';
                          $item_output .= '            <a href="#">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>';
                          $item_output .= '        </div>';
                          $item_output .= '    </div>';
                          $item_output .= '</div>';
                          echo $item_output;
                    ?>
                </div>
            </div>
        </div>

    <!-- blog wrapper end-->
