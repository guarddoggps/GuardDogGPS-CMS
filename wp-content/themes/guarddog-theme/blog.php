<?php
/*
Template Name: Blog
*/
?>
<?php
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('posts_per_page=2'.'&paged='.$paged);
	while ($wp_query->have_posts()) : $wp_query->the_post();
?>