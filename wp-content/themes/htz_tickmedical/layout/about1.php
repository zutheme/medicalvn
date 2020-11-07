   <!--choose wrapper start-->
   <?php $doctor_thumbnail = get_field('doctor_thumbnail','customizer'); ?>
    <div class="team_wrapper med_toppadder40">
        <!-- <div class="choose_overlay"></div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder40">
                        <h3 class="med_bottompadder20"><?php echo get_field('doctor_header','customizer'); ?></h3>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                        <p><?php echo get_field('doctor_decs','customizer'); ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 doctor-container-video1">
                    <div class="team_about">
                        <div class="team_img">
                            <img src="<?php echo $doctor_thumbnail['url']; ?>" alt="img" class="img-responsive">
                        </div>
                        <div class="team_txt">
                            <a href="<?php echo get_field('doctor_thumbnail_link','customizer'); ?>"><?php echo get_field('doctor_thumbnail_title','customizer'); ?></a>
                        </div>
                     
                    </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="team_about">
                         <div class="video-player">
                            <div id="player1"></div>
                        </div>
                    </div>
                    <div class="team_txt">
                            <a href="<?php echo get_field('doctor_thumbnail_title_link','customizer'); ?>"><?php echo get_field('doctor_thumbnail_title_video','customizer'); ?></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--choose wrapper end-->