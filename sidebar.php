<!-- begin sidebar -->
<div id="navcol">

	<div id="searchdiv">
		<form id="searchform" method="get" action=""><div>
			<label for="s">Search: </label><input title="Enter search term and hit enter to start searching" type="text" name="s" id="s" value="search" size="15" /></div>
		</form>
	</div>

	<ul id="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php endif; ?>
		<li>
			<h2>Subscribe to posts</h2>
			<a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed for all articles" class="feedlink">
			RSS Feed
		</a>
		</li>
	</ul>

</div>
<!-- end sidebar -->