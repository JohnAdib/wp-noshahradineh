<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>یافت نشد! خطای 404</title>
  <meta http-equiv="refresh" content="7; URL=<?php bloginfo( 'url' ); ?>">
  <style>
	body{overflow:hidden;}
	#mixa { 
		clear: both;
		overflow: hidden;
		padding: 20px 0px;
		width: 100%;
		position:absolute;
		bottom:3%;
		left:0;
	}
	#mixa a { 
		background: #21A5C2;
		clear: both;
		color: white;
		display: block;
		font-size: 23px;
		margin: 40px -10px;
		padding: 20px 0px;
		text-align: center;
		text-decoration: none;
		text-shadow: rgba(255, 255, 255, 0.298) 0px 0px 3px;
		
		-moz-transform: rotate(-5deg);
		-webkit-transform: rotate(-5deg);
		-o-transform: rotate(-5deg);
		-ms-transform: rotate(-5deg);
		transform: rotate(-5deg)
		
		-webkit-transition: all 1s ease-in-out;
		-moz-transition: all 1s ease-in-out;
		-ms-transition: all 1s ease-in-out;
		-o-transition: all 1s ease-in-out;
		transition: all 1s ease-in-out;
	}
	#mixa a:hover { 
		background: #9DC221;
		color: #000;
	}
  </style>
</head>
<body>
 <a href="<?php bloginfo( 'url' ); ?>" title="این صفحه در وب سایت <?php bloginfo( 'name' ); ?> یافت نشد"><img src="<?php echo get_template_directory_uri(); ?>/images/404.jpg" alt="Page Not Found (404)." style="position: absolute; left: 50%; top: 50%; margin-left: -285px; margin-top: -190px;border:none"></a>
 <div id="mixa">
  <a target="_blank" href="http://mixa.ir" title="طراحی توسط تیم میکسا">Powered By Mixa</a>
 </div>
</body>
</html>