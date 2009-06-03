<?php /* Template Name: Links */ ?>
<?php get_header(); ?>

<div id="content">
<div class="cover">
<div class="title">
	<h2><a href="<?php bloginfo('url'); ?>"><?php wp_title(''); ?></a></h2>
</div>	
<div class="entry">
<ul><?php get_links_list(); ?></ul>
<div class="clear"></div>
</div>
</div>	
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>