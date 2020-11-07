<?php
function box_chat(){ ?>
      <div id="fb-root"></div>
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="<?php echo esc_attr( get_option('page_id') ); ?>"
        theme_color="#008FE5"
        greeting_dialog_display="hide">
      </div>
      <!--zalo-->
      <div class="zalo-chat-widget" data-oaid="<?php echo esc_attr( get_option('data-oaid') ); ?>" data-welcome-message="<?php echo esc_attr( get_option('zalo-message') ); ?>" data-autopopup="0" data-width="350" data-height="420"></div>
      <!-- end zalo -->
<?php } 
function box_top(){ ?>
      <div id="fb-root"></div>
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="<?php echo esc_attr( get_option('page_id') ); ?>"
        theme_color="#20cef5"
        greeting_dialog_display="hide">
      </div>
      <!--zalo-->
      <div class="zalo-chat-widget" data-oaid="<?php echo esc_attr( get_option('data-oaid') ); ?>" data-welcome-message="<?php echo esc_attr( get_option('zalo-message') ); ?>" data-autopopup="0" data-width="350" data-height="420"></div>
      <!-- end zalo -->
<?php }
?>
