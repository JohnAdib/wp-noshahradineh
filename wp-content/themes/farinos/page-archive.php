<?php /* Template Name: Archive */ ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div id="content">
<div class="cover">

<div class="title">
	<h1><a href="<?php bloginfo('url'); ?>"><?php wp_title(''); ?></a></h1>
</div>	
	<div class="entry">
		<?php the_content('بقيه اين مطلب را بخوانيد &raquo;'); ?>
		
		<h2>بایگانی ماهانه</h2>
		<ul>
		<?php wp_get_jarchives("type=monthly"); ?>
		</ul>
		<p>شما می توانید ماه مورد نظر خود را از لیست زیر نیز انتخاب نمایید.</p>
		<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
			<option value="">بایگانی ...</option>
			<?php wp_get_jarchives('type=monthly&format=option'); ?>
		</select><br /><br />
		
		<h2>تقویم</h2>
		<?php mps_calendar(); ?>
		
		<h2 class="widgettitle">دسته بندی ها</h2>
		<ul>
		<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10' ) ); ?>
		</ul>
			
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		
		
	<div class="clear"></div>
	</div>




</div>	
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>