<div class="fliter_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                    <div class="team_heading_wrapper text-center med_bottompadder40">
                        <h1 class="med_bottompadder20"><?php echo esc_attr( get_option('home-portfolio-header') ); ?></h1>
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                        <p><?php echo esc_attr( get_option('home-portfolio-caption') ); ?></p>
                    </div>
                </div>
                <div class="portfolio-area ptb-100">
                    <div class="container">
                        <div class="portfolio-filter clearfix text-center med_toppadder20">
                           <!--  <ul class="filter list-inline" id="filter"> -->
                            <ul class="filter list-inline" id="filter1">
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
                                $active = '';
                                $taxonomy = "group_portfolio";
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
                            <div id="gridWrapper1" class="gridWrapper clearfix">
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