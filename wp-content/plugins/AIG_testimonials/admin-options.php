<?php

add_action('admin_init', 'advice_testimonial_options_init' );
add_action('admin_menu', 'advice_testimonial_options_add_page');

// Init plugin options to white list our options
function advice_testimonial_options_init(){
	register_setting( 'advice_testimonial_options_options', 'advice_testimonial', 'advice_testimonial_options_validate' );
}

 // Add menu page
function advice_testimonial_options_add_page() {
    $admin_testimonial_icon = plugin_dir_url( __FILE__ ).'/images/admin-icon.png';
    add_menu_page('Advice Testimonial Plugin', 'Testimonial Options', 'manage_options', 'advice_testimonial_options', 'advice_testimonial_options_do_page', $admin_testimonial_icon);
} 

// Draw the options page
function advice_testimonial_options_do_page() {
	?>
	<div class="wrap" style="width:650px;">
		<h2>Advice Testimonial Plugin</h2>
		<h3>Instructions:</h3>
		<p>Use [testimonial_form] to display a front-end form to submit a new testimonial.</p>
		<p>Use [all_testimonials] to display all testimonials. </p>
		<p>Use [single_testimonial] to display a single, rotating testimonial (for sidebar, homepage, etc).</p>
		<p>Testimonials submitted on the front-end must be approved to become visible.</p>
		<p>Star Ratings can be from 0 to 5. Half stars are allowed. For example: 4.5 out of 5 stars</p>
		<h3>Options:</h3>
		<form method="post" action="options.php">
			<?php settings_fields('advice_testimonial_options_options'); ?>
			<?php $options = get_option('advice_testimonial'); ?>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;" >
				<tr valign="top">
					<th scope="row" width="50%">Email address to send new testimonial notifications to:</th>
					<td width="50%"><input type="email" name="advice_testimonial[testimonial_email]" style="width:100%;" value="<?php echo $options['testimonial_email']; ?>" /></td>
				</tr>
				<tr valign="top">
					<td colspan="2" width="100%">Note: If this is not set then emails will go to the Wordpress administrator's email address</td>
				</tr>
			</table>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;">
				<tr valign="top">
					<th scope="row" width="25%">Slug of testimonials page:</th>
					<td width="75%"><?php echo bloginfo('url'); ?>/<input type="text" name="advice_testimonial[read_more]" style="width:100px;" value="<?php echo $options['read_more']; ?>" /></td>
				</tr>
				<tr valign="top">
					<td colspan="2" width="100%">Note: This is the page the read more link on the single testimonial will point to.</td>
				</tr>
			</table>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;">
				<tr valign="top">
					<th scope="row" width="50%">Enable redirect after testimonial submission?</th>
					<td width="50%"><input type="radio" name="advice_testimonial[enable_redirect]" value="1" <?php if($options['enable_redirect']==1){echo "checked";} ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="advice_testimonial[enable_redirect]" value="0" <?php if($options['enable_redirect']==0){echo "checked";} ?>>No </td>
				</tr>
				<tr valign="top">
					<th scope="row" width="25%">Slug of thank you page:</th>
					<td width="75%"><?php echo bloginfo('url'); ?>/<input type="text" name="advice_testimonial[thanks_page]" style="width:100px;" value="<?php echo $options['thanks_page']; ?>" /></td>
				</tr>
				<tr valign="top">
					<td colspan="2" width="100%">Note: This is the page the user will be redirected to after submitting a testimonial. If it is not set they will be redirected to the homepage.</td>
				</tr>
			</table>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;">
				<tr valign="top">
					<th scope="row" width="50%">Display dates on front end?</th>
					<td width="50%"><input type="radio" name="advice_testimonial[enable_date]" value="1" <?php if($options['enable_date']==1){echo "checked";} ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="advice_testimonial[enable_date]" value="0" <?php if($options['enable_date']==0){echo "checked";} ?>>No </td>
				</tr>
			</table>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;">
				<tr valign="top">
					<th scope="row" width="50%">Display star rating on front end?</th>
					<td width="50%"><input type="radio" name="advice_testimonial[enable_stars]" value="1" <?php if($options['enable_stars']==1){echo "checked";} ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="advice_testimonial[enable_stars]" value="0" <?php if($options['enable_stars']==0){echo "checked";} ?>>No </td>
				</tr>
			</table>
			<table class="form-table" style="border-bottom:dashed 1px #000; padding-bottom:10px; margin-bottom:10px;">
				<tr valign="top">
					<th scope="row" width="50%">Display city and state on front end?</th>
					<td width="50%"><input type="radio" name="advice_testimonial[enable_location]" value="1" <?php if($options['enable_location']==1){echo "checked";} ?>>Yes&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="advice_testimonial[enable_location]" value="0" <?php if($options['enable_location']==0){echo "checked";} ?>>No </td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function advice_testimonial_options_validate($input) {
	// Strip HTML tage
	$input['testimonial_email'] =  wp_filter_nohtml_kses($input['testimonial_email']);
	$input['read_more'] =  wp_filter_nohtml_kses($input['read_more']);
	$input['thanks_page'] =  wp_filter_nohtml_kses($input['thanks_page']);
	return $input;
}

//add testimonial options to admin bar
function wp_admin_bar_testimonial_options() {
global $wp_admin_bar;
$wp_admin_bar->add_menu(array(
'id' => 'wp-admin-bar-testimonial-manage',
'title' => __('Manage Testimonials'),
'href' =>home_url().'/wp-admin/edit.php?post_type=testimonial'
));
$wp_admin_bar->add_menu(array(
'id' => 'wp-admin-bar-testimonial-options',
'title' => __('Testimonial Options'),
'href' =>home_url().'/wp-admin/admin.php?page=advice_testimonial_options'
));
}
add_action('wp_before_admin_bar_render', 'wp_admin_bar_testimonial_options');

//sort by approved
// Register the column
function _AIG_testimonial_approved_column_register( $columns ) {
	$columns['_AIG_testimonial_approved'] = __( 'Approved', 'my-plugin' );
 
	return $columns;
}
add_filter( 'manage_edit-testimonial_columns', '_AIG_testimonial_approved_column_register' );

// Display the column content
function _AIG_testimonial_approved_column_display( $column_name, $post_id ) {
	if ( '_AIG_testimonial_approved' != $column_name )
		return;
 
	$_AIG_testimonial_approved = get_post_meta($post_id, '_AIG_testimonial_approved', true);
	if ( !$_AIG_testimonial_approved ){
		$_AIG_testimonial_approved = 'No';
	}
	else {
		$_AIG_testimonial_approved = 'Yes';
	}
	echo $_AIG_testimonial_approved;
}
add_action( 'manage_posts_custom_column', '_AIG_testimonial_approved_column_display', 10, 2 );

// Register the column as sortable
function _AIG_testimonial_approved_column_register_sortable( $columns ) {
	$columns['_AIG_testimonial_approved'] = '_AIG_testimonial_approved';
	return $columns;
}
add_filter( 'manage_edit-testimonial_sortable_columns', '_AIG_testimonial_approved_column_register_sortable' );

function _AIG_testimonial_approved_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && '_AIG_testimonial_approved' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => '_AIG_testimonial_approved',
			'orderby' => 'meta_value_num'
		) );
	}
 
	return $vars;
}
add_filter( 'request', '_AIG_testimonial_approved_column_orderby' );
//end sort by approved

//sort by rating
// Register the column
function _AIG_testimonial_rating_column_register( $columns ) {
	$columns['_AIG_testimonial_rating'] = __( 'Rating', 'my-plugin' );
 
	return $columns;
}
add_filter( 'manage_edit-testimonial_columns', '_AIG_testimonial_rating_column_register' );

// Display the column content
function _AIG_testimonial_rating_column_display( $column_name, $post_id ) {
	if ( '_AIG_testimonial_rating' != $column_name )
		return;
 
	$_AIG_testimonial_rating = get_post_meta($post_id, '_AIG_testimonial_rating', true);
	if ( !$_AIG_testimonial_rating ){
		$_AIG_testimonial_rating = '0 out of 5 stars';
	}
	else {
		$_AIG_testimonial_rating .= ' out of 5 stars';
	}
 
	echo $_AIG_testimonial_rating;
}
add_action( 'manage_posts_custom_column', '_AIG_testimonial_rating_column_display', 10, 2 );

// Register the column as sortable
function _AIG_testimonial_rating_column_register_sortable( $columns ) {
	$columns['_AIG_testimonial_rating'] = '_AIG_testimonial_rating';
	return $columns;
}
add_filter( 'manage_edit-testimonial_sortable_columns', '_AIG_testimonial_rating_column_register_sortable' );

function _AIG_testimonial_rating_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && '_AIG_testimonial_rating' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => '_AIG_testimonial_rating',
			'orderby' => 'meta_value_num'
		) );
	}
	return $vars;
}
add_filter( 'request', '_AIG_testimonial_rating_column_orderby' );
//end sort by rating

//sort by email
// Register the column
function _AIG_testimonial_email_column_register( $columns ) {
	$columns['_AIG_testimonial_email'] = __( 'Email', 'my-plugin' );
 
	return $columns;
}
add_filter( 'manage_edit-testimonial_columns', '_AIG_testimonial_email_column_register' );

// Display the column content
function _AIG_testimonial_email_column_display( $column_name, $post_id ) {
	if ( '_AIG_testimonial_email' != $column_name )
		return;
 
	$_AIG_testimonial_email = get_post_meta($post_id, '_AIG_testimonial_email', true);
	if ( !$_AIG_testimonial_email ){
		$_AIG_testimonial_email = 'No email';
	}
	else {
		$_AIG_testimonial_email;
	}
 
	echo $_AIG_testimonial_email;
}
add_action( 'manage_posts_custom_column', '_AIG_testimonial_email_column_display', 10, 2 );

// Register the column as sortable
function _AIG_testimonial_email_column_register_sortable( $columns ) {
	$columns['_AIG_testimonial_email'] = '_AIG_testimonial_email';
	return $columns;
}
add_filter( 'manage_edit-testimonial_sortable_columns', '_AIG_testimonial_email_column_register_sortable' );

function _AIG_testimonial_email_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && '_AIG_testimonial_email' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => '_AIG_testimonial_email',
			'orderby' => 'meta_value_num'
		) );
	}
	return $vars;
}
add_filter( 'request', '_AIG_testimonial_email_column_orderby' );
//end sort by email

?>