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

                    <li class="footer_logo"><a href="<?php echo home_url('/'); ?>" title="Goto Blue Ox Heating and Air Homepage"><img src="<?php echo site_url(); ?>/images/Blue-Ox-Heating-and-Air-Small-Logo.png" width="100%" height="auto" alt="Blue Ox Heating And Air Logo"></a>

                    <a href="https://www.facebook.com/BlueOxAir"><img class="footer-social" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/facebook-blue.png" width="40px" height="39px" alt="Facebook"></a>

                     <a href="https://twitter.com/BlueOxAir"><img class="footer-social" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/twitter-blue.png" width="40px" height="39px" alt="Twitter"></a>

                      <a href="https://plus.google.com/106742711670621337389/posts"><img class="footer-social" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/gplus-blue.png" width="40px" height="39px" alt="Google Plus"></a>

                    <?php get_search_form( true ); ?>

                    </li>







 <?php //query_posts('category_name=our_mission&posts_per_page=');



				//while (have_posts() ) : the_post(); ?>







                    <li class="mission">



                    	<div class="h6-heading">Our Mission</div>



			<p>You can trust Blue Ox Heating & Air with your home comfort. Our team has 200 years of total combined air conditioning experience, making us a leader in the industry.</p>
			<img src="<?php echo site_url(); ?>/wp-content/themes/Blue_Ox/images/CMN-Logo-PP-horiz.png" style="margin-left:15px; margin-top:10px;" width="auto" height="90px" alt="Children's Miracle Network">
			<img src="<?php echo site_url(); ?>/wp-content/themes/Blue_Ox/images/BBB-logo.png" width="auto" height="90px" alt="Blue Ox BBB">


                    </li>







 <?php //endwhile;



	//wp_reset_query(); ?>







                    <li class="contact">



                <p>Blue Ox Heating & Air</p>



		<p>1428 North 3rd St.</p>



		<p>Minneapolis, MN  55411</p>



		<span class="first_contact">p. <strong>952.641.0099</strong></span>
		
		
		<p>5720 International Parkway</p>



		<p>New Hope, MN 55428</p>
		
		<span class="first_contact">p. <strong>763-425-8369</strong></span>
		




		<span>e. <strong><a href="mailto:service@goblueox.com">service@goblueox.com</a></strong></span>



		</li>



                    <li class="sitemap">



                    	<div class="h6-heading">Sitemap</div>



                    	<?php wp_nav_menu( array('menu' => 'footer_nav', 'menu_id' => '', 'menu_class' => '', 'container' => '' )); ?>



                    </li>



                   </ul>



                   <div class="top_footer_menu1">



                        <ul>



                        	<li class="footer_logo"><a href="<?php echo home_url('/'); ?>" title="Goto Blue Ox Heating and Air Homepage"><img src="<?php echo site_url(); ?>/images/blue-ox-heating-and-air-footer_logo.png" alt="Blue Ox Heating And Air Logo"></a></li>



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





              </div>



            </div>



            <div class="clear"></div>



            <div class="bottom_footer">



            	<div class="wrap">

<p>&copy; <?php echo date('Y'); ?> Blue Ox Heating & Air<span></span></p>

                	<?php dynamic_sidebar('Blue_Ox : Copyright'); ?>



                </div>



            </div>



         </div>



        </footer>



        <!-- footer End: -->










<!-- End: Wrapper-->

</div>









<?php wp_footer(); ?>















<!-- Google Code for Remarketing Tag -->

<!--

Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup

-->

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 976243202;

var google_custom_params = window.google_tag_params;

var google_remarketing_only = true;

/* ]]> */

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1px" width="1px" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/976243202/?value=0&amp;guid=ON&amp;script=0"/>

</div>

</noscript>



<script type="text/javascript">

setTimeout(function(){var a=document.createElement("script");

var b=document.getElementsByTagName("script")[0];

a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0023/3494.js?"+Math.floor(new Date().getTime()/3600000);

a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);

</script>




<script type="text/javascript">

$(document).ready(function(){

	var slideshow = new SlideShow($('#slideshow'));

	$(window).bind('resize',function(){

	slideshow.update();

	});

	$(window).trigger('resize');

	});



</script>


<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/respond.min.js" type="text/javascript"></script>




<script type="text/javascript" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery.responsive.cycle.slideshow.js"></script>






</body>



</html>



