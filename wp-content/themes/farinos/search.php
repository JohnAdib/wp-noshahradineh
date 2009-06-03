<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content" class="scover" >

<div class="shead" >
<div id="searchpage">
	<form method="get" id="searchpageform" action="<?php bloginfo('home'); ?>" >
	<input id="sform" class="rounded" type="text" name="s" onfocus="if(this.value=='search site'){this.value=''};" onblur="if(this.value==''){this.value='search site'};" value="<?php echo wp_specialchars($s, 1); ?>" />
	<input id="formsubmit" type="submit" value="جستجو" />
	</form>
</div>
<p style="margin-top:5px">
<?php
$mySearch =& new WP_Query("s=$s & showposts=-1");
$num = $mySearch->post_count;
echo $num.' نتیجه برای عبارت - '; the_search_query();
?> - در <?php  get_num_queries(); ?> <?php timer_stop(1); ?> ثانبه آماده شد.
</p>
</div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="sbox" id="post-<?php the_ID(); ?>">

<h2 class="stitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="لينک به <?php the_title(); ?>"><?php the_title(); ?></a></h2>

<div class="entry">
<p style="line-height:18px; paddding:5px 0px; color:#333;"><?php the_content_rss('more_link_text', TRUE, '', 30); ?></p>
<div class="clear"></div>
<span class="searchmeta"> ارسال شده توسط <?php the_author(); ?> در <?php the_time('j - F - Y'); ?> | <?php comments_popup_link('بدون ديدگاه', '1 ديدگاه', '% ديدگاه'); ?></span>	
</div>
</div>

	<?php endwhile; ?>

 <div id="navigation">
<?php
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>

 
</div>

	<?php else : ?>




<div class="entry">

<b>نتیجه ای برای جستجوی عبارت - <?php the_search_query();?> - یافت نشد.</b>

<p>پیشنهادات:</p>
<ul>
   <li>  املای تمام کلمات را بررسی نمایید.</li>
   <li>  از کلمات کلیدی دیگری استفاده نمایید.</li>
   <li>  از کلمات کلیدی عمومی تری استفاده نمایید.</li>
</ul>
			
</div>

<?php endif; ?>
</div>

<?php get_footer(); ?>

