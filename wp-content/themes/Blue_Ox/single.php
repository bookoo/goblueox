<?php get_header(); ?>

        <!-- Fourth Container Start -->

        <section>

        	<div class="fourth_container">

            	<div class="wrap">

               	  <div class="left_content_area">

                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                    	<div class="post">

                            <div class="title">

                                <?php the_title(); ?>

                            </div><!--//title-->
				<div class="post-date">

					<?php the_date(); ?>

				</div>

                            <div class="excerpt">

                             <?php the_content(); ?>

                            </div><!--//excerpt-->
                        </div><!--//post-->

                        <?php endwhile; // end of the loop. ?>

											<div class="singlePreviousNext">
                      	<p>
                      		<?php previous_post('&#8656; %', '', 'yes'); ?>
													<span> | | </span>
													<?php next_post('% &#8658;', '', 'yes'); ?>
                      	</p>
                      </div>

                    </div><!-- end left content area -->

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