<?php
// function that runs when shortcode is called
function loadpopup(){ ?>
  <!-- <div class="htz-popup-processing" style="display: none; position: fixed; z-index: 990;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
            <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
                <p><img class="loadings" style="position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;z-index: 1000;" src="<?php //bloginfo('template_directory');?>/images/loader.gif"></p>
                <p class="result"></p>
            </div>
    </div> -->
    <div id="form-quiz" class="form-quiz">
        <div class="modal-form">
            <span class="close">x</span>
            <form class="frm-reg">
                <div class="head"><h6 class="reg-sum">Chúc mừng bạn đã hoàn thành khảo sát</h6>
                    <p>Vui lòng nhập thông tin để nhận kết quả bác sĩ</p>
                </div>
                <input type="text" name="name" class="control" value="" placeholder="Họ và tên">
                <input type="text" name="phone" class="control" value="" placeholder="Điện thoại">
                <div class="bottom">
                     <button type="button" class="bnt btn-api-quiz">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
<?php }

if (!function_exists('get_the_excerpt_max'))  
{ 
    function get_the_excerpt_max($charlength) {
      $excerpt = get_the_content();
       $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
        $introCleanText = strip_tags($cleanText);
      $charlength++;

      if ( mb_strlen( $introCleanText ) > $charlength ) {
        $subex = mb_substr( $introCleanText, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
          return mb_substr( $subex, 0, $excut );
        } else {
          return $subex;
        }
        return '...';
      } else {
        return $introCleanText;
      }
      return $introCleanText;
  }
}