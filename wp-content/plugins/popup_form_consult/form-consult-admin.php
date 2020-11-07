<div class="wrap consultant">
	<h2>Setting option </h2>
	<form method="post" action="options.php">
	    <?php settings_fields( 'form-consult-option' ); ?>
	    <?php do_settings_sections( 'form-consult-option' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <tr><td scope="row">option</td></tr>
	       <tr>
	        <td><input type="text" name="consultant" value="<?php echo esc_attr( get_option('consultant') ); ?>" /></td>
	        </tr>
	        <tr>
	        <td scope="row">string json</td>
	    	</tr>
	    	<tr>
	         <td><textarea class="input control" col="5" row="50" name="strjson"><?php echo esc_attr( get_option('strjson') ); ?></textarea></td>
	        </tr>
	        <tr><td>
	    		<p>
		        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
		        <input class="images_home form-control int-pop1" type="text" name="img-doctor" value="<?php echo esc_attr( get_option('img-doctor') ); ?>" />
		        <input type="button" name="images_home-button" class="button images_home-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('img-doctor') ); ?>"></p>
	    	</td>
	    	</tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
</div>