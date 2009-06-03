<?php
include 'theme_options.php';
include 'guide.php';

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox ">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	));


register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li class="botwid">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
		'secondary' => __( 'Secondary Navigation', '' ),
	));	
	
function new_excerpt_length($length) {
	return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
return '<a href="'. get_permalink($post->ID) . '">' . '&nbsp;&nbsp;[ بیشتر بخوانید ]' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'medus_post', 670, 200, true );
	add_image_size( 'medus_slide', 400, 200, true ); 

}

function medus_post_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'medus_post', array('class' => 'postimg') );
} else {

};
}

function medus_slide_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'medus_slide', array('class' => 'slimg dropshadow') );
} else { 
?>
<img class="slimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt=""  />
<?php
};
}
		
?>
