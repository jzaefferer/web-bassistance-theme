<?php 
get_header();
?>

<div id="maincol"><!-- The main content column begins  -->
<div class="col">

<?php preg_match('#FROM (.*) GROUP BY#', $request, $matches); /* CHECK SEARCH RESULTS */
$fromwhere = $matches[1];
$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");

if (0 < $numposts) $numposts = number_format($numposts); ?>

<?php if (is_search()) { /* SEARCH HEADER */ ?>
	<h2>
	<?php if ($numposts==1) { ?>
      	<?php printf(__('Einen passenden Artikel '), $numposts, 'edit.php'); ?>
	<?php } else { ?>
      	<?php printf(__('%1$s passende Artikel '), $numposts, 'edit.php'); ?>
	<?php } ?>
	für '<?php echo $s; ?>' gefunden.</h2><br />
<?php } ?>

<?php if (is_category()) { /* CATEGORY HEADING */ ?>				
		<h2>Alle Artikel der '<?php echo single_cat_title(); ?>' Kategorie</h2><br />

<?php } elseif (is_day()) { /* DAILY HEADING */ ?>
		<h2>Alle Artikel vom <?php the_date(); ?></h2><br />

<?php } elseif (is_month()) { /* MONTHLY HEADING */ ?>
		<h2>Alle Artikel im <?php the_date(); ?></h2><br />
<?php } ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); /* start the loop */ ?>

  <div class="entry">
    <div class="entrymeta">
      <?php the_date() ?>
    </div>
    <h3 class="entrytitle" id="post-<?php the_ID(); ?>">
      <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    </h3>
    <?php edit_post_link('<img class="editlink" src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="Edit Link" />'); ?> 
    <div class="entrybody">
                    <?php if (is_search() || is_archive()) {
                                    the_excerpt();
                              } else {
              the_content("Den kompletten Artikel '" . the_title('', '', false) . "' anzeigen &raquo;"); ?>
                              <div class="meta-footer">
            <img src="<?php bloginfo('template_url'); ?>/images/post.gif" alt="#" title="post" />
            Tagged with <?php the_category(','); _e(' |'); ?>&nbsp;
            <img src="<?php bloginfo('template_url'); ?>/images/comments.gif" alt="*" title="comments" />
            <?php comments_popup_link(' Write a comment',' 1 Comment',' % Comments'); ?>
          </div>
          
          <!-- start ajax display -->
          <?php if (get_option('tnsajaxcomments') == 1) { ?>
            <div id="ajax-comments-notification-<?php the_ID(); ?>">
            </div>
            <div id="ajax-comments-<?php the_ID(); ?>" class="ajax-comments">
            </div>
          <?php } ?>
          <!-- end ajax display -->
        <?php } ?>
    </div>  	
  </div>

	<?php comments_template(); // Get wp-comments.php template ?>

	<?php endwhile; else: ?>
	<p>Keinen zur Suchanfrage passenden Artikel gefunden.</p>

<?php endif; ?>

	<div class="bottommeta">
    <?php posts_nav_link('','','&laquo; Older entries') ?> 
    <?php posts_nav_link('','Newer Entries &raquo;','') ?>
	</div>

</div>
</div><!-- The main content column ends  -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
