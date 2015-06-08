<?php
/*
Plugin Name: AIG Coupons
Plugin URI: http://www.adviceinteractivegroup.com
Description: Easy coupon management for AIG client sites
Version: 0.5
Author: Austin Gray
Author URI: http://www.adviceinteractivegroup.com
Last Updated: 08/01/2013
*/

//Setup variables
$findstring = 'http://';
$replacestring = '';
$siteurl = str_replace(array($findstring, 'localhost'),$replacestring,site_url());
$docroot = $_SERVER['DOCUMENT_ROOT'];
//Create coupon folder for popup files

//Create metaboxes
add_action( 'add_meta_boxes', 'AIG_coupons_meta_box_add' );
function AIG_coupons_meta_box_add()  
{
    $post_types = get_post_types();
    foreach ( $post_types as $post_type ) {
	add_meta_box( 'AIG_coupons_metabox', 'AIG Coupon Alt Tags', 'aig_coupons_metabox_cb', $post_type );
    }
} 
//render metaboxes
function aig_coupons_metabox_cb( $post )  
{  
    // $post is already set, and contains an object: the WordPress post  
    global $post;
    $options = get_option( 'aig_coupons_settings' );
    $values = get_post_custom( $post->ID );
    $number_of_coupons = (isset($options['coupons-amount']) && $options['coupons-amount'] != '') ? $options['coupons-amount'] : '';
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    for ($i = 1; $i <= $number_of_coupons; $i++) {
	$alt_tag = $values["aig-coupon-$i-alt-tag"][0];
    ?>
    <p> 
        <label for="my_meta_box_text">Alt Tag <?php echo $i; ?></label> 
        <input type="text" name="aig-coupon-<?php echo $i; ?>-alt-tag" id="aig-coupon-<?php echo $i; ?>-alt-tag" value="<?php echo $alt_tag; ?>" /> 
    </p>
    <?php
    }
}
//save metabox data
add_action( 'save_post', 'AIG_coupons_meta_box_save' );  
function AIG_coupons_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
     
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 
     
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post', $post_id ) ) return;
      
    // now we can actually save the data  
    $allowed = array(   
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
    // Make sure your data is set before trying to save it  
    if( isset( $_POST['aig-coupon-1-alt-tag'] ) )  
        update_post_meta( $post_id, 'aig-coupon-1-alt-tag', $_POST['aig-coupon-1-alt-tag'] );
    if( isset( $_POST['aig-coupon-2-alt-tag'] ) )  
        update_post_meta( $post_id, 'aig-coupon-2-alt-tag', $_POST['aig-coupon-2-alt-tag'] );
    if( isset( $_POST['aig-coupon-3-alt-tag'] ) )  
        update_post_meta( $post_id, 'aig-coupon-3-alt-tag', $_POST['aig-coupon-3-alt-tag'] );
} 

//Create plugin menu in admin dashboard
add_action( 'admin_menu', 'aig_coupons_admin_menu' );
function aig_coupons_admin_menu() {
	add_menu_page( 'AIG Coupons Plugin', 'AIG Coupons', 'administrator', __FILE__, 'aig_coupons_options', '', 99999 );
}

//Enable saving Admin menu options
add_action('admin_init', 'aig_coupons_register_settings');
function aig_coupons_register_settings(){
    register_setting('aig_coupons_settings', 'aig_coupons_settings');
}
add_action('admin_notices', 'aig_coupons_admin_notices');
function aig_coupons_admin_notices(){
   settings_errors();
}

//Enqueue default .css file
function couponCss() {
	wp_enqueue_style('aig-coupon-css', plugins_url() . '/AIG_coupons/css/aig-coupons-style.css', array(), null, 'all');
}
add_action('admin_head', 'couponCss');
add_action('wp_enqueue_scripts','couponCss');


	// echo "<link rel='stylesheet' id='aig-coupon-css-css'  href='http://www.goblueox.com/wp-content/plugins/AIG_coupons/css/aig-coupons-style.css?ver=4.1.1' type='text/css' media='all' />";

