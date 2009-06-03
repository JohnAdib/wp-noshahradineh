<div class="right">
	<div class="searchbox">
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
	<ul>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('RightSidebar') ) : else : ?>
		<?php endif; ?>
	</ul>
</div>

<div class="left">
	<ul>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('LeftSidebar') ) : else : ?>
		<?php endif; ?>
	</ul>
</div>
