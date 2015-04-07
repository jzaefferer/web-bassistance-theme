<!-- begin footer -->
	<div id="footer">
		Copyright Jörn Zaefferer
	</div>
</div>
<?php do_action('wp_footer'); ?>

<script src="<?php bloginfo('template_directory'); ?>/scripts/bassistance.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.fitvids.js"></script>
<script>
jQuery(document).ready(function($){
		$(".entry").fitVids();
});
</script>
<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2623402-1']);
	_gaq.push(['_setDomainName', '.bassistance.de']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

</body>
</html>
