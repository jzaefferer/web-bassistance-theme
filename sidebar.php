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
      <li>
		<a href='https://developer.mozilla.org/en/JavaScript' title='JavaScript Reference, JavaScript Guide, JavaScript API, JS API, JS Guide, JS Reference, Learn JS, JS Documentation'><img src='http://static.jsconf.us/promotejshs.png' height='150' width='180' alt='JavaScript Reference, JavaScript Guide, JavaScript API, JS API, JS Guide, JS Reference, Learn JS, JS Documentation'/></a>
	</li>
	<li>
		<h2>Sponsored Links<h2>
		<a href="http://www.packtpub.com/learning-jquery-for-interaction-design-web-development-with-javascript/book/mid/040811c3wlir"><img src="/wp-content/learning-jquery-third-edition.jpg" width="125" height="152"></a>
		<a href="http://www.packtpub.com/jquery-ui-1-8-user-interface-library/book/mid/160911j38h1w"><img src="/wp-content/jquery-ui-1.8-user-interface.jpg" width="125" height="152"></a>
	</li>
    </ul>

</div>
<!-- end sidebar -->