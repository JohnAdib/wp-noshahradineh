<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<base href="<?php bloginfo( 'url' ); ?>/" />

		<!--[if lte IE 8]><script>document.location = '<?php bloginfo( 'url' ); ?>/oldbrowser/';</script><![endif]-->
		<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->    
		   <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>


			<!-- Mobile Specific Metas   ================================================== -->
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

			<!-- CSS   ================================================== -->
			<link rel="stylesheet" href= "<?php echo get_template_directory_uri(); ?>/style.css">

			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
			<link type="text/plain" rel="author" href="<?php bloginfo( 'url' ); ?>/humans.txt" />
			
		<?php 
			wp_enqueue_script('jquery');
			wp_enqueue_script('custom', get_stylesheet_directory_uri() .'/js/custom.js');
			wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js'); 
			wp_enqueue_script('flexslider', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js'); 
			wp_enqueue_script('mobilemenu', get_stylesheet_directory_uri() .'/js/jquery.mobilemenu.js');
			wp_enqueue_script('fitvid', get_stylesheet_directory_uri() .'/js/fitvid.js'); 
		?>



		<?php wp_get_archives('type=monthly&format=link'); ?>
		<?php //comments_popup_script(); // off by default ?>

		<?php wp_head(); ?>
		   
	</head>

<body <?php body_class(); ?>><!-- the Body  -->
	
<div class="container" id="main">
 <div class="container">
	<div id="head">
	 <div id="aye" class="hidden-phone">يَا أَيُّهَا الَّذِينَ آمَنُوا إِذَا نُودِي لِلصَّلَاةِ مِن يَوْمِ الْجُمُعَةِ فَاسْعَوْا إِلَى ذِكْرِ اللَّهِ وَذَرُوا الْبَيْعَ ذَلِكُمْ خَيْرٌ لَّكُمْ إِن كُنتُمْ تَعْلَمُونَ</div>
	 <div id="leader-right"></div>
	 <div id="leader-left" class="hidden-phone"></div>
	 <a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?> | <?php bloginfo( 'description' ) ?>"><div id="logo"><h1><?php bloginfo( 'name' ) ?></h1></div></a>
	 <div id="slider-top" class="hidden-phone"></div>
	 <div id="slider-top-left" class="hidden-phone"></div>
	 

	  <div id="botmenu">
		 <?php wp_nav_menu( array( 'container_id' => 'subnav', 'theme_location' => 'primary','menu_id'=>'mixa' ,'menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
	  </div>
	 
	</div>
 </div>

<div class="container" id="casing">
 
 <div class="container" id="feature">
	<div id="slider-right" class="hidden-phone"></div>
	<div class="flexslider">
	    <ul class="slides">
		
	    <?php
				$query = new WP_Query( array ( 'category_name' =>'slider','posts_per_page' =>'3') );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	 	
		<li> 
				<?php $image_attr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'top_feature'); ?>	
				<a href="<?php the_permalink() ?>">	<img alt="<?php the_title(); ?>" src="<?php echo $image_attr[0]; ?>"></a>
				
				<div class="flex-caption"> 
					<h3> <?php the_title(); ?></h3> 
				</div>
			 
		</li>
	
		<?php endwhile; endif; wp_reset_query();?>
	    </ul>
	</div>
	<a href="/contact-emamjome/" title="ارتباط مستقیم با امام جمعه نوشهر"><div id="emamjome" class="visible-desktop"></div></a>
	<div id="topnews" class="hidden-phone">
	
		<h1><a href="/noshahr/" title="آرشیو آخرین اخبار نوشهر">خبر نوشهر</a></h1>
	 <ul>
	    <?php
				$query = new WP_Query( array ( 'category_name' =>'noshahr','posts_per_page' =>'3') );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	 
			<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
		<?php endwhile; endif; wp_reset_query();?>
		
		
	 </ul>
	</div>
 </div>
<!-- end feature -->

	<div class="clear"></div>
	<div id="ticker">
		<span id="ticker-right">&nbsp;</span>
		<span id="ticker-left">&nbsp;</span>
		<?php 
			//if(function_exists('ditty_news_ticker')){ditty_news_ticker(31);}
			if(function_exists('ditty_news_ticker')){ditty_news_ticker(3085);}
		?>

	</div>
