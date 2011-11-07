<?php // Do not delete these lines
	if ('comments-paged.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				<?php
				return;
            }
        }
?>

<?php $comment_num = 1; //initialize comment counter ?>

<?php if ($comments) : // if there are comments ?>
	<div id="commentblock">
		<?php if ('open' == $post-> comment_status) { // if comments are still open ?>
			<div class="comment-header">
				<?php if (!is_page()) { ?><span class="metalink" style="float:right;width:12px;"><a href="<?php $url=comments_rss(); _e($url); ?>" title="comment feed for this article" class="commentlink"><img src="<?php bloginfo('template_directory'); ?>/images/transparent.gif" style="padding:0px;margin:0px;" alt="rss" /></a></span><?php } ?>
				<a id="comments"></a><?php comments_number('Keine Kommentare', '1 Kommentar', '% Kommentare' );?>
			</div>
		<?php } else { // if comments are now closed ?>
			<div class="comment-header">
				<?php _e('comments are closed');?>
			</div>
   		<?php } ?>

		<div class="comment-track">
			<!-- Comment page numbers -->
				<?php if ($paged_comments->pager->num_pages() > 1): ?>
					<span class="comment-page-numbers-left"><?php paged_comments_print_pages(); ?></span>
				<?php endif; ?>
			<!-- End comment page numbers -->

			<?php if (pings_open()) { ?>
				<?php if (is_page()) { ?>
					<a href="<?php trackback_url() ?>" title="trackback URI for this page" rel="nofollow"><?php _e('trackback für diese Seite'); ?></a>
				<?php } else { ?>
					<a href="<?php trackback_url() ?>" title="trackback URI for this article" rel="nofollow"><?php _e('trackback für diesen Artikel'); ?></a>
				<?php } ?>
			<?php } ?>
		</div>
  
		<!-- DISPLAY COMMENTS -->
		<ol id="commentlist">
			<?php foreach ($comments as $comment) : ?>
				<li id="comment-<?php comment_ID() ?>">
					<div class="commentname">
						<span class="commentauthor"><?php comment_author_link() ?></span>
					</div>
					<div class="commentinfo">
					   <span class="commentdate">
						<?php if ($comment->comment_approved == '0') { ?>
							<em>awaiting approval</em>
					   	<?php } else { ?>
							<?php if ('' == $comment->comment_type) { ?>
								<?php comment_date() ?> | 
								<?php comment_time() ?> | 
								<a href="<?php echo paged_comments_url('comment-'.get_comment_ID()); ?>" title="Permanent Link to this Comment">#<?php echo $comment_number; $comment_number += $comment_delta; ?></a>
							<?php } elseif ('trackback' == $comment->comment_type) { ?>
								<?php _e('trackback'); $comment_number += $comment_delta; ?>
							<?php } elseif ('pingback' == $comment->comment_type) { ?>
								<?php _e('pingback'); $comment_number += $comment_delta; ?>
							<?php } ?>
						<?php } ?>
					   </span>
					</div>
					<div class="commenttext<?php if ($comment->comment_author_email == get_the_author_email()) { _e('-author'); } ?>">
						<?php comment_text() ?>
					</div>
				</li>
				<?php $comment_num++; ?>
			<?php endforeach; /* end for each comment */ ?>
		</ol>
		<!-- Comment page numbers -->
			<?php if ($paged_comments->pager->num_pages() > 1): ?>
				<span class="comment-page-numbers-right"><?php paged_comments_print_pages(); ?></span>
			<?php endif; ?>
		<!-- End comment page numbers -->

 	</div><!-- div commentblock -->


<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post-> comment_status) : // If comments are open and there are no comments ?> 
		<div id="commentblock">
			<div class="comment-header">
				<?php if (!is_page()) { ?><span class="metalink" style="float:right;width:12px;"><a href="<?php $url=comments_rss(); _e($url); ?>" title="comment feed for this article" class="commentlink"><img src="<?php bloginfo('template_directory'); ?>/images/transparent.gif" style="padding:0px;margin:0px;" alt="rss" /></a></span><?php } ?>
				<?php _e('no comments'); ?>
			</div>
			<div class="comment-track">
				<?php if (pings_open()) { ?>
					<?php if (is_page()) { ?>
						<a href="<?php trackback_url() ?>" title="trackback URI for this page" rel="nofollow"><?php _e('trackback für diese Seite'); ?></a>
					<?php } else { ?>
						<a href="<?php trackback_url() ?>" title="trackback URI for this article" rel="nofollow"><?php _e('trackback für diesen Artikel'); ?></a>
					<?php } ?>
				<?php } ?>
			</div>
		</div> <!--added -->
	<?php else : // comments are closed and there are no comments ?>
	<div id="commentblock">
		<div class="comment-header">
			<?php _e('comments are closed');?>
		</div>
		<div class="comment-track">
			<?php if (pings_open()) { ?>
				<?php if (is_page()) { ?>
					<a href="<?php trackback_url() ?>" title="trackback URI for this page" rel="nofollow"><?php _e('trackback für diese Seite'); ?></a>
				<?php } else { ?>
					<a href="<?php trackback_url() ?>" title="trackback URI for this article" rel="nofollow"><?php _e('trackback für diesen Artikel'); ?></a>
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
		<?php if (is_page()) { ?>
			<span id="commentshead">Kommentar zu dieser Seite schreiben</span>
		<?php } else { ?>
			<span id="commentshead">Kommentar zu diesem Artikel schreiben</span>
		<?php } ?>
	
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
					<input type="text" name="author" id="author" class="commentText" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
					<label for="author" class="commentlabel"><strong><?php _e('name');?></strong> <?php if ($req) _e('(<span style="color:#ff0000">required</span>)'); ?></label>
				</p>
				<p>
					<input type="text" name="email" id="email" class="commentText" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
					<label for="email" class="commentlabel"><strong><?php _e('email');?></strong> (<?php _e('never shown');?>)<?php if ($req) _e(' (<span style="color:#ff0000">required</span>)'); ?></label>
				</p>
				<p>
					<input type="text" name="url" id="url" class="commentText" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					<label for="url" class="commentlabel"><strong><?php _e('website');?></strong></label>
				</p>
				<?php if (1 == get_settings("comment_moderation")) {?>
					<p class="commentlabel"><strong>Hinweis:</strong> Ihr Kommentar wird sichtbar, sobald er freigeschaltet wurde.</p>
				<?php } ?>
			<?php endif; ?>	
			<p>
				<textarea name="comment" id="comment" class="commentArea" cols="50" rows="10" tabindex="4"></textarea>
			</p>
			
			<?php if (function_exists('live_preview')) { ?>
				<div class="tags-allowed">
				Erlaubte Tags: &lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;code&gt; &lt;em&gt; &lt;i&gt; &lt;strike&gt; &lt;strong&gt;
				</div>
				<strong>Kommentar-Vorschau:</strong><div class="comment-preview"><?php live_preview(); ?></div>
			<?php } ?>

			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar absenden" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			</p>
			<?php do_action('comment_form', $post->ID); ?>
			</form>
	   	</div>
	<?php endif; // If registration required and not logged in ?>
  </div>
<?php endif; ?>