 <!--event wrapper start-->
 <script>var playlist5 = [];</script>
<div id="container-video5" class="event_wrapper med_toppadder50 med_bottompadder70 container-video5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="choose_heading_wrapper">
                    <h3 class="med_bottompadder20"><?php echo get_field('slider_video_header','customizer'); ?></h3>
                    <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="title" class="med_bottompadder60">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="video-player-5" class="video-player-5">
                    <div id="player5"></div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="video_slider_wrapper event_response_wrapper">
                        <div class="owl-carousel owl-theme">
                             <?php 
                             $args = array(
                                    'post_type' => 'videos',
                                    'posts_per_page' => 8,
                                    'order' => 'desc',
                                    // 'tax_query' => array(
                                    //     array(          
                                    //         'taxonomy' => 'category',
                                    //         'field' => 'slug',
                                    //         'terms' => 'uu-dai'
                                    //     )
                                    //  )
                                );
                             $team_query = new WP_Query($args);  
                            $count = 0;
                            if ($team_query->have_posts()) {
                              while ($team_query->have_posts()) {
                                $team_query->the_post();  
                                $id = get_the_ID();
                               $idyoutbe = get_post_meta( $id, 'opt-video-id', true);
                                //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );
                                $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                                //$the_content = get_the_excerpt_max(100);
                                //$the_content = apply_filters('the_content', get_the_content()); ?>
                                <div class="item <?php echo $count; ?>">
                                    <div class="img_section">
                                        <div class="icon_wrapper_event">
                                            <a class="play" attributeid="<?php echo $idyoutbe; ?>" href="javascript:void(0);"><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="<?php echo $fullpath[0]; ?>" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <a class="render-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <script>playlist5.push('<?php echo $idyoutbe; ?>');</script>
                                    </div>
                                 </div> 
                             <?php
                            }
                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>