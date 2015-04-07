<?php
get_header();
?>

<div id="maincol"><!-- The main content column begins  -->
<div class="col">

<?php if (is_search()) { /* SEARCH HEADER */ ?>
  <h2>Search results for '<?php echo $s; ?>'.</h2><br />
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
