<div class="wrap">
	<h2>Setting option</h2>
	<form class="form-slider" method="post" action="options.php">

	    <?php settings_fields( 'trac_nghiem-settings-group' ); ?>

	    <?php do_settings_sections( 'trac_nghiem-settings-group' ); ?>

	    <table class="form-table-slider" style="width: 100%">
		 <tr>
	        <td>
	        	<p><label for="images_slider" class="prfx-row-title"><?php _e( 'sms quiz', 'prfx-textdomain' )?></label></p>
				<p><textarea name="sms_text" rows="5" cols="100"><?php echo esc_attr( get_option('sms_text') ); ?></textarea>
			</td>
	      </tr>	
	    </table>

	    <?php submit_button(); ?>

	</form>
</div>