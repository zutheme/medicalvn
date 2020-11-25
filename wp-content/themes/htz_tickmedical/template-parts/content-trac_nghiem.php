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
  //$excerpt = get_the_excerpt_max(1200);
  $excerpt = get_the_content($id_post);
  if($thumbnail){
     $_thumbnail = $thumbnail[0];
  }else{
    $_thumbnail = get_template_directory().'/images/posts/post-10.jpg';
  }
if ( is_singular() ) :
	//the_title( '<h1 class="entry-title">', '</h1>' );
	//the_content(); ?>
  <script>var list_question = [];</script>
    <?php 
        $args = array(
            'post_type' => 'trac_nghiem',
            'posts_per_page'  => -1,
            'post_status'  => 'private',
            'post_parent__in' => array($id_post),  
            'order' => 'asc',
            //'post_parent' => $idparent
        );
        $team_query = new WP_Query($args); 
        if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            $team_query->the_post();  
            $id = get_the_ID();
                echo '<script>list_question.push('.$id.');</script>';
            } 

        }else{
            echo "Not found";
        } ?>

    <div id="quiz-test-show" class="quiz-test-show">
        <div class="tip-title">
           <span class="question-title"></span>
           <p class="note" style="display: none;">(Bạn có thể chọn nhiều đáp án)</p>
        </div>
        <div class="tip-content"><p class="question-content"></p></div>
        <div class="result">
            <p class="head"></p>
            <p class="content"></p>
            <ul class="link-explore">
                <!-- <li><a href="#" class="link-icon btn-readmore">Tìm hiểu</a></li> -->
            </ul>
        </div>
        <ul class="list-question">
        </ul>
        <div class="desc-begin">
                <input class="idtopic" type="hidden" name="idtopic" value="<?php echo $id_post; ?>">
                <h3 class="topic"><?php echo get_the_title($id_post); ?></h3>
                <p><?php echo $excerpt; ?></p>
        </div>
        <div class="btn-area">
            <ul class="control">
              <li class="prev"><button class="btn-prev">Lùi lại</button></li>
              <li class="next"><button class="btn-next">Kế tiếp</button></li>
            </ul>           
            <button class="btn-start">Bắt đầu</button>
        </div>
    </div>
<?php else : ?>
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