//Create and add custom css to document head
function aig_coupons_css() {
	$options = get_option( 'aig_coupons_settings' );
	$number_of_coupons = (isset($options['coupons-amount']) && $options['coupons-amount'] != '') ? $options['coupons-amount'] : '';
	?>
	<script>
	function CouponPopup(url) {
		popupWindow = window.open(
			url,'popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
	}
	</script>
	<style type="text/css">
		.aig-coupons-wrapper {
			width: 100%;
		}
		.aig-coupons-container {
			width:<?php echo $options['content-width']; ?>px;
		}
		.aig-coupons-container a {
			color:<?php echo $options['coupons-text-color']; ?>
		}
		<?php
		for ($i = 1; $i <= $number_of_coupons; $i++) {
			echo '.aig-coupon-' . $i . ' {';
			echo 'background:url("' . $options["bgImage$i"] . '");';
			echo 'width:' . $options["coupon-$i-width"] . 'px;';
			echo 'height:' . $options["coupon-$i-height"] . 'px;';
			echo 'color:' . $options["coupons-text-color"] . ';';
			if ($options["coupons-border"] == 'on') echo 'border:2px dashed #333333;';
			echo '}';
			$coupon_inputfields = $options["coupon-$i-inputfields"];
			for ($j = 1; $j <= $coupon_inputfields; $j++) {
				echo '.coupon-' . $i . '-inputfield-' . $j . ' {';
				echo 'font-size: ' . $options["coupon-$i-inputfield-$j-fontsize"] . 'px;';
				echo 'color: ' . $options["coupon-$i-inputfield-$j-color"] . ';';
				echo 'left: ' . $options["coupon-$i-inputfield-$j-xcoords"] . 'px;';
				echo 'top: ' . $options["coupon-$i-inputfield-$j-ycoords"] . 'px;';
				if ($options["coupon-$i-inputfield-$j-bold"] == 'on') { echo 'font-weight:bold;'; }
				if ($options["coupon-$i-inputfield-$j-italic"] == 'on') { echo 'font-style:italic;'; }
				echo '}';
			}
		}
		?>
	</style>
	<?php
}
add_action('wp_head', 'aig_coupons_css');
if (isset($_GET['page']) && $_GET['page'] == 'AIG_coupons/aig_coupons.php') {
    add_action('admin_head', 'aig_coupons_css');
}

//Print admin content area
function aig_coupons_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	wp_enqueue_script( 'aig-coupons-js', plugins_url() .'/AIG_coupons/js/aig-coupons.js', array('jquery') );
	wp_enqueue_script('jquery-minicolors-script', plugins_url('/js/jquery-miniColors/jquery.minicolors.js', __FILE__), array('jquery'), '2.0', false);
	wp_enqueue_style( 'jquery-minicolors-style', plugins_url( '/js/jquery-miniColors/jquery.minicolors.css' , __FILE__ ) );
	?>
	<div class="wrap aig-coupons-admin">
	<div id="icon-themes" class="icon32"><br /></div>
	<h2>AIG Coupons</h2>
	<form action="options.php" method="post" enctype="multipart/form-data">
	<?php
        settings_fields( 'aig_coupons_settings' );
        do_settings_sections( __FILE__ );
        $options = get_option( 'aig_coupons_settings' );
	$number_of_coupons = $options['coupons-amount'];
	?>
		<h3>Welcome to the AIG Coupons plugin beta!</h3>
		<div class="row">
			To use this plugin just style your coupons using the inputs below. Once you are done drop the shortcode <b>[show_aig_coupons]</b> into your site or template.<br />
			After you make any changes make sure to hit the 'Save' button for it to take effect.
			<p>
			To change position of text in text coupons, just click on the text and use the arrow keys. Hold down shift+direction for faster movement.
			</p>
		</div>
		<h4>Setup</h4>
		<div class="toggle-element">
		<div class="row">
			<label for="content-width">Content area width (in px):</label>
			<input type="text" name="aig_coupons_settings[content-width]" id="content-width" value="<?php echo $options['content-width']; ?>" />
		</div>
		<div class="row">
			<label for="coupons-amount">How many coupons?</label>
			<input type="text" name="aig_coupons_settings[coupons-amount]" id="coupons-amount" value="<?php echo $options['coupons-amount']; ?>" />
		</div>
		<div class="column">
			<label for="coupons-border">Add borders</label>
			<input type="checkbox" name="aig_coupons_settings[coupons-border]" id="coupons-border"<?php if ($options["coupons-border"] == 'on') echo ' checked'; ?> />
		</div>
		</div>
		<div class="row">
			<?php
				for ($i = 1; $i <= $number_of_coupons; $i++) {
					echo '<h4>Coupon ' . $i . '</h4>';
					echo '<div class="admin-single-coupon toggle-element">';
						echo '<div class="row">';
							echo '<label for="imgOrTxt' . $i . '">Is this coupon an image or text?</label>';
							echo '<input type="radio" name="aig_coupons_settings[imgOrTxt' . $i . ']" value="image"'; ?><?php if ($options["imgOrTxt$i"] == 'image') echo 'checked'; ?><?php echo '> Image ';
							echo '<input type="radio" name="aig_coupons_settings[imgOrTxt' . $i . ']" value="text"'; ?><?php if ($options["imgOrTxt$i"] == 'text') echo 'checked'; ?><?php echo '> Text';
						echo '</div>';
						if ($options["imgOrTxt$i"] == 'text') :
						echo '<div class="row">';
							echo '<label for="bgimage' . $i . '">Background Image:</label>';
							echo '<input type="text" name="aig_coupons_settings[bgImage' . $i . ']" id="bgimage' . $i . '" readonly="readonly" value="' . $options["bgImage$i"] . '">';
							echo '<input class="upload_button button" type="button" value="Select BG Image" />';
						echo '</div>';
						echo '<div class="row">';
							echo '<div class="column">';
								echo '<label for="coupon-' . $i . '-width">Width (in px):</label>';
								echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-width]" id="coupon-' . $i . '-width" class="settings-width-height" value="' . $options["coupon-$i-width"] . '" />';
							echo '</div>';
							echo '<div class="column">';
								echo '<label for="coupon-' . $i . '-height">Height (in px):</label>';
								echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-height]" id="coupon-' . $i . '-height" class="settings-width-height" value="' . $options["coupon-$i-height"] . '" />';
							echo '</div>';
						echo '</div>';
						echo '<div class="row">';
							echo '<input type="hidden" name="aig_coupons_settings[coupon-' . $i . '-inputfields]" id="coupon-' . $i . '-inputfields" value="' . $options["coupon-$i-inputfields"] . '" />';
						echo '</div>';
						echo '<div class="row">';
							echo '<label for="coupon-' . $i . '-alttag">Fallback Title Attribute Text:</label>';
							echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-alttag]" id="coupon-' . $i . '-alttag" class="long-input" value="' . $options["coupon-$i-alttag"] . '" />';
						echo '</div>';
						echo '<div class="all-the-text-inputs-' . $i . ' all-the-text-inputs row">';
						$coupon_inputfields = $options["coupon-$i-inputfields"];
						for ($j = 1; $j <= $coupon_inputfields; $j++) {
							echo '<div class="row input-field-row">';
								echo '<div class="column">';
									echo '<label for="coupon-' . $i . '-inputfield-' . $j . '">Text:</label>';
									echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . ']" id="coupon-' . $i . '-inputfield-' . $j . '" class="real-time-text long-input" value="' . $options["coupon-$i-inputfield-$j"] . '" />';
								echo '</div>';
								echo '<div class="column font-size-column">';
									echo '<label for="coupon-' . $i . '-inputfield-' . $j . '-fontsize">Font Size:</label>';
									echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-fontsize]" id="coupon-' . $i . '-inputfield-' . $j . '" class="real-time-fontsize" value="' . $options["coupon-$i-inputfield-$j-fontsize"] . '" />';
									echo '<div class="inc-button font-size-button">+</div><div class="dec-button font-size-button">-</div>';
								echo '</div>';
								echo '<div class="column">';
									echo '<label for="coupon-' . $i . '-inputfield-' . $j . '-color">Color:</label>';
									echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-color]" id="coupon-' . $i . '-inputfield-' . $j . '" class="minicolors minicolors-input" value="' . $options["coupon-$i-inputfield-$j-color"] . '" />';
								echo '</div>';
								echo '<div class="column">';
									echo '<label for="coupon-' . $i . '-inputfield-' . $j . '-bold"><b>Bold</b></label>';
									echo '<input type="checkbox" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-bold]" id="coupon-' . $i . '-inputfield-' . $j . '" class="real-time-bold" ' . (($options["coupon-$i-inputfield-$j-bold"] == 'on') ? 'checked':'') . ' />';
								echo '</div>';
								echo '<div class="column">';
									echo '<label for="coupon-' . $i . '-inputfield-' . $j . '-italic"><i>Italic</i></label>';
									echo '<input type="checkbox" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-italic]" id="coupon-' . $i . '-inputfield-' . $j . '" class="real-time-italic" ' . (($options["coupon-$i-inputfield-$j-italic"] == 'on') ? 'checked':'') . ' />';
								echo '</div>';
								echo '<div class="column">';
									echo '<input type="hidden" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-xcoords]" id="coupon-' . $i . '-inputfield-' . $j . '-xcoords" class="x-coords" value="' . $options["coupon-$i-inputfield-$j-xcoords"] . '" />';
								echo '</div>';
								echo '<div class="column">';
									echo '<input type="hidden" name="aig_coupons_settings[coupon-' . $i . '-inputfield-' . $j . '-ycoords]" id="coupon-' . $i . '-inputfield-' . $j . '-ycoords" class="y-coords" value="' . $options["coupon-$i-inputfield-$j-ycoords"] . '" />';
								echo '</div>';
							echo '</div>';
						}
							echo '<div class="row add-input-here-' . $i . '">';
								echo '<div class="column">';
									echo '<input class="button add_input_button" type="button" value="Add Text Field" data-id="' . $i . '" />';
								echo '</div>';
								echo '<div class="column">';
									echo '<input class="button remove_input_button" type="button" value="Remove" data-id="' . $i . '" />';
								echo '</div>';
							echo '</div>';
							echo '<div style="clear:both;"></div>';
						echo '</div>';
						$html = '';
						$html .= '<html>';
						$html .= '<head>';
						$html .= '<link rel="stylesheet" property="stylesheet" type="text/css" href="' . plugins_url() . '/AIG_coupons/css/aig-coupons-style.css">';
						$html .= '<script src="' . plugins_url() . '/AIG_coupons/ga-analytics.js">';
						$html .= '<style>';
						$html .= '.aig-coupon {';
						$html .= 'background:url("' . $options["bgImage$i"] . '");';
						$html .= 'width:' . $options["coupon-$i-width"] . 'px;';
						$html .= 'height:' . $options["coupon-$i-height"] . 'px;';
						if ($options["coupons-border"] == 'on') $html.= 'border:2px dashed #333333;';
						$html .= '}';
						for ($j = 1; $j <= $coupon_inputfields; $j++) {
						$html .= '.coupon-' . $i . '-inputfield-' . $j . ' {';
						$html .= 'font-size: ' . $options["coupon-$i-inputfield-$j-fontsize"] . 'px;';
						$html .= 'color: ' . $options["coupon-$i-inputfield-$j-color"] . ';';
						$html .= 'left: ' . $options["coupon-$i-inputfield-$j-xcoords"] . 'px;';
						$html .= 'top: ' . $options["coupon-$i-inputfield-$j-ycoords"] . 'px;';
						if ($options["coupon-$i-inputfield-$j-bold"] == 'on') { $html .= 'font-weight:bold;'; }
						if ($options["coupon-$i-inputfield-$j-italic"] == 'on') { $html .= 'font-style:italic;'; }
						$html .= '}';
						}
						$html .= '</style>';
						$html .= '</head>';
						$html .= '<body>';
						$html .= '<p><center>';
						$html .= '<br />';
						$html .= '<div class="aig-coupon">';
						for ($j = 1; $j <= $coupon_inputfields; $j++) {
						$html .= '<div class="coupon-inputfieldtext coupon-' . $i . '-inputfield-' . $j . '">' . $options["coupon-$i-inputfield-$j"] . '</div>';
						}
						$html .= '</div>';
						$html .= '<br />';
						$html .= '<br />';
						$html .= '<input type="button" onClick="window.print()" value="Print This Page"/>';
						$html .= '</center></p>';
						$html .= '</body>';
						$html .= '</html>';
						global $docroot;
						global $siteurl;
						$theurlname = $options["coupon-$i-urlname"];
						echo '<div class="row">';
							echo '<div class="column">';
								echo '<label for="coupon-' . $i . '-urlname">Filename (no spaces):</label>';
								echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-urlname]" id="coupon-' . $i . '-urlname" value="' . $options["coupon-$i-urlname"] . '" />';
						echo '</div>';
							echo '<div class="column">';
								echo '<label>Path to coupon popup file</label>';
								echo '<div class="urlnamediv">http://' . $siteurl . "/aig-coupons/$theurlname.html" . '</div>';
								$file = $_SERVER['DOCUMENT_ROOT'] . "/aig-coupons/$theurlname.html"; 
								$open = fopen($file, "w") or die ("could not create coupon file"); 
								fwrite($open, $html); 
								fclose($open);
							echo '</div>';
						echo '</div>';
						if (empty($theurlname)) {
						echo '<div class="row" style="color:red;font-weight:bold;">MUST SET POP-UP FILENAME</div>';
						}
						?>
						<div class="single-coupon-preview">
							<div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
							<?php for ($j = 1; $j <= $coupon_inputfields; $j++) { ?>
								<div class="coupon-inputfieldtext coupon-<?php echo $i; ?>-inputfield-<?php echo $j; ?>" tabindex="-1"><?php echo $options["coupon-$i-inputfield-$j"]; ?></div>
							<?php } ?>
							</div>
						</div>
					<?php
					endif;
					if ($options["imgOrTxt$i"] == 'image') :
					echo '<div class="row">';
					echo '<label for="couponImage' . $i . '">Coupon Image:</label>';
					echo '<input type="text" name="aig_coupons_settings[couponImage' . $i . ']" id="couponImage' . $i . '" readonly="readonly" value="' . $options["couponImage$i"] . '">';
					echo '<input class="upload_button class="button" type="button" value="Select Coupon Image" />';
					echo '</div>';
					echo '<div class="row all-the-text-inputs">';
						echo '<div class="column">';
							echo '<label for="coupon-' . $i . '-alttag">Fallback Alt Attribute Text:</label>';
							echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-alttag]" id="coupon-' . $i . '-alttag" class="long-input" value="' . $options["coupon-$i-alttag"] . '" />';
						echo '</div>';
					echo '</div>';
					$html = '';
						$html .= '<html>';
						$html .= '<head>';
						$html .= '<link rel="stylesheet" type="text/css" href="' . plugins_url() . '/AIG_coupons/css/aig-coupons-style.css">';
						$html .= '<script src="' . plugins_url() . '/AIG_coupons/analytics.js"></script>';
						$html .= '<style>';
						$html .= '.aig-coupon {';
						if ($options["coupons-border"] == 'on') $html.= 'border:2px dashed #333333;';
						$html .= '}';
						$html .= '</style>';
						$html .= '</head>';
						$html .= '<body>';
						$html .= '<p><center>';
						$html .= '<br />';
						$html .= '<div class="aig-coupon">';
						$html .= '<img src="' . $options["couponImage$i"] . '">';
						$html .= '</div>';
						$html .= '<br />';
						$html .= '<br />';
						$html .= '<input type="button" onClick="window.print()" value="Print This Page"/>';
						$html .= '</center></p>';
						$html .= '</body>';
						$html .= '</html>';
						global $docroot;
						global $siteurl;
						$theurlname = $options["coupon-$i-urlname"];
						echo '<div class="row">';
							echo '<div class="column">';
								echo '<label for="coupon-' . $i . '-urlname">Filename (no spaces):</label>';
								echo '<input type="text" name="aig_coupons_settings[coupon-' . $i . '-urlname]" id="coupon-' . $i . '-urlname" value="' . $options["coupon-$i-urlname"] . '" />';
						echo '</div>';
							echo '<div class="column">';
								echo '<label>Path to coupon popup file</label>';
								echo '<div class="urlnamediv">http://' . $siteurl . "/aig-coupons/$theurlname.html" . '</div>';
								$file = $_SERVER['DOCUMENT_ROOT'] . "/aig-coupons/$theurlname.html"; 
								$open = fopen($file, "w") or die ("could not create coupon file"); 
								fwrite($open, $html); 
								fclose($open);
							echo '</div>';
						echo '</div>';
						if (empty($theurlname)) {
						echo '<div class="row" style="color:red;font-weight:bold;">MUST SET POP-UP FILENAME</div>';
						}
						?>
						<div class="single-coupon-preview">
							<div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
								<img src="<?php echo $options["couponImage$i"]; ?>">
							</div>
						</div>
						<?php
					endif;
					echo '</div>';
				}
			?>
		</div>
		<h4>Commit Changes</h4>
		<div class="row">
			<input type="submit" name="submit" value="Save">	
		</div>
		
	</form>
	<hr>
	<p><b>These are your current coupons</b> (the gray background only shows up in this admin panel):</p>
	<?php echo do_shortcode('[show_aig_coupons]'); ?>
	</div>
	<?php
}

