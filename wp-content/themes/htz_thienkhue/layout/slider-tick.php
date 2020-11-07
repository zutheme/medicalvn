 <?php $slider = get_field('slider','customizer'); ?>
<!--event wrapper start-->
<div class="event_wrapper">
<div class="container-fuild"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php if(isset($slider)){ 
          $li = 0;$_active = "active";
          foreach ($slider as $item) {
            if($li > 0) {
                $_active = "";
            } ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $li; ?>" class="<?php echo $_active; ?>"></li>   
            <?php $li++;
          }
      } ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php  if(isset($slider)){
            $count = 0; $active = "active"; 
            foreach($slider as $row) { ?>
              <?php if($count > 0) {
                  $active = "";
              } ?>
              <div class="item <?php echo $active ?>">
                <img class="slider-desktop" src="<?php echo $row['image_slider']['url'] ?>" alt="" style="width:100%;">
                <img class="slider-mobile" src="<?php echo $row['image_slider_mobile']['url'] ?>" alt="" style="width:100%;">
              </div>
               <?php $count++; 
            }
         } ?>
     </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>