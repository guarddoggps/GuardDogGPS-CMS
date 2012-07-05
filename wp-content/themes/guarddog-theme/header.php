<?php
global $post;
$redirect = get_post_meta($post->ID, 'redirect', true);
if ($redirect)
        wp_redirect($redirect);
?>
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
     <div id="masthead">			
		<?php
			global $wpdb;
		    $header_content = $wpdb->get_row(
		        $wpdb->prepare(
		            "SELECT * FROM $wpdb->posts
		             WHERE post_type = %s
					 AND post_title = %s
					 LIMIT 1
		            ",
		            'header_post',
					'Header Content'
		        )
		    );
			echo "<div id='header-contact'>";
		    echo $header_content->post_content;
			echo "</div>";
					
			$args = array(
			 'post_type' => 'attachment',
			 'numberposts' => -1,
			 'orderby'=> 'ID',
			 'order' => 'ASC',
			 'post_mime_type' => 'image',
			 'post_status' => null,
			 'post_parent' => $header_content->ID
			);
			
			$attachments = get_posts($args);			
			if($attachments){
				foreach ($attachments as $attachment) {
				    echo wp_get_attachment_image($attachment->ID, 'full', false, false);
				}
			}
		?>
     </div><!-- #masthead -->   
     <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
   