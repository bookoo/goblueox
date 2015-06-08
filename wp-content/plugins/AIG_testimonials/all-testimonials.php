<?php
add_shortcode ( 'all_testimonials', 'all_testimonials' );
function all_testimonials() {

    //define output variable and start testimonial container
    $all_testimonial_output='<!-- start testimonials --><div id="AIG_testimonials">';
    //define counter variable to be used for evens and odds
    $i=1;
    /*custom query string for get posts
     select all posts
     where meta key _AIG_testimonial_approved
     has a value of on
     only select published posts (we dont want trash)
     select from posts within out custom post type testimonial
     selects posts dated before now
     display in descending order
    */
    $args = array(
    'meta_key'=>'_AIG_testimonial_approved',
    'meta_value'=>'1',
    'post_status'=>'publish',
    'post_type'=>'testimonial',
    'posts_per_page' => 9999 
);
    //query posts with out specific parameters
    static $count = 0;
    global $post;
    $xglobals = $GLOBALS;
    $all_testimonial_loop = new WP_Query( $args );
    if ( $all_testimonial_loop->have_posts() ) {
    while ( $all_testimonial_loop->have_posts() ): $all_testimonial_loop->the_post();
    //set variables for custom fields
    $testimonial_rating = get_post_meta($post->ID, '_AIG_testimonial_rating', true);
    $testimonial_city = get_post_meta($post->ID, '_AIG_testimonial_city', true);
    $testimonial_state = get_post_meta($post->ID, '_AIG_testimonial_state', true);
    $star_rating = toStars(($testimonial_rating*2));
    $testimonial_name = get_the_title();
    $testimonial_content = get_the_content();
    $testimonial_date = get_the_date();
    $robot_date = get_the_date('Y-m-d');
    //start container for each testimonial
    $all_testimonial_output.='<!-- start testimonial -->';
    $all_testimonial_output.='<div itemtype="http://schema.org/Review" itemscope="" class="testimonial">';
    //only display stars in enabled in backend
    global $enable_stars; if($enable_stars==1){
    $all_testimonial_output.='<span  itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">';
    $all_testimonial_output.='<meta itemprop="worstRating" content = "0.5">';
    $all_testimonial_output.='<meta itemprop="bestRating" content = "5.0">';
    $all_testimonial_output.='<meta itemprop="ratingValue" content = "';
    $all_testimonial_output.=$testimonial_rating;
    $all_testimonial_output.='"></span>';
    $all_testimonial_output.='<div class="testimonial-stars" title="';
    $all_testimonial_output.=$testimonial_rating;
    $all_testimonial_output.=' out of 5 stars">'.$star_rating.'</div>by ';
    }
    $all_testimonial_output.='<span class="testimonial-client" itemprop="author">'.$testimonial_name.'</span> ';
    //only show city/state if they have value and are turned on in backend
    global $enable_location; if(!empty($testimonial_city) && !empty($testimonial_state) && ($enable_location==1)) { $all_testimonial_output.='of '.$testimonial_city.', '.$testimonial_state. ' '; }
    //only display date if enabled in backend
    global $enable_date; if($enable_date==1){
    $all_testimonial_output.='<meta itemprop="datePublished" content="'.$robot_date.'">';
    $all_testimonial_output.='on <span class="testimonial-date">'.$testimonial_date.'</span> ';
    }
    $all_testimonial_output.='<!-- start testimonial content --><div class="testimonial-text">'.$testimonial_content.'</div><!-- end testimonial content -->';
    //end container for each testimonial
    $all_testimonial_output.='</div>';
    $all_testimonial_output.='<!-- end testimonial -->';
  
    endwhile;
    }
    else {
    //if no posts are found, display this message
    $all_testimonial_output='<!-- start testimonials --><div id="AIG_testimonials"><h2>No Testimonials Found</h2>';
    }
    //end testimonial container
    $all_testimonial_output.='</div><!-- end testimonials -->';
    return $all_testimonial_output;
    //reset query so other queries arent limited by our arguments
    wp_reset_query();
    wp_reset_postdata();
}
?>