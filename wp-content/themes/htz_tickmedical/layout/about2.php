<<<<<<< HEAD
   <!--choose wrapper start-->
   <?php $bgimg = get_field('about_background','customizer'); ?>
    <div class="choose_wrapper med_toppadder100" style="background: url(<?php echo $bgimg['url']; ?>) 50% 0 repeat-y;">
        <div class="choose_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-video1">
                    <div class="choose_heading_wrapper about-custom">
                        <h1 class="med_bottompadder20"><?php echo get_field('about_header','customizer'); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="title" class="med_bottompadder30">
                    </div>
                    <div class="sidebar_wrapper">
                        <div class="accordionFifteen">
                            <div class="panel-group" id="accordionFifteenLeft" role="tablist">
                           
                                <div class="panel panel-default sidebar_pannel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionFifteenLeft" href="#collapseFifteenLeft-0" aria-expanded="false"><?php echo get_field('about_title','customizer'); ?></a>
                                                </h4>
                                    </div>
                                    <div id="collapseFifteenLeft-0" class="panel-collapse collapse in" aria-expanded="true" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="panel_cont">
                                                <p><?php echo get_field('about_decs','customizer'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <!--end of /.panel-group-->
                        </div>
                    </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="video-player">
                        <div id="player1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
   <!--choose wrapper start-->
   <?php $bgimg = get_field('about_background','customizer'); ?>
    <div class="choose_wrapper med_toppadder100" style="background: url(<?php echo $bgimg['url']; ?>) 50% 0 repeat-y;">
        <div class="choose_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-video1">
                    <div class="choose_heading_wrapper about-custom">
                        <h1 class="med_bottompadder20"><?php echo get_field('about_header','customizer'); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="title" class="med_bottompadder30">
                    </div>
                    <div class="sidebar_wrapper">
                        <div class="accordionFifteen">
                            <div class="panel-group" id="accordionFifteenLeft" role="tablist">
                           
                                <div class="panel panel-default sidebar_pannel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionFifteenLeft" href="#collapseFifteenLeft-0" aria-expanded="false"><?php echo get_field('about_title','customizer'); ?></a>
                                                </h4>
                                    </div>
                                    <div id="collapseFifteenLeft-0" class="panel-collapse collapse in" aria-expanded="true" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="panel_cont">
                                                <p><?php echo get_field('about_decs','customizer'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <!--end of /.panel-group-->
                        </div>
                    </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="video-player">
                        <div id="player1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--choose wrapper end-->