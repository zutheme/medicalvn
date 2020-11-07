 <!-- booking wrapper start -->
    <div class="booking_wrapper med_bottompadder10">
        <div class="map_main_wrapper">
            <div style="width:100%; float:left; height:250px;"></div>
        </div>
        <div class="container">
            <div class="booking_box">
                <div class="row">
                <form>
                    <div class="box_side_icon">
                        <img src="<?php bloginfo('template_directory');?>/images/Icon_bk.png" alt="img">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1">
                                <input type="text" name="name" placeholder="Họ tên" class="require">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1">
                                <input type="text" name="email" placeholder="Email" class="require" data-valid="email" data-error="Email should be valid.">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1">
                                <input type="text" name="phone" placeholder="Điện thoại" class="require">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1">
                                 <select class="sel-local" name="sel-local">
                                    <option value="">Chọn Nơi khám</option>
                                    <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                    <option value="Đồng Nai">Đồng Nai</option>
                                    <option value="Bình Dương">Bình Dương</option>
                                  </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                            
                               <div class="multiselect sel-services">
                                    <div class="selected"></div>
                                    <div class="selectBox" onclick="showCheckboxes(this)">
                                      <select>
                                        <option>Chọn Dịch Vụ</option>
                                      </select>
                                      <div class="overSelect"></div>
                                    </div>
                                    <div class="checkboxes">      
                                    </div>
                                     <div class="processing"><img class="loading" style="display:none;width:30px;" src="<?php bloginfo('template_directory');?>/images/loader.gif"></div>
                                  </div>
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="contect_form4">
                                <textarea rows="4" name="note" placeholder="Nội dung" class="require"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="response"></div>                            
                            <div class="contect_btn">
                               <button type="button" class="submitForm btn-register" form-type="inquiry">Gửi yêu cầu</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="chat_box">
                <div class="row">
                    <div class="booking_box_2">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="booking_box_img">
                                <img src="<?php bloginfo('template_directory');?>/images/booking_call.png" alt="img" class="img-circle">
                            </div>
                            <div class="booking_chat">
                                <h1>1900 1768</h1>
                                <p>Bạn đừng ngần ngại, với chúng tôi bạn sẽ nhận được sự hỗ trợ tốt nhất có thể.</p>
                            </div>
                            <div class="booking_btn">
                                <ul>
                                    <li><a href="tel:19001768">ONLINE</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--booking wrapper end-->