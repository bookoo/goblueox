<?php



/**



 * The Header for our theme.



 *



 * Displays all of the <head> section and everything up till <div id="main">



 *



 * @package WordPress



 * @subpackage Twenty_Twelve



 * @since Twenty Twelve 1.0



 */



?><!DOCTYPE html>



<!--[if IE 7]>



<html class="ie ie7" <?php language_attributes(); ?>>



<![endif]-->



<!--[if IE 8]>



<html class="ie ie8" <?php language_attributes(); ?>>



<![endif]-->



<!--[if !(IE 7) | !(IE 8)  ]><!-->



<html <?php language_attributes(); ?>>



<!--<![endif]-->



<head>



<meta name="msvalidate.01" content="8324B20EC9D2A75E15024CB60682A2CA" />



<meta charset="<?php bloginfo( 'charset' ); ?>" />



<!-- <meta name="viewport" content="width=device-width" /> -->



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->



<meta name="viewport" content="width=device-width, initial-scale=1">







<?php /* <title><?php wp_title( '|', true, 'right' ); ?></title> */ ?>



<link rel="profile" href="http://gmpg.org/xfn/11" />



<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<!-- Start: Favicon -->



<link rel="shortcut icon" type="image/x-icon" href="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/favicon.ico">

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />

  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />

  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />

  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />

  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-60x60.png" />

  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-120x120.png" />

  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-76x76.png" />

  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-152x152.png" />



<!-- End: Favicon -->




<!-- start number replacer -->
<script type="text/javascript"><!--
var vs_account_id = "CtjSZ1RmMmhJeQCO";
//--></script>
<script type="text/javascript" src="http://27.xg4ken.com/media/number-changer/voicestar/number-changer.php">
</script>
<!-- end ad widget -->





<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery-1.11.2.min.js" type="text/javascript"></script>



<!--<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/css3-mediaqueries.js" type="text/javascript"></script>-->



<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->





<script type="text/javascript">



	$(document).ready(function(){



		$('a.nav_link').click(function(){



			$('.nav_phone ul.first,.iphone_header .nav_phone ul.first ').slideToggle();



		});



	});



</script>





<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>



<!--[if lt IE 9]>



<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/html5.js" type="text/javascript"></script>



<![endif]-->



<?php wp_head(); ?>





<!--[if lt IE 9]>



<style type="text/css">



	.first_container h1 { font-size:4.6em; padding-left:80px;}



	.first_container h5	{ padding-left:50px;}



	.second_conatiner h2 { line-height:68px;}



	.footer         { min-height:400px;}



ul.top_footer_menu li.footer_logo img	{ margin-left:0px;}



.second_conatiner h2	{ padding-left:60px;}



.second_conatiner h5	{ padding-left:50px;}



</style>

<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

<![endif]-->



<!-- end ad widget --></head>





<body<?php if (!is_front_page() and !is_page_template('new-front-page.php')) echo ' class="inside"'; ?>>





<!-- Nav Menu -->

<div id="mobile-nav-div">

<?php wp_nav_menu( array('menu' => 'Header_nav', 'menu_id' => '', 'menu_class' => 'first', 'container' => '', 'walker' => new description_walker() )); ?>

</div>

<div id="overlay"></div>



<!-- Start: Wrapper-->



<div class="wrapper">



        <!-- header Start: -->



        <header>



        	<div class="iphone_header">



            	<?php dynamic_sidebar('Blue_Ox : comfort is a call away'); ?>



                 <div class="nav_phone">



                                     <a href="#" class="nav_link">&nbsp;</a>



                  </div>



            </div>



            <div class="header">



            <!-- Inner Header Start -->



              <div class="inner_header">



              	  <div class="wrap">



                            <div class="top_header">



                                <p><a class="buttonorange" href="http://www.goblueox.com/schedule-online/">Schedule Service</a></p>



                                <?php dynamic_sidebar('Blue_Ox : comfort is a call away'); ?>



                            </div>



                            <div class="clear"></div>



                            <!-- Navigation Start -->






                              <div class="navigation">



                                <span itemscope itemtype="http://schema.org/HVACBusiness" class="logo"><a itemprop="url" href="<?php echo home_url('/'); ?>" title="Blue Ox Heating And Air"><img itemprop="logo" src="http://www.goblueox.com/images/cropped-Blue-Ox-Logo.png" width="275px" height="102px" alt="Blue Ox Heating And Air"></a></span>



                                <nav>



                                  <div class="nav">



                                   <?php wp_nav_menu( array('menu' => 'Header_nav', 'menu_id' => '', 'menu_class' => '', 'container' => '' )); ?>



                                   </div>



                                   <div class="nav_phone" id="nav">



                                     <a href="#" class="nav_link">&nbsp;</a>



                                  </div>



                                </nav>


                               </div> <!-- end class navigation -->







                            <!-- Navigation End -->



                            <div class="clear"></div>



<?php if (is_front_page()) : ?>                            <!-- Banner Start -->



                            	<section>



                                	<div class="banner">



<!-- Custom edits, plumber picture, banner area -->



                                      <div id="slideshow">



                                      	<div class="cycle-slides">



                                                <div class="inner_banner">



                                                    <div class="left_banner">



                                                        <div class="h1-heading">Leading the charge</div>



                                                        <div class="h2-heading">IN HEATING &amp; COOLING.</div>



                                                        <p>The most trusted heating and cooling experts in Minneapolis – St. Paul, our team makes sure you’re comfortable to every degree.</p>



                                                        <span><a href="/about-us/">About Blue Ox</a></span>



                                                    </div>



                                                    <div class="right_banner new-home">



                                                       <img src="<?php echo site_url(); ?>/images/Blue-Ox-Heating-and-Air-Van.png" width="100%" height="auto" alt="Blue Ox Plumber"/>



                                                    </div>



                                                </div>



                                            </div>



                                       </div>



                                    </div>



                                </section>



                            <!-- Banner End -->



			    <?php endif; ?>





                      </div>



              	 </div>



              <!-- Inner Header End -->



            </div>



        </header>



        <!-- header End: -->