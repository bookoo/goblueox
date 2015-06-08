<?php
/*
 * Template Name: Schedule Form on Right
 * Description: A Page Template with Schedule Form
 */

get_header(); ?>

        <section>
		
        	<div class="fourth_container">
            	<div class="wrap">
                
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                
               	  <div class="left_content_area" style="margin-top:60px" id="post-<?php the_ID(); ?>">
               	  <?php echo do_shortcode( '[gravityform id="3" name="Request your appointment online!"]' ) ?>
			
                    </div>
                    
 <?php endwhile; // end of the loop. ?>
        
                  
                    
   <?php //query_posts('category_name=cool_content&posts_per_page=');
	//			while (have_posts() ) : the_post(); ?> 
                                  
                    <div class="right_content_area" style="border-left:none;">
						<?php if (!is_front_page()) : ?>
							<div id="breadcrumbs">
							<?php echo do_shortcode('[do_aig_breadcrumbs]'); ?>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
                    	<?php the_content(); ?>
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