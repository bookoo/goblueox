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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Start: Favicon -->
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
<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/respond.min.js" type="text/javascript"></script>
<script src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/css3-mediaqueries.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/js/jquery.responsive.cycle.slideshow.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var slideshow = new SlideShow($('#slideshow'));
	$(window).bind('resize',function(){
	slideshow.update();
	});
	$(window).trigger('resize');
	});
</script>
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
<!-- Start: Stylesheet-->
<link href="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/css/responsive.css" rel="stylesheet" type="text/css">
<!-- End: Stylesheet-->
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
<![endif]-->
<meta name="google-site-verification" content="liUC60G2SVnOOJwEg7wODEv8iOkFdeXGWhdXE4tXDSo" />
<meta name="msvalidate.01" content="35470E6A9C298445A4FA839B33969F83" />
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-45233155-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body<?php if (!is_front_page()) echo ' class="inside"'; ?>>
<!-- Start: Wrapper-->
<div class="wrapper">
        <!-- header Start: -->
        <header>
        	<div class="iphone_header">
            	<?php dynamic_sidebar('Blue_Ox : comfort is a call away'); ?>
                 <div class="nav_phone">
                                     <a href="#" class="nav_link">&nbsp;</a>
                                 <?php wp_nav_menu( array('menu' => 'Header_nav', 'menu_id' => '', 'menu_class' => 'first', 'container' => '' )); ?> 
                  </div> 
            </div>
            <div class="header">
            <!-- Inner Header Start -->
              <div class="inner_header">
              	  <div class="wrap">
                            <div class="top_header">
                                <p>Comfort is a Call Away</p>
                                <?php dynamic_sidebar('Blue_Ox : comfort is a call away'); ?>
                            </div>
                            <div class="clear"></div>
                            <!-- Navigation Start -->
                            <section>
                              <div class="navigation">
                                <span itemscope itemtype="http://schema.org/HVACBusiness" class="logo"><a itemprop="url" href="<?php echo home_url('/'); ?>" title="Blue Ox Heating & Air"><img itemprop="logo" src="<?php echo site_url(); ?>/images/blue-ox-heating-and-air-logo.png" alt="Blue Ox Heating & Air Logo"></a></span>
                                <nav>
                                  <div class="nav">
                                   <?php wp_nav_menu( array('menu' => 'Header_nav', 'menu_id' => '', 'menu_class' => '', 'container' => '' )); ?> 
                                   </div>
                                   <div class="nav_phone" id="nav">
                                     <a href="#" class="nav_link">&nbsp;</a>
                                        <?php wp_nav_menu( array('menu' => 'Header_nav', 'menu_id' => '', 'menu_class' => 'first', 'container' => '' )); ?>
                                  </div> 
                                </nav>
                               </div> 
                            </section>
                            <!-- Navigation End -->
                            <div class="clear"></div>
<?php if (is_front_page()) : ?>                            <!-- Banner Start -->
                            	<section>
                                	<div class="banner">
<!-- Custom edits, plumber picture, banner area -->
                                  <article id="blueoxPlumber">
                                    <img src="<?php bloginfo('url'); ?>/images/banner_img1.png" alt="Blue Ox HVAC Technician"/>
                                  </article>
                                      <div id="slideshow">
                                      	<div class="cycle-slides">
<?php 
$i=0;
query_posts('category_name=banner_slider&posts_per_page=-1&order=ASC');
			while(have_posts()): the_post(); ?>                                      
                                                <div class="inner_banner">
                                                    <div class="left_banner">
                                                        <div class="h1-heading"><?php the_title(); ?></div>
                                                        <div class="h2-heading"><?php $mykey_values = get_post_custom_values('Sub title'); print $mykey_values[0]; ?></div>
                                                        <?php the_excerpt(); ?>
                                                        <span><a href="<?php the_permalink(); ?>">About Blue Ox</a></span>
                                                    </div>
                                                    <div class="right_banner">
                                                       <?php the_post_thumbnail('full'); ?>
                                                    </div>
                                                </div>
<?php
$i++;
endwhile;
	wp_reset_query(); ?> 
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