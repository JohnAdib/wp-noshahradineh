<?php get_header(); ?>

<div>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="title">
				<h3><?php echo get_post_meta($post->ID, 'head',true); ?></h3>
				<h2><a href="<?php the_permalink() ?>" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmeta">
					<div class="float-right">تاریخ و زمان انتشار  <?php the_time('l, n F Y ساعت g:i a'); ?> </div>
					<div class="float-left hidden-phone"><a href = "<?php bloginfo('url'); echo '/?print='; the_ID(); ?>">نسخه چاپی</a></div>
				</div>
			</div>
		
			<div class="entry">
					
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<div class="clear"></div>
					<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			
			<div class="postmeta">
				<div class="float-right">دسته: <?php the_category(', '); ?> </div>
				<div class="float-left hidden-phone"><?php the_tags('کلیدواژه: ',', '); ?></div>
			</div>
		</div>
		
	<?php comments_template(); ?>
	<?php endwhile; endif; ?>	
</div>


<?php get_footer(); ?>