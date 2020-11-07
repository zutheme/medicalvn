<div class="wrap">

	<h2>Setting option links</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'widget_chat-settings-group' ); ?>

	    <?php do_settings_sections( 'widget_chat-settings-group' ); ?>


	    <table class="form-table">

	        <tr valign="top">

	        <th scope="row">data-id Whatsapp</th>

	        <td><input type="text" name="data-id" value="<?php echo esc_attr( get_option('data-id') ); ?>" />
	        	<p><a href="https://widgetwhats.com/">Get id</a></p>
	        </td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">tawk.to</th>

	        <td><input type="text" name="idtawkto" value="<?php echo esc_attr( get_option('idtawkto') ); ?>" />
	        	<p><a href="https://www.tawk.to/">tawk.to</a></p>
	        </td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">Fanpage</th>

	        <td><input type="text" name="page_id" value="<?php echo esc_attr( get_option('page_id') ); ?>" />
	        	<p><a href="https://findmyfbid.com/">get id page</a></p>
	        </td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">zalo</th>

	        <td><input type="text" name="data-oaid" value="<?php echo esc_attr( get_option('data-oaid') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">zalo message</th>

	        <td><input type="text" name="zalo-message" value="<?php echo esc_attr( get_option('zalo-message') ); ?>" /></td>

	        </tr>
	        
	         

	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>