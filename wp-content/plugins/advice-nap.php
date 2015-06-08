<?php
/*
Plugin Name: Advice NAP Plugin
Plugin URI: http://www.adviceinteractivegroup.com
Description: A rich snippet plugin for businesses
Version: 2.0
Author: Ryan Nielsen
Author URI: The Internets
License: GPL2
*/

//Register Testimonial Custom Post Type
add_action( 'init', 'register_cpt_nap' );
add_action ( 'add_meta_boxes', 'cpt_nap_add_metabox' );
add_action ( 'save_post', 'advnap_save_meta');



function register_cpt_nap() {
    $labels = array(
        'name' => _x( 'NAPs', 'NAP' ),
        'singular_name' => _x( 'NAP', 'NAP' ),
        'add_new' => _x( 'Add New', 'NAP' ),
        'add_new_item' => _x( 'Add New NAP', 'NAP' ),
        'edit_item' => _x( 'Edit NAP', 'NAP' ),
        'new_item' => _x( 'New NAP', 'NAP' ),
        'view_item' => _x( 'View NAP', 'NAP' ),
        'search_items' => _x( 'Search NAPs', 'NAP' ),
        'not_found' => _x( 'No NAPs found', 'NAP' ),
        'not_found_in_trash' => _x( 'No NAPs found in Trash', 'NAP' ),
        'parent_item_colon' => _x( 'Parent NAP:', 'NAP' ),
        'menu_name' => _x( 'NAPs', 'NAP' ),
    );


    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => false, // ver. 2 - change from true to false to disable single nap pages
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
    );

    register_post_type( 'NAP', $args );
}

function cpt_nap_metabox( $post ) {

        //RETRIEVE METADATA VALUES IF THEY EXIST
        $advnap_business_name        = get_post_meta( $post->ID, 'advnap_business_name', true);
        $advnap_business_description = get_post_meta( $post->ID, 'advnap_business_description', true);
        $advnap_business_address     = get_post_meta( $post->ID, 'advnap_business_address', true);
        $advnap_business_city        = get_post_meta( $post->ID, 'advnap_business_city', true);
        $advnap_business_state       = get_post_meta( $post->ID, 'advnap_business_state', true);
        $advnap_business_zip         = get_post_meta( $post->ID, 'advnap_business_zip', true);
        $advnap_business_telephone   = get_post_meta( $post->ID, 'advnap_business_telephone', true);
?>

        <style type="text/css">
                
                .advnap_field {width: 300px;}
                .advnap_textarea {width: 300px; height: 100px;}

        </style>

        <table id=" advnap_table" width="300">
                <tr>
                        <td>Business Name</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_name" value="<?php print esc_attr( $advnap_business_name ); ?>" /></td>
                </tr>
                <tr>
                        <td>Address</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_address" value="<?php print esc_attr( $advnap_business_address ); ?>" /></td>
                </tr>
                <tr>
                        <td>City</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_city" value="<?php print esc_attr( $advnap_business_city ); ?>" /></td>
                </tr>
                <tr>
                        <td>State</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_state" value="<?php print esc_attr( $advnap_business_state ); ?>" /></td>
                </tr>
                <tr>
                        <td>Zipcode</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_zip" value="<?php print esc_attr( $advnap_business_zip ); ?>" /></td>
                </tr>
                
                <tr>
                        <td>Telephone</td>
                </tr>
                <tr>
                        <td><input class="advnap_field" type="text" name="advnap_business_telephone" value="<?php print esc_attr( $advnap_business_telephone ); ?>" /></td>
                </tr>
        </table>
<?php

}

function advnap_save_meta($post_id) {

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;      
       
                update_post_meta( $post_id, 'advnap_business_name', strip_tags ( $_POST['advnap_business_name'] ) );
                update_post_meta( $post_id, 'advnap_business_address', strip_tags ( $_POST['advnap_business_address'] ) );
                update_post_meta( $post_id, 'advnap_business_city', strip_tags ( $_POST['advnap_business_city'] ) );
                update_post_meta( $post_id, 'advnap_business_state', strip_tags ( $_POST['advnap_business_state'] ) );
                update_post_meta( $post_id, 'advnap_business_zip', strip_tags ( $_POST['advnap_business_zip'] ) );
                update_post_meta( $post_id, 'advnap_business_telephone', strip_tags ( $_POST['advnap_business_telephone'] ) );
       
}



function cpt_nap_add_metabox() {
        add_meta_box( 'advice-nap-meta-box', 'NAP Data', 'cpt_nap_metabox', 'NAP', 'normal', 'high' );
}

function advnap_shortcode( $attr ) {

$advnap_shortcode_id =      $attr['nap_id'];

$advnap_biz_name = get_post_meta ( $advnap_shortcode_id, 'adv_business_name', true  );

$nap_return_value = "<style type='text/css'>.nap p {margin:0; padding:0;}</style><div class='nap'><span itemscope itemtype='http://schema.org/LocalBusiness'><div class='name'><span itemprop='name'>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_name', true  ) . "</span></div><div class='address'><span itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'><span itemprop='streetAddress'>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_address', true  ) . "</span><span itemprop='addressLocality'><br/>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_city', true  ) . "</span>, <span itemprop='addressRegion'>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_state', true  ) . "</span> <span itemprop='postalCode'>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_zip', true  ) . "</span></span></div> <div class='phone'>Phone: <span itemprop='telephone'>" . get_post_meta ( $advnap_shortcode_id, 'advnap_business_telephone', true  ) . "</span></div></span></div>"; // ver. 2 - changed spans with break tags to divs. added div with class of "nap" for styling.  made output one line to avoid auto p tags. set paragraph margin and padding to 0 for .nap just in case

return $nap_return_value;

}  

add_shortcode( 'nap', 'advnap_shortcode' );

?>
