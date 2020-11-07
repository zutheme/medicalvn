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
<div class="med_tittle_section">
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
                    <?php if ( is_active_sidebar( 'sidebar-single' ) ) : 
                        dynamic_sidebar( 'sidebar-single' ); 
                    endif; ?>
                   <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="contect_form_blog">
                            <input type="text" placeholder="Từ khóa"><a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="right_blog_category_wrapper">
                            <h4 class="med_bottompadder10">Chuyên mục</h4>
                            <img src="<?php //bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
                            <div class="right_blog_category_list_wrapper">
                                <ul>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">medico news (12)</a>
                                    </li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">medical update (09)</a>
                                    </li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">today news (112)</a>
                                    </li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">blog update (04)</a>
                                    </li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">Inspiration (15)</a>
                                    </li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="#">instagram news (45)</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="right_blog_category_wrapper right_blog_1">
                            <h4 class="med_bottompadder10">Bài viết mới nhất</h4>
                            <img src="<?php bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
                            <div class="right_post_category_list_wrapper">
                                <div class="gc_footer_ln_main_wrapper">
                                    <div class="gc_footer_ln_img_wrapper">
                                        <img src="<?php bloginfo('template_directory');?>/images/blog_post_1.jpg" class="img-responsive" alt="ln_img">
                                    </div>
                                    <div class="gc_footer_ln_cont_wrapper">
                                        <h4><a href="#">Lorem Ipsum. Proin the graida nibh vel.</a></h4>
                                        <p>28/oct/2018 </p>
                                    </div>
                                </div>
                                <div class="gc_footer_ln_main_wrapper2">
                                    <div class="gc_footer_ln_img_wrapper">
                                        <img src="<?php bloginfo('template_directory');?>/images/blog_post_1.jpg" class="img-responsive" alt="ln_img">
                                    </div>
                                    <div class="gc_footer_ln_cont_wrapper">
                                        <h4><a href="#">Lorem Ipsum. Proin the graida nibh vel.</a></h4>
                                        <p>28/oct/2018 </p>
                                    </div>
                                </div>
                                <div class="gc_footer_ln_main_wrapper2">
                                    <div class="gc_footer_ln_img_wrapper">
                                        <img src="<?php bloginfo('template_directory');?>/images/blog_post_1.jpg" class="img-responsive" alt="ln_img">
                                    </div>
                                    <div class="gc_footer_ln_cont_wrapper">
                                        <h4><a href="#">Lorem Ipsum. Proin the graida nibh vel.</a></h4>
                                        <p>28/oct/2018 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="right_blog_category_wrapper">
                            <h4 class="med_bottompadder10">Kết nối</h4>
                            <img src="<?php //bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
							</div>
                            <div class="gc_footer_insta_main_wrapper">
                                <div class="gc_footer_insta_wrapper">
                                    <div class="row">
                                       <ul>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_1.jpg" alt="img" class="img-responsive">
										</li>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_2.jpg" alt="img" class="img-responsive">
										</li>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_3.jpg" alt="img" class="img-responsive">
										</li>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_4.jpg" alt="img" class="img-responsive">
										</li>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_5.jpg" alt="img" class="img-responsive">
										</li>
										<li>
											<img src="<?php //bloginfo('template_directory');?>/images/footer_6.jpg" alt="img" class="img-responsive">
										</li>
									</ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="right_blog_category_wrapper">
                            <h4 class="med_bottompadder10">Thẻ khóa</h4>
                            <img src="<?php //bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
                            <div class="gc_blog_cloud_side_menu">
                                <ul>
                                    <li><a href="#">java srcipt</a>
                                    </li>
                                    <li><a href="#">Html</a>
                                    </li>
                                    <li><a href="#">dmax</a>
                                    </li>
                                    <li><a href="#">money</a>
                                    </li>
                                    <li><a href="#">theme</a>
                                    </li>
                                    <li><a href="#">insta</a>
                                    </li>
                                    <li><a href="#">jquery</a>
                                    </li>
                                    <li><a href="#">Money</a>
                                    </li>
                                    <li><a href="#">update</a>
                                    </li>

									</ul>
								</div>
							</div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div> 
<!--blog section end-->
<?php
get_footer();
