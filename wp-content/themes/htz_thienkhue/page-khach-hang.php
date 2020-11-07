<?php
/**
 *  Template Name: khach hang
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
            'posts_per_page' => 10,
            'order' => 'desc',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' =>'khach-hang'
                    )
                )
            ));   
$count = 0;
$args = array();
if ($team_query->have_posts()) {
  while ($team_query->have_posts()) {
	    $team_query->the_post();  
	    $id = get_the_ID();
	    //$link = get_post_meta( $id, 'opt-service-link', true );
	    $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
	    //$excerpt = get_the_excerpt();
	    $title = get_the_title();
	    //$the_content = apply_filters('the_content', get_the_content());
	    $src = $fullpath[0];
	    $excerpt = get_the_excerpt_max(200);
	    $permalink = get_permalink($id);
	   	$item = array('title'=>$title, 'permalink'=>$permalink, 'excerpt'=>$excerpt, 'src'=>$src );
	   	$args[] = $item;
		//get_template_part('customer/latest2',$args);
		if($count < 4){
			include( locate_template('customer/latest2.php', false, false ) );
		}elseif($count < 8){
			include( locate_template('customer/latest4.php', false, false ) );
		}elseif ($count < 10) {
			include( locate_template('customer/latest5.php', false, false ) );
		}
		$count++;
	}
}
	//get_template_part('customer/latest3');
	//get_template_part('customer/latest4');
	//get_template_part('customer/latest5');
get_footer();
?>

