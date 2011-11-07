<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
    <meta name="keywords" content="<?php lmkg(); ?>" />
    <meta name="description" content="Blog about music and software and hosting of several jQuery plugins like autocomplete, tooltip, treeview and validation" />
	
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" type="text/css" media="screen"/>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/bassistance.js"></script>
  
	<?php wp_head(); ?>
</head>
<body id="home" class="log">
	<div id="container">
		<div id="header">
			<h1><a href="<?php bloginfo('url'); ?>" title="Home"><?php bloginfo('name'); ?></a></h1>
			<div id="subtitle">
				<!-- Here's the tagline  -->
				<?php bloginfo('description'); ?>
			</div>
		</div>
    
		<div id="navmenu">
      <a href="<?php bloginfo('url'); ?>">Blog</a>
      <?php customPages(); ?>
    </div>
