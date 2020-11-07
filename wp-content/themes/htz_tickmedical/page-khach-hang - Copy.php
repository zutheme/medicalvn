<?php
/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eleaning
 */
get_header(); 
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
                <img src="<?php echo $thumbnail[0]; ?>" alt="img">
            </div>
            <div class="box1_heading_wrapper">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <div class="pricing_cont_wrapper">
                 <p class="render-title"><?php echo $excerpt; ?></p>
                
                <h5><a href="<?php the_permalink(); ?>">Tìm hiểu <i class="fa fa-long-arrow-right"></i></a></h5>
            </div>
        </div>
    </div>
    <?php 
        }
    }
    ?>           
</div>
<!-- service wrapper End -->   
get_template_part('customer/latest2',$args);
//get_template_part('customer/latest3');
//get_template_part('customer/latest4');
//get_template_part('customer/latest5');
get_footer();
?>

