<?php
/**
 * Create the meta boxes
 *
 * @package Ditty News Ticker
 */




add_action( 'admin_init', 'mtphr_dnt_metabox_types', 9 );
/**
 * Create the types metabox.
 *
 * @since 1.0.0
 */
function mtphr_dnt_metabox_types() {

	/* Create the types metabox. */
	$dnt_types = array(
		'id' => 'mtphr_dnt_types',
		'title' => 'نوع',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'side',
		'priority' => 'default',
		'fields' => array(
			array(
				'id' => '_mtphr_dnt_type',
				'type' => 'metabox_toggle',
				'options' => mtphr_dnt_types_array(),
				'default' => 'default'
			)
		)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_types );
}




add_action( 'admin_init', 'mtphr_dnt_metabox_type_default' );
/**
 * Create the default type metabox.
 *
 * @since 1.1.4
 */
function mtphr_dnt_metabox_type_default() {

	$tick_type = 'textarea';
	$settings = get_option( 'mtphr_dnt_general_settings' );
	if( $settings && isset($settings['wysiwyg']) ) {
		$tick_type = 'wysiwyg';
	}

	// Create an array to store the default item structure
	$tick_structure = array(
		'tick' => array(
			'header' => 'متن خبر',
			'width' => '60%',
			'type' => $tick_type,
			'rows' => 2
		),
		'link' => array(
			'header' => 'لینک به',
			'type' => 'text'
		),
		'target' => array(
			'header' => 'مدل لینک',
			'type' => 'select',
			'options' => array( '_self', '_blank' )
		),
		'nofollow' => array(
			'header' => __('NF', 'ditty-news-ticker'),
			'type' => 'checkbox'
		)
	);

	// Create an array to store the fields
	$default_fields = array();

	// Add the items field
	$default_fields['ticks'] = array(
		'id' => '_mtphr_dnt_ticks',
		'type' => 'list',
		'structure' => apply_filters('mtphr_dnt_default_tick_structure', $tick_structure)
	);

	// Create the metabox
	$dnt_default_data = array(
		'id' => 'mtphr_dnt_type_default',
		'title' => 'لیست اخبار قابل نمایش',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => apply_filters('mtphr_dnt_type_fields_default', $default_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_default_data );
}




add_action( 'admin_init', 'mtphr_dnt_metabox_modes', 11 );
/**
 * Create the modes metabox.
 *
 * @since 1.0.0
 */
function mtphr_dnt_metabox_modes() {

	// Create an array to store the fields
	$modes_fields = array();

	// Add the modes fields
	$modes_fields['modes'] = array(
		'id' => '_mtphr_dnt_mode',
		'type' => 'metabox_toggle',
		'options' => mtphr_dnt_modes_array(),
		'default' => 'scroll'
	);

	/* Create the modes metabox. */
	$dnt_modes = array(
		'id' => 'mtphr_dnt_modes',
		'title' => 'مدل تیکر',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'side',
		'priority' => 'high',
		'fields' => $modes_fields
	);
	new MTPHR_DNT_MetaBoxer( $dnt_modes );
}




add_action( 'admin_init', 'mtphr_dnt_mode_metabox_scroll', 12 );
/**
 * Create the scroll mode metabox.
 *
 * @since 1.1.0
 */
function mtphr_dnt_mode_metabox_scroll() {

	// Create an array to store the fields
	$scroll_fields = array();

	// Add the dimensions field
	$scroll_fields['direction'] = array(
		'id' => '_mtphr_dnt_scroll_direction',
		'type' => 'radio',
		'name' => 'جهت حرکت',
		'options' => array(
			'left' => 'چپ',
			'right' => 'راست',
			'up' => 'بالا',
			'down' => 'پایین'
		),
		'default' => 'left',
		'description' => 'جهت چرخش اخبار را مشخص کنید؟',
		'display' => 'inline'
	);

	// Add the dimensions field
	$scroll_fields['dimensions'] = array(
		'id' => '_mtphr_dnt_scroll_width',
		'type' => 'number',
		'name' => 'ابعاد جایگاه نمایش اخبار',
		'default' => 0,
		'before' => 'عرض',
		'description' => 'ابعاد خودکار تعبیه شده با این مقادیر جایگزین می شوند',
		'append' => array(
			'_mtphr_dnt_scroll_height' => array(
				'type' => 'number',
				'default' => 0,
				'before' => 'ارتفاع',
			)
		)
	);

	// Add the spacing field
	$scroll_fields['scroller_padding'] = array(
		'id' => '_mtphr_dnt_scroll_padding',
		'type' => 'number',
		'name' => 'حاشیه اسکرولر',
		'default' => 0,
		'before' => 'پدینگ عمودی',
		'description' => 'فاصله عمودی برای نمایش اخبار',
		'append' => array(
			'_mtphr_dnt_scroll_margin' => array(
				'type' => 'number',
				'default' => 0,
				'before' => 'حاشیه عمودی'
			)
		)
	);

	// Add the slide speed field
	$scroll_fields['scroll_speed'] = array(
		'id' => '_mtphr_dnt_scroll_speed',
		'type' => 'number',
		'name' => 'سرعت اسکرول',
		'default' => 10,
		'description' => 'سرعت حرکت اخبار را مشخص کنید',
		'append' => array(
			'_mtphr_dnt_scroll_pause' => array(
				'type' => 'checkbox',
				'label' => 'توقف حرکت در زمان عبور ماوس',
			)
		)
	);

	// Add the slide spacing field
	$scroll_fields['tick_spacing'] = array(
		'id' => '_mtphr_dnt_scroll_tick_spacing',
		'type' => 'number',
		'name' => 'فاصله بین اخبار',
		'default' => 40,
		'after' => 'پیکسل',
		'description' => 'فاصله بین اخبار در زمان نمایش به شکل اسکرول را مشخص کنید'
	);

	// Create the metabox
	$dnt_scroll_settings = array(
		'id' => 'mtphr_dnt_mode_scroll',
		'title' => 'تنظیمات پیشرفته نمایش اسکرول',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => apply_filters('mtphr_dnt_mode_fields_scroll', $scroll_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_scroll_settings );
}




add_action( 'admin_init', 'mtphr_dnt_mode_metabox_rotate', 12 );
/**
 * Create the rotate metabox.
 *
 * @since 1.0.0
 */
function mtphr_dnt_mode_metabox_rotate() {

	// Create an array to store the fields
	$rotate_fields = array();

	// Add the dimensions field
	$rotate_fields['type'] = array(
		'id' => '_mtphr_dnt_rotate_type',
		'type' => 'radio',
		'name' => 'مدل چرخش',
		'options' => array(
			'fade' => 'محو',
			'slide_left' => 'اسلاید به چپ',
			'slide_right' => 'اسلاید به راست',
			'slide_up' => 'اسلاید به بالا',
			'slide_down' => 'اسلاید به پایین'
		),
		'default' => 'fade',
		'description' => 'مدل چرخش اخبار را مشخص کنید',
		'display' => 'inline',
		'append' => array(
			'_mtphr_dnt_rotate_directional_nav_reverse' => array(
				'type' => 'checkbox',
				'label' => 'جهت اسلاید پویا'
			)
		)
	);

	// Add the dimensions field
	$rotate_fields['dimensions'] = array(
		'id' => '_mtphr_dnt_rotate_height',
		'type' => 'number',
		'name' => 'ابعاد جایگاه نمایش اخبار',
		'default' => 0,
		'before' => 'ارتفاع',
		'description' => 'ابعاد خودکار تعبیه شده با این مقادیر جایگزین می شوند'
	);

	// Add the spacing field
	$rotate_fields['rotate_padding'] = array(
		'id' => '_mtphr_dnt_rotate_padding',
		'type' => 'number',
		'name' => 'حاشیه و پدینگ عمودی',
		'default' => 0,
		'before' => 'پدینگ عمودی',
		'description' => 'حاشیه و پیدنگ عمودی مربوط به این حالت را وارد کنید',
		'append' => array(
			'_mtphr_dnt_rotate_margin' => array(
				'type' => 'number',
				'default' => 0,
				'before' => 'حاشیه عمودی'
			)
		)
	);

	// Add the rotate delay field
	$rotate_fields['rotate_delay'] = array(
		'id' => '_mtphr_dnt_auto_rotate',
		'type' => 'checkbox',
		'name' => 'چرخش خودکار',
		'label' => 'فعال',
		'description' => 'فاصله زمانی بین هر چرخش را مشخص کنید',
		'append' => array(
			'_mtphr_dnt_rotate_delay' => array(
				'type' => 'number',
				'default' => 7,
				'after' => 'ثانیه(فاصله مکث)'
			),
			'_mtphr_dnt_rotate_pause' => array(
				'type' => 'checkbox',
				'label' => 'مکث در زمان حرکت ماوس'
			)
		)
	);

	// Add the rotate speed field
	$rotate_fields['rotate_speed'] = array(
		'id' => '_mtphr_dnt_rotate_speed',
		'type' => 'number',
		'name' => 'سرعت چرخش',
		'default' => 3,
		'after' => 'دهم ثانیه',
		'description' => 'سرعت نمایش را مشخص کنید',
		'append' => array(
			'_mtphr_dnt_rotate_ease' => array(
				'type' => 'select',
				'options' => array('linear','swing','jswing','easeInQuad','easeInCubic','easeInQuart','easeInQuint','easeInSine','easeInExpo','easeInCirc','easeInElastic','easeInBack','easeInBounce','easeOutQuad','easeOutCubic','easeOutQuart','easeOutQuint','easeOutSine','easeOutExpo','easeOutCirc','easeOutElastic','easeOutBack','easeOutBounce','easeInOutQuad','easeInOutCubic','easeInOutQuart','easeInOutQuint','easeInOutSine','easeInOutExpo','easeInOutCirc','easeInOutElastic','easeInOutBack','easeInOutBounce')
			)
		)
	);

	// Add the rotate navigation field
	$rotate_fields['rotate_directional_nav'] = array(
		'id' => '_mtphr_dnt_rotate_directional_nav',
		'type' => 'checkbox',
		'name' => 'جهت ناویری',
		'label' => 'فعال',
		'description' => 'تنظیمات  جهت ناوبری را انجام دهید',
		'append' => array(
			'_mtphr_dnt_rotate_directional_nav_hide' => array(
				'type' => 'checkbox',
				'label' => 'مخفی سازی خودکار ناوبری'
			)
		)
	);

	// Add the rotate navigation field
	$rotate_fields['rotate_control_nav'] = array(
		'id' => '_mtphr_dnt_rotate_control_nav',
		'type' => 'checkbox',
		'name' => 'کنترل ناوبری',
		'label' => 'فعال',
		'description' => 'تنظیمات ناوبری را انجام دهید',
		'append' => array(
			'_mtphr_dnt_rotate_control_nav_type' => array(
				'type' => 'radio',
				'options' => array(
					'number' => 'عدد',
					'button' => 'دکمه'
				),
				'display' => 'inline',
				'default' => 'number'
			)
		)
	);

	// Create the metabox
	$dnt_rotate_settings = array(
		'id' => 'mtphr_dnt_mode_rotate',
		'title' => 'تنظیمات پیشرفته چرخش',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => apply_filters('mtphr_dnt_mode_fields_rotate', $rotate_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_rotate_settings );
}




add_action( 'admin_init', 'mtphr_dnt_mode_metabox_list', 12 );
/**
 * Create the list metabox.
 *
 * @since 1.0.0
 */
function mtphr_dnt_mode_metabox_list() {

	// Create an array to store the fields
	$list_fields = array();

	// Add the spacing field
	$list_fields['list_padding'] = array(
		'id' => '_mtphr_dnt_list_padding',
		'type' => 'number',
		'name' => 'فاصله عمودی لیست',
		'default' => 0,
		'before' => 'پدینگ عمودی',
		'description' => 'فاصله عمودی بین اعضای لیست را مشخص کنید',
		'append' => array(
			'_mtphr_dnt_list_margin' => array(
				'type' => 'number',
				'default' => 0,
				'before' => 'حاشیه عمودی'
			)
		)
	);

	// Add the list spacing field
	$list_fields['tick_spacing'] = array(
		'id' => '_mtphr_dnt_list_tick_spacing',
		'type' => 'number',
		'name' => 'فاصله بین اخبار',
		'default' => 10,
		'after' => 'پیکسل',
		'description' => 'فاصله بین دو خبر را مشخص کنید'
	);

	// Create the metabox
	$dnt_list_settings = array(
		'id' => 'mtphr_dnt_mode_list',
		'title' => 'تنظیمات پیشرفته لیست',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => apply_filters('mtphr_dnt_mode_fields_list', $list_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_list_settings );
}




add_action( 'admin_init', 'mtphr_dnt_global_settings', 13 );
/**
 * Create the display metabox.
 *
 * @since 1.0.3
 */
function mtphr_dnt_global_settings() {

	// Create an array to store the fields
	$global_fields = array();

	// Add the title field
	$global_fields['title'] = array(
		'id' => '_mtphr_dnt_title',
		'type' => 'checkbox',
		'label' => 'نمایش عنوان',
		'append' => array(
			'_mtphr_dnt_inline_title' => array(
				'type' => 'checkbox',
				'label' => 'نمایش عنوان در یک خط'
			)
		)
	);

	// Add the title field
	$global_fields['ticker_width'] = array(
		'id' => '_mtphr_dnt_ticker_width',
		'before' => 'پهنای کادر اخبار(اختیاری)',
		'type' => 'number',
		'after' => 'پیکسل<br/>'.'<small><em>جایگرین مقدار خودکار تخصیص داده شده می شود.</em></small>'
	);

	// Create the metabox
	$dnt_global = array(
		'id' => 'mtphr_dnt_global_settings',
		'title' => 'تنظیمات عمومی ',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'side',
		'priority' => 'default',
		'fields' => apply_filters('mtphr_dnt_display_fields', $global_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_global );
}




add_action( 'admin_init', 'mtphr_dnt_display_metabox', 13 );
/**
 * Create the display metabox.
 *
 * @since 1.0.0
 */
function mtphr_dnt_display_metabox() {

	// Create an array to store the fields
	$display_fields = array();

	// Add the shortcode field
	$display_fields['shortcode'] = array(
		'id' => '_mtphr_dnt_shortcode',
		'type' => 'code',
		'name' => 'کد کوتاه',
		'button' => 'انتخاب کد',
		'description' => 'با قرار دادن این کد کوتاه در نوشته ها یا برگه های خود، می توانید از تیکر استفاده کنید.',
	);

	// Add the function field
	$display_fields['function'] = array(
		'id' => '_mtphr_dnt_function',
		'type' => 'code',
		'name' => 'تابع مستقیم',
		'button' => 'انتخاب تابع',
		'description' => 'با استفاده از این کد می توانید، مستقیما تیکر را در سایت خود نمایش دهید.(مخصوص طراح سایت)',
	);

	// Create the metabox
	$dnt_display = array(
		'id' => 'mtphr_dnt_display',
		'title' => 'نمایش تیکر',
		'page' => array( 'ditty_news_ticker' ),
		'context' => 'side',
		'priority' => 'default',
		'fields' => apply_filters('mtphr_dnt_display_fields', $display_fields)
	);
	new MTPHR_DNT_MetaBoxer( $dnt_display );
}








