</div>
<div class="clear"></div>
</div>	

<div class="bottomcover ">
	<?php if(is_user_logged_in()) { ?>
	<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/images/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت" ></a>
	<?php } ?>
<div id="bottom" >
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar("Footer") ) : ?>    
<?php endif; ?>
</ul>

<div id="webgozar">
	<script type="text/javascript" language="javascript" src="http://www.webgozar.ir/c.aspx?Code=2636132&amp;t=counter" ></script>
	<noscript><a href="http://www.webgozar.com/counter/stats.aspx?code=2636132" target="_blank">&#1570;&#1605;&#1575;&#1585;</a></noscript>
</div>
<div class="clear"> </div>
</div>
</div>
<div id="footer">
	
<div class="fcred">
	تمام حقوق این وب سایت برای <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> محفوظ است.<br/>
	<a target="_blank" href="http://www.evazzadeh.com" title="با افتخار قدرت گرفته از وردپرس، طراحي از جواد عوض زاده">طراحی و اجرا</a> توسط <a target="_blank" href="http://Mixa.ir" title="گروه میکسا | Mixa Group" >گروه میکسا &copy;</a> <?php echo the_time('Y');?>.
</div>
</div>

<?php wp_footer(); ?>
<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls1 = document.getElementById("catmenu").getElementsByTagName("li");
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
		var sfEls1 = document.getElementById("menu").getElementsByTagName("li");
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>
<script type="text/javascript">
	var $buoop={} 
	$buoop.ol=window.onload;window.onload=function(){try{if($buoop.ol) $buoop.ol();}catch(e){}var e=document.createElement("script");e.setAttribute("type","text/javascript");e.setAttribute("src","http://www.media.noshahradineh.ir/update.js");document.body.appendChild(e);}
</script>
</body>
</html>      