<?php
/**
 * Create the News Ticker post type
 *
 * @package Ditty News Ticker
 */
 
 
 
 
add_action( 'init','mtphr_dnt_posttype' );
/**
 * Add post types
 *
 * @since 1.0.0
 */
function mtphr_dnt_posttype() {

	$labels = array(
		'name' => 'نوار اخبار',
		'singular_name' => 'نوار خبر',
		'add_new' => 'افزودن نوار خبری',
		'add_new_item' => 'افزودن یک نوار خبر',
		'edit_item' => 'ویرایش نوار خبر',
		'new_item' => 'نوار خبر جدید',
		'view_item' => 'نمایش نوار خبر',
		'search_items' => 'جستجوی نوارهای اخبار',
		'not_found' => 'هیچ نوار خبری یافت نشد',
		'not_found_in_trash' => 'هیچ نوار خبری در سطل زباله نیست',
		'parent_item_colon' => '',
		'menu_name' => 'نوار اخبار'
	);

	// Create the arguments
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'supports' => array( 'title' ),
		'show_in_nav_menus' => false
	);

	register_post_type( 'ditty_news_ticker', $args );	
}




add_filter( 'post_updated_messages', 'mtphr_dnt_updated_messages' );
/**
 * Modify the update text
 *
 * @since 1.0.3
 */
function mtphr_dnt_updated_messages( $messages ) {

  $messages['ditty_news_ticker'][1] = 'تنظیمات نوار خبری به روز شد!';

  return $messages;
}


