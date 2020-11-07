<?php
function form_consult(){ ?>
<div class="modal-consultant-form">
  <div class="modal-consult">  <!-- Modal content -->
    <div class="modal-content-consult">   
      	<form class="frm-register">
      		<span class="close">&times;</span>
      		<div class="row">
	      		<div class="column">
	      			<div class="register">
	      				<?php $doctor = get_field('register_image','customizer'); ?>
	 					<a class="doctor" href="javascript(0);"><img class="bacsi" src="<?php echo $doctor['url']; ?>"></a>
	 				</div>	
	      		</div>
	      		<div class="column reg">
	      			<div class="form-reg">
		      			<h2>chuyên gia tư vấn *</h2>
						<div class="input-group-consult">
							<input type="text" class="form-control-consult fullname" name="name" placeholder="Họ và tên" required>
					  	</div>
						<div class="input-group-consult">
							<input type="number" class="form-control-consult phone" name="phone" placeholder="Điện thoại" required>
						</div>			
						<!-- <div class="input-group-consult">
							<input type="text" class="form-control-consult address" name="address" placeholder="Địa chỉ">
						</div>	 -->	 		 
						<div class="input-group-consult">
					  		<select name="sel-local" class="sel-locals">
					  		<option value="-1">Chọn khu vực *</option>
					  		<option value="1">Sài Gòn</option>
					  		<option value="2">Bình Dương</option>
					  		<option value="3">Đồng Nai</option>
					  		</select>
					  	 </div> 
					  <div class="input-group-consult">
							<input type="email" class="form-control-consult email" name="email" placeholder="E-mail (nếu có)">
						</div>
					  <!-- <div class="input-group-consult capture">            				
							<a href="javascript:void(0)" onclick="performClick('file');">Ảnh chụp tình trạng da của bạn<br><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
							<input style="display:none" type="file" name="file_name" id="file" accept="image/*"/>
					  </div> -->
					  <div class="input-group-consult area-btn">
							<a href="javascript:void(0)" class="btn btn-default btn-reg-survey btn-register">Đăng ký ngay</a>
					  </div>
					  <p>(* Mọi thông tin được bảo mật)</p>
					  <p><img class="loading" style="display:none;width:30px;" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader-blue.gif"></p>
					  <span class="result"></span>  	
					  <!-- <canvas id="my_canvas_id" width="0px" height="0px"></canvas> -->
					</div>
				</div>
			</div>
		</form>	  	
    </div>
  </div>
</div>
<?php } 

function form_mobile(){ ?>
<div class="call-mobile">
  <ul>
  	<li><a class="phone" href="tel:19001768"><i class="fa fa-phone"></i>1900 1768</a></li>
  	<!-- <li><a class="message btn-consultant" href="#">Tư vấn</a></li> -->
  </ul>
</div>
<?php } 

function loading(){ ?>
	<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
	  <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
	    <p><img class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="<?php echo plugin_dir_url(__FILE__); ?>/images/loader.gif"></p>
	    <p class="result" style="font-weight: 500;font-size: 28px;"></p>
	    <p><img class="checked-img" style="display: none;width: 60px;margin-right: auto;margin-left: auto;padding:5px; " src="<?php echo plugin_dir_url(__FILE__); ?>/images/checked.jpg"></p>
	  </div>
	</div>
<?php } ?>