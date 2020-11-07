   <?php $background = get_field('review_background','customizer'); ?>
   <!-- testimonial wrapper start-->
   <!--  <div class="testimonial_wrappper" style="background: url('<?php //echo $background['url']; ?>') 50% 0 repeat-y;"> -->
     <div class="testimonial_wrappper">
        <!-- <div class="testi_overlay"></div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="about_heading_wraper heading_white text-center med_bottompadder10">
                        <h3 class="head-testimonial med_bottompadder10"><?php echo get_field('review_header','customizer'); ?></h3>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder10">
                        <p class="ppp"><?php echo get_field('review_decs','customizer'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="testimonial_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                             <?php 
                             $team_query = new WP_Query( array(
                            'post_type' => 'testimonials',
                            'posts_per_page' => 6,
                            'order' => 'asc',
                        )); 
                        $count = 0;
                        if ($team_query->have_posts()) {
                          while ($team_query->have_posts()) {
                            $team_query->the_post();  
                            $id = get_the_ID();
                            $position = get_post_meta( $id, 'testimonial-position', true );
                            //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );
                            $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );      
                            $excerpt = get_the_excerpt_max(200); ?>
                            <div class="item">
                                <div class="test_main">
                                    <div class="rotate"><img src="<?php echo $fullpath[0]; ?>" alt="img">
                                    </div>
                                    <img src="<?php bloginfo('template_directory');?>/images/quote.png" alt="img">

                                    <p class="text-center">“ <?php echo $excerpt; ?> ”</p>
                                    <a href="#"><?php the_title(); ?></a>
                                    <!-- <h5 class="text-center">(<?php //echo $position; ?>)</h5> -->
                                </div>
                            </div>
                          <?php }
                            }
                          ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial wrapper start-->