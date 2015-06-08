<?php
add_shortcode ( 'testimonial_form', 'testimonial_form' );
function testimonial_form() {
   wp_enqueue_script('form_validation_script', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('initialize_validate_form_script', plugins_url('/js/testimonial-form.js', __FILE__), array('jquery','form_validation_script'), '1.0', true);
   wp_enqueue_script('star_script1', plugins_url('/js/jquery.MetaData.js', __FILE__), array('jquery','form_validation_script'), '1.0', true);
   wp_enqueue_script('star_script2', plugins_url('/js/jquery.rating.js', __FILE__), array('jquery','form_validation_script'), '1.0', true);
   wp_enqueue_script('star_script3', plugins_url('/js/jquery.rating.pack.js', __FILE__), array('jquery','form_validation_script'), '1.0', true);
   $validator = false;
//if form has been submitted attempt to save it
if ( !empty( $_POST['save-testimonial'] ) ) {
      $validator = true;
	//start title validation
	if (isset ($_POST['title'])) {
		$title =  wp_strip_all_tags($_POST['title']);
	} if(strlen($title) < 5) {
	 $validator = false;
	 $error = "Please provide your name.";
	}//end title validation
	//start email validation
	if (isset ($_POST['client_email'])) {
		$client_email = wp_strip_all_tags($_POST['client_email']);
	} if(strlen($client_email) < 5 && $validator == true) {
	 $validator = false;
	 $error = "Please provide a valid email address.";
	}//end email validation
	//post city and state, no validation since they are not required
	if (isset ($_POST['title'])) {
		$client_city =  wp_strip_all_tags($_POST['client_city']);
	}
	if (isset ($_POST['client_state'])) {
		$client_state =  wp_strip_all_tags($_POST['client_state']);
	}
	 //start rating validation
	if (isset ($_POST['testimonial_rating'])) {
		$testimonial_rating = wp_strip_all_tags($_POST['testimonial_rating']);
	} if(strlen($testimonial_rating) < 1 && $validator == true)  {
	 $validator = false;
	 $error = "Please provide a rating.";
	}//end rating validation
	 //start description validation
	if (isset ($_POST['description'])) {
		$description = wp_strip_all_tags($_POST['description']);
	} if(strlen($description) < 50 && $validator == true) {
	 $validator = false;
	 $error = "Please provide a testimonial (at least 50 characters).";
	}//end description validation
	//start captcha
	 require_once('recaptchalib.php');
	 $privatekey = "6LdW588SAAAAAMJoxnDpqu4DdGGFAgAClkKVBgmv";
	 $resp = recaptcha_check_answer ($privatekey,
	 $_SERVER["REMOTE_ADDR"],
	 $_POST["recaptcha_challenge_field"],
	 $_POST["recaptcha_response_field"]);
	 if (!$resp->is_valid  && $validator == true) {
	 $validator = false;
	 $error = "Captcha failed. Please try again.";
       }//end captcha

       //only submit if validation passed
	if($validator == true) {
	// ADD THE FORM INPUT TO $testimonial_post ARRAY
	$testimonial_post = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'post_status'	=>	'private', 
	'post_type'		=>	'testimonial' 
	);
	//SAVE THE POST
	if($pid = wp_insert_post($testimonial_post)){
	add_post_meta( $pid, '_AIG_testimonial_rating', $testimonial_rating, true);
	add_post_meta( $pid, '_AIG_testimonial_email', $client_email, true);
	add_post_meta( $pid, '_AIG_testimonial_city', $client_city, true);
	add_post_meta( $pid, '_AIG_testimonial_state', $client_state, true);
	add_post_meta( $pid, '_AIG_testimonial_approved', '0', true);
	}
	//email message
	        global $notification_email;
		global $admin_url;
		global $blog_url;
		if(!isset($notification_email)) {
	       //if email is not set in options use admin email
		$notification_email = get_settings('admin_email');
		}
		$subject = "New testimonial submitted to " . $blog_url;
		$email_body =
		"Name: " . $title . "\n" . "\n" .
		"Email: " . $client_email . "\n" . "\n" ;
		if(!empty($client_city)){$email_body .="City: " . $client_city . "\n" . "\n" ;}
		if(!empty($client_state)){$email_body .="State: " . $client_state . "\n" . "\n" ;}
		$email_body .= "Rating: " . $testimonial_rating . " out of 5 stars" . "\n" . "\n" .
		"Testimonial: " . $description . "\n" . "\n" .
		"You must log-in to " . $admin_url .  "edit.php?post_type=testimonial and approve the testimonial in order for it to be visible on the site.";
		$mail_sent = wp_mail($notification_email, $subject, $email_body);
//if post did not save then post id returned is zero and we display an error message
if($pid == "0") {return '<h1>There has been an error</h1><p>Please call us for assistance</p>';}
//if post id is anything except zero we display a success message
else{
   global $thanks_url; global $enable_redirect;
   if(!empty($thanks_url)) {$redirect_url = $blog_url.'/'.$thanks_url;} else {$redirect_url = $blog_url;}
   $testimonial_form = '<h1>Thank you</h1><p>Your testimonial has been submitted. All testimonials are read and approved before appearing on the site.</p>';
   if($enable_redirect==1){
      $testimonial_form.="<script> function delayer(){top.location.href='" . $redirect_url . "'}setTimeout('delayer()', 5000)</script>";
   }
   echo $testimonial_form;
}
}//end validator if

} // end save post
//if form has not been submitted or validation fails then display it
if($validator == false) {
//Testimonial form
$testimonial_form = '';
$testimonial_form .= '<!-- start testimonial form -->
<form id="AIG_testimonial_form" name="new_post" method="post" action="" enctype="multipart/form-data"'; if($validator=="true") { $testimonial_form .= 'style="display:none;" '; } $testimonial_form .=' >
    <center>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="100%" colspan="2" align="center"><h1 align="center">Submit a Testimonial</h1></td>
	</tr>
	<tr>
		<td width="100%" colspan="2" align="center" class="php-error"'; if(!$error){$testimonial_form.='style="display:none;"';}$testimonial_form.='>'.$error; $testimonial_form.='</td>
	</tr>
	<tr>
            <td width="20%"><label>Name:</label></td>
            <td width="80%">
		<input class="input" type="text" name="title" value="'; $testimonial_form .= $title; $testimonial_form .= '" />		
	    </td>
        </tr>
	<tr>
            <td width="20%"><label>Email:</label></td>
            <td width="80%">
		<input class="input" type="email" name="client_email" value="'; $testimonial_form .= $client_email; $testimonial_form .= '" />
	    </td>
        </tr>
	<tr>
            <td width="20%"><label>City:</label></td>
            <td width="80%">
		<input class="input" type="text" name="client_city" value="'; $testimonial_form .= $client_city; $testimonial_form .= '" />
	    </td>
        </tr>
	<tr>
            <td width="20%"><label>State:</label></td>
            <td width="80%">
		<input class="input" type="text" name="client_state" value="'; $testimonial_form .= $client_state; $testimonial_form .= '" />
	    </td>
        </tr>
	<tr>
            <td width="20%"><label>Rating:</label></td>
            <td width="80%">
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="0.5" title="0.5 out of 5 stars"';  if($testimonial_rating == "0.5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="1" title="1 out of 5 stars"';  if($testimonial_rating == "1") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="1.5" title="1.5 out of 5 stars"';  if($testimonial_rating == "1.5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="2" title="2 out of 5 stars"';  if($testimonial_rating == "2") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="2.5" title="2.5 out of 5 stars"';  if($testimonial_rating == "2.5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="3" title="3 out of 5 stars"';  if($testimonial_rating == "3") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="3.5" title="3.5 out of 5 stars"';  if($testimonial_rating == "3.5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="4" title="4 out of 5 stars"';  if($testimonial_rating == "4") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="4.5" title="4.5 out of 5 stars"';  if($testimonial_rating == "4.5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    <input name="testimonial_rating" type="radio"  class="star {split:2}" value="5" title="5 out of 5 stars"';  if($testimonial_rating == "5") { $testimonial_form .= 'checked="checked"'; } $testimonial_form .= '>
	    </td>
        </tr>
	<tr>
            <td colspan="2" width="100%"><label>Testimonial:</label></td>
        </tr>
        <tr>
            <td colspan="2" width="95%"><textarea name="description" minlength="50" style="width:98%; height:200px; overflow:hidden; resize:none; ">'; $testimonial_form .= $description; $testimonial_form .='</textarea></td>
        </tr>
	<tr>
	<td colspan="2">';
	     require_once('recaptchalib.php');
	    $publickey = "6LdW588SAAAAAOLJ68x0ft1V3MLzLw-QGhVnP08E"; // you got this from the signup page
	    $testimonial_form.= recaptcha_get_html($publickey);
	 $testimonial_form.= '</td>
	</tr>
         <tr>
            <td colspan="2" width="100%" align="center"><center><input type="submit" value="Submit Testimonial" /></center></td>
        </tr>
    </table>
    </center>
    <input type="hidden" name="save-testimonial" value="true" style="display:none;" />
</form>
<!-- end testimonial form -->';


return $testimonial_form;
//end testimonial form
}// end else

}//end function

?>