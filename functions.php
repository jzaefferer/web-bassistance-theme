<?php

remove_filter('template_redirect', 'redirect_canonical');

$current_ver = '1.8';

if ( function_exists('register_sidebar') )
    register_sidebar();

function customPages() {
  $output = '';
  $pages = & get_pages($args);
	if ( $pages ) {
    foreach ( $pages as $page ) {
      if( $page->post_parent == 0)
        $output .= '<a href="'.get_page_link($page->ID).'">'.$page->post_title.'</a>';
    }
  }
  //echo '<a href="#">Page 1</a><a href="#">Page2</a>';
  echo $output;
}

function tnsupdate() {
	if ( !empty($_POST) ) {
		if ( isset($_POST['tnssinglepost']) ) {
			$tns_singlepost = $_POST['tnssinglepost'];
			update_option('tnssinglepost', $tns_singlepost);
		}
		if ( isset($_POST['tnsasidescat']) ) {
			$tns_asidescat = $_POST['tnsasidescat'];
			update_option('tnsasidescat', $tns_asidescat);
		}
		if ( isset($_POST['tnsasidesloc']) ) {
			$tns_asidesloc = $_POST['tnsasidesloc'];
			update_option('tnsasidesloc', $tns_asidesloc);
		}
		if ( isset($_POST['tnsasidesnum']) ) {
			$tns_asidesnum = $_POST['tnsasidesnum'];
			update_option('tnsasidesnum', $tns_asidesnum);
		}
		if ( isset($_POST['tnstooltips']) ) {
			$tns_tooltips = $_POST['tnstooltips'];
			update_option('tnstooltips', $tns_tooltips);
		}
		if ( isset($_POST['tnspoptags']) ) {
			$tns_poptags = $_POST['tnspoptags'];
			update_option('tnspoptags', $tns_poptags);
		}
		if ( isset($_POST['tnspoptagsminfont']) ) {
			$tns_poptagsminfont = $_POST['tnspoptagsminfont'];
			update_option('tnspoptagsminfont', $tns_poptagsminfont);
		}
		if ( isset($_POST['tnspoptagsmaxfont']) ) {
			$tns_poptagsmaxfont = $_POST['tnspoptagsmaxfont'];
			update_option('tnspoptagsmaxfont', $tns_poptagsmaxfont);
		}
		if ( isset($_POST['tnspoptagsexclude']) ) {
			$tns_poptagsexclude = $_POST['tnspoptagsexclude'];
			update_option('tnspoptagsexclude', $tns_poptagsexclude);
		}
		if ( isset($_POST['tnspoptagsnum']) ) {
			$tns_poptagsnum = $_POST['tnspoptagsnum'];
			update_option('tnspoptagsnum', $tns_poptagsnum);
		}
		if ( isset($_POST['tnspostsperhome']) ) {
			$tns_postsperhome = $_POST['tnspostsperhome'];
			update_option('tnspostsperhome', $tns_postsperhome);
		}
		if ( isset($_POST['tnspostspersearch']) ) {
			$tns_postspersearch = $_POST['tnspostspersearch'];
			update_option('tnspostspersearch', $tns_postspersearch);
		}
		if ( isset($_POST['tnspostspercategory']) ) {
			$tns_postspercategory = $_POST['tnspostspercategory'];
			update_option('tnspostspercategory', $tns_postspercategory);
		}
		if ( isset($_POST['tnspostsperauthor']) ) {
			$tns_postsperauthor = $_POST['tnspostsperauthor'];
			update_option('tnspostsperauthor', $tns_postsperauthor);
		}
		if ( isset($_POST['tnspostsperday']) ) {
			$tns_postsperday = $_POST['tnspostsperday'];
			update_option('tnspoptagsnum', $tns_postsperday);
		}
		if ( isset($_POST['tnspostspermonth']) ) {
			$tns_postspermonth = $_POST['tnspostspermonth'];
			update_option('tnspostspermonth', $tns_postspermonth);
		}
		if ( isset($_POST['tnspostsperyear']) ) {
			$tns_postsperyear = $_POST['tnspostsperyear'];
			update_option('tnspostsperyear', $tns_postsperyear);
		}
		if ( isset($_POST['tnsajaxcomments']) ) {
			$tns_ajaxcomments = $_POST['tnsajaxcomments'];
			update_option('tnsajaxcomments', $tns_ajaxcomments);
		}
		if ( isset($_POST['tnsajaxthrobberurl']) ) {
			$tns_ajaxthrobberurl = $_POST['tnsajaxthrobberurl'];
			update_option('tnsajaxthrobberurl', $tns_ajaxthrobberurl);
		}
		if ( isset($_POST['tnsajaxcommentsurl']) ) {
			$tns_ajaxcommentsurl = $_POST['tnsajaxcommentsurl'];
			update_option('tnsajaxcommentsurl', $tns_ajaxcommentsurl);
		}
		if ( isset($_POST['tnslightbox']) ) {
			$tns_lightbox = $_POST['tnslightbox'];
			update_option('tnslightbox', $tns_lightbox);
		}
		if ( isset($_POST['tnsthemeta']) ) {
			$tns_themeta = $_POST['tnsthemeta'];
			update_option('tnsthemeta', $tns_themeta);
		}
	}
}

