<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php
        if ( is_single() ) { single_post_title(); }       
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>	
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'guarddog-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
	    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'guarddog-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>
 <div id="container">
    <div id="header">
        <div id="masthead">
			<?php
	            $args = array( 'post_type' => 'header_image');
	            $header_images = new WP_Query( $args );
			?>
			<?php if( $header_images->have_posts() ) { while( $header_images->have_posts() ) { $header_images->the_post(); ?>
			      <div class="logo">
			           <?php echo get_the_post_thumbnail( $post->ID, 'large'); ?>
			      </div>
			 <?php } } ?>
			
			
			<?php
	            $args = array( 'post_type' => 'header_post');
	            $header_posts = new WP_Query( $args );
			?>
			<?php
				$post_args = array( 'post_type' => 'header_post');
				$header_posts = new WP_Query( $post_args);
			?>
			<?php if( $header_posts->have_posts() ) { while( $header_posts->have_posts() ) { $header_posts->the_post(); ?>
				  <div class="secondaryNav">
			           <?php echo apply_filters('the_content', $post->post_content); ?>
			      </div>
			<?php } } ?>
<!--								
			<div id="logo">				
			</div>
			<div id="slogan">								
			</div>						
-->

        </div><!-- #masthead -->   
    </div><!-- #header -->
     <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
   