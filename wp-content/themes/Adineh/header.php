<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<!--[if lte IE 5]><script>document.location = '<?php bloginfo('template_directory'); ?>/oldbrowser.html';</script><![endif]-->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=2" type="text/css" media="screen" />
<link type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('carousal', get_stylesheet_directory_uri() . '/js/jcarousel.js');
?>



<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div id="masthead">

<div id="top"> 

<div class="blogname">
	<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"> <?php bloginfo('name');?></a></h1>
	<h2><?php bloginfo('description');?></h2>
</div>

<div id="catmenucontainer">
	<?php wp_nav_menu( array( 'container_id' => 'catmenu','theme_location' => 'primary','fallback_cb'=> '' ) ); ?>
</div>	
</div>

<div id="headbox">
<?php 

if (is_front_page()) { 
include (TEMPLATEPATH . '/slide.php'); 
} 
?>
</div>
<div id="foxmenucontainer">
		<?php wp_nav_menu( array( 'container_id' => 'menu', 'theme_location' => 'secondary','fallback_cb'=> '' ) ); ?>	
</div>
</div>

<div id="wrapper">

<div id="casing">		