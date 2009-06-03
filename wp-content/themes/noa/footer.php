 <div class="container" id="recent-gallery">
  <div class="widebox">
   <a href="/gallery/" title="دسترسی به آرشیو کالری تصاویر"><div class="widebox-header"></div></a>
   <div class="widebox-header-line"></div>
   <div class="widebox-inner">
	 	<?php 	$query = new WP_Query( array( 'post_type' => 'gallery','posts_per_page' =>'4' ) );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
			<div class="box4">
				<?php $foliotype = get_post_meta( get_the_ID(), 'WTF_protype', true ); ?>
				<?php if ($foliotype == 'v') { ?>
					<img class="overlay" alt="ویدیو" src="<?php echo get_template_directory_uri(); ?>/images/mover.png" />
				<?php } else { ?>	
					<img class="overlay" alt="تصویر" src="<?php echo get_template_directory_uri(); ?>/images/cover.png" />
				<?php } ?>
				<?php $image_attr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'index_box'); ?>
				<a href="<?php the_permalink() ?>">	<img alt="<?php the_title(); ?>" src="<?php echo $image_attr[0]; ?>" class="scale-with-grid"></a>
				<div class="panelbox">		
					<h3> <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h3>
				</div>	 
			</div>
	
		<?php endwhile; endif; wp_reset_query();?>
   </div>
  </div>
 </div>

</div>
<!-- end casting -->
<div id="mosque"></div>
</div>
<!-- end main -->

<div class='clear'></div>

<div class="container">
 <footer>
	<div id="footer">
		<p id="credit">تمام حقوق این وب سایت برای <a href="/" title="<?php bloginfo('description'); ?>" ><abbr title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></abbr></a> محفوظ است.</p>
		<p id="powered-by-mixa">Designed By <a href="https://ermile.com/fa" title="طراحی و اجرا توسط ارمایل" >Ermile &copy;</a> | <a id="html5-valid" href="http://validator.w3.org/check?uri=referer" title='HTML5 Valid' target="_blank"> HTML5 Valid</a></p>
	</div>
	<?php if(is_user_logged_in()) { ?>
	<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/images/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت" ></a>
	<?php } ?>
 </footer>
</div>



<?php wp_footer(); ?>

<script type="text/javascript">
// <![CDATA[
jQuery(document).ready(function() { jQuery(".container").css("display", "none");jQuery(".container").fadeIn(100);});
jQuery(document).ready(function() { jQuery("#recent-posts").css("display", "none");jQuery("#recent-posts").fadeIn(1000);});
jQuery(document).ready(function() { jQuery("#middle-bar1").css("display", "none");jQuery("#middle-bar1").fadeIn(1000);});
jQuery(document).ready(function() { jQuery("#recent-gallery").css("display", "none");jQuery("#recent-gallery").fadeIn(2000);});

// ]]>

</script>

</body>
</html>