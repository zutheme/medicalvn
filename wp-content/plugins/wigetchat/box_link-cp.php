<?php function box_link(){ 
	$dir = plugin_dir_url(__FILE__);
?>
<div id="box-link" class="box-link" style="display:none">
<ul>
<li><a class="icon-box facebook" href="javascript:void(0);">&nbsp;</a></li>
<li><a class="icon-box youtube" href="javascript:void(0);">&nbsp;</a></li>
<li><a class="icon-box phone" href="javascript:void(0);">&nbsp;</a></li>
<li><a class="icon-box calendar btn-popup" href="javascript:void(0);">&nbsp;</a></li>
<!-- <li><a class="test-video" href="#"></i></a></li> -->
</ul>
</div>

<?php } 
function box_messenger(){ ?>
      <!-- <script async data-id="53379" src="https://cdn.widgetwhats.com/script.min.js"></script> -->
      <div id="fb-root"></div>
 
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="111298223987823"
        greeting_dialog_display="hide">
      </div>
      <!--zalo-->
      <div class="zalo-chat-widget" data-oaid="4561880956153197739" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
     
      <!-- end zalo -->
<?php } ?>
