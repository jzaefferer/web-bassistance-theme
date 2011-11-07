<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
  if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie ?>
      <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
    <?php	return;
    }
  }

if ($comments) : // if there are comments ?>
	<div id="commentblock">
		<?php if ('open' == $post-> comment_status) { // if comments are still open ?>
			<div id="comments" class="comment-header">
				<?php if (!is_page()) { ?>
          <span class="metalink">
            <a href="<?php $url=comments_rss(); _e($url); ?>" title="Feed for comments for this post" class="commentlink">
              <img src="<?php bloginfo('template_directory'); ?>/images/transparent.gif" alt="rss" />
            </a>
          </span>
        <?php } ?>
				<?php comments_number('No comments, yet', '1 Comment', '% Comments' );?>
			</div>
		<?php } else { // if comments are now closed ?>
			<div class="comment-header">
				No more comments.
			</div>
   		<?php } ?>

		<div class="comment-track">
			<?php if (pings_open()) { ?>
				<?php if (is_page()) { ?>
					<a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this page</a>
				<?php } else { ?>
					<a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this post</a>
				<?php } ?>
			<?php } ?>
		</div>
  
		<ol id="commentlist">
			<?php foreach ($comments as $comment) : ?>
				<li id="comment-<?php comment_ID() ?>">
					<div class="commentname">
						<?php echo get_avatar( $comment, $size = '32' ); ?>
						<span class="commentauthor"><?php comment_author_link() ?></span>
					</div>
					<div class="commentinfo">
					   <span class="commentdate">
						<?php if ($comment->comment_approved == '0') { ?>
							<em>awaiting approval</em>
					   	<?php } else { ?>
							  <?php if ('' == $comment->comment_type) {
                  comment_date();
                  _e(' |');
                  comment_time();
                } elseif ('trackback' == $comment->comment_type) { 
                   _e('trackback'); 
                } elseif ('pingback' == $comment->comment_type) { 
                  _e('pingback'); 
                }
              } ?>
					   </span>
					</div>
					<div class="commenttext<?php if ($comment->comment_author_email == get_the_author_email()) { _e('-author'); } ?>">
						<?php comment_text() ?>
					</div>
				</li>
			<?php endforeach; /* end for each comment */ ?>
		</ol>
 	</div>


<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post-> comment_status) : // If comments are open and there are no comments ?> 
		<div id="commentblock">
			<div class="comment-header">
				<?php if (!is_page()) { ?>
          <span class="metalink">
            <a href="<?php $url=comments_rss(); _e($url); ?>" title="Feed für Kommentare dieses Artikels" class="commentlink">
              <img src="<?php bloginfo('template_directory'); ?>/images/transparent.gif" alt="rss" />
            </a>
          </span>
        <?php } ?>
				No comments, yet.
			</div>
			<div class="comment-track">
				<?php if (pings_open()) { ?>
					<?php if (is_page()) { ?>
            <a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this page</a>
          <?php } else { ?>
            <a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this post</a>
          <?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php else : // comments are closed and there are no comments ?>
	<div id="commentblock">
		<div class="comment-track">
			<?php if (pings_open()) { ?>
				<?php if (is_page()) { ?>
          <a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this page</a>
        <?php } else { ?>
          <a href="<?php trackback_url() ?>" title="Trackback URI" rel="nofollow">Trackback for this post</a>
        <?php } ?>
			<?php } ?>
		</div>
	</div>
		<br /><br /><br /><br />
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post-> comment_status) : //comments form ?>
  <div id="commentsformheader">
	<a id="respond"></a>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<span id="commentshead">
			You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> 
			to post a comment.
		</span>
	<?php else : ?>
        <span id="commentshead">Write a comment</span>
	
		<div id="commentsform">
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<?php global $user_email, $user_url; ?>
				<input type="hidden" name="author" id="author" value="<?php echo $user_identity; ?>" />
				<input type="hidden" name="email" id="email" value="<?php echo $user_email; ?>" />
				<input type="hidden" name="url" id="url" value="<?php echo $user_url; ?>" />
				<div class="user-loggedin">
					Sie sind im Moment eingeloggt als <span id="login-name"><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</span>
					<br /><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">&laquo; Logout &raquo;</a>
				</div>
			<?php else : ?>
				<p>
					<label title="Required" for="author" class="commentlabel"><strong>Name</strong></label>
          <input title="Required" type="text" name="author" id="author" class="commentText" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				</p>
				<p>
					<label title="Required, never displayed" for="email" class="commentlabel"><strong>E-Mail</strong></label>
          <input title="Required, never displayed" type="text" name="email" id="email" class="commentText" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				</p>
				<p>
					<label for="url" class="commentlabel"><strong>URL</strong></label>
          <input type="text" name="url" id="url" class="commentText" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				</p>
				<?php if (1 == get_settings("comment_moderation")) {?>
					<p class="commentlabel"><strong>Note:</strong> Your comment is being moderated.</p>
				<?php } ?>
			<?php endif; ?>	
			<p>
				<textarea name="comment" id="comment" class="commentArea" cols="50" rows="10" tabindex="4"></textarea>
			</p>
			<p>
				<strong>Note</strong>: Wrap all of your code blocks in &lt;code&gt;...&lt;/code&gt; and replace &lt; with &amp;lt; and &gt; with &amp;gt;.
			</p>
			<?php if (function_exists('live_preview')) { ?>
				<div class="tags-allowed">
				Erlaubte Tags: &lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;code&gt; &lt;em&gt; &lt;i&gt; &lt;strike&gt; &lt;strong&gt;
				</div>
				<strong>Kommentar-Vorschau:</strong><div class="comment-preview"><?php live_preview(); ?></div>
			<?php } ?>

			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Send Comment" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			</p>
			<?php do_action('comment_form', $post->ID); ?>
			</form>
	   	</div>
	<?php endif; // If registration required and not logged in ?>
  </div>
<?php endif; ?>