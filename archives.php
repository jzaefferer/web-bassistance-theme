<?php /* 
Template Name: Archives 
*/ ?>

<?php get_header(); ?>


<div id="maincol"><!-- The main content column begins  -->
<div class="col">

<h1>Post Archives</h1>
	<ul class="archives">
<?php query_posts("showposts=-1"); // get the all posts ?>
<?php while (have_posts()) : the_post(); ?>
	<?php $old_month=$the_month; $the_month=get_the_time('M'); ?>
	<?php if  ($old_month != $the_month) echo "<br />"; ?>
	<li><h4 class="archives" id="post-<?php the_ID(); ?>">
				<?php the_date() ?><span class="indent"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
			</h4></li>
<?php endwhile; ?>
	</ul>
			
			
</div>
</div><!-- The main content column ends  -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>