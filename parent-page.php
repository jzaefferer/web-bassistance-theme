<?php 
/*
Template Name: Parent Page
*/

get_header();

?>

<div id="maincol"><!-- The main content column begins  -->
<div class="col">

<?php if (have_posts()) : while (have_posts()) : the_post(); /* start the loop */ ?>
	<div class="entry">
		<div class="entrybody" id="post-<?php the_ID(); ?>">
      <?php edit_post_link('<img class="editlink" src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="Edit Link" />');?>
      <h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>  	
	</div>

  <div class="entry">
    <div class="entrybody">
      <h2>Plugins</h2>
      <ul>
	      <?php wp_list_pages('title_li=&child_of=105'); ?>
      </ul>
    </div>
  </div>
  <?php
  if (function_exists('paged_comments_template')) { // Load paged comments plugin template if enabled
		paged_comments_template(); 
	} else { 
		comments_template(); 
	} ?>
	
	<?php endwhile; ?>
	
<?php endif; ?>

</div>
</div><!-- The main content column ends  -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
