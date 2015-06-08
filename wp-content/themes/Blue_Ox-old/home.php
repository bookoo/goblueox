<?php get_header(); ?>
        <!-- Fourth Container Start -->
        <section>
        	<div class="fourth_container">
            	<div class="wrap">
               	  <div class="left_content_area">
                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    	<div class="post">
                            <div class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div><!--//title-->
                            <div class="excerpt">
                             <?php the_excerpt(); ?>
                            </div><!--//excerpt-->
                        </div><!--//post-->
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div class="right_content_area">
			<?php get_sidebar(); ?>
                    </div><!-- END RIGHT CONTENT AREA -->
                    <div class="clear"></div>
                </div>
            </div>
         </section>   
        <!-- Fourth Container End -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>