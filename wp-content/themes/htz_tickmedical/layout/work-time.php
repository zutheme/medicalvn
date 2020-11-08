 <div class="work-time">
     <div class="col-xs-12 col-sm-12 hidden-md info_wrapper">
        <div class="md_share_info_wrapper">
            <ul>
                <li>
                    <div class="lv_header_icon">
                        <!-- <img src="<?php //bloginfo('template_directory');?>/images/icon/Icon_clock_1s.png" alt="Icon" title="Icon"> -->
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <p><span>8h - 18h</span>
                     <br>Thứ 2 - Chủ nhật</p>
                </li>
                <li>
                    <div class="lv_header_icon">
                       <img class="icon-phone" src="<?php bloginfo('template_directory');?>/images/icon/icon-phone1.png" alt="Icon" title="Icon">
                        <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                    </div>
                    <p> <span>Liên hệ</span>
                        <?php $var = get_field('header_phone1','customizer'); ?>
                        <br><a href="tel:<?php echo preg_replace("/[^0-9]/", "", $var); ?>"><?php echo $var; ?></a></p>
                </li>
                <li>
                    <div class="lv_header_icon">
                        <!-- <img src="<?php //bloginfo('template_directory');?>/images/icon/icon_cll_1s.png" alt="Icon" title="Icon"> -->
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <p><a class="btn pickup btn-popup" href="javascript:void(0);">Đặt lịch</a></p>
                </li>
            </ul>
        </div>
        
    </div>
</div>
