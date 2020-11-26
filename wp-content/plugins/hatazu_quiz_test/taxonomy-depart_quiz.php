<?php

/*

 * The template for displaying archive pages

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package onehealth

 */

?>
    <script>var list_question = [];</script>
    <?php $team_query = new WP_Query( array(
            'post_type' => 'trac-nghiem',
            'posts_per_page' => 10,
            //'orderby'   => 'meta_value',
            'order' => 'asc',
            'tax_query' => array(
                array (
                    'taxonomy' => 'depart_quiz',
                    'field' => 'slug',
                    'terms' => $current_slug,
                )
            ),
        )); 
        if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            $team_query->the_post();  
            $id = get_the_ID();
                echo '<script>list_question.push('.$id.');</script>';
            } 

        }else{
            echo "Not found";
        } ?>

    <div id="quiz-test-show" class="quiz-test-show">
        <div class="tip-title"><span class="question-title"></span></div>
        <div class="tip-content"><h1 class="question-content"></h1></div>
        <div class="result">
            <h2 class="head"></h2>
            <p class="content"></p>
            <ul class="link-explore">
                <!-- <li><a href="#" class="link-icon btn-readmore">Tìm hiểu</a></li> -->
            </ul>
        </div>
        <ul class="list-question">
        </ul>
        <div class="desc-begin">
                <h1><?php echo $term_custom_fields['depart_quiz_title']; ?></h1> 
                <p><?php echo $term->description; ?></p>
        </div>
        <div class="btn-area">           
            <button class="btn-next">Bắt đầu</button>
        </div>
    </div>
    <div class="htz-popup-processing" style="display: none; position: fixed; z-index: 990;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
            <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
                <p><img class="loadings" style="position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;z-index: 1000;" src="<?php bloginfo('template_directory');?>/images/loader.gif"></p>
                <p class="result"></p>
            </div>
    </div>
    <div id="form-quiz" class="form-quiz">
        <div class="modal-form">
            <span class="close">x</span>
            <form class="frm-reg">
                <div class="head"><h6 class="reg-sum">Chúc mừng bạn đã hoàn thành khảo sát</h6>
                    <p>Vui lòng nhập thông tin để nhận kết quả bác sĩ</p>
                </div>
                <input type="text" name="name" class="control" value="" placeholder="Họ và tên">
                <input type="text" name="phone" class="control" value="" placeholder="Điện thoại">
                <select name="sel-local" class="control">
                    <option value="0">Chọn khu vực</option>
                    <option value="1">TP Hồ Chí Minh</option>
                    <option value="2">Bình Dương</option>
                    <option value="3">Đồng Nai</option>
                </select>
                <div class="bottom">
                     <button type="button" class="bnt btn-register">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>

