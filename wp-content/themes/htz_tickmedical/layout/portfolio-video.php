<?php get_template_part('layout/video-popup'); ?>
<div class="fliter_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper text-center med_bottompadder40">
                        <h2 class="med_bottompadder20"><?php echo get_field('story_header','customizer'); ?></h2>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_teams.png" alt="line" class="med_bottompadder20">
                        <p><?php echo get_field('story_decs','customizer'); ?></p>
                    </div>
                </div>
                <div class="portfolio-area ptb-100">
                    <div class="container">
                        <div class="portfolio-filter clearfix text-center med_toppadder20">
                           <!--  <ul class="filter list-inline" id="filter"> -->
                            <ul class="filter list-inline" id="filter3">
                            <?php
                                $args1 = array(
                                    'orderby'           => 'id', 
                                    'order'             => 'term_order',
                                    'hide_empty'        => true, 
                                    'exclude'           => array(), 
                                    'exclude_tree'      => array(), 
                                    'include'           => array(),
                                    'number'            => '', 
                                    'fields'            => 'all', 
                                    'slug'              => '',
                                    'parent'            => '',
                                    'hierarchical'      => true, 
                                    'child_of'          => 0,
                                    'childless'         => false,
                                    'get'               => '', 
                                    'name__like'        => '',
                                    'description__like' => '',
                                    'pad_counts'        => false, 
                                    'offset'            => '', 
                                    'search'            => '', 
                                    'cache_domain'      => 'core'
                                ); 
                                // $args1 = array(
                                //     'orderby'  => 'id',
                                //     'order'    => 'term_order',
                                //     'hide_empty' => false,
                                //     'number'     => '6',
                                //     'parent'=>0
                                // );
                                $active = '';
                                $taxonomy = "group_video";
                                $lst_slug = array();
                                $allcat = get_terms($taxonomy, $args1);
                                $count = 0;
                                foreach($allcat as $allcats){
                                if($count==0){
                                    $active = 'active';
                                    $count = 1;
                                }else{
                                    $active = '';
                                }
                                  if($allcats->parent==0):
                                    echo '<li><a class="'.$active.'" data-group="'.$allcats->slug.'">'.$allcats->name.'</a></li>';
                                    $lst_slug[] = $allcats->slug;
                                  endif;
                                } ?>  
                            </ul>
                        </div>
                        <div class="row three-column">
                            <!-- <div id="gridWrapper" class="gridWrapper clearfix"> -->
                            <div id="gridWrapper3" class="gridWrapper clearfix">
                                <?php
                                $index = 0;
                                set_query_var( 'index', $index );
                                foreach ($lst_slug as $key => $value) {
                                    set_query_var( 'slug_video', $value );
                                    get_template_part('layout/loop-video'); 
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