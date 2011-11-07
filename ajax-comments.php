<?php
	require_once('../../../wp-config.php');
	global $comment, $comments, $post, $wpdb, $authordata;
	$id = (int) $_POST['id'];
	$post = &get_post($id);
	$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '$id' AND comment_approved = '1' ORDER BY comment_date");

	$authordata = get_userdata($post->post_author);
?>

<?php $comment_num = 1; //initialize comment counter ?>

<div id="comText<?php echo $id; ?>"> 

	<div class="ajax-comments-wrapper">
		
			<?php foreach ($comments as $comment) : ?>
				<?php $authcomment=''; if ($comment->comment_author_email == $authordata->user_email) { $authcomment=1; } ?>
				
				<div class="ajax-comment<?php if ($authcomment) {echo '-alt';} ?>">
					<div class="ajax-comment-header<?php if ($authcomment) {echo '-alt';} ?>"><a id="comment-<?php comment_ID() ?>"></a>
						<span class="ajax-comment-info">
					   		<?php if ('' == $comment->comment_type) { ?>
								<?php comment_date() ?> | 
								<?php comment_time() ?> | 
								#<?php echo $comment_num; ?>
							<?php } elseif ('trackback' == $comment->comment_type) { ?>
								<?php _e('trackback'); ?>
							<?php } elseif ('pingback' == $comment->comment_type) { ?>
								<?php _e('pingback'); ?>
							<?php } ?>
					  	</span>

						<span class="ajax-comment-author"><?php comment_author_link() ?></span>
					</div>
					<div class="ajax-comment-text">
						<?php comment_text() ?>
					</div>
				</div>
				<?php $comment_num++; ?>
			<?php endforeach; /* end for each comment */ ?>
	
		<span class="ajax-options"><a href="<?php comments_link(); ?>">Kommentar schreiben</a></span>

	</div>
</div>