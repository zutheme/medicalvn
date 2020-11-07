<?php if($count == 8) { ?>
<div class="customer-layout-2">
    <div class="container">
        <div class="row">
          <?php } ?>
             <div class="col-md-6 col-xs-12">
                <article class="item-news item-news-common ">
                   <h3 class="title-news renderer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                 <a href="<?php the_permalink(); ?>"><img class="thumb-art" src="<?php echo $src; ?>"></a>
                  <div class="description">
                    <p><?php echo get_the_excerpt_max(250); ?></p>
                  </div>
                </article>
            </div>
          <?php if($count == 9) { ?>   
        </div>
    </div>
</div>
<?php } ?>