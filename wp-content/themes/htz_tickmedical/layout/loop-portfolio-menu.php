<?php 
$newValue = get_query_var('my_var');
$team_query = new WP_Query( array(
    'post_type' => 'portfolios',
    'posts_per_page' => 3,
    'order' => 'asc',
    'tax_query' => array(
        array(
            'taxonomy' => 'group_portfolio',
            'field' => 'slug',
            'terms' =>$newValue
        )
    )
)); 
//$count = 0;
if ($team_query->have_posts()) {
  while ($team_query->have_posts()) {
    $team_query->the_post();  
    $id = get_the_ID();
    $fullpath = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
    //$excerpt = get_the_excerpt_max(200);
    ?>
    <div class="col-xs-12 col-sm-4 col-md-3 portfolio-wrapper III_column" data-groups='["<?php echo  $newValue; ?>"]'>
        <div class="portfolio-thumb">
            <div class="gc_filter_cont_overlay_wrapper">
                <img src="<?php echo $fullpath[0]; ?>" class="zoom image img-responsive" alt="service_img">
                <div class="gc_filter_cont_overlay zoom_popup">
                    <div class="gc_filter_text"><a href="<?php echo $fullpath[0]; ?>"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
}
?>