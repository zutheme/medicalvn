<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="right_blog_category_wrapper right_blog_1">
        <h4 class="med_bottompadder10">Bài viết quan tâm</h4>
        <img src="<?php bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
        <div class="right_post_category_list_wrapper">
           <?php $team_query = new WP_Query( array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    //'orderby'   => 'meta_value',
                                    'order' => 'asc',
                                    //'category__in' => array('43'),
                                )); 

                            if ($team_query->have_posts()) {

                              while ($team_query->have_posts()) {

                                $team_query->the_post();  

                                $id = get_the_ID();

                                $link = get_post_meta( $id, 'link', true );

                                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail', false );

                                 ?> 
                                 <div class="gc_footer_ln_main_wrapper">
                                  <div class="gc_footer_ln_img_wrapper">
                                      <img src="<?php echo $thumbnail[0]?>" class="img-responsive" alt="ln_img">
                                  </div>
                                  <div class="gc_footer_ln_cont_wrapper">
                                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                      <!-- <p><?php //echo get_the_date( 'F j' ); ?> </p> -->
                                  </div>
                              </div>
                                 <?php } 
                            } ?>
        </div>
    </div>
</div>