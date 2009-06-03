<?php define('WP_USE_THEMES', false); ?>
<?php
	query_posts('p='.$_GET['print']);
    if (have_posts()){ while ( have_posts() ) { the_post();
?>
<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>نسخه چاپی <?php bloginfo( 'name' ); ?> | <?php the_title(); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/print.css?v=1" />
	<link type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon" />
</head>
<body>
<header>
<h1><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('description', 'display')); ?>"> <?php bloginfo('name'); ?> </a></h1>
<div class='left'>
<?php the_time( 'j F Y' ); ?> | کد خبر: <?php the_ID(); ?> |

 موضوع: <?php the_category(', '); ?> 

</div><br /><hr />
</header>
<article>
<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<?php		
            the_content();
        }
    }else{
    echo 'چیزی یافت نشد!';
    }
?>
</article>
<footer>
	<hr />
	<div class="copyright">تمام حقوق برای
		<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('description', 'display')); ?>"> <?php bloginfo('name'); ?> </a>محفوظ است.
	</div>
	<a target="_blank" href="http://ermile.ir" title="ارمایل | Ermile" >ارمایل</a>
</footer>
</body>
</html>
