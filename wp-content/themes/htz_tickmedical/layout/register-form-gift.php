 <!-- booking wrapper start -->
<div class="gift">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 get-gift">
                <div class="gift-back"><h5 class="head-gift"><?php echo get_field('gift_header','customizer'); ?></h5></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 choose">
                <ul>
                    <li>
                        <?php $img1 = get_field('gift_image1','customizer'); ?>
                        <img class="image-gift" src="<?php echo $img1['url'] ?>">
                        <!-- <div class="desc">
                            <p>Theo các chuyên gia điều trị xương khớp và dinh dưỡng thì người đang điều trị thoái hóa cột sống nên ăn các thực phẩm giàu vitamin C, canxi, cá</p>
                        </div> -->
                    </li>
                    <li>
                        <?php $img2 = get_field('gift_image2','customizer'); ?>
                        <img class="image-gift" src="<?php echo $img2['url'] ?>">
                        <!-- <div class="desc">
                            <p>Theo các chuyên gia điều trị xương khớp và dinh dưỡng thì người đang điều trị thoái hóa cột sống nên ăn các thực phẩm giàu vitamin C, canxi, cá</p>
                        </div> -->
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 frm-reg">
                <form class="form-choose"> 
                     <div class="contect_form1 head">
                       <label><?php echo get_field('gift_action','customizer'); ?></label>
                    </div> 
                    <div class="contect_form1">
                        <ul class="choose-gift">
                            <li>
                                <input class="list-check" type="checkbox" name="choose[]" value="quà tặng 1"><label class="select">Quà 1</label></li>
                            <li>
                                <input class="list-check" type="checkbox" name="choose[]" value="quà tặng 2"><label class="select">Quà 2</label></li>
                        </ul>
                    </div>    
                    <div class="contect_form1">
                        <input type="text" name="name" placeholder="Họ tên" class="require">
                    </div>
                    <div class="contect_form1">
                        <input type="text" name="phone" placeholder="Điện thoại" class="require">
                    </div>
                    <div class="contect_form4">
                        <textarea rows="4" name="note" placeholder="Nội dung" class="require"></textarea>
                    </div>
                    <div class="contect_note">
                       <label>(*Thông tin bảo mật)</label>
                    </div>
                    <div class="contect_btn">
                       <button type="button" class="submitForm btn-register" form-type="inquiry">Gửi yêu cầu</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!--booking wrapper end-->