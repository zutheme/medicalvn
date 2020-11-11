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
<?php $banner = get_field('banner_single','customizer'); ?>
<!--med_tittle_section-->
<div class="med_tittle_section">
    <!-- <div class="med_img_overlay"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                       <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                        <?php custom_breadcrumbs(); ?>
                        <!-- <ol class="breadcrumb">
                            <li><a href="index-1.html">Trang chủ</a>
                            </li>
                            <li>trị nám - tàn nhang</li>
                        </ol> -->
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
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 content-page">
                    
					<?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
					if ( have_posts() ) : ?>
                    <div class="row">
					<?php /* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; ?>
                        </div>
                       <?php  if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
                        <div class="row">
                            <div class="page-number">
                               <div class="page navigation">
                                    <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
                               </div>
                            </div>
                        </div>   
                    <?php endif;
						//the_posts_navigation();

					else : ?>
                        <div class="row">
						      <?php get_template_part( 'template-parts/content', 'none' ); ?>
                        </div>
					<?php endif;
					?>
					
				</div>
            	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="contect_form_blog">
                            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Từ khóa"/>
                            <button type="submit"> <i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <?php //if ( is_active_sidebar( 'sidebar-single' ) ) : 
                        //dynamic_sidebar( 'sidebar-single' ); 
                    //endif; ?>
                   <?php get_template_part( 'layout/cate-dieutri' ); ?>
                   <?php //get_template_part( 'layout/latest-blog'); ?>
                   <?php get_template_part( 'layout/connect-facebook'); ?>
                   <?php get_template_part( 'layout/care-blog'); ?>
                   <?php get_template_part( 'layout/tags'); ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div> 
<!--blog section end-->
<?php
get_footer();

