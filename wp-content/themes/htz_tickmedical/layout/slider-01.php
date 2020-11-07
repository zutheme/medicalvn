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
                                    <div class="content">
                                        <h1 data-animation="animated bounceInLeft"><?php echo get_post_meta( $id, 'slider-title-item-1', true ); ?></h1>
                                        <h2 data-animation="animated zoomIn"><?php the_title(); ?></h2>
                                        <p data-animation="animated bounceInUp"><?php echo $excerpt; ?></p>
                                        <div class="cc_slider_cont1">
                                            <ul>
                                                <li data-animation="animated flipInX"><a href="<?php echo get_post_meta( $id, 'slider-link-item-1', true ); ?>">Đọc thêm</a>
                                                </li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                    <div class="content_tabs">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hs_slider_right_tabs_wrapper" data-animation="animated bounceInLeft hs_slider_tab_one">
                                                    <div class="hs_slider_tabs_icon_cont_wrapper">
                                                        <h1><a href="<?php echo get_post_meta( $id, 'slider-link-item-2', true ); ?>"><?php echo get_post_meta( $id, 'slider-title-item-2', true ); ?></a></h1>
                                                        <p><?php echo get_post_meta( $id, 'slider-excerpt-item-2', true ); ?></p>
                                                    </div>
                                                    <div class="hs_slider_tabs_icon_wrapper"> <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="hs_slider_right_tabs_wrapper hs_slider_right_tabs_wrapper2" data-animation="animated bounceInRight hs_slider_tab_tow">
                                                    <div class="hs_slider_tabs_icon_cont_wrapper">
                                                        <h1><a href="<?php echo get_post_meta( $id, 'slider-link-item-3', true ); ?>"><?php echo get_post_meta( $id, 'slider-title-item-3', true ); ?></a></h1>
                                                        <p><?php echo get_post_meta( $id, 'slider-excerpt-item-2', true ); ?></p>
                                                    </div>
                                                    <div class="hs_slider_tabs_icon_wrapper"> <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div>
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_3" x="0px" y="0px" viewbox="0 0 612.077 612.077" style="enable-background:new 0 0 612.077 612.077;" xml:space="preserve" width="40px" height="40px">
                            <g>
                                <path d="M306.037,0.001C136.997,0.001,0,136.999,0,306.039s137.813,306.037,306.037,306.037s306.037-136.997,306.037-306.037   C612.816,136.999,475.077,0.001,306.037,0.001z M306.037,582.332c-152.203,0-276.368-124.165-276.368-276.368   S153.834,29.596,306.037,29.596s276.368,124.165,276.368,276.368S459.056,582.332,306.037,582.332z M462.245,305.964   c0,8.011-6.379,14.39-14.39,14.39H213.099l83.296,83.296c5.637,5.637,5.637,15.205,0,20.843c-3.189,3.189-6.379,4.005-10.384,4.005   c-4.005,0-7.195-1.632-10.384-4.005l-108.96-108.07c-0.816-0.816-1.632-1.632-1.632-2.374l-0.816-0.816   c0-0.816-0.816-0.816-0.816-1.632c0-0.816,0-0.816-0.816-1.632c0-0.816,0-0.816,0-1.632c0-1.632,0-4.005,0-5.637   c0-0.816,0-0.816,0-1.632s0-0.816,0.816-1.632c0-0.816,0.816-0.816,0.816-1.632c0,0,0-0.816,0.816-0.816   c0.816-0.816,0.816-1.632,1.632-2.374L276.442,184.84c5.637-5.637,15.205-5.637,20.843,0c5.637,5.637,5.637,15.205,0,20.843   l-84.186,85.076h234.683C455.792,290.759,462.245,297.954,462.245,305.964z" fill="#FFFFFF"></path>
                            </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>
                    </a>
                    <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewbox="0 0 612.816 612.816" style="enable-background:new 0 0 612.816 612.816;" xml:space="preserve" width="40px" height="40px">
                            <g>
                                <path d="M306.408,0C137.368,0,0.371,136.997,0.371,306.037s136.997,306.779,306.037,306.779s306.037-136.997,306.037-306.037   S475.448,0,306.408,0z M306.408,583.147c-152.203,0-276.368-124.165-276.368-276.368S154.205,29.595,306.408,29.595   S582.776,153.76,582.776,305.963S458.611,583.147,306.408,583.147z M448.968,313.158c0,0,0,0.816-0.816,0.816   c-0.816,0.816-0.816,1.632-1.632,2.374L336.003,426.865c-3.189,3.189-6.379,4.005-10.384,4.005c-4.005,0-7.195-1.632-10.384-4.005   c-5.637-5.637-5.637-15.205,0-20.843l84.928-84.928H165.405c-8.011,0-14.39-6.379-14.39-14.39c0-8.011,6.379-14.39,14.39-14.39   h234.683l-84.038-84.038c-5.637-5.637-5.637-15.205,0-20.843c5.637-5.637,15.205-5.637,20.843,0l108.886,108.96   c0.816,0.816,1.632,1.632,1.632,2.374l0.816,0.816c0,0.816,0.816,0.816,0.816,1.632c0,0.816,0,0.816,0.816,1.632   c0,0.816,0,0.816,0,1.632c0,1.632,0,4.005,0,5.637c0,0.816,0,0.816,0,1.632C449.784,312.416,449.784,312.416,448.968,313.158   C448.968,312.416,448.968,313.158,448.968,313.158z" fill="#FFFFFF"></path>
                            </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Slider wrapper End -->