 <!--Slider wrapper Start -->
    <div class="slider-area">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php 
                     $team_query = new WP_Query( array(
                    'post_type' => 'sliders',
                    'posts_per_page' => 3,
                    'order' => 'asc',
                )); 
                $count = 0;
                $active = '';
                if ($team_query->have_posts()) {
                  while ($team_query->have_posts()) {
                    $team_query->the_post();  
                    $id = get_the_ID();
                    //$link = get_post_meta( $id, 'opt-slider-field', true );
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );
                    $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                    //$excerpt = get_the_excerpt();
                    //$title= get_the_title();
                    //$content = get_the_content();
                    //$the_content = apply_filters('the_content', get_the_content()); 
                    $excerpt = get_the_excerpt_max(200);
                    if($count==0){
                        $active = 'active';
                        $count = 1;
                    }else{
                        $active = '';
                    }
                    ?>
                    <div class="item <?php echo $active; ?>">
                    <div class=" carousel-captions caption-2" style="background: url(<?php echo $fullpath[0]; ?>) 50% 0 repeat-y;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <!-- <div class="content">
                                        <h1 data-animation="animated bounceInLeft"><?php //echo get_post_meta( $id, 'slider-title-item-1', true ); ?></h1>
                                        <h2 data-animation="animated zoomIn"><?php //the_title(); ?></h2>
                                        <p data-animation="animated bounceInUp"><?php //echo $excerpt; ?></p>
                                        <div class="cc_slider_cont1">
                                            <ul>
                                                <li data-animation="animated flipInX"><a href="<?php //echo get_post_meta( $id, 'slider-link-item-1', true ); ?>">Đọc thêm</a>
                                                </li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                    <div class="content_tabs">
                                        <div class="row">
                                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hs_slider_right_tabs_wrapper" data-animation="animated bounceInLeft hs_slider_tab_one">
                                                    <div class="hs_slider_tabs_icon_cont_wrapper">
                                                        <h1><a href="<?php //echo get_post_meta( $id, 'slider-link-item-2', true ); ?>"><?php //echo get_post_meta( $id, 'slider-title-item-2', true ); ?></a></h1>
                                                        <p><?php //echo get_post_meta( $id, 'slider-excerpt-item-2', true ); ?></p>
                                                    </div>
                                                    <div class="hs_slider_tabs_icon_wrapper"> <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hs_slider_right_tabs_wrapper hs_slider_right_tabs_wrapper2" data-animation="animated bounceInRight hs_slider_tab_tow">
                                                    <div class="hs_slider_tabs_icon_cont_wrapper">
                                                        <h1><a href="<?php //echo get_post_meta( $id, 'slider-link-item-3', true ); ?>"><?php //echo get_post_meta( $id, 'slider-title-item-3', true ); ?></a></h1>
                                                        <p><?php //echo get_post_meta( $id, 'slider-excerpt-item-2', true ); ?></p>
                                                    </div>
                                                    <div class="hs_slider_tabs_icon_wrapper"> <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div> -->
                                           <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hs_slider_right_tabs_wrapper hs_slider_right_tabs_wrapper2" data-animation="animated bounceInLeft hs_slider_tab_three">
                                                    <div class="hs_slider_tabs_icon_cont_wrapper">
                                                       <h1><a href="<?php //echo get_post_meta( $id, 'slider-link-item-4', true ); ?>"><?php //echo get_post_meta( $id, 'slider-title-item-4', true ); ?></a></h1>
                                                        <p><?php //echo get_post_meta( $id, 'slider-excerpt-item-4', true ); ?></p>
                                                    </div>
                                                    <div class="hs_slider_tabs_icon_wrapper"> <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } 
                }
            ?>
                 
                
                <div class="carousel-nevigation">
                    <a class="prev pulse" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Slider wrapper End -->