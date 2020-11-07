<div class="fliter_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper text-center med_bottompadder40 wow fadeInDown" data-wow-delay="0.3s">
                        <h1 class="med_bottompadder20"><?php echo esc_attr( get_option('home-portfolio-header') ); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                        <p><?php echo esc_attr( get_option('home-portfolio-caption') ); ?></p>
                    </div>
                </div>
                <div class="portfolio-area ptb-100">
                    <div class="container">
                        <div class="portfolio-filter clearfix text-center med_toppadder20">
                            <ul class="list-inline" id="filter">
                            <li><a class="active" data-group="all">Tất cả</a></li>
                            <?php
                                $args1 = array(
                                    'orderby'=>'name',
                                    'hide_empty'=>false,
                                    'parent'=>0
                                );
                                $taxonomy = "group_portfolio";
                                $lst_slug = array();
                                $allcat = get_terms($taxonomy, $args1);
                                foreach($allcat as $allcats){
                                  if($allcats->parent==0):
                                    echo '<li><a data-group="'.$allcats->slug.'">'.$allcats->name.'</a></li>';
                                    $lst_slug[] = $allcats->slug;
                                  endif;
                                } ?>  
                            </ul>
                        </div>
                        <div class="row three-column">
                            <div id="gridWrapper" class="clearfix">
                                <?php
                                foreach ($lst_slug as $key => $value) {
                                    set_query_var( 'my_var', $value );
                                    get_template_part('layout/loop-portfolio'); 
                                }  
                                ?>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="gc_filter_btn">
                                    <ul>
                                        <li><a href="#">Xem thêm</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.container -->
                </div>
                <!--/.portfolio-area-->
            </div>
        </div>
    </div>
    <!--portfolio Wrapper End -->