add_shortcode( 'show_aig_coupons', 'show_aig_coupons_function' );

function show_aig_coupons_function() {
	$options = get_option( 'aig_coupons_settings' );
	$coupons_content_width = (isset($options['content-width']) && $options['content-width'] != '') ? $options['content-width'] : '';
	$coupons_content_height = (isset($options['content-height']) && $options['content-height'] != '') ? $options['content-height'] : '';
	$number_of_coupons = (isset($options['coupons-amount']) && $options['coupons-amount'] != '') ? $options['coupons-amount'] : '';
	$values = get_post_custom( $post->ID );
	?>
	<div class="aig-coupons-wrapper">
		<div class="aig-coupons-container">
			<?php
				for ($i = 1; $i <= $number_of_coupons; $i++) {
					if ($options["imgOrTxt$i"] == 'text') :	?>
					<a onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=620,height=500'); return false;" href="<?php echo site_url(); ?>/aig-coupons/<?php echo $options["coupon-$i-urlname"]; ?>.html"><div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
					<?php $coupon_inputfields = $options["coupon-$i-inputfields"]; ?>
						<?php for ($j = 1; $j <= $coupon_inputfields; $j++) { ?>
							<div class="coupon-inputfieldtext coupon-<?php echo $i; ?>-inputfield-<?php echo $j; ?>"><?php echo $options["coupon-$i-inputfield-$j"]; ?></div>
						<?php } ?>
					</div></a>
					<?php endif;
					if ($options["imgOrTxt$i"] == 'image') : ?>
					<?php $alt_tag = $values['aig-coupon-' . $i . '-alt-tag'][0]; ?>
					<?php if (!isset($alt_tag) OR ($alt_tag == '')) { $alt_tag = $options["coupon-$i-alttag"]; } ?>
					<a onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=620,height=500'); return false;" href="<?php echo site_url(); ?>/aig-coupons/<?php echo $options["coupon-$i-urlname"]; ?>.html"><div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
					<img src="<?php echo $options["couponImage$i"]; ?>" alt="<?php echo $alt_tag; ?>">
					</div></a>
					<?php endif;
				}
			?>
			<span class="stretch"></span>
		</div>
	</div>
	<?php
}

add_shortcode( 'aig_single_coupon', 'render_single_coupon' );

function render_single_coupon( $id ) {
	ob_start();
	$i = $id['coupon'];
	$options = get_option('aig_coupons_settings');
	$values = get_post_custom ( $post-> ID );
	if ($options["imgOrTxt$i"] == 'text') :	?>
	<div class="aig-single-coupon">
		<a onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=620,height=500'); return false;" href="<?php echo site_url(); ?>/aig-coupons/<?php echo $options["coupon-$i-urlname"]; ?>.html">
		<div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
		<?php $coupon_inputfields = $options["coupon-$i-inputfields"]; ?>
		<?php for ($j = 1; $j <= $coupon_inputfields; $j++) { ?>
			<div class="coupon-inputfieldtext coupon-<?php echo $i; ?>-inputfield-<?php echo $j; ?>"><?php echo $options["coupon-$i-inputfield-$j"]; ?></div>
		<?php } ?>
		</div>
		</a>
	</div>
	<?php endif;				
	if ($options["imgOrTxt$i"] == 'image') : ?>
	<div class="aig-single-coupon">
	<?php $alt_tag = $values['aig-coupon-' . $i . '-alt-tag'][0]; ?>
	<?php if (!isset($alt_tag) OR ($alt_tag == '')) { $alt_tag = $options["coupon-$i-alttag"]; } ?>
		<a onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=620,height=500'); return false;" href="<?php echo site_url(); ?>/aig-coupons/<?php echo $options["coupon-$i-urlname"]; ?>.html">
		<div class="<?php echo 'aig-coupon aig-coupon-' . $i ?>">
			<img src="<?php echo $options["couponImage$i"]; ?>" alt="<?php echo $alt_tag; ?>">
		</div>
		</a>
	</div>
	<?php endif;
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
}

//word press upload essentials
function omnizz_options_enqueue_scripts() {
    wp_register_script( 'aig-coupons-js', plugins_url() .'/AIG_coupons/js/aig-coupons.js', array('jquery','media-upload','thickbox') );
    
        wp_enqueue_script('jquery');
 
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
 
        wp_enqueue_script('media-upload');
        wp_enqueue_script('omnizz-upload');
	 
}
add_action('admin_enqueue_scripts', 'omnizz_options_enqueue_scripts');

