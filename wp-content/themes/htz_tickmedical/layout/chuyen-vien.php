  <?php $chuyenvien_image = get_field('chuyenvien_image','customizer'); ?>
  <!--team wrapper start-->
<div class="chuyen-vien team_wrapper med_toppadder10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                <div class="team_heading_wrapper med_bottompadder40">
                    <h3 class="med_bottompadder20"><?php echo get_field('chuyenvien_header','customizer'); ?></h3>
                    <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                    <p><?php echo get_field('chuyenvien_decs','customizer'); ?></p>
                </div>
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-video4">
                    <div class="team_about">
                        <div class="team_img">
                            <img src="<?php echo $chuyenvien_image['url']; ?>" alt="img" class="img-responsive">
                        </div>
                        <div class="team_txt">
                            <a href="<?php echo get_field('chuyenvien_link','customizer'); ?>"><?php echo get_field('chuyenvien_title','customizer'); ?></a>
                        </div>
                     
                    </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="team_about">
                         <div class="video-player-4">
                            <div id="player4"></div>
                        </div>
                    </div>
                    <div class="team_txt">
                            <a href="<?php echo get_field('chuyenvien_video_link','customizer'); ?>"><?php echo get_field('chuyenvien_video_title','customizer'); ?></a>
                        </div>
                </div>
        </div>
    </div>
</div>
    <!--team wrapper end-->