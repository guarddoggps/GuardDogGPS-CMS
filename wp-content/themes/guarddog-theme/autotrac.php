<?php
/*
Template Name: Autotrac
*/
?>
<?php get_header(); ?>
<div class="align-widget-left sliding-widget">
	<!-- 
	THIS IS IMPORTANT::
	you simply have to put an order in your gallery images ('orderby'=> 'menu_order') and set the number of posts (of the attachment type) to be grabbed as four ('numberposts' =>
	
	So image you want at top left, order it 1, and then the sldieshow order it 2-6, and so forth using menu_order attribute!!!!
	-->
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

	$args = array(
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'orderby'=> 'menu_order',
	 'order' => 'ASC',
	 'post_mime_type' => 'image',
	 'post_status' => null,
	 'post_parent' => $post->ID
	);

	 $attachments = get_posts( $args );
	  if ( $attachments ) {
	   foreach ( $attachments as $attachment ) {
	    echo wp_get_attachment_image($attachment->ID , 'full','',array('rel' => $attachment->post_name));
	   }
	  }
	endwhile; endif; ?>
</div>

<div class="align-widget-right tab-widget">
	<?php while (have_posts()) : the_post(); ?>    
	  <?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>