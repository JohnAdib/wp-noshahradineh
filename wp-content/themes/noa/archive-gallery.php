<?php get_header(); ?>

<div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="title">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmeta">
					<div class="float-right">تاریخ و زمان انتشار  <?php the_time('l, n F Y ساعت g:i a'); ?> </div>
				</div>
		</div>
	
		<div class="entry">
				<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
				<div class="clear"></div>
		</div>
	</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>