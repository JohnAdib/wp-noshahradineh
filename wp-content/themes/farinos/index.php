<?php get_header(); ?>

<?php 
	if(get_option('medus_showidget') == "Yes") { 
			include (TEMPLATEPATH . '/homewidget.php'); 
	}
?>
<?php get_sidebar(); ?>

<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<small><?php echo get_post_meta($post->ID, 'head',true); ?></small>
<div class="post" id="post-<?php the_ID(); ?>">

<div class="cover">
<div class="title">
	<h2><a href="<?php the_permalink() ?>" title="درباره ی <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

		
<div class="entry">
<?php medus_post_image()?>
<?php the_excerpt(); ?> 
<div class="clear"></div>
</div>


</div>	

</div>

<?php endwhile; ?>
<div class="clear"></div>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('مطالب قدیمی تر &raquo;','arclite')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('&laquo; مطالب جديدتر','arclite')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php else : ?>
		<h1 class="title">يافت نشد!</h1>
		<div class="entry">
			<p>متاسفیم، محتوای موردنظر شما در اینجا وجود ندارد</p>
			<div class="clear"></div>
		</div>
		
<?php endif; ?>

</div>

<?php get_footer(); ?>