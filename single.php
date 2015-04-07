<?php
get_header();
?>

<?php if (get_option('tnssinglepost') == 0) { ?>
	<div id="maincol"><!-- The main content column begins  -->
<?php } else { ?>
	<div id="singlecol"><!-- The single column begins  -->
<?php } ?>
<div class="col">


<?php /* SINGLE POST NAVIGATION */ ?>
	<div class="nextprev">
		<span class="next">&nbsp;<?php next_post('% &raquo; ', '', 'yes'); ?></span>
		<span class="prev"><?php previous_post('&laquo; %', '', 'yes'); ?>&nbsp;</span>
	</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); /* start the loop */ ?>
	<div class="entry">
		<div class="entrymeta">
			<?php the_date() ?>
		</div>
			<div class="single-metahead">
				<h3 class="single-title" id="post-<?php the_ID(); ?>">
					<?php the_title(); ?>
				</h3>
				<?php edit_post_link('<img class="editlink" src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="Edit Link" />'); ?>
			</div>
			<div class="entrybody" style="margin-top:30px;">
				<?php the_content("Read the rest of '" . the_title('', '', false) . "' &raquo;"); ?>
				<span class="single-author">-<?php the_author(); ?></span>
			</div>
			<?php if (get_option('tnsthemeta') == 1) {the_meta();} ?>
			<?php link_pages('<p>Page: ', '</p>', 'number', ' &raquo;', '&laquo;'); ?>
	</div>

	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php if (function_exists('paged_comments_template')) { // Load paged comments plugin template if enabled
		paged_comments_template();
	} else {
		comments_template();
	} ?>

	<?php endwhile; else: ?>
	<p>Keinen zur Suchanfrage passenden Artikel gefunden.</p>

<?php endif; ?>

</div>
</div><!-- The main content column ends  -->

<?php if (get_option('tnssinglepost') == 0) { //if single posts are displayed with sidebar, display it
	get_sidebar();
} ?>

<?php get_footer(); ?>
