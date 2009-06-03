<?php
$themename = "Medusa";
$shortname = "medus";
$zm_categories_obj = get_categories('hide_empty=1');
$zm_categories = array();
foreach ($zm_categories_obj as $zm_cat) {
$zm_categories[$zm_cat->cat_ID] = $zm_cat->category_nicename;
}
$categories_tmp = array_unshift($zm_categories, "Select a category:");	
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20");
$options = array (

    array(  "name" => "تنظیمات اسلایدر",
            "type" => "title",
			"desc" => "This section customizes the Sliding panel.",
       		),
	   
	array(    "type" => "open"),
	
	array( 	"name" => "موضوع نمایش در اسلایدر",
			"desc" => "با انتخاب موضوعی، آن را در اسلایدر نمایش می دهد",
			"id" => $shortname."_gldcat",
			"std" => "انتخاب موضوع",
			"type" => "select",
			"options" => $zm_categories),
			
	array(	"name" => "تعداد اسلاید",
			"desc" => "تعداد اسلاید های موجود در اسلایدر",
			"id" => $shortname."_gldct",
			"std" => "4",
			"type" => "text",
			),
			
			
	array(    "type" => "close"),
	
	array(  "name" => "نوار اضافی صفحه اول",
            "type" => "title",
			
			),
	array(    "type" => "open"),
	
		array("name" => "استفاده از نوار اضافی",
			"desc" => "برای استفاده Yes را انتخاب کنید",
			"id" => $shortname."_showidget",
            "type" => "select",		
			"options" => array('Yes', 'No'),		
   		    "std" => "Yes"),
	
	
	array(  "name" => "عنوان ستون اول",
      	    "id" => $shortname."_whead1",
     	    "std" => "Widget One",
			"desc" => "عنوان ستون را بنویسید",
            "type" => "text"), 		
			
	array(  "name" => "محتوای ستون اول",
      	    "id" => $shortname."_wtext1",
     	    "std" => "Customizable message area. Check the theme option page to configure this.",
			"desc" => "محتوای ستون را وارد کنید",
            "type" => "textarea"), 			
			
	array(  "name" => "عنوان ستون دوم",
      	    "id" => $shortname."_whead2",
     	    "std" => "Widget Two",
			"desc" => "عنوان ستون را بنویسید",
            "type" => "text"), 		
			
	array(  "name" => "محتوای ستون دوم",
      	    "id" => $shortname."_wtext2",
     	    "std" => "Customizable message area. Check the theme option page to configure this.",
			"desc" => "محتوای ستون را وارد کنید",
            "type" => "textarea"), 			

		array(  "name" => "عنوان ستون سوم",
      	    "id" => $shortname."_whead3",
     	    "std" => "Widget Three",
			"desc" => "عنوان ستون را بنویسید",
            "type" => "text"), 		
			
	array(  "name" => "محتوای ستون سوم",
      	    "id" => $shortname."_wtext3",
     	    "std" => "Customizable message area. Check the theme option page to configure this.",
			"desc" => "محتوای ستون را وارد کنید",
            "type" => "textarea"), 					
			
			
	array(    "type" => "close"),

				
	array(  "name" => "تبلیغات",
       		 "type" => "title",
			"desc" => "Setup the ad banner on posts.",
       ),
	   
  	array("type" => "open"),
	   
	   
	array("name" => "تبلیغ در هر مطلب ",
			"desc" => "محتوای وارد شده در انتهای هر خبر نمایش داده خواهند شد.",
            "id" => $shortname."_ad1",
            "std" => "",
            "type" => "textarea"), 
			

	array("type" => "close"),	
	
	
	
);

 
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme_options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=theme_options.php&reset=true");
            die;

        }
    }

      add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}



function mytheme_admin() {

    global $themename, $shortname, $options;


    
    
?>
<div class="wrap">
<div class="opwrap" style="background:#fff; margin:20px auto; width:80%; padding:30px; border:1px solid #ddd;" >



<h2 class="wraphead" style="margin:10px 0px; padding:15px 10px; font-family:arial black; font-style:normal; background:#B3D5EF;"><b><?php echo $themename; ?> theme options</b></h2>
   <?php
   if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' آپشن دخیره شد.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' آپشن ریست شد</strong></p></div>';
	?>
<form method="post">

<?php foreach ($options as $value) {


switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />
<?php break;

case "break":
?>
<tr><td colspan="2" style="border-top:1px solid #C2DCEF;">&nbsp;</td></tr>

<?php break;

case "title":
?>

<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-size:18px;font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="ذخیره" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="ریست کردن مقادیر" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<p style="text-align:right;"> <small> سفارشی شده توسط <a href="http://www.pixana.ir/">گروه پیکسانا </a>| <a href="http://www.evazadeh.com">جواد عوض زاده</a> </small>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>