$blog_template_directory = get_bloginfo('template_directory'); //needed for ajax comments

if (!get_option('tnsinstalled')) { // Install all the options that run tonus if it is not already installed.

	add_option('tnsinstalled', $current_ver, 'Set to current version of tonus that is installed', $autoload);
	add_option('tnsasidescat', '0', 'A category which will be treated differently from other categories', $autoload);
	add_option('tnsasidesloc', '0', 'Put asides inline or in a separate section of the homepage. (0=separated,1=inline)', $autoload);
	add_option('tnsasidesnum', '4', 'The number of Asides to show. Default is 4.', $autoload);
	add_option('tnstooltips', '1', 'Whether to use fancy tooltips. Default is yes.', $autoload);
	add_option('tnspoptags', '1', 'Whether to use popular tags weighted plugin. Default is yes.', $autoload);
	add_option('tnspoptagsminfont', '6', 'Minimum font for tag weighting. Default is 6.', $autoload);
	add_option('tnspoptagsmaxfont', '10', 'Maximum font for tag weighting. Default is 10.', $autoload);
	add_option('tnspoptagsexclude', '', 'Categories to exclude from tag listing.', $autoload);
	add_option('tnspoptagsnum', '10', 'Number of tags to show in listing. Default is 10.', $autoload);
	add_option('tnspostsperhome', '2', 'Number of posts to display on the home page.', $autoload);
	add_option('tnspostspersearch', '10', 'Number of posts to display on a search page.', $autoload);
	add_option('tnspostspercategory', '-1', 'Number of posts to display on a category page.', $autoload);
	add_option('tnspostsperauthor', '-1', 'Number of posts to display on aa author archive page.', $autoload);
	add_option('tnspostsperday', '15', 'Number of posts to display on a day archive page.', $autoload);
	add_option('tnspostspermonth', '20', 'Number of posts to display on a month archive page.', $autoload);
	add_option('tnspostsperyear', '-1', 'Number of posts to display on the search page.', $autoload);
	add_option('tnssinglepost', '0', 'Whether to display single posts exclusively on a page', $autoload);
	add_option('tnsajaxcomments', '1', 'Whether to display ajax comments on front page', $autoload);
	add_option('tnsajaxthrobberurl', $blog_template_directory . '/images/working.gif', 'URI to ajax throbber', $autoload);
	add_option('tnsajaxcommentsurl', $blog_template_directory . '/ajax-comments.php', 'URI to ajax-comments.php', $autoload);
	add_option('tnslightbox', '1', 'Whether to use lightbox_plus plugin', $autoload);
	add_option('tnsthemeta', '0', 'Whether to display WP post meta', $autoload);


} else if (get_option('tnsinstalled') < $current_ver) { // If tonus has already been installed, use this to update or add new fields between versions
	update_option('tnsinstalled', $current_ver);
	
	if (!get_option('tnssinglepost')) {
		add_option('tnssinglepost', '0', 'Whether to display single posts exclusively on a page', $autoload); /* Added in v1.2 */
	}
	if (!get_option('tnsajaxcomments')) {
		add_option('tnsajaxcomments', '1', 'Whether to display ajax comments on front page', $autoload); /* Added in v1.3 */
	}
	if (!get_option('tnsajaxthrobberurl')) {
		add_option('tnsajaxthrobberurl', $blog_template_directory . '/images/working.gif', 'URI to ajax throbber', $autoload); /* Added in v1.3 */
	}
	if (!get_option('tnsajaxcommentsurl')) {
		add_option('tnsajaxcommentsurl', $blog_template_directory . '/ajax-comments.php', 'URI to ajax-comments.php', $autoload);	/* Added in v1.3 */
	}
	if (!get_option('tnslightbox')) {
		add_option('tnslightbox', '1', 'Whether to use lightbox_plus plugin', $autoload); /* Added in v1.5 */
	}
	if (!get_option('tnsthemeta')) {
		add_option('tnsthemeta', '0', 'Whether to display WP post meta', $autoload); /* Added in v1.8*/
	}
}

// Load functions for Posts Per Page options 
include("plugins/perpage.php"); 
add_filter('query_string', 'custom_posts_per_page'); 

if (get_option('tnslightbox') == 1) { // if image lightbox_plus is enabled
	// Load function for lightbox_plus plugin
	function wp_lightbox_plus_replace($the_content) { 
		$preg = '/(<a(.*?)href="([^"]*.)(bmp|gif|jpeg|jpg|png)"(.*?)><img)/ie';
  		$repl = '(strstr("\2\5","rel=") ? "\1" : "<a\2href=\"\3\4\"\5 rel=\"lightbox\"><img")';
		return preg_replace($preg,$repl,$the_content);
	}
	add_filter('the_content', 'wp_lightbox_plus_replace');
}

// Load comment_count function
function get_comments_count() {
global $id, $comment, $tablecomments, $wpdb, $comment_count_cache;
if ('' == $comment_count_cache["$id"]) $number = $wpdb->get_var("SELECT COUNT(*) FROM $tablecomments WHERE comment_post_ID = $id AND comment_approved = '1'");
else $number = $comment_count_cache["$id"];
return $number;
}

// Add the options page.
add_action ('admin_menu', 'tnsmenu');
$tnsloc = '../themes/' . basename(dirname($file)); 

function tnsmenu() {
	add_submenu_page('themes.php', 'tonus options', 'tonus options', 5, $tnsloc . 'functions.php', 'menu');
}

function menu() {
	load_plugin_textdomain('tnsoptions');
?>
<?php if (isset($_POST['Submit'])) : ?>
	<div id="message" class="updated fade">
		<p><?php _e('tonus options have been updated'); ?></p>
	</div>
<?php endif; ?>

<div class="wrap">

<h2><?php _e('tonus options'); ?></h2>
<form name="dofollow" action="" method="post">
  <input type="hidden" name="action" value="<?php tnsupdate(); ?>" />
  <input type="hidden" name="page_options" value="'dofollow_timeout'" />
  <table width="700px" cellspacing="2" cellpadding="5" class="editform">
		
		<tr valign="top">
		<th scope="row"><?php _e('Asides'); ?></th>
		<td>
			<input name="tnsasidesloc" id="inline" type="radio" value="1" <?php checked('1', get_option('tnsasidesloc')); ?> /> 
			<label for="tnsasidesloc1"><?php _e('Inline Asides') ?></label><br />
			<input name="tnsasidesloc" id="segmented" type="radio" value="0" <?php checked('0', get_option('tnsasidesloc')); ?> /> 
			<label for="tnsasidesloc2"><?php _e('Separated Asides') ?></label>
			<p><small>Determines whether Asides (if they are active) are shown inline or separated.</small></p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php _e('Asides Category'); ?></th>
		<td>
			<label for="tnsasidescat">
			<?php
			global $wpdb;
			$id = get_option('tnsasidescat');
			if ($id != 0) {
				$asides_title = $wpdb->get_var("SELECT cat_name from $wpdb->categories WHERE cat_ID = $id");
			} else {
				$asides_title='No Asides';
			}
			$asides_cats = $wpdb->get_results("SELECT * from $wpdb->categories");
			?>
			<select name="tnsasidescat" id="tnsasidescat" style="width: 300px;">
			<option value="<?php echo get_option('tnsasidescat'); ?>"><?php echo $asides_title; ?></option>
			<option value="-----">----</option>
			<option value="0">No Asides</option>
			<?php
			foreach ($asides_cats as $cat) {
			echo '<option value="' . $cat->cat_ID . '">' . $cat->cat_name . '</option>';
            }
            ?>
			</select>
			<p><small>Select a category and it will be displayed as Asides. Select 'No Asides' to disable asides.</small></p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php _e('Asides Shown'); ?></th>
		<td>
			<input name="tnsasidesnum" id="tnsasidesnum" type="text" value="<?php echo get_option('tnsasidesnum'); ?>" size="2" /> 
			<p><small>Set the number of Asides to show. Only applicable with 'Separated Asides' option enabled.</small></p>
		</td>
		</tr>

		<tr valign="top">
		<td colspan="2"><hr></td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Inline Ajax Comments'); ?></th>
		<td>
			<input name="tnsajaxcomments" id="tnsajaxcommentsoff" type="radio" value="0" <?php checked('0', get_option('tnsajaxcomments')); ?> /> 
			<label for="tnsajaxcomments1"><?php _e('Disable Inline Ajax Comments') ?></label><br />
			<input name="tnsajaxcomments" id="tnsajaxcommentson" type="radio" value="1" <?php checked('1', get_option('tnsajaxcomments')); ?> /> 
			<label for="tnsajaxcomments2"><?php _e('Enable Inline Ajax Comments') ?></label>
			<p><small>When enabled, ajax comments are shown only on the front page.<br />The ajax comments code was written by <a href="http://txfx.net/" title="TxFx">Mark Jaquith</a></small></p>		
		</td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Ajax Comments - URLs'); ?></th>
		<td>
			<input name="tnsajaxthrobberurl" id="tnsajaxthrobberurl" type="text" value="<?php echo get_option('tnsajaxthrobberurl'); ?>" size="30" /> throbber image<br />
			<input name="tnsajaxcommentsurl" id="tnsajaxcommentsurl" type="text" value="<?php echo get_option('tnsajaxcommentsurl'); ?>" size="30" /> ajax-comments.php<br />
			<p><small>URLs for throbber and ajax-comments.php must be correct for ajax comments to work.</small></p>
		</td>
		</tr>

		<tr valign="top">
		<td colspan="2"><hr></td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Single Post display'); ?></th>
		<td>
			<input name="tnssinglepost" id="tnssinglepostoff" type="radio" value="0" <?php checked('0', get_option('tnssinglepost')); ?> /> 
			<label for="tnssinglepost1"><?php _e('Display Single Posts normally') ?></label><br />
			<input name="tnssinglepost" id="tnssingleposton" type="radio" value="1" <?php checked('1', get_option('tnssinglepost')); ?> /> 
			<label for="tnssinglepost2"><?php _e('Display Single Posts without sidebar') ?></label>
			<p><small>Display single posts using the default layout or without the sidebar.</small></p>		
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Post Meta display'); ?></th>
		<td>
			<input name="tnsthemeta" id="tnsthemetaoff" type="radio" value="0" <?php checked('0', get_option('tnsthemeta')); ?> /> 
			<label for="tnsthemeta1"><?php _e('Hide custom field meta') ?></label><br />
			<input name="tnsthemeta" id="tnsthemetaon" type="radio" value="1" <?php checked('1', get_option('tnsthemeta')); ?> /> 
			<label for="tnsthemeta2"><?php _e('Display custom field meta') ?></label>
			<p><small>Choose whether to display custom post fields using the_meta().</small></p>		
		</td>
		</tr>

		<tr valign="top">
		<td colspan="2"><hr></td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('LightBox Plus (plugin)'); ?></th>
		<td>
			<input name="tnslightbox" id="tnslightboxoff" type="radio" value="0" <?php checked('0', get_option('tnslightbox')); ?> /> 
			<label for="tnslightbox1"><?php _e('Disable LightBox') ?></label><br />
			<input name="tnslightbox" id="tnslightboxon" type="radio" value="1" <?php checked('1', get_option('tnslightbox')); ?> /> 
			<label for="tnslightbox2"><?php _e('Enable LightBox') ?></label>
			<p><small>Display images in transparent overlay. Based on <a href="http://serennz.cool.ne.jp/sb/sp/lightbox/">lightbox_plus</a></small></p>		
		</td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Posts Per Page (plugin)'); ?></th>
		<td>
			<input name="tnspostsperhome" id="tnspostsperhome" type="text" value="<?php echo get_option('tnspostsperhome'); ?>" size="3" /> Posts on home page<br />
			<input name="tnspostspersearch" id="tnspostspersearch" type="text" value="<?php echo get_option('tnspostspersearch'); ?>" size="3" /> Posts per search page<br />
			<input name="tnspostspercategory" id="tnspostspercategory" type="text" value="<?php echo get_option('tnspostspercategory'); ?>" size="3" /> Posts per category archive<br />
			<input name="tnspostsperauthor" id="tnspostsperauthor" type="text" value="<?php echo get_option('tnspostsperauthor'); ?>" size="3" /> Posts per author archive<br />
			<input name="tnspostsperday" id="tnspostsperday" type="text" value="<?php echo get_option('tnspostsperday'); ?>" size="3" /> Posts per day archive<br />
			<input name="tnspostspermonth" id="tnspostspermonth" type="text" value="<?php echo get_option('tnspostspermonth'); ?>" size="3" /> Posts per month archive<br />
			<input name="tnspostsperyear" id="tnspostsperyear" type="text" value="<?php echo get_option('tnspostsperyear'); ?>" size="3" /> Posts per year archive<br />
			<p><small>Number of posts to display for each type of page. Based on <a href="http://wordpress.org/support/6/11211">Custom Posts Per Page</a><br />Number of posts on home is exclusive of inline asides, if enabled.<br />Use '-1' to show all posts.</small></p>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Popular Tags (plugin)'); ?></th>
		<td>
			<input name="tnspoptags" id="tnspoptagsoff" type="radio" value="0" <?php checked('0', get_option('tnspoptags')); ?> /> 
			<label for="tnspoptags1"><?php _e('Disable Popular Tags') ?></label><br />
			<input name="tnspoptags" id="tnspoptagson" type="radio" value="1" <?php checked('1', get_option('tnspoptags')); ?> /> 
			<label for="tnspoptags2"><?php _e('Enable Popular Tags') ?></label>
			<p>
			<small>Popular Tags is a tag weighting plugin by <a href="http://www.squible.com/2005/07/09/tag-happy-popular-tags-plugin/">Theron Parlin</a></small>
			</p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php _e('Popular Tags - Options'); ?></th>
		<td>
			<input name="tnspoptagsminfont" id="tnspoptagsminfont" type="text" value="<?php echo get_option('tnspoptagsminfont'); ?>" size="2" /> Minimum Font Size<br />
			<input name="tnspoptagsmaxfont" id="tnspoptagsmaxfont" type="text" value="<?php echo get_option('tnspoptagsmaxfont'); ?>" size="2" /> Maximum Font Size<br />
			<input name="tnspoptagsnum" id="tnspoptagsnum" type="text" value="<?php echo get_option('tnspoptagsnum'); ?>" size="2" /> Top Number of Categories to Display<br />
			<input name="tnspoptagsexclude" id="tnspoptagsexclude" type="text" value="<?php echo get_option('tnspoptagsexclude'); ?>" size="8" /> Category Numbers to Exclude (comma separated)
			<p><small>Set options for the Popular Tags plugin (if enabled).</small></p>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row"><?php _e('Fancy Tooltips (plugin)'); ?></th>
		<td>
			<input name="tnstooltips" id="tnstooltipsoff" type="radio" value="0" <?php checked('0', get_option('tnstooltips')); ?> /> 
			<label for="tnstooltips1"><?php _e('Disable Fancy Tooltips') ?></label><br />
			<input name="tnstooltips" id="tnstooltipson" type="radio" value="1" <?php checked('1', get_option('tnstooltips')); ?> /> 
			<label for="tnstooltips2"><?php _e('Enable Fancy Tooltips') ?></label>
			<p>
			<small>Fancy tooltips is based on the plugin by <a href="http://www.victr.lm85.com/fancytooltips/">Victor Kulinski</a></small>
			</p>
		</td>
		</tr>

		</table>

	<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?> &raquo;" /></p>

</form>
</div>

<div class="wrap">
	<p style="text-align: center;">Be sure to check for theme updates at the <a href="http://kashou.net/blog/tonus-theme" title="tonus homepage">tonus</a> homepage.</p>
	<p style="text-align: center;">You are running tonus version <?php echo get_option('tnsinstalled'); ?>
</div>

<?php } // this ends the admin page ?>