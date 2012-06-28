<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<div class="container">
	<div id="slideshow">	
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
</div>
<table>
</table>
<?php get_footer(); ?>