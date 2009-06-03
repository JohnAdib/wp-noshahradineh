<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">

<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"> آرشيو موضوع <?php echo single_cat_title(); ?></h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">آرشيو روزانه <?php the_time('F jS, Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">آرشيو ماهانه <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">آرشيو سالانه <?php the_time('Y'); ?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">آرشيو کاربر </h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">آرشيو سايت</h2>

		<?php } ?>

<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">

<div class="cover">
<div class="title">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لينک به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
	<?php medus_post_image()?>
	<?php the_excerpt(); ?> 
	<div class="clear"></div>
</div>


</div>	
</div>
		<?php endwhile; ?>
 <div id="navigation">
	<?php getpagenavi(); ?>
</div>
	<?php else : ?>
	
		<h1 class="title">يافت نشد!</h1>
		<div class="entry">
			<p>متاسفيم، محتوای مورد نظر شما وجود ندارد.</p>
			<div class="clear"></div>
		</div>

	<?php endif; ?>
</div>

<?php get_footer(); ?>