<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div <?php post_class('post') ?> id="post-<?php the_ID(); ?>">
<div class="title">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="hmeta">
		<span class="clock"><?php the_time('j - F - Y'); ?></span>
		<span class="comm"><?php comments_popup_link('بدون ديدگاه', '1 ديدگاه', '% ديدگاه'); ?></span>	
</div>
<div class="entry">
	<?php the_content('بقيه اين مطلب را بخوانيد &raquo;'); ?>
	<?php include (TEMPLATEPATH . '/ad1.php'); ?>
	<div class="clear"></div>
	<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="postmeta">
	<span class="categorys">موضوعات: <?php the_category(', '); ?> </span>
	<span class="tags"> برچسب ها<?php the_tags(', '); ?></span>
</div>
</div>
<?php comments_template(); ?>
<?php endwhile; else: ?>
	<h1 class="title"><a href="<?php bloginfo('url'); ?>">يافت نشد</a></h1>
	<p>متاسفيم، شما به دنبال محتوايي هستيد که در اينجا نيست.</p>
<?php endif; ?>
</div>

<?php get_footer(); ?>