<?php if($count == 4) { ?>
<div class="customer-layout-4">
    <div class="container">
        <div class="row tip-bottom">
          <?php } ?>
             <div class="col-md-3 col-xs-6">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $src; ?>"></a>
                <h3 class="title_news renderer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
            <?php if($count == 7) { ?>
        </div>
    </div>
</div>
<?php } ?>