<?php
/*
Template Name:Fullwide
*/
?>
<?php get_header(); ?>
<div id="content" style="width:1000px; margin:0px 0px;">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" style="width:995px;" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لينک به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
<?php the_content('بقيه اين مطلب را بخوانيد &raquo;'); ?>
		<div class="clear"></div>
 <?php wp_link_pages(array('before' => '<p><strong>صفحه: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


</div>

<?php endwhile; endif; ?>
</div>		


<?php get_footer(); ?>