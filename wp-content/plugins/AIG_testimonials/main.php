<?php

/*
Plugin Name: Advice Testimonial Plugin
Author URI: http://www.adviceinteractivegroup.com
Description: Custom plugin to add testimonials. Visit settings to enter the page slug of the testimonials page and an email address to receive notifications of new testimonials. Testimonials submitted on the front-end will need to be reviewed and approved to become visible.
Version: 1.0
Author: Advice Interactive Group

Last edit by Andrew Taylor on 07-03-2012

The default wordpress fields of title and description are used as well as fields for email, city, state and rating

*/
//Capture email setting from plugin options, recipient will be used later in the form
$options = get_option('advice_testimonial');
$notification_email = $options['testimonial_email'];
if (!empty($testimonial_email)) {$recipient = $testimonial_email;}
$read_more = get_bloginfo('url') . '/' .$options['read_more'];
$thanks_url = $options['thanks_page'];
$enable_redirect = $options['enable_redirect'];
$enable_date = $options['enable_date'];
$enable_stars = $options['enable_stars'];
$enable_location = $options['enable_location'];
$blog_url = home_url();
$admin_url = admin_url();

//define plugin url
$plugin_url = plugins_url( basename( dirname( __FILE__ ) ) );

//Register Testimonial Custom Post Type
include_once('custom-post-type.php');

//only load the following on the admin side
if(is_admin()){
    //meta boxes
    include_once('metaboxes.php');
    //adding options to admin menu
    include_once('admin-options.php');
}
//only include shortcode processing on front end
else {
    //single rotating testimonial and it's shortcode
    include_once('single-testimonial.php');
    
    //list all testimonials and it's shortcode
    include_once('all-testimonials.php');
    
    //testimonial form and it's shortcode
    include_once('testimonial-form.php');
}

// function to convert rating to stars
function toStars ($n)
{
    $n = round($n*2,0)/2;
    $fullstar = floor($n/2);
    $halfstar = $n - ($fullstar*2) >= 0.5 ? 1 : 0;
    $blankstar = 5 - ($fullstar + $halfstar);
    global $plugin_url;
    return str_repeat("<img src='" . $plugin_url . "/images/fullstar.png' />", $fullstar)
            . str_repeat("<img src='" . $plugin_url . "/images/halfstar.png' />", $halfstar)
            . str_repeat("<img src='" . $plugin_url . "/images/blankstar.png' />", $blankstar);
}

//Register CSS with wordpress
function AIG_testimonial_styles()
{
        wp_register_style( 'testimonial-style', plugins_url( '/css/testimonial-style.css', __FILE__ ));
	wp_enqueue_style( array('star-style', 'testimonial-style') );
}
add_action( 'wp_enqueue_scripts', 'AIG_testimonial_styles' );

//enable shortcodes in sidebar widgets
add_filter('widget_text', 'do_shortcode');


?>