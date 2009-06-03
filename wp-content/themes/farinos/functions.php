<?php
include 'theme_options.php';

if ( function_exists('register_sidebar') )
register_sidebar(array(
	'name' => 'RightSidebar',
    'before_widget' => '<li class="sidebox">',
    'after_widget' => '</li>',
	'before_title' => '<div class="sidetitl"><h3>',
    'after_title' => '</h3></div>',
	));

register_sidebar(array(
	'name' => 'LeftSidebar',
    'before_widget' => '<li class="sidebox">',
    'after_widget' => '</li>',
	'before_title' => '<div class="sidetitl"><h3>',
    'after_title' => '</h3></div>',
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
	//add_image_size( 'medus_post', 92, 92, true );
	add_image_size( 'medus_slide', 400, 150, true ); 

}

function medus_post_image(){
if ( has_post_thumbnail() ) {

	echo '<div class="postimg-box"><a href="';
	the_permalink();
	echo '">';
	the_post_thumbnail( 'thumbnail', array('class' => 'postimg') );
	echo '</a></div>';
} else {

};
}

function medus_slide_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'medus_slide', array('class' => 'slimg dropshadow') );
} else { 
?>
<img class="slimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="<?php the_title() ?>"  />
<?php
};
}


/* PAGE NAVIGATION */

function getpagenavi(){
	?>
	<div id="navigation" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	        <div class="alignright"><?php next_posts_link('&laquo; مطالب قدیمی تر') ?></div>
	        <div class="alignleft"><?php previous_posts_link('مطالب جدیدتر &raquo;') ?></div>
	        <div class="clear"></div>
	<?php endif; ?>

	</div>

	<?php
	}
	

/* Excerpt length	 */
	
function wpe_excerptlength_archive($length) {
    return 70;
}
function wpe_excerptlength_index($length) {
    return 25;
}
function wpe_excerptlength_home($length) {
    return 15;
}

function wpe_excerptmore($more) {
return '...';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: تیرماه 1391</li>
	<li>نام طرح: <a href='http://www.Serena.ir/farinos' title='Farinos'>فارینوس</a></li>
	<li>منتشر کننده: <a href='http://www.Serena.ir' title='Serena Group'>گروه طراحی سرنا</a></li>
	<li>پشتیبان هاست: <a href='http://www.Serena.ir' title='Serena گروه هاستینگ'>Serena Server</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی پوسته', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );
	
?>
