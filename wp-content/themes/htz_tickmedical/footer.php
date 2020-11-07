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
    <div class="footer_wrapper custom">
        <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="address_main">
                        <div class="footer_widget_add">
                           <?php $logo = get_field('footer_logo','customizer'); ?>
                            <div class="f-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo['url']; ?>" class="img-responsive" alt="footer_logo"></a>
                            </div>
                            <div class="slogan"><?php echo get_field('footer_desc','customizer'); ?></div>
                        </div>
	                      <div class="footer_btm_icon">
	                        <ul>
	                            <li><a href="<?php echo get_field('idyoutube','customizer'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
	                            <li><a href="<?php echo get_field('intagram','customizer'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	                            <li><a href="<?php echo get_field('twiter','customizer'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                            <li><a href="<?php echo get_field('idfacebook','customizer'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                        </ul>
                    	</div>

                    	 <div class="contact">
                        	<a href="tel:19001768"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo get_field('header_phone1','customizer'); ?></a>&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 24/7</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 contact_last_div">
                   <div class="footer_heading">
                        <h6 class="med_bottompadder10">Chi nhánh</h6>
                        <img src="<?php bloginfo('template_directory');?>/images/line.png" class="img-responsive" alt="img">
                    </div>
                    <div class="footer_cnct">
                        <?php echo get_field('footer_chinhanh','customizer'); ?>
                        
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 respons_footer_nav hidden-xs">
                    <div class="footer_heading footer_menu">
                        <h6 class="med_bottompadder10">Chuyên mục</h6>
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
                       
            </div>
            <?php $logo_bcthuong = get_field('footer_bocongthuong_logo','customizer'); ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="line-giayphep"></div>
              </div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 certify">
            		<div class="footer_botm_certify">
                  <?php echo get_field('footer_giayphep','customizer'); ?>
            		</div>
            	</div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 certify">
                <div class="footer_botm_certify">
                  <a href="<?php echo get_field('footer_bocongthuong_link','customizer'); ?>"><img src="<?php echo $logo_bcthuong['url']; ?>"></a>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_botm_wrapper">
                        <div class="bottom_footer_copy_wrapper">
                            <span class="btn-popup-api">Copyright © 2020- TICKMEDICAL.VN</span>
                        </div>
                    </div>
                </div>
                <!--footer_5-->
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
    <!-- <script src="<?php //bloginfo('template_directory');?>/js/jquery.inview.min.js"></script> -->
   <script src="<?php bloginfo('template_directory');?>/js/jquery.countTo.js"></script>
   <script src="<?php bloginfo('template_directory');?>/js/wow.min.js"></script> 
    <script src="<?php bloginfo('template_directory');?>/js/owl.carousel.js"></script>
   <script src="<?php bloginfo('template_directory');?>/js/jquery.magnific-popup.js?v=0.1.1"></script> 
   <script src="<?php bloginfo('template_directory');?>/js/custom_2.js?v=0.7.9"></script>
   <script src="<?php bloginfo('template_directory');?>/js/mutimenu.js?v=0.0.1"></script>
   <script src="<?php bloginfo('template_directory');?>/js/slider-multi-item.js?v=0.0.0.2"></script>
    <!--js code-->
   <!--  <script src="<?php //bloginfo('template_directory');?>/js/custom.js"></script> -->
    <script>
        function colorize() {
            var hue = Math.random() * 360;
            return "HSL(" + hue + ",100%,50%)";
        }
    </script>
    <!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '297500411357080');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=297500411357080&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '247443506593753');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=247443506593753&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '661002858128260');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=661002858128260&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '628099364731984');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=628099364731984&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
    	<!-- Facebook Pixel Code -->
	    <script>
	    !function(f,b,e,v,n,t,s)
	    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	    n.queue=[];t=b.createElement(e);t.async=!0;
	    t.src=v;s=b.getElementsByTagName(e)[0];
	    s.parentNode.insertBefore(t,s)}(window, document,'script',
	    'https://connect.facebook.net/en_US/fbevents.js');
	    fbq('init', '256467692070776');
	    fbq('track', 'PageView');
	    </script>
	    <noscript><img height="1" width="1" style="display:none"
	    src="https://www.facebook.com/tr?id=256467692070776&ev=PageView&noscript=1"
	    /></noscript>
	    <!-- End Facebook Pixel Code -->
	    <!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '920049518469430');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=920049518469430&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
	    <!-- Global site tag (gtag.js) - Google Analytics -->
	    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136788116-5"></script>
	    <script>
	    window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
	    gtag('js', new Date());

	    gtag('config', 'UA-136788116-5');
	    </script>
<?php wp_footer(); ?>

</body>
</html>
