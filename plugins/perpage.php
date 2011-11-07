<?php


function custom_posts_per_page($query_string) {
	global $posts_per;

	$posts_per['home']      = get_option('tnspostsperhome');
	$posts_per['day']       = get_option('tnspostsperday');
	$posts_per['month']     = get_option('tnspostspermonth');
	$posts_per['search']    = get_option('tnspostspersearch');
	$posts_per['year']      = get_option('tnspostsperyear');
	$posts_per['author']    = get_option('tnspostsperauthor');
	$posts_per['category']  = get_option('tnspostspercategory');

	$query = new WP_Query();
	$query->parse_query($query_string);
	
	if ($query->is_home) {
		$num = $posts_per['home'].'&order=DESC';

	} else if ($query->is_day) {
		$num = $posts_per['day'].'&order=DESC';
	
	} elseif ($query->is_month) {
		$num = $posts_per['month'].'&order=DESC';
	
	} elseif ($query->is_year) {
		$num = $posts_per['year'].'&order=ASC';
	
	} elseif ($query->is_author) {
		$num = $posts_per['author'];
	
	} elseif ($query->is_category) {
		$num = $posts_per['category'];
	
	} elseif ($query->is_search) {
		$num = $posts_per['search'];
	}
	
	if (isset($num)) {
	
	
		if (preg_match("/posts_per_page=/", $query_string)) {
			
			$query_string = preg_replace("/posts_per_page=[0-9]*/", "posts_per_page=$num", $query_string);
		} else {
			if ($query_string != '') {
				$query_string .= '&';
			}
		$query_string .= "posts_per_page=$num";
		}
		
	}
	
return $query_string;
}

?>