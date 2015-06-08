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



		<!-- Second Container Start -->
        	<section>
                <div class="second_conatiner" style="padding-top:20px;">
                
                  
                    <div class="wrap">
                        <div class="h5-heading">Our Minneapolis – St. Paul Heating and Cooling Services Include</div>
                        <div class="second_container_4col">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/sun.png">
                        	<a href="<?php echo get_permalink(6); ?>"><h5>Heating</h5></a>
                        </div>
                        <div class="second_container_4col">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/snow.png">
                        	<a href="<?php echo get_permalink(7); ?>"><h5>Cooling</h5></a>
                        </div>
						<div class="second_container_4col">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/air.png">
                        	<a href="<?php echo get_permalink(303); ?>"><h5>Indoor Air Quality</h5></a>
                        </div>
                        <div class="second_container_4col">
                        <img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/more.png">
                        	<a href="<?php echo get_permalink(301); ?>"><h5>More</h5></a>
                        </div>
                    </div>
                                
                    
                    
                </div>
            </section>
        <!-- Second Container End -->
        
        <!-- third Container Start -->
        <section>
     
        	<div class="third_container">
            	<div class="inner_third_container">
                	<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/bg_img.png" width="100%" height="auto" alt="">
                </div>
                <div class="inner_third_container1">
                	<img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/bg_img1.png" width="100%" height="auto" lt="">
                </div>
                

                
                <div class="wrap">
                	<div class="h2-heading">On the road and ready!</div>
                    <div class="h6-heading">Our trained technicians in Minneapolis – St. Paul are in your community,</div>
                    <div class="h6-heading">delivering quality products and superior services.</div>
                    <div class="h4-heading"><?php $mykey_values = get_post_custom_values('subtitle3'); print $mykey_values[0]; ?></div>
                    <span><a href="/contact-us/">Comfort is a Call Away</a></span>
                    <div class="clear"></div>
                    <div class="home-map">
                    	<?php echo do_shortcode('[wpgmza id="1"]'); ?>
                    </div>
                    <a href="<?php echo get_permalink(14); ?>"><span class="coupon_img"><img src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/coupon_button.png"></span></a>
                    <div class="clear"></div>
                    <div class="h5-heading">200+ years experience</div>
                    <p style="padding-bottom:50px;">With over 200 years of heating and cooling experience in Minneapolis – St. Paul, you can trust Blue Ox Heating & Air with your home comfort system.</p>
                </div>         
             
             
            </div>
         </section>   
        <!-- Third Container End -->
        
        
    

<?php get_footer(); ?>
