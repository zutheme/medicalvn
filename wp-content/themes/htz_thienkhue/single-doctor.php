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
<!--med_tittle_section-->
<div class="med_tittle_section" style="background: url(<?php echo esc_attr( get_option('single-banner-background') ); ?>) 50% 0 repeat-y;">
    <div class="med_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                        <h1><?php the_title(); ?></h1>
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
                    <div class="row">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						// If comments are open or we have at least one comment, load up the comment template.
						//if ( comments_open() || get_comments_number() ) :
							//comments_template();
						//endif;
					endwhile; // End of the loop.
					?>
					</div>
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
                    <?php if ( is_active_sidebar( 'sidebar-single' ) ) : 
                        dynamic_sidebar( 'sidebar-single' ); 
                    endif; ?>
                   
                </div>
            </div>
        </div>
    </div>
</div> 
<!--blog section end-->
<?php
get_footer();
