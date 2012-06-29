<?php
/*
Template Name: Autotrac
*/
?>
<?php get_header(); ?>
<div id="widget">
</div>
<div class="tab-widget">
	<?php while (have_posts()) : the_post(); ?>    
	  <?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>