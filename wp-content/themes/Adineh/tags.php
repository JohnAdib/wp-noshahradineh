<?php /* Template Name: Tags */ ?>
<?php get_header(); ?>

<div id="content">
<div class="cover">
<div class="title">
	<h2><a href="<?php bloginfo('url'); ?>"><?php wp_title(''); ?></a></h2>
</div>	
<div class="entry">
<blockquote>این صفحه تنها برای جذب موتورهای جستجو به سمت <a href="<?php bloginfo('url'); ?>"><?php bloginfo('show'); ?></a> در نظر گرفته شده است، هرچند شما بازدیدکننده گرامی نیز می توانید با استفاده از کلیدواژه مناسب به محتوای مورد نیاز خود برسید</blockquote>
    <?php wp_tag_cloud('number=0'); ?>
    <br /><br /><br /><h2 class="en">This page created by <a href="http://www.evazzadeh.com">Javad Evazzadeh</a> (<a href="http://www.pixana.ir">Pixana Group</a>) for <a href="http://www.google.com">Google</a>!</h2>
<div class="clear"></div>
</div>
</div>	
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>