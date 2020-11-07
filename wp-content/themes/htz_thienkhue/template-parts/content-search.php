<?php
/**
 * Template part for displaying results in search pages
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
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="blog_about">
      <div class="blog_img blog_post_img">
        <figure>
          <img src="<?php echo $media[0]; ?>" alt="<?php the_title(); ?>" class="img-responsive">
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
                <p><?php the_Excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
            </div>
    </div>
  </div>
