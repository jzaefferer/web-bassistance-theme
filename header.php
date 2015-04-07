<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>">
	<meta name="keywords" content="<?php if (function_exists('lmkg')) lmkg(); ?>">
	<meta name="description" content="Jörn Zaefferer's personal blog about music, software and anything else.">

	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

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
