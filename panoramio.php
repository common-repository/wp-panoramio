<div class="wrap">
	<div id="icon-panoramio" class="icon32"></div>
	<h2><?php _e('WP Panoramio'); ?></h2>
	
	<?php
		global $wpdb;
		
		$error = '';
		$success = '';
		
		if(isset($_POST['task']) && $_POST['task']=='panoramio-settings') 
		{
			// get posted data
			$style = $_POST['style'];
			$tag = $_POST['tag'];
			$width = $_POST['width'];
			$height = $_POST['height'];
			$bgcolor = $_POST['bgcolor'];
			$position = $_POST['position'];
			$list_size = $_POST['list_size'];
			$columns = $_POST['columns'];
			$rows = $_POST['rows'];
			$orientation = $_POST['orientation'];
			
			//filtered inputted data
			if( $style == "" || $tag == "" || $width == "" || $height == "" || $bgcolor == "") {
				$error = 'Fields marked with (*) are requireds.';
			} else if(!is_numeric( $width )) {
				$error = 'Width should be numeric.';
			} else if(!is_numeric( $height )) {
				$error = 'Height should be numeric.';
			} else if(!is_numeric( $list_size )) {
				$error = 'Scroll Size should be numeric.';
			} else if(!is_numeric( $columns )) {
				$error = 'Columns should be numeric.';
			} else if(!is_numeric( $rows )) {
				$error = 'Rows Size should be numeric.';
			} else {
				
				//save data
				$wp_qry = $wpdb->update(
					"{$wpdb->prefix}panoramio",
					array(
						'style'			=> $style, 
						'tag'			=> $tag, 
						'width'			=> $width, 
						'height'		=> $height, 
						'bgcolor'		=> $bgcolor, 
						'position'		=> $position, 
						'list_size'		=> $list_size, 
						'columns'		=> $columns, 
						'rows'			=> $rows, 
						'orientation'	=> $orientation
					), 
					array( 'ID' => 1 )
				);
				
				if( $wp_qry ) {
					$success = 'Settings successfully saved.';
				} else {
					$error = 'No changes has been made.';
				}
			}
			
		}
	
		if( $error != "" ) {
			echo '
			<div id="setting-error-settings_updated" class="error">
				<p><strong>ERROR: </strong>'. $error .'</p>
			</div>
			';
		}
		
		if( $success != "" ) {
			echo '
			<div id="setting-error-settings_updated" class="updated">
				<p><strong>Horrayyy: </strong>'. $success .'</p>
			</div>
			';
		}
	?>
	
	<div class="panoramio-container">
		<?php
			// fetch data from database for update purposes.
			$panoramio = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}panoramio" );
		?>
		
		<div class="plugin-settings">
			<form method="post">
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" /></p>
				
				<table border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td width="20%"><label for="style">Style</label></td>
						<td>
							<?php
								$styles = array(
									'photo_list'=> 'Photo List',
									'slideshow'	=> 'Slideshow',
									'photo'		=> 'Photo',
									'list'		=> 'List'
								);
							?>
							<select name="style" id="style">
								<option value="">&mdash; Select Style &mdash;</option>
								<?php
									foreach($styles as $key => $value) {
										echo '<option value="'.$key.'" '.(isset($_POST['style']) ? (($_POST['style']==$key) ? 'selected="selected"' : '') : (($key==$panoramio[0]->style) ? 'selected="selected"' : '')).'>'.$value.'</option>';
									}
								?>
							</select> <span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label for="tag">Place</label></td>
						<td>
							<input type="text" name="tag" value="<?php echo (isset($_POST['tag']) ? $_POST['tag'] : $panoramio[0]->tag) ?>" /> <span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label for="width">Width</label></td>
						<td>
							<input type="text" name="width" value="<?php echo (isset($_POST['tag']) ? $_POST['width'] : $panoramio[0]->width) ?>" />  <span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label for="height">Height</label></td>
						<td>
							<input type="text" name="height" value="<?php echo (isset($_POST['tag']) ? $_POST['height'] : $panoramio[0]->height) ?>" />  <span class="required">*</span>
						</td>
					</tr>
					
					<tr>
						<td><label for="bgcolor">Background Color #</label></td>
						<td>
							<input type="text" name="bgcolor" value="<?php echo (isset($_POST['tag']) ? $_POST['bgcolor'] : $panoramio[0]->bgcolor) ?>" />  <span class="required">*</span>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<div class="notify"><p>Photo List Style Options</p></div>
						</td>
					</tr>
					
					<tr>
						<td><label for="position">Position</label></td>
						<td>
							<?php
								$positions = array(
									'top'		=> 'Top',
									'right'		=> 'Right',
									'bottom'	=> 'Bottom',
									'left'		=> 'Left'
								);
							?>
							<select name="position" id="position">
								<option value="">&mdash; Select Position &mdash;</option>
								<?php
									foreach($positions as $key => $value) {
										echo '<option value="'.$key.'" '.(isset($_POST['position']) ? (($_POST['position']==$key) ? 'selected="selected"' : '') : (($key==$panoramio[0]->position) ? 'selected="selected"' : '')).'>'.$value.'</option>';
									}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td><label for="list_size">Scroll Size</label></td>
						<td>
							<input type="text" name="list_size" value="<?php echo (isset($_POST['tag']) ? $_POST['list_size'] : $panoramio[0]->list_size) ?>" />
						</td>
					</tr>			
					
					<tr>
						<td colspan="2">
							<div class="notify"><p>List Style Options</p></div>
						</td>
					</tr>
					
					<tr>
						<td><label for="columns">Columns</label></td>
						<td>
							<input type="text" name="columns" value="<?php echo (isset($_POST['tag']) ? $_POST['columns'] : $panoramio[0]->columns) ?>" />
						</td>
					</tr>
					
					<tr>
						<td><label for="rows">Rows</label></td>
						<td>
							<input type="text" name="rows" value="<?php echo (isset($_POST['tag']) ? $_POST['rows'] : $panoramio[0]->rows) ?>" />
						</td>
					</tr>
					
					<tr>
						<td><label for="orientation">Orientation</label></td>
						<td>
							<?php
								$orientations = array(
									'vertical'		=> 'Vertical',
									'horizontal'	=> 'Horizontal'
								);
							?>
							<select name="orientation" id="orientation">
								<option value="">&mdash; Select Orientation &mdash;</option>
								<?php
									foreach($orientations as $key => $value) {
										echo '<option value="'.$key.'" '.(isset($_POST['orientation']) ? (($_POST['orientation']==$key) ? 'selected="selected"' : '') : (($key==$panoramio[0]->orientation) ? 'selected="selected"' : '')).'>'.$value.'</option>';
									}
								?>
							</select>
						</td>
					</tr>
				</table>
				
				<input type="hidden" name="task" value="panoramio-settings" />
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" /></p>
			</form>
		</div>
		<div class="plugin-notices">
			<p>Thanks for using <strong>WP Panoramio</strong> plugin by <a href="http://www.sutanaryan.com" target="_blank" title="Visit author website">Ryan Sutana</a>.</p>
			
			<h3>Another great plugin from this author.</h3>
			<ul>
				<li><a href="http://www.sutanaryan.com/freebies/plugins/wp-rslogin/" target="_blank">WP RSLogin</a> { a full jquery ajax login and forgot password }</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
</div>