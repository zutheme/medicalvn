<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package htz_thienkhue
 */

?>
<?php
$id_post = get_the_ID();
  $media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
  //$media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
  $excerpt = get_the_excerpt_max(200);
  if($thumbnail){
     $_thumbnail = $thumbnail[0];
  }else{
    $_thumbnail = get_template_directory().'/images/posts/post-10.jpg';
  }
if ( is_singular() ) :
	//the_title( '<h1 class="entry-title">', '</h1>' );
	the_content();
else : ?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="blog_about">
      <div class="blog_img blog_post_img">
        <figure>
          <img src="<?php echo $media[0]; ?>" alt="" class="img-responsive">
        </figure>
      </div>
            <div class="blog_txt">
                <h1><a class="renderer" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               <!--  <div class="blog_txt_info">
                    <ul>
                        <li>BY ADMIN</li>
                        <li>SEPT.29,2016</li>
                    </ul>
                </div> -->
                <p><?php echo $excerpt; ?></p>
                <a href="<?php the_permalink(); ?>">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
            </div>
    </div>
  </div>
<?php endif; ?>