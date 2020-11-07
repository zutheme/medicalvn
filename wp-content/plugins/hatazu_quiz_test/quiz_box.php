<?php function quiz_box(){ ?>
<!-- Slideshow container -->
<div class="slideshow-container">
  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade-slide">
    <!-- <div class="numbertext">1 / 3</div> -->
    <!-- <a href="<?php //echo esc_attr( get_option('link_images_slider1') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider1') ); ?>" style="width:100%"></a> -->
    <!-- <div class="text">Caption Text</div> -->
    <div class="whychoose">
      <ul>
        <li><div class="tip"><h4>Công nghệ tiên tiến 4.0</h4></div><div class="description">Hệ thống laser </div></li>
      </ul>
    </div>
  </div>

  <div class="mySlides fade-slide">
    <!-- <div class="numbertext">2 / 3</div> -->
    <a href="<?php echo esc_attr( get_option('link_images_slider2') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider2') ); ?>" style="width:100%"></a>
    <!-- <div class="text">Caption Two</div> -->
  </div>

  <div class="mySlides fade-slide">
    <!-- <div class="numbertext">3 / 3</div> -->
    <a href="<?php echo esc_attr( get_option('link_images_slider3') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider3') ); ?>" style="width:100%"></a>
    <!-- <div class="text">Caption Three</div> -->
  </div>
<div class="mySlides fade-slide">
    <!-- <div class="numbertext">3 / 3</div> -->
    <a href="<?php echo esc_attr( get_option('link_images_slider4') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider4') ); ?>" style="width:100%"></a>
    <!-- <div class="text">Caption Three</div> -->
  </div>
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<!-- <div class="dot-position" style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div> -->

<?php } ?>