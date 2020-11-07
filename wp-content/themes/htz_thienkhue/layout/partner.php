
    <!--partner wrapper start-->
    <div class="partner_wrapper med_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partner_slider_img">
                        <div class="owl-carousel owl-theme">
                         <?php 
                             $team_query = new WP_Query( array(
                            'post_type' => 'partners',
                            'posts_per_page' => 6,
                            'order' => 'asc',
                        )); 
                        $count = 0;
                        if ($team_query->have_posts()) {
                          while ($team_query->have_posts()) {
                            $team_query->the_post();  
                            $id = get_the_ID();
                            $position = get_post_meta( $id, 'opt-doctor-position', true );
                            //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );
                            $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );      
                            $excerpt = get_the_excerpt_max(200); ?>
                            <div class="item">
                                <img src="<?php echo  $fullpath[0]; ?>" class="img-responsive" alt="">
                            </div>
                               <?php } 
                           } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--partner wrapper end-->