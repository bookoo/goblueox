<?php /**

 * Registers our main widget area and the front page widget areas.

 *

 * @since Twenty Twelve Child 1.0

 */

 

 

add_action( 'init', 'my_add_excerpts_to_pages' );



function my_add_excerpts_to_pages() {



add_post_type_support( 'page', 'excerpt' );

}









add_action('admin_menu','wphidenag');

function wphidenag() {

remove_action( 'admin_notices', 'update_nag', 3 );

}









//#######################################//

function remove_some_widgets(){

    unregister_sidebar( 'sidebar-1' );

    unregister_sidebar( 'sidebar-2' );

    unregister_sidebar( 'sidebar-3' );

}

add_action( 'widgets_init', 'remove_some_widgets', 11 );

//######################################//









if(!function_exists('Blue_Ox_widgets_init')) :



function Blue_Ox_widgets_init() {



	register_sidebar( array(

		'name' => __( 'Blue_Ox : comfort is a call away', 'Blue_Ox' ),

		'id' => 'sidebar-5',

		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'Blue_Ox' ),

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	) );



	register_sidebar( array(

		'name' => __( 'Blue_Ox : Contact_footer', 'Blue_Ox' ),

		'id' => 'sidebar-6',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'Blue_Ox' ),

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '<h6>',

		'after_title' => '</h6>',

	) );



	register_sidebar( array(

		'name' => __( 'Blue_Ox : Social_link', 'Blue_Ox' ),

		'id' => 'sidebar-7',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'Blue_Ox' ),

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	) );

	

	register_sidebar( array(

		'name' => __( 'Blue_Ox : Copyright', 'Blue_Ox' ),

		'id' => 'sidebar-8',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'Blue_Ox' ),

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	) );



	register_sidebar( array(

		'name' => __( 'Blue_Ox : For when text', 'Blue_Ox' ),

		'id' => 'sidebar-9',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'Blue_Ox' ),

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	) );

	

	

}//

	

endif;//function exists	



add_action( 'widgets_init', 'Blue_Ox_widgets_init' );



function virtual_robots_disallow( $output, $public ) {     $output .= "\n" . 'Disallow: /thankyou' . "\n";     return $output; }  add_filter( 'robots_txt', 'virtual_robots_disallow', 10, 2 );


/* Breadcrumbs */
    function dimox_breadcrumbs() {  
  
    /* === OPTIONS === */  
    $text['home']     = 'Home'; // text for the 'Home' link  
    $text['category'] = 'Archive by Category "%s"'; // text for a category page  
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page  
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page  
    $text['author']   = 'Articles Posted by %s'; // text for an author page  
    $text['404']      = 'Error 404'; // text for the 404 page  
  
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show  
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show  
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show  
    $delimiter      = ''; // delimiter between crumbs
    $thepath = $_SERVER['REQUEST_URI'];
    $theuri ='http://www.blueoxair.com' . $thepath;
    $before         = '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">'; // tag before the current crumb  
    $after          = '</span><link itemprop="url" href="' . $theuri . '" /></div>'; // tag after the current crumb  
    /* === END OF OPTIONS === */  
  
    global $post;  
    $home_link    = home_url('/');  
    $link_before  = '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';  
    $link_after   = '</div>';  
    $link_attr    = ' itemprop="url"';  
    $link         = $link_before . '<a href="%1$s" ' . $link_attr . '><span itemprop="title">%2$s</span></a>' . $link_after;  
    $parent_id    = $parent_id_2 = $post->post_parent;  
    $frontpage_id = get_option('page_on_front');  
  
    if (is_home() || is_front_page()) {  
  
        if ($show_on_home == 1) echo '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . $home_link . '" itemprop="url">' . $text['home'] . '</a></div>';  
  
    } else {  
  
        echo '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';  
        if ($show_home_link == 1) {  
            echo '<a href="' . $home_link . '" itemprop="url"><span itemprop="title">' . $text['home'] . '</span></a>';
            echo '</div>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;  
        }  
  
        if ( is_category() ) {  
            $this_cat = get_category(get_query_var('cat'), false);  
            if ($this_cat->parent != 0) {  
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);  
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
                echo $cats;  
            }  
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;  
  
        } elseif ( is_search() ) {  
            echo $before . sprintf($text['search'], get_search_query()) . $after;  
  
        } elseif ( is_day() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
            echo $before . get_the_time('d') . $after;  
  
        } elseif ( is_month() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo $before . get_the_time('F') . $after;  
  
        } elseif ( is_year() ) {  
            echo $before . get_the_time('Y') . $after;  
  
        } elseif ( is_single() && !is_attachment() ) {  
            if ( get_post_type() != 'post' ) {  
                $post_type = get_post_type_object(get_post_type());  
                $slug = $post_type->rewrite;  
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);  
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;  
            } else {  
                $cat = get_the_category(); $cat = $cat[0];  
                $cats = get_category_parents($cat, TRUE, $delimiter);  
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
                echo $cats;  
                if ($show_current == 1) echo $before . get_the_title() . $after;  
            }  
  
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
            $post_type = get_post_type_object(get_post_type());  
            echo $before . $post_type->labels->singular_name . $after;  
  
        } elseif ( is_attachment() ) {  
            $parent = get_post($parent_id);  
            $cat = get_the_category($parent->ID); $cat = $cat[0];  
            $cats = get_category_parents($cat, TRUE, $delimiter);  
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
            echo $cats;  
            printf($link, get_permalink($parent), $parent->post_title);  
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;  
  
        } elseif ( is_page() && !$parent_id ) {  
            if ($show_current == 1) echo $before . get_the_title() . $after;  
  
        } elseif ( is_page() && $parent_id ) {  
            if ($parent_id != $frontpage_id) {  
                $breadcrumbs = array();  
                while ($parent_id) {  
                    $page = get_page($parent_id);  
                    if ($parent_id != $frontpage_id) {  
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));  
                    }  
                    $parent_id = $page->post_parent;  
                }  
                $breadcrumbs = array_reverse($breadcrumbs);  
                for ($i = 0; $i < count($breadcrumbs); $i++) {  
                    echo $breadcrumbs[$i];  
                    if ($i != count($breadcrumbs)-1) echo $delimiter;  
                }  
            }  
            if ($show_current == 1) {  
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;  
                echo $before . get_the_title() . $after;  
            }  
  
        } elseif ( is_tag() ) {  
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;  
  
        } elseif ( is_author() ) {  
            global $author;  
            $userdata = get_userdata($author);  
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;  
  
        } elseif ( is_404() ) {  
            echo $before . $text['404'] . $after;  
        }  
  
        if ( get_query_var('paged') ) {  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
            echo __('Page') . ' ' . get_query_var('paged');  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
        }  
  
        echo '<!-- .breadcrumbs -->';  
  
    }  
} // end dimox_breadcrumbs()

function aig_breadcrumbs() {
    if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
}
add_shortcode( 'do_aig_breadcrumbs', 'aig_breadcrumbs' );

    //sets image path for uploads to root/images by default
    update_option('upload_path', 'images' );

    //sets image folder organization by year/month to 0 (false)
    update_option('uploads_use_yearmonth_folders', '0' );

    //register init script
    function aig_init_script() {
	wp_register_script( 'validation', get_stylesheet_directory_uri() . '/js/jquery.validate.js', 'jquery', '1', false );  
        wp_enqueue_script( 'validation' );
	
	wp_register_script( 'init', get_stylesheet_directory_uri() . '/js/init.js', 'jquery', '1', false );  
        wp_enqueue_script( 'init' );  
    }
    add_action( 'wp_enqueue_scripts', 'aig_init_script' );
    
    remove_action( 'wp_head', 'feed_links', 2 );
    
    //menu
     function add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
	    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
		$parents[] = $item->menu_item_parent;
	    }
	}
	foreach ( $items as $item ) {
	    if ( in_array( $item->ID, $parents ) ) {
		$item->classes[] = 'menu-parent-item';
	    }
	}
	return $items;    
    }
    add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
    
    class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args)
	{
	       global $wp_query;
	       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
       
	       $class_names = $value = '';
       
	       $classes = empty( $item->classes ) ? array() : (array) $item->classes;
       
	       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
	       $class_names = ' class="'. esc_attr( $class_names ) . ' ' . 'menu-level-' . $depth . '"';
       
	       $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
       
	       $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	       $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	       $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	       $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
       
	       //$description  = ! empty( $item->title ) ? '<div class="bottom">'.esc_attr( $item->attr_title ).'</div>' : '';
       
	       if($depth != 0)
	       {
		 $description = $append = $prepend = "";
	       }
       
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
	    $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
	    $item_output .= $description.$args->link_after;
	    $item_output .= '</a>';
	    $item_output .= $args->after;
       
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
       
	function start_lvl(&$output, $depth) {
	    $indent = str_repeat("\t", $depth);
	    $output .= "\n$indent<ul class=\"sub-menu level-".$depth."\">";
	}
    }

?>