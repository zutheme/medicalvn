<!--choose wrapper start-->
<?php $bg_quiztest = get_field('quiztest_bg','customizer'); 
    $quiztest_note = get_field('quiztest_note','customizer');
    $quiztest_doctor = get_field('quiztest_doctor','customizer');
    $quiztest_btntest = get_field('quiztest_btntest','customizer');
?>
<div id="banner-quiz" class="banner-quiz" style="background-image:url('<?php echo $bg_quiztest['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
               <div class="phone-quiz">
                    <a href="<?php echo get_field('quiztest_btntest_link','customizer'); ?>"><img src="<?php echo $quiztest_note['url']; ?>" alt="img" class="img-phone"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="doctor-quiz">
                    <a href="<?php echo get_field('quiztest_btntest_link','customizer'); ?>"><img src="<?php echo $quiztest_doctor['url']; ?>" alt="img" class="img-doctor"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 btn-test text-center">
                <a href="<?php echo get_field('quiztest_btntest_link','customizer'); ?>"><img src="<?php echo $quiztest_btntest['url']; ?>" alt="img" class="img-btn-test"></a>
            </div>
        </div>
    </div>
</div>
<!--choose wrapper end-->