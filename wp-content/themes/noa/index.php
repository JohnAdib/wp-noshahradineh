<?php get_header(); ?>
 
<div class="container" id="recent-posts">
 <div class="widebox">
  <a href="/category/topnews/" title="دسترسی به آرشیو اخبار برگزیده"><div class="widebox-header"></div></a>
  <div class="widebox-header-line"></div>
  <div class="widebox-inner">
	<?php 	
			$query = new WP_Query( array ( 'category_name' =>'news','posts_per_page' =>'3') );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>

		<div class="box3">
			<?php $image_attr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'index_box'); ?>
			<a href="<?php the_permalink() ?>"><img alt="<?php the_title(); ?>" src="<?php echo $image_attr[0]; ?>" class=""></a>
			<div class="panelpost">
				<h2><a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h2>
				<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
			</div>
		</div>

	<?php endwhile; endif; wp_reset_query();?>
  </div>
 </div>
</div>
 <!-- end posts -->

 <div class="container" id="middle-bar2">

 <?php get_sidebar('m1'); ?>

  <div class="box1 hbox">
  
  <a target="_blank" href="/category/khotbeha/" title="مرور آخرین خطبه"><div class="hbox-bg"><div class="hbox-right"></div><div class="hbox-left"></div><h4>آخرین خطبه ها</h4></div></a>
  <a target="_blank" href="/ahkame-sharei/porsesh-o-pasokh/" title="پاسخ به سوالات شرعی"><div class="hbox-bg"><div class="hbox-right"></div><div class="hbox-left"></div><h4>پاسخ به سوالات شرعی</h4></div></a>
  <a target="_blank" href="/category/dl/" title="دانولد مذهبی"><div class="hbox-bg"><div class="hbox-right"></div><div class="hbox-left"></div><h4>دانلود مذهبی</h4></div></a>
  <a target="_blank" href="/siteroll/" title="سایت های پیشنهادی"><div class="hbox-bg"><div class="hbox-right"></div><div class="hbox-left"></div><h4>سایت های پیشنهادی</h4></div></a>
 
  </div>
 </div>

 <div class="container" id="middle-bar1">
	<?php get_sidebar('m2'); ?>
 </div>

<?php get_footer(); ?>