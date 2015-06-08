<?php

add_shortcode ( 'single_testimonial', 'single_testimonial' );

function single_testimonial() {
    
    wp_enqueue_script('advice_testimonial_script', plugins_url('/js/testimonial.js', __FILE__), array('jquery'), '1.0', true);
    
    //define output variable and start testimonial container

    $single_testimonial_output='<!-- start testimonials --><div id="AIG_single_testimonial">';

    //define counter variable to be used for evens and odds

    $i=1;

    /*custom query string for get posts

     select all posts

     where meta key _AIG_testimonial_approved

     has a value of on

     only select published posts (we dont want trash)

     select from posts within out custom post type testimonial

     selects posts dated before now

     display in random order

    */

    $args = array(

    'meta_key'=>'_AIG_testimonial_approved',

    'meta_value'=>'1',

    'post_status'=>'publish',

    'post_type'=>'testimonial',

    'orderby' => 'rand'

);

    //query posts with out specific parameters

    static $count = 0;

    global $post;

    $xglobals = $GLOBALS;

    $single_testimonial_loop = new WP_Query( $args );
    
            //excerpt read more function

function testimonial_excerpt_more($more) {

    global $post;

    global $read_more;

    //if testimonials page slug is defined in options show a read more link

    if(!empty($read_more)){

	return '.... <br /><a href="'.$read_more.'" class="read-more">Read more</a>';

    }

    //otherwise dont!

    else{

	return '...';

    }

}

//function for excerpt length

function testimonial_excerpt_length( $length ) {

	return 20;

}


    if ( $single_testimonial_loop->have_posts() ) {

    while ( $single_testimonial_loop->have_posts() ): $single_testimonial_loop->the_post();

    
    //add the filter for read more function
    
    add_filter('excerpt_more', 'testimonial_excerpt_more');
    //add filter for excerpt length
    
    add_filter( 'excerpt_length', 'testimonial_excerpt_length', 999 );

    //set variables for custom fields

    $single_testimonial_rating = get_post_meta($post->ID, '_AIG_testimonial_rating', true);

    $single_star_rating = toStars(($single_testimonial_rating*2));

    $single_testimonial_name = get_the_title();

    $single_testimonial_excerpt = get_the_excerpt();
    //start container for each testimonial

    $single_testimonial_output.='<!-- start testimonial --><div class="testimonial"';
    if($i==1){$single_testimonial_output.=' >'; $i++;}else{$single_testimonial_output.=' style="display:none;">'; }
    $single_testimonial_output.='<div class="testimonial-text">'.$single_testimonial_excerpt.'</div>';
    $single_testimonial_output.='<div class="testimonial-client">'.$single_testimonial_name.'</div> ';
    $single_testimonial_output.='</div><!-- end testimonial -->';
    
    //remove excerpt read more and length filters so they dont effect others
    remove_filter('excerpt_more', 'testimonial_excerpt_more');
    remove_filter('excerpt_more', 'testimonial_excerpt_lenth');

    endwhile;

    }

    else {

    //if no posts are found, display this message
    $single_testimonial_output='<!-- start testimonials --><div id="AIG_single_testimonial">';
    $single_testimonial_output.='<!-- start testimonial --><div class="testimonial">';
    $single_testimonial_output.='<div class="testimonial-text">No Testimonials Found</div>';
    $single_testimonial_output.='</div><!-- end testimonial -->';
    //end testimonial container
    }
    $single_testimonial_output.='</div><!-- end testimonials -->';

    return $single_testimonial_output;

    //reset query so other queries arent limited by our arguments

    wp_reset_query();

    wp_reset_postdata();

}

?>