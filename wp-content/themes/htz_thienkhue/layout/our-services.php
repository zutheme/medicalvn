 <!--md_services wrapper start-->
 <?php $servicebg = get_field('service_background','customizer') ?>
   <!--  <div class="service_wrapper" style="background:url('<?php //echo $servicebg['url']; ?>') 50% 0 repeat-y;"> -->
<div class="service_wrapper">
        <!-- <div class="service_overlay"></div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="service_heading_wraper text-center med_bottompadder50">
                        <h2 class="med_bottompadder20"><?php echo get_field('service_header','customizer'); ?></h2>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                        <p><?php echo get_field('service_decs','customizer'); ?></p>
                    </div>
                </div>
                
                <!--service  wrapper start -->
                <div class="serv_title_main_wrapper">
                <?php 
                    //  $list_slider = array();
                    //  $team_query = new WP_Query( array(
                    // 'post_type' => 'services',
                    // 'posts_per_page' => 6,
                    // 'order' => 'desc',
                    // ));
                $team_query = new WP_Query( array(
                            'post_type' => 'post',
                            'posts_per_page' => 9,
                            'order' => 'desc',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' =>'dich-vu'
                                    )
                                )
                            ));   
                $count = 0;
                if ($team_query->have_posts()) {
                  while ($team_query->have_posts()) {
                    $team_query->the_post();  
                    $id = get_the_ID();
                    $link = get_post_meta( $id, 'opt-service-link', true );
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
                    //$fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                    $excerpt = get_the_excerpt();
                    //$title= get_the_title();
                    //$content = get_the_content();
                    //$the_content = apply_filters('the_content', get_the_content()); 
                    //$excerpt = get_the_excerpt_max(200);
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="pricing_box1_wrapper">
                            <div class="serv_img_wrapper">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt="img"></a>
                            </div>
                            <div class="box1_heading_wrapper">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="pricing_cont_wrapper">
                                <p class="render-title"><?php echo $excerpt; ?></p>
                                <!--<p><a href="<?php //the_permalink(); ?>">Tìm hiểu <i class="fa fa-long-arrow-right"></i></a></p> -->
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    }
                    ?>           
                </div>
                <!-- service wrapper End -->   
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="gc_filter_btn">
                        <ul>
                            <li><a href="#">LOAD MORE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
   
    <!--m_service wrapper end-->