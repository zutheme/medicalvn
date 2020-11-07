<!-- blog wrapper start-->
<div class="blog_wrapper med_toppadder0 med_bottompadder30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                    <h2 class="med_bottompadder20"><?php echo get_field('blog_header_hoidap','customizer'); ?></h2>
                    <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                    <p><?php echo get_field('blog_decs_hoidap','customizer'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                $order = 0;
                $class="";
                $team_query = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'order' => 'desc',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' =>'hoi-dap'
                        )
                    )
                ));  
                //$args = array(
                    //'post_type' => 'post',
                    //'posts_per_page' => 3,
                    //'orderby'   => 'meta_value',
                    //'order' => 'asc',
                    //'category__in' => array('43'),
                //);
                //$team_query = new WP_Query($args);  

                if ($team_query->have_posts()) {

                  while ($team_query->have_posts()) {

                    $team_query->the_post();  

                    $id = get_the_ID();

                    $link = get_post_meta( $id, 'link', true );
                    $excerpt = get_the_excerpt_max(200);
                    //$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                    if($order > 2){
                        $class="thumb-desktop-hidden";
                    }
                    
                     ?> 
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 depth-0 <?php echo $class; ?>">    
                        <div class="blog_about">
                            <div class="blog_img">
                                <figure><img src="<?php echo $thumbnail[0]?>" alt="img" class="img-responsive">
                                </figure>
                            </div>
                            <div class="blog_txt">
                                <a class="render-news" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                                <p class="render"><?php echo $excerpt; ?></p>       
                               <!--  <a class="read-more" href="<?php //the_permalink(); ?>">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>  -->
                            </div>
                        </div>
                    </div>
                     <?php
                     $order++;
                      } 
                } ?>
            
        </div>
    </div>
</div>