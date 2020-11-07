<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package htz_thienkhue
 */

?>
  <!-- footer wrapper start-->
    <div class="footer_wrapper">
        <div class="container">
            <div class="box_1_wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="address_main">
                            <div class="footer_widget_add">
                                <a href=""><img src="<?php bloginfo('template_directory');?>/images/footer_logo-2.png" class="img-responsive" alt="footer_logo"></a>
                                <div class="slogan"><p>Phải đặt được lợi ích của khách hàng lên ngang với lợi ích của chúng ta, khi đó chúng ta mới bắt đầu phát triển .</p></div>
                            </div>
                            <div class="footer_box_add">
                                 <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span></span>7, Trần Quang Diệu, P.14,Quận 3, TpHCM</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><span></span>(028) 3931 8831</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span></span> thammythienkhue@gmail.com</a></li>
                                    <li><span style="padding-left: 0px;"><a target="_blank" href="https://www.google.com/maps/place/83+%C4%90%C6%B0%E1%BB%9Dng+30%2F4,+Ph%C3%BA+Th%E1%BB%8D,+TX.+Th%E1%BB%A7+D%E1%BA%A7u+M%E1%BB%99t,+B%C3%ACnh+D%C6%B0%C6%A1ng/@10.9768809,106.6698763,17z/data=!3m1!4b1!4m5!3m4!1s0x3174d1263c5a3ea3:0xfbf07aee5dcc45d0!8m2!3d10.9768809!4d106.672065">
          <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer_1-->
            <div class="booking_box_div">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_main_wrapper">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallary_response hidden-sm">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Kết nối</h1>
                                    <img src="<?php bloginfo('template_directory');?>/images/line.png" class="img-responsive" alt="img">
                                </div>
                                <div class="footer_gallary">
                                    <div class="row">
                                        <div class="fb-page" data-href="https://www.facebook.com/thammyvienthienkhue/" data-width="390" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thammyvienthienkhue/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thammyvienthienkhue/">Hệ Thống Thẩm Mỹ Quốc Tế Thiên Khuê</a></blockquote></div>
                                        <!-- <ul>
                                            <li><img src="<?php //bloginfo('template_directory');?>/images/footer_1.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="<?php //bloginfo('template_directory');?>/images/footer_2.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="<?php //bloginfo('template_directory');?>/images/footer_3.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="<?php //bloginfo('template_directory');?>/images/footer_4.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="<?php //bloginfo('template_directory');?>/images/footer_5.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="<?php //bloginfo('template_directory');?>/images/footer_6.jpg" alt="img" class="img-responsive"> </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                            <!--footer_2-->
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 respons_footer_nav hidden-xs">
                                <div class="footer_heading footer_menu">
                                    <h1 class="med_bottompadder10">Chuyên mục</h1>
                                    <img src="<?php bloginfo('template_directory');?>/images/line.png" class="img-responsive" alt="img">
                                </div>
                                <div class="footer_ul_wrapper">
                                     <?php 
                                      wp_nav_menu( array(

                                      'theme_location'    => 'menu-3',

                                      'menu'              => "menu-3",

                                      'depth'             => 1,

                                      'container'         => '',

                                      'container_class'   => '',

                                      'container_id'      => '',

                                      'menu_id'           => '',

                                      'menu_class'        => '',

                                      'fallback_cb'       => 'wp_bootstrap_navwalker_footer::fallback',
                                      'walker'            => new wp_bootstrap_navwalker_footer(),
                                      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'

                                  ) );
                              ?>
                                </div>
                            </div>
                            <!--footer_3-->
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 contact_last_div">
                               <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Chi nhánh</h1>
                                    <img src="<?php bloginfo('template_directory');?>/images/line.png" class="img-responsive" alt="img">
                                </div>
                                <div class="footer_cnct">
                                    <p>Số 83, Đường 30/4, P.Phú Hòa, Tp.Thủ Dầu Một</p>
                                    <p><span>(027) 4623 0088</span><span style="padding-left: 0px;"><a target="_blank" href="https://www.google.com/maps/place/83+%C4%90%C6%B0%E1%BB%9Dng+30%2F4,+Ph%C3%BA+Th%E1%BB%8D,+TX.+Th%E1%BB%A7+D%E1%BA%A7u+M%E1%BB%99t,+B%C3%ACnh+D%C6%B0%C6%A1ng/@10.9768809,106.6698763,17z/data=!3m1!4b1!4m5!3m4!1s0x3174d1263c5a3ea3:0xfbf07aee5dcc45d0!8m2!3d10.9768809!4d106.672065">
          <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></span></p>
                                    <p>D2-D3/253 Phạm Văn Thuận, P.Tân Mai, Tp.Biên Hòa</p>
                                    <p><span>(025) 1656 9638</span><span style="padding-left: 0px;"><a target="_blank" href="https://www.google.com/maps/place/Hệ+Thống+Thẩm+QuốcMỹ++Tế+Thiên+Khuê/@10.9571942,106.8450012,15z/data=!4m5!3m4!1s0x0:0x23190ea75167f1!8m2!3d10.9571942!4d106.8450012">
          <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></span></p>
                                </div>
                            </div>
                            <!--footer_4-->
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_botm_wrapper">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="bottom_footer_copy_wrapper">
                                    <span>Copyright © 2020- Thẩm mỹ viện quốc tế Thiên Khuê</span>
                                </div>
                                <div class="footer_btm_icon">
                                    <ul>
                                        <li><a href="https://www.youtube.com/channel/UCYL62gmqAL1kp2Q6WlW7cBA"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.instagram.com/thienkhueclinic/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="https://twitter.com/thienkhueclinic"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.facebook.com/thammyvienthienkhue/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer_5-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="up_wrapper">
                <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--footer wrapper end-->
 <!--footer wrapper end-->
    <!--main js files-->
    <script src="<?php bloginfo('template_directory');?>/js/jquery_min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.shuffle.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.inview.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.countTo.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/wow.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/owl.carousel.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.magnific-popup.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/custom_2.js?v=0.0.5"></script>
    <!--js code-->

   <!--  <script src="<?php //bloginfo('template_directory');?>/js/custom.js"></script> -->
    <script>
        function colorize() {
            var hue = Math.random() * 360;
            return "HSL(" + hue + ",100%,50%)";
        }
    </script>
   
    <!-- map Script-->

<?php wp_footer(); ?>

</body>
</html>
