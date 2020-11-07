<?php
if(!function_exists('subscriber_box')) {
	function subscriber_box(){ 
		$menu_bottom_zalo = get_field('menu-bottom-zalo','customizer');
		$menu_bottom_messenger = get_field('menu-bottom-messenger','customizer');
		$menu_bottom_reg = get_field('menu-bottom-reg','customizer');
		$menu_bottom_bar = get_field('menu-bottom-bar','customizer');
		$menu_bottom_phone = get_field('menu-bottom-phone','customizer');
		?>
		<div class="box-menu">
			<ul>
				<!-- <li><a class="btn-popup" href="javascript:void(0);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li> -->
				<li><a class="btn-popup" href="javascript:void(0);"><img src="<?php echo $menu_bottom_reg['url']; ?>"></a></li>
				<li><a href="tel:<?php echo get_field('menu-bottom-phone-link','customizer'); ?>"><img src="<?php echo $menu_bottom_phone['url']; ?>"></a></li>
				<li><a href="<?php echo get_field('menu-bottom-messenger-link','customizer'); ?>"><img src="<?php echo $menu_bottom_messenger['url']; ?>"></a></li>
				<li><a href="<?php echo get_field('menu-bottom-zalo-link','customizer'); ?>"><img src="<?php echo $menu_bottom_zalo['url']; ?>"></li>
				<li><a id="toggle_mobile" href="javascript:void(0);"><img src="<?php echo $menu_bottom_bar['url']; ?>"></a></li>
			</ul>
		</div>
	 <?php } 
} ?>
<?php
if(!function_exists('cat_box')) {
	function cat_box(){ 
		 $cate = get_field('menu-top','customizer'); ?>
	<div class="box-desktop">
		<div class="cat-box">
			<div id="slide-menu">
				<ul>
				<li><div class="box"><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></div></li>
				<?php
				if(is_front_page()){
					if(isset($cate)){ 
					foreach($cate as $row) { ?>
					<li><div class="box"><a href="<?php echo $row['menu-top_cate_link'] ?>"><?php echo $row['menu-top_cate'] ?></a></div></li>
			               <?php  }
			         } 
				}else { 
					if(isset($cate)){ 
					foreach($cate as $row) { ?>
					<li><div class="box link-single"><a href="<?php echo $row['menu-top_cate_link_single'] ?>"><?php echo $row['menu-top_cate'] ?></a></div></li>
		               <?php  }
					}
				} ?>
				</ul>
			</div>
		</div>
	</div>
	 <?php } 
} ?>

  