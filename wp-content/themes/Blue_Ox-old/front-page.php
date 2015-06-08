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
      <!-- firstcontainer Start -->
        <section>
        	<div class="first_container">
            	<div class="wrap">
                	<?php dynamic_sidebar('Blue_Ox : For when text'); ?>
                    <ul>
<?php
$page1 = get_page_by_path('air-conditioning');
query_posts('post_type=page&page_id='.$page1->ID);
//while(have_posts()): the_post();
?>                   
                    	<li class="first_box">
                        	<div class="inner_box">
                            	<div class="h6-heading">Minneapolis, MN</div>
                                <div class="clear"></div>
                                <div class="h2-heading">102&deg;</div>
                            </div>
                            <span><a href="/ac-service/" title="Air Conditioning Services">Air Conditioning Services</a></span>
                        </li>
<?php
//endwhile;
wp_reset_query();
?>                        
<?php
$page1 = get_page_by_path('heating');
query_posts('post_type=page&page_id='.$page1->ID);
//while(have_posts()): the_post();
?>                        
                        <li class="second_box">
                        	<div class="inner_box">
                            	<div class="h6-heading">Minneapolis, MN</div>
                                <div class="clear"></div>
                                <div class="h2-heading">-15&deg;</div>
                            </div>
                            <span><a href="/hvac/" title="Heating Services">Heating Services</a></span>
                        </li>
<?php
//endwhile;
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
                        <span><a href="<?php echo site_url(); ?>/coupons/" title="Heating & AC Coupons">Coupons</a></span>
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
                <div class="wrap">
                	<div class="h2-heading">On the road and ready!</div>
                    <div class="h6-heading">Our trained technicians are in your community,</div>
                    <div class="h6-heading">delivering quality products and superior services.</div>
                    <div class="h4-heading"><?php $mykey_values = get_post_custom_values('subtitle3'); print $mykey_values[0]; ?></div>
                    <span><a href="/contact-us/" title="Contact Blue Ox">Comfort is a Call Away</a></span>
                    <div class="clear"></div>
                    <span class="truck_img"><img src="<?php echo site_url(); ?>/images/truck.png" alt="Blue Ox Heating & Air Van"></span>
                    <div class="clear"></div>
                    <div class="h5-heading">200+ years experience.</div>
                    <p>With over 200 years combined air conditioning experience, you
can trust Blue Ox Heating & Air with your home comfort system.</p>
                </div>         
            </div>
         </section>   
        <!-- Third Container End -->
        <!-- Fourth Container Start -->
        <section>
        	<div class="fourth_container">
            	<div class="wrap">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
               	  <div class="left_content_area">
                    	<?php the_content(); ?>
                    </div>
 <?php endwhile; // end of the loop. ?>
   <?php //query_posts('category_name=cool_content&posts_per_page=');
	//			while (have_posts() ) : the_post(); ?> 
                    <div class="right_content_area">
                    	<!--<div class="h4-heading">Cool Stuff</div>
                        <ul>
<li>Convenient Night &amp; Weekend Appointments Available for New Equipment Purchase</li>
<li>Background-Checked Techs</li>
<li>Repair &amp; Installation</li>
<li>Mini-Splits, Blower Coils, Boilers, Hydronic &amp; More</li>
<li>Free Estimates on New Equipment</li>
<li class="list">Financing Options</li>
<li class="list">Savings &amp; Coupons</li>
</ul>--> <?php get_sidebar(); ?>
                    </div>
<?php //get_sidebar(); ?>
<?php //endwhile;
	//wp_reset_query(); ?>                 
                    <div class="clear"></div>
                </div>
            </div>
         </section>   
        <!-- Fourth Container End -->
<?php get_footer(); ?>