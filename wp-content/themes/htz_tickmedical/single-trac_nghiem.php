<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package htz_thienkhue
 */

get_header();
?>
<?php $banner = get_field('banner_single','customizer');
      $banner_logo = get_field('banner_single_logo','customizer'); ?>
<!--med_tittle_section-->
<div class="med_tittle_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont"> 
                        <h1><?php the_title(); ?></h1>
                        <?php custom_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End -->
<!--blog category section start-->
<div class="blog_section med_toppadder100 med_bottompadder100">
    <div class="container">
        <div class="row">
            <div class="blog_category_main_wrapper">
                <div class="col-lg-12 col-md-12 content-page">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                					<?php
                  					while ( have_posts() ) :
                  						  the_post();
                  						  get_template_part( 'template-parts/content', get_post_type() );
                                ?>
                		            <div class="snip-coment">
                                  <div class="snip4 back-page">
                                    <div class="content-page">
                                    <?php 
                                      if ( comments_open() || get_comments_number() ) :
                                              comments_template();
                                          //comments_template( '/comments-default.php' );
                                          endif; ?>
                                    </div>
                                  </div>
                                </div>
                					<?php endwhile; // End of the loop.?>
                        </div>
                        <?php get_template_part( 'layout/post-relative' ); ?>
                    </div>
				        </div>
            	
        </div>
    </div>
    </div>
</div> 
<!--blog section end-->
<?php
get_template_part('layout/lucky');
get_footer();
