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

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- Start: Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo dirname(get_bloginfo('stylesheet_url')); ?>/images/favicon.ico">
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

</head>

<?php if (!is_front_page()) { $addInsideClass = "inside"; } else { $addInsideClass = "is_front_page"; } ?>

<body <?php body_class( $addInsideClass ); ?>>


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
		<div id="hpqc">
			<div id="hpqc-tab"><img src="<?php echo site_url(); ?>/images/hpqc-tab.png"></div>
			<div id="hpqc-form">
				<div id="hpqc-close">&#91;x&#93;close</div>
				<form id="form771" name="form771" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate action="https://adviceinteractive.wufoo.com/forms/p5zwmgw0gup6m6/#public">
					<div id="foli1" class="notranslate      ">
						<label class="desc" id="title1" for="Field1">Name</label>
						<input id="Field1" name="Field1" type="text" class="field text medium" value="" maxlength="255" tabindex="1" onkeyup="" required />
					</div>
					<div id="foli2" class="notranslate      ">
						<label class="desc" id="title2" for="Field2">Phone</label>
						<input id="Field2" name="Field2" type="text" class="field text medium" value="" maxlength="255" tabindex="2" onkeyup="" required />
					</div>
					<div id="foli3" class="notranslate      ">
						<label class="desc" id="title3" for="Field3">Email</label>
						<input id="Field3" name="Field3" type="text" class="field text medium" value="" maxlength="255" tabindex="3" onkeyup="" required />
					</div>
					<div id="foli4" class="notranslate      ">
						<label class="desc" id="title4" for="Field4">What type of service are you requesting?</label>
						<textarea id="Field4" name="Field4" class="field textarea medium" spellcheck="true" rows="10" cols="50" tabindex="4" onkeyup="" required ></textarea>
					</div>
					<div class="buttons ">
						<input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit" />
					</div>
					<div class="hide">
						<label for="comment">Do Not Fill This Out</label>
						<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
						<input type="hidden" id="idstamp" name="idstamp" value="yDEwHduP2XjRIhEYV6oDk2+9cx9HJNjsMeTc7ccwTBs=" />
					</div>
				</form>
				<div id="errorBox"></div>
			</div>
		</div>
              	  <div class="wrap">
                            <div class="top_header">
                                <p>Comfort is a Call Away</p>
                                <?php dynamic_sidebar('Blue_Ox : comfort is a call away'); ?>
                            </div>
                            <div class="clear"></div>
                            <!-- Navigation Start -->
                            <section>
                              <div class="navigation">
                                <span itemscope itemtype="http://schema.org/HVACBusiness" class="logo"><a itemprop="url" href="<?php echo home_url('/'); ?>" title="Blue Ox Heating And Air Homepage"><img itemprop="logo" src="<?php echo site_url(); ?>/images/blue-ox-heating-and-air-logo.png" alt="Blue Ox Heating And Air Logo"></a></span>
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
                                      <div id="slideshow">
                                      	<div class="cycle-slides">
                                        
<?php 
//$i=0;
//query_posts('category_name=banner_slider&posts_per_page=-1&order=ASC');
			//while(have_posts()): the_post(); ?>                                      
                                        
                                                <div class="inner_banner">
                                                    <div class="left_banner">
                                                        <div class="h1-heading">Leading the charge</div>
                                                        <div class="h2-heading">in heating & air</div>
                                                        <p>As Minneapolis's most trusted heating and air conditioning experts, our team makes sure you are comfortable to every degree.</p>
                                                        <span><a href="/about-us/">About Blue Ox</a></span>
                                                    </div>
                                                    <div class="right_banner">
                                                       <img width="398" height="432" src="http://blueox.aigdev.net/wp-content/uploads/2013/08/banner_img1.png" class="attachment-full wp-post-image" alt="banner_img" />    
                                                    </div>
                                                </div>
                                                
<?php
//$i++;
//endwhile;
	//wp_reset_query(); ?> 
                                                
                                                
                                                
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
