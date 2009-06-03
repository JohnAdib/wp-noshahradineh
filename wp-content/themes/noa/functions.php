<?php
//require_once('class-tgm-plugin-activation.php');
//include ( 'getplugins.php' );
include ( 'metabox.php' );
//include ( 'cpt.php' );
//include ( 'guide.php' );


/* SIDEBARS */
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'MiddleBar1',
	'description' => 'ردیف اول خبری در زیر آخرین اخبار در صفحه اول',
    'before_widget' => '<aside><div class="box1"><div class="box1-header"></div><div class="box1-inner">',
    'after_widget' => '</div></div></aside>',
	'before_title' => '<div class="box1-title"><h2>',
    'after_title' => '</h2></div>',
	));

	register_sidebar(array(
	'name' => 'MiddleBar2',
	'description' => 'ردیف دوم در زیر آخرین اخبار در صفحه اول',
    'before_widget' => '<aside><div class="box1"><div class="box1-header"></div><div class="box1-inner">',
    'after_widget' => '</div></div></aside>',
	'before_title' => '<div class="box1-title"><h2>',
    'after_title' => '</h2></div>',
	));
	

/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> لطفا از طریق منوی تنظیمات در بخش فهرست، لیست مورد نظر خود را بسازید.</li></ul>
			</div>
<?php }	


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'top_feature', 420, 220, true );
	add_image_size( 'index_box', 260, 150, true );
	//add_image_size( 'index_wide', 220, 125, true );
}

/* CUSTOM EXCERPTS */
	
function wpe_excerptlength_aside($length) {
    return 15;
}
	
function wpe_excerptlength_side($length) {
    return 15;
}
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 25;
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
    $output = '<p class="hidden-phone">'.$output.'</p>';
    echo $output;
}


/* PAGE NAVIGATION */

function getpagenavi(){
	?>
	<div id="navigation" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	        <div class="alignright"><?php next_posts_link(__('&laquo; مطالب قدیمی تر','web2feeel')) ?></div>
	        <div class="alignleft"><?php previous_posts_link(__('مطالب جدیدتر &raquo;','web2feel')) ?></div>
	        <div class="clear"></div>
	<?php endif; ?>

	</div>

	<?php
	}

//FLUSH REWRITE RULES

	function custom_flush_rewrite_rules() {
		global $pagenow, $wp_rewrite;
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
			$wp_rewrite->flush_rules();
	}

	add_action( 'load-themes.php', 'custom_flush_rewrite_rules' );
	
	
add_action('init', 'gallery_register');

function gallery_register() {

	$labels = array(
		'name' => 'چندرسانه‌ای',
		'singular_name' => 'Gallery',
		'add_new' => 'افزودن',
		'add_new_item' => 'افزودن',
		'edit_item' => 'ویرایش',
		'new_item' => 'جدید',
		'view_item' => 'نمایش',
		'search_items' => 'جستجو',
		'not_found' => 'بافت نشد',
		'not_found_in_trash' => 'چیزی در سطل زباله یافت نشد',
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type( 'gallery' , $args );
}



function add_filter_taxonomies() {

	register_taxonomy('cat', 'gallery', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => 'دسته‌ها',
			'singular_name' => 'cat',
			'search_items' => 'جستجو',
			'all_items' => 'همه دسته‌ها',
			'parent_item' => 'مادر',
			'parent_item_colon' => 'مادر:',
			'edit_item' => 'ویرایش',
			'update_item' => 'بروز رسانی',
			'add_new_item' => 'افزودن',
			'new_item_name' => 'نام',
			'menu_name' => 'دسته‌ها',
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'cat', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_filter_taxonomies', 0 );




/************************************** ReArange menu in admin pane **************************/
function custom_menu_order($menu_ord){
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // *********************************************First separator
        'edit.php', // Posts
		'edit.php?post_type=board', // Board
		'edit.php?post_type=circular', // Circular
		'edit.php?post_type=expert', // Expert
		'edit.php?post_type=calendar', // Calendar
        'separator2', // *********************************************Second separator
        'edit.php?post_type=page', // Pages
		'edit.php?post_type=slider', // Slider
		'edit.php?post_type=cycloneslider', // Cyclone Slider
		'edit.php?post_type=ditty_news_ticker', // News Ticker
		'wp-polls/polls-manager.php', // Poll
        'wpcf7', // Contact Form 7
        'upload.php', // Media
        'separator-last', // *********************************************Last separator
        'users.php', // Users
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'tools.php', // Tools
        'options-general.php', // Settings
		'wpseo_dashboard', // Wordpress Seo
		'wp-jalali', // Wordpress Seo
		
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');






// Print Fiendly Template Page ***************************************

	//add my_print to query vars
	function add_print_query_vars($vars) {
		// add my_print to the valid list of variables
		$new_vars = array('print');
		$vars = $new_vars + $vars;
		return $vars;
	}

	add_filter('query_vars', 'add_print_query_vars');

	add_action("template_redirect", 'my_template_redirect_2322');

	// Template selection
	function my_template_redirect_2322()
	{
		global $wp;
		global $wp_query;
		if (isset($wp->query_vars["print"]))
		{
			include(TEMPLATEPATH . '/print.php');
			die();

		}
}


/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: آذرماه 1392</li>
	<li>نام طرح: <a href='http://www.Mixa.ir/noa' title='Noa'>نوا</a></li>
	<li>طراح پوسته: <a href='http://www.Mixa.ir' title='Mixa Group'>تیم میکسا</a></li>
	<li>پشتیبان هاست: <a href='http://www.Mixa.ir' title='گروه هاستینگ میکسا'>Mixa Server</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی پوسته', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

/** changing default wordpres email settings */
 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
 return 'Info@NoshahrAdineh.ir';
}
function new_mail_from_name($old) {
 return 'ستاد برگزاری نماز جمعه نوشهر';
}



/**Add filter for registration email subject and message **/
add_filter('wp_mail','my_custom_registration_mail');
 
function my_custom_registration_mail($email) {
    if (isset ($email['subject']) && substr_count($email['subject'],'Your username and password')>0 ) {
    if (isset($email['message'])) {
 
        $messg = "با سلام و احترام\n اطلاعاتی مبنی بر درخواست عضویت شما در وب سایت ما دریافت شده است که جزئیات آن به شرح زیر می باشد.\r\n";
        $messg .= $email['message'];
        $messg .= "شما هم اکنون قادر خواهید بود در بخش مدیریت این وب سایت فعالیت کنید.\n";
        $email['message'] = $messg;
        $email['subject'] = "ثبت نام کاربر جدید در وب سایت "."ستاد برگزاری نماز جمعه نوشهر";
    }
    }
    return ($email);
}


// hide unused metabox from wordpress dashboard
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;

// Remove the quickpress widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
// Right Now
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
// recent drafts
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
// recent comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
// Wordpress News	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
// Wordpress weblog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

function remove_footer_admin ()
{
 echo "به پنل مديريت <a href='"; bloginfo('url'); echo"' Title='"; bloginfo('description'); echo"'>"; bloginfo('name'); echo"</a> خوش آمديد | طراحي و توسعه داده شده توسط <a href='http://mixa.ir' Title='Mixa Team'>تیم میکسا</a>";
} add_filter('admin_footer_text', 'remove_footer_admin');

/*-------------------------------------------------------------------------Security Settings------------------------------ */
// remove error mesages from wordpress login page for security reason
add_filter('login_errors', create_function('$a', "return null;"));

// remove theme edit from theme option tab
// function remove_editor_menu() { remove_action('admin_menu', '_add_themes_utility_last', 101); }
// add_action('_admin_menu', 'remove_editor_menu', 1);

// add_action( 'admin_init', 'hide_update_msg', 1 );
// function hide_update_msg(){! current_user_can( 'install_plugins' ) and remove_action( 'admin_notices', 'update_nag', 3 );}

/*-----------------------------------------------------------------------Improve Performance Settings-------------------- */
// use shortcode in widget
add_filter('widget_text', 'do_shortcode');

// remove unused information from header
add_action('init', 'remheadlink');
function remheadlink()
{
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
}

// Remove rel category for html5 comptability
add_filter( 'the_category', 'add_nofollow_cat' );
function add_nofollow_cat( $text ){$text = str_replace('rel="category tag"', "", $text); return $text;}

// make clickable links in content
add_filter( 'the_content', 'make_clickable', 12);
add_filter( 'the_content', 'make_clickable', 9);

// function disableAutoSave(){wp_deregister_script('autosave');}
// add_action( 'wp_print_scripts', 'disableAutoSave' );



// **************************************************** Login Page

/* Login Form */

// add_filter('login_headerurl', 'change_wp_login_url',9999);
// add_filter('login_headertitle', 'change_wp_login_title',9999);
// //add_action('login_head', 'custom_login_css',9999);
// add_action( 'login_head', 'login_fadein',9999);

// /* Login Form Functions */
// function login_fadein() {
// echo '<script type="text/javascript">// <![CDATA[
// jQuery(document).ready(function() { jQuery("#loginform,#nav").css("display", "none");jQuery("#loginform,#nav").fadeIn(3500);});
// // ]]></script>';
// }
// function change_wp_login_url() {
// 	return get_bloginfo(url);
// }
// function change_wp_login_title() {
// 	return 'پنل مدیریت وب سایت '.get_option('blogname').' | طراحی و توسعه توسط تیم میکسا';
// }

/*
function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/login.css" />';
}
*/



?>
