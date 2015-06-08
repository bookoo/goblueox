<?php
//register testimonials custom post type
add_action( 'init', 'register_cpt_testimonial' );

function register_cpt_testimonial() {

    $labels = array(
        'name' => _x( 'Testimonials', 'testimonial' ),
        'singular_name' => _x( 'Testimonial', 'testimonial' ),
        'add_new' => _x( 'New Testimonial', 'testimonial' ),
        'add_new_item' => _x( 'Add New Testimonial', 'testimonial' ),
        'edit_item' => _x( 'Edit Testimonial', 'testimonial' ),
        'new_item' => _x( 'New Testimonial', 'testimonial' ),
        'view_item' => _x( 'View Testimonial', 'testimonial' ),
        'search_items' => _x( 'Search Testimonials', 'testimonial' ),
        'not_found' => _x( 'No Testimonials Found', 'testimonial' ),
        'not_found_in_trash' => _x( 'No Testimonials Found In Trash', 'testimonial' ),
        'menu_name' => _x( 'Manage Testimonials', 'testimonial' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title','editor'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
    );

    register_post_type( 'testimonial', $args );
}





//change title of our custom post
function testimonial_change_default_title( $title ){
     $screen = get_current_screen();
     if  ( 'testimonial' == $screen->post_type ) {
          $title = 'Testimonial Author';
     }
     return $title;
}
 
add_filter( 'enter_title_here', 'testimonial_change_default_title' );


?>