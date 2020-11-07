  <!--team wrapper start-->
    <div class="team_wrapper med_toppadder40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder40">
                        <h1 class="med_bottompadder20"><?php echo get_field('doctor_header','customizer'); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                        <p><?php echo get_field('doctor_decs','customizer'); ?></p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="team_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                        <?php 
                            $team_query = new WP_Query( array(
                            'post_type' => 'doctors',
                            'posts_per_page' => 2,
                            'order' => 'asc',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'group_doctor',
                                    'field' => 'slug',
                                    'terms' =>'bac-si'
                                    )
                                )
                            ));  
                            
                        $count = 0;
                        if ($team_query->have_posts()) {
                          while ($team_query->have_posts()) {
                            $team_query->the_post();  
                            $id = get_the_ID();
                            $position = get_post_meta( $id, 'opt-doctor-position', true );
                            //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );
                            $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );      
                            $excerpt = get_the_excerpt_max(200);
                            if($count%2==0 && $count == 0){ ?>
                                <div class="item">
                                    <div class="row">
                            <?php }elseif ($count%2 == 0) { ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                            <?php } ?>
                           
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="team_about">
                                            <div class="team_img">
                                                <img src="<?php echo $fullpath[0]; ?>" alt="img" class="img-responsive">
                                            </div>
                                            <div class="team_txt">
                                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                            </div>
                                         
                                        </div>
                                    </div>
     
                          <?php 
                            $count++;
                            }
                        } ?>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--team wrapper end-->