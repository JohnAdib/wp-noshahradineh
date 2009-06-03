<div id="right" class="right ">

<div class="sidebox ">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div> 


<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>

</div>