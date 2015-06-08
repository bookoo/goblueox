<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	 <!-- footer Start: -->
        <footer>
          <div class="footer">
          	<div class="top_footer">
              <div class="wrap">
                   <ul class="top_footer_menu">
                    <li class="footer_logo"><a href="<?php echo home_url('/'); ?>" title="Blue Ox Heating & Air"><img src="<?php echo site_url(); ?>/images/blue-ox-heating-and-air-footer_logo.png" alt="Blue Ox Heating & Air Logo"></a></li>
 <?php //query_posts('category_name=our_mission&posts_per_page=');
				//while (have_posts() ) : the_post(); ?>                    
                    <li class="mission">
                    	<div class="h6-heading">Our Mission</div>
			<p>You can trust Blue Ox Heating & Air with your home comfort. Our team has 200 years of total combined air conditioning experience, making us a leader in the industry.</p>
                    </li>
 <?php //endwhile;
	//wp_reset_query(); ?>                   
                    <li class="contact">
                <p>Blue Ox Heating & Air</p>
		<p>1428 3rd St North</p>
		<p>Minneapolis, MN  55411</p>
		<span class="first_contact">p. <strong>952.641.0099</strong></span>
		<span>e. <strong><a href="mailto:service@goblueox.com">service@goblueox.com</a></strong></span>    
		</li>
                    <li class="sitemap">
                    	<div class="h6-heading">Sitemap</div>
                    	<?php wp_nav_menu( array('menu' => 'footer_nav', 'menu_id' => '', 'menu_class' => '', 'container' => '' )); ?>
                    </li>
                   </ul>
                   <div class="top_footer_menu1">
                        <ul>
                        	<li class="footer_logo"><a href="<?php echo home_url('/'); ?>" title="Blue Ox Heating & Air"><img src="<?php echo site_url(); ?>/images/blue-ox-heating-and-air-footer_logo.png" alt="Blue Ox Heating & Air Logo"></a></li>
<?php query_posts('category_name=our_mission&posts_per_page=');
				while (have_posts() ) : the_post(); ?>                    
                    <li class="mission">
                    	<div class="h6-heading"><?php the_title(); ?></div>
                        <?php the_content(); ?>
                    </li>
 <?php endwhile;
	wp_reset_query(); ?> 
                        </ul>
                        <ul class="no_bg">
                        	<li class="contact">
                            	<?php dynamic_sidebar('Blue_Ox : Contact_footer'); ?>
                            </li>
                            <li class="sitemap">
                            	<div class="h6-heading">Sitemap</div>
                                <?php wp_nav_menu( array('menu' => 'footer_nav', 'menu_id' => '', 'menu_class' => '', 'container' => '' )); ?>
                            </li>
                        </ul>
                        <div class="clear"></div>
                   </div>
                   <div class="clear"></div>
                   <?php dynamic_sidebar('Blue_Ox : Social_link'); ?> 
              </div>
            </div>
            <div class="clear"></div>
            <div class="bottom_footer">
            	<div class="wrap">
                	<?php dynamic_sidebar('Blue_Ox : Copyright'); ?>  
                </div>
            </div>   
         </div>   
        </footer>
        <!-- footer End: -->
</div>
<!-- End: Wrapper-->
<?php wp_footer(); ?>
</body>
</html>
