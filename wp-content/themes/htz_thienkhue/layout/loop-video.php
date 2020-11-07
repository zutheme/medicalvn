<?php 
$slug_video = get_query_var('slug_video');
$team_query = new WP_Query( array(
    'post_type' => 'videos',
    'posts_per_page' => 4,
    'order' => 'asc',
    'tax_query' => array(
        array(
            'taxonomy' => 'group_video',
            'field' => 'slug',
            'terms' =>$slug_video 
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
    $idyoutbe = get_post_meta( $id, 'opt-video-id', true);
    $thumbnail = 'https://img.youtube.com/vi/'.$idyoutbe.'/0.jpg';  
    ?>
    <script type="text/javascript">
        playlist3.push('<?php echo $idyoutbe; ?>');
    </script>
    <div class="col-xs-6 col-sm-6 col-md-3 portfolio-wrapper III_column" data-groups='["all", "<?php echo  $slug_video; ?>"]'>
        <div class="portfolio-thumb">
            <div class="gc_filter_cont_overlay_wrapper">
                <img src="<?php echo $fullpath[0]; ?>" class="zoom image img-responsive" alt="service_img">
                <div class="gc_filter_cont_overlay-ext zoom_popup-video">
                    <input class="index" type="hidden" name="type-slug" value="<?php echo $thumbnail; ?>">
                    <input class="idvideo" type="hidden" name="idvideo" value="<?php echo isset($idyoutbe) ? $idyoutbe : 0; ?>">
                    <div class="gc_filter_text"><a href="javascript:void(0);"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
        $index++;
    }
}
?>