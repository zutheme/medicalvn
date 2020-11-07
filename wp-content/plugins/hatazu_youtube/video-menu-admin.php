<div class="wrap">

	<h2>Setting option theme</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'video-settings-option' ); ?>

	    <?php do_settings_sections( 'video-settings-option' ); ?>

	    <?php if ( isset( $_POST['idyoutube'] ) ) {

		    $foo = (string) $_POST['idyoutube'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--option ---</td></tr>

	        <tr valign="top">

	        <th scope="row">id video youtube khach hang 1</th>

	        <td><input class="opt form-control" type="text" name="idyoutube" value="<?php echo esc_attr( get_option('idyoutube') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">id video youtube khach hang 2</th>

	        <td><input class="opt form-control" type="text" name="idyoutube2" value="<?php echo esc_attr( get_option('idyoutube2') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">id video youtube khach hang 4</th>

	        <td><input class="opt form-control" type="text" name="idyoutube4" value="<?php echo esc_attr( get_option('idyoutube4') ); ?>" /></td>

	        </tr>
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>