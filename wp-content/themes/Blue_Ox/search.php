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


        <section>
		
        	<div class="fourth_container">
            	<div class="wrap">
                          <div class="left_content_area search" id="post-<?php the_ID(); ?>">
<?php if ( have_posts() ) ?>

<h2>Search Results</h2>

<?php
while ( have_posts() ) : the_post(); ?>
                

				<div class="clear"></div>
				
                    	<a class="search-result-link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    
                    
 <?php endwhile; // end of the loop. ?>
        
                  </div>
                    
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
