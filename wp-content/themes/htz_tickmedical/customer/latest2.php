<?php if($count == 0 ) { ?>
<div class="customer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                        <div class="col-md-8 layout-left">
                          <img src="<?php echo $src; ?>">
                        </div>
                         <div class="col-md-4 tip">
                            <h3 class="title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="description">
                                <p><?php echo get_the_excerpt_max(250); ?></p>
                                <!-- <ul class="list">
                                    <li><h3 class="renderer"><a href="#">Bé một ngày tuổi tử vong sau tiêm vaccine viêm gan B</a></h3></li>
                                </ul> -->
                            </div>
                        </div>
                </div>
                <div class="row tip-bottom">
                   <?php }elseif ($count < 4) { ?>
                     <div class="col-md-4">
                        <h3 class="title_news renderer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                         <p><?php echo get_the_excerpt_max(100); ?></p>
                    </div>
                    <?php } 
                    if($count == 3) { ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php $customer_banner = get_field('customer_banner','customizer'); ?>
                 <img src="<?php echo $customer_banner['url']; ?>">
            </div>
        </div>
    </div>
</div>
<?php } 
if($count == 3) { ?>
<div class="news-feed">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news">
                    <marquee>

                      <?php foreach ($args as $value) { ?>
                        <a href="<?php echo $value['permalink']; ?>"><?php echo $value['title']; ?></a>&nbsp;&nbsp;&nbsp;
                      <?php } ?>
                     </marquee>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>