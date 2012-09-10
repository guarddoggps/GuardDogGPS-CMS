<?php
global $post;
$redirect = get_post_meta($post->ID, 'redirect', true);
if ($redirect)
        wp_redirect($redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="google-site-verification" content="b-0tQPJJKDrmwgRpRF2HGFkHMaZstONnNU0JBnykKac" />
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="alexaVerifyID" content="nX6lOqfE4YUm99YzB7mhgvC5_gA" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="Description" content="Guard Dog GPS manufactures AutoTrac, FleetTrac, MotoTrac and MarineTrac. Tracking and Security Systems for Cars, Fleets, Motorcycles and Watercraft." />
<meta name="keywords" content="guarddoggps, guard dog, AutoTrac, car gps, MotoTrac, motorcycle gps, FleetTrac, truck management, MarineTrac, boat gps, tracking security, gps products, security devices, speed control, virtual fence, speed alerts, gps devices, smart tracker, small gps, personal gps, gps spy" />
<meta name="copyright" content="Copyright (c) 2011 - GuardDogGPS Inc." />
<meta name="author" content="GuardDogGPS Admin" />
<meta name="viewport" content="width=1060" />
	<title><?php
        if ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; print 'Home'; }
        else if ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
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
        <!-- 5-rPOiwId1BR2SGJ6zoZr9g46kU -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34467312-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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
		    echo $header_content->post_content; 
		?>
     </div><!-- #masthead -->   
     <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
   