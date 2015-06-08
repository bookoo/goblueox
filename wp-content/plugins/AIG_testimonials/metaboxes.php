<?php
//add meta box to testimonial post type
add_action("admin_init", "testimonial_metabox");
 
function testimonial_metabox(){
	//add meta box to testimonial post type on the side with a low priority
	add_meta_box("testimonial-rating", "Testimonial Settings", "testimonial_custom_fields", "testimonial", "side", "low");
}
 
function testimonial_custom_fields(){
  global $post;
  $testimonial_rating = get_post_meta($post->ID, '_AIG_testimonial_rating', true);
  $testimonial_approved = get_post_meta($post->ID, '_AIG_testimonial_approved', true);
  $client_email = get_post_meta($post->ID, '_AIG_testimonial_email', true);
  $client_city = get_post_meta($post->ID, '_AIG_testimonial_city', true);
  $client_state = get_post_meta($post->ID, '_AIG_testimonial_state', true);
  $star_rating = $testimonial_rating*2;
  ?>
  <table width="100%">
    <tr>
        <td width="50%">Current Rating:</td>
        <td width="50%"><?php echo toStars($star_rating); ?></td>
    </tr>
    <tr>
        <td width="50%">Change the rating:</td>
        <td width="50%">
		<select name="_AIG_testimonial_rating" style="font-size:10px;">
		<option value="5" <?php if($testimonial_rating == "5") { print 'selected="selected"'; } ?>>Five stars</option>
		<option value="4.5" <?php if($testimonial_rating == "4.5") { print 'selected="selected"'; } ?>>Four and a half stars</option>
		<option value="4" <?php if($testimonial_rating == "4") { print 'selected="selected"'; } ?>>Four stars</option>
		<option value="3.5" <?php if($testimonial_rating == "3.5") { print 'selected="selected"'; } ?>>Three and a half stars</option>
		<option value="3" <?php if($testimonial_rating == "3") { print 'selected="selected"'; } ?>>Three stars</option>
		<option value="2.5" <?php if($testimonial_rating == "2.5") { print 'selected="selected"'; } ?>>Two and a half stars</option>
		<option value="2" <?php if($testimonial_rating == "2") { print 'selected="selected"'; } ?>>Two stars</option>
		<option value="1.5" <?php if($testimonial_rating == "1.5") { print 'selected="selected"'; } ?>>One and a half stars</option>
		<option value="1" <?php if($testimonial_rating == "1") { print 'selected="selected"'; } ?>>One star</option>
		<option value="0.5" <?php if($testimonial_rating == "0.5") { print 'selected="selected"'; } ?>>Half a star</option>
		<option value="0" <?php if($testimonial_rating == "0") { print 'selected="selected"'; } ?>>No stars</option>
		</select>
        </td>
    </tr>
     <tr>
	<td width="50%">Email:</td>
	<td width="50%"><input type="text" name="_AIG_testimonial_email" value="<?php echo $client_email; ?>"  /></td>
    </tr>
     <tr>
	<td width="50%">City:</td>
	<td width="50%"><input type="text" name="_AIG_testimonial_city" value="<?php echo $client_city; ?>"  /></td>
    </tr>
     <tr>
	<td width="50%">State:</td>
	<td width="50%"><input type="text" name="_AIG_testimonial_state" value="<?php echo $client_state; ?>"  /></td>
    </tr>
    <tr>
	<td width="50%">Approved:</td>
	<td width="50%"><input type="checkbox" name="_AIG_testimonial_approved" value="1" <?php if($testimonial_approved == "1") {echo 'checked="checked"';} ?> /></td>
    </tr>
</table>
  <?php
}

//save the rating data
add_action('save_post', 'save_details');

function save_details(){
	global $post;
	//save rating
	update_post_meta($post->ID, "_AIG_testimonial_rating", $_POST["_AIG_testimonial_rating"]);
	//save email
	update_post_meta($post->ID, "_AIG_testimonial_email", $_POST["_AIG_testimonial_email"]);
	//save city
	update_post_meta($post->ID, "_AIG_testimonial_city", $_POST["_AIG_testimonial_city"]);
	//save state
	update_post_meta($post->ID, "_AIG_testimonial_state", $_POST["_AIG_testimonial_state"]);
	//save approved
	update_post_meta($post->ID, "_AIG_testimonial_approved", $_POST["_AIG_testimonial_approved"]);
	//define post id variable
	$post_id = $post->ID;
}

//end rating meta box
?>