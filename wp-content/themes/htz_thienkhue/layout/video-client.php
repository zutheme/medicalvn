 <!--vedio wrapper start-->
<div class="vedio_wrapper video-container" style="background:url('<?php echo esc_attr( get_option('home-client-background') ); ?>') 50% 0 repeat-y;">
    <div class="vedio_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="vedio_heading_wrapper">
                    <h1 class="med_bottompadder20"><?php echo esc_attr( get_option('home-client-header') ); ?></h1>
                    <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                    <p><?php echo esc_attr( get_option('home-client-caption') ); ?></p>
                    <div class="video-player">
                        <div id="player1"></div>
                    </div>
                   <!--  <h4><a class="popup-youtube" href="https://www.youtube.com/embed/xImpyYRVGOc"><img src="<?php //bloginfo('template_directory');?>/images/Play-Icon.png" alt="Play"> play video</a></h4> -->
                    <div class="video_btn_wrapper right">
                        <ul>
                            <li><a class="btn" href="#">Về chúng tôi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>