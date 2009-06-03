<?php get_header(); ?>
<?php get_sidebar(); ?>


<div>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="title">
				<?php $foliotype = get_post_meta( get_the_ID(), 'WTF_protype', true ); ?>
				<div class="portype pro-<?php echo $foliotype == 'i' ? 'image' : 'video' ?> "></div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmeta">
					<div class="float-right">تاریخ و زمان انتشار  <?php the_time('l, n F Y ساعت g:i a'); ?> </div>
					<div class="float-left hidden-phone"><a href = "<?php bloginfo('url'); echo '/?print='; the_ID(); ?>">نسخه چاپی</a></div>
				</div>

			</div>
		<div class="projectbox">
			<?php $foliotype = get_post_meta( get_the_ID(), 'WTF_protype', true ); ?>
			<?php if ($foliotype == 'i') { ?>
			<div class="flexslider">
	    			<ul class="slides">
			<?php 	 $images = get_post_meta( get_the_ID(), 'WTF_images', false );
    			foreach ( $images as $att )
    			{
        			$src = wp_get_attachment_image_src( $att, 'top_feature' );
    				$src = $src[0];
    // Show image
    			echo "<li> <img src='{$src}' /></li>";
    			} ?>
		  			</ul>
			</div>
			<?php } else { ?>
				<?php echo get_post_meta( get_the_ID(), 'WTF_video', true ); ?>
			<?php } ?>
			
		</div>
		
			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="clear"></div>
				<div class="postmeta">
					<div class="float-right">دسته: <?php the_category(', '); ?> </div>
					<div class="float-left hidden-phone"><?php the_tags('کلیدواژه: ',', '); ?></div>
				</div>
			</div>
		</div>
		
	<?php endwhile; endif; ?>	
</div>


<?php get_footer(); ?>