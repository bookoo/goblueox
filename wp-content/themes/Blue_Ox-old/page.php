<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php /*	    
      <!-- firstcontainer Start -->
        <section>
        	<div class="first_container">
            	<div class="wrap">
                	<?php dynamic_sidebar('Blue_Ox : For when text'); ?>
                    <ul>
                    
<?php
$page1 = get_page_by_path('air-conditioning');
query_posts('post_type=page&page_id='.$page1->ID);
while(have_posts()): the_post();
?>                   
                    
                    	<li class="first_box">
                        
                        	<div class="inner_box">
                            	<div class="h6-heading"><?php $mykey_values = get_post_custom_values('thumb'); print $mykey_values[0]; ?></div>
                                <div class="clear"></div>
                                <div class="h2-heading"><?php $mykey_values = get_post_custom_values('temp'); print $mykey_values[0]; ?></div>
                            </div>
                            <span><a href="<?php $mykey_values = get_post_custom_values('text_link'); print $mykey_values[0]; ?>"><?php $mykey_values = get_post_custom_values('text'); print $mykey_values[0]; ?></a></span>
                        </li>
                        
<?php
endwhile;
wp_reset_query();
?>                        


 
 
<?php
$page1 = get_page_by_path('heating');
query_posts('post_type=page&page_id='.$page1->ID);
while(have_posts()): the_post();
?>                        
                        <li class="second_box">
                        	<div class="inner_box">
                            	<div class="h6-heading"><?php $mykey_values = get_post_custom_values('thumb'); print $mykey_values[0]; ?></div>
                                <div class="clear"></div>
                                <div class="h2-heading"><?php $mykey_values = get_post_custom_values('temp'); print $mykey_values[0]; ?></div>
                            </div>
                            <span><a href="<?php $mykey_values = get_post_custom_values('text_link'); print $mykey_values[0]; ?>"><?php $mykey_values = get_post_custom_values('text'); print $mykey_values[0]; ?></a></span>
                        </li>
<?php
endwhile;
wp_reset_query();
?>                        
                       
                        
                        
                        
                        
                    </ul>
                </div>
            </div>
          </section>  
        <!-- Firstcontainer End -->

		<!-- Second Container Start -->
        	<section>
                <div class="second_conatiner">
                
                
 <?php
$page1 = get_page_by_path('coupons');
query_posts('post_type=page&page_id='.$page1->ID);
while(have_posts()): the_post();
?>                 
                
                    <div class="wrap">
                        <div class="h2-heading"><?php $mykey_values = get_post_custom_values('Hot Savings'); print $mykey_values[0]; ?></div>
                        <div class="h5-heading"><?php $mykey_values = get_post_custom_values('Subtitle call'); print $mykey_values[0]; ?></div>
                        <span><a href="<?php $mykey_values = get_post_custom_values('text_link'); print $mykey_values[0]; ?>"><?php $mykey_values = get_post_custom_values('text'); print $mykey_values[0]; ?></a></span>
                    </div>
                    
<?php
endwhile;
wp_reset_query();
?>                   
                    
                    
                </div>
            </section>
        <!-- Second Container End -->
        
        <!-- third Container Start -->
        <section>
     
        	<div class="third_container">
            	<div class="inner_third_container">
                	<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/bg_img.png" alt="">
                </div>
                <div class="inner_third_container1">
                	<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/bg_img1.png" alt="">
                </div>
                
<?php query_posts('category_name=on_the_road&posts_per_page=');
				while (have_posts() ) : the_post(); ?> 
                
                <div class="wrap">
                	<div class="h2-heading"><?php the_title(); ?></div>
                    <div class="h6-heading"><?php $mykey_values = get_post_custom_values('subtitle1'); print $mykey_values[0]; ?></div>
                    <div class="h6-heading"><?php $mykey_values = get_post_custom_values('subtitle2'); print $mykey_values[0]; ?></div>
                    <div class="h4-heading"><?php $mykey_values = get_post_custom_values('subtitle3'); print $mykey_values[0]; ?></div>
                    <span><a href="<?php $mykey_values = get_post_custom_values('text_link'); print $mykey_values[0]; ?>"><?php $mykey_values = get_post_custom_values('text'); print $mykey_values[0]; ?></a></span>
                    <div class="clear"></div>
                    <span class="truck_img"><?php the_post_thumbnail('full'); ?></span>
                    <div class="clear"></div>
                    <div class="h5-heading"><?php $mykey_values = get_post_custom_values('subtitle4'); print $mykey_values[0]; ?></div>
                    <?php the_excerpt(); ?>
                </div>
<?php endwhile;
	wp_reset_query(); ?>            
             
             
            </div>
         </section>   
        <!-- Third Container End -->
        */ ?>
        
        <!-- Fourth Container Start -->
        <section>
		
        	<div class="fourth_container">
            	<div class="wrap">
                
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                
               	  <div class="left_content_area">
			<?php if (!is_front_page()) : ?>
				<div id="breadcrumbs">
				<?php echo do_shortcode('[do_aig_breadcrumbs]'); ?>
				</div>
				<div class="clear"></div>
				<?php endif; ?>
                    	<?php the_content(); ?>
                    </div>
                    
 <?php endwhile; // end of the loop. ?>
        
                  
                    
   <?php //query_posts('category_name=cool_content&posts_per_page=');
	//			while (have_posts() ) : the_post(); ?> 
                                  
                    <div class="right_content_area">
			<?php get_sidebar(); ?>
                    </div><!-- END RIGHT CONTENT AREA -->

   <?php //endwhile;
	//wp_reset_query(); ?>                 
                    
                    <div class="clear"></div>
                </div>
            </div>
         </section>   
        <!-- Fourth Container End -->
        
    

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
