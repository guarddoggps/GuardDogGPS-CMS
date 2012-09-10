<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<?php
	$blog_query = new WP_Query;
	$blog_query->query( 'post_type=post' );
?>
<div id="post-content">

<?php echo "Blog updated daily" ?>

<?php if( $blog_query->have_posts() ) : ?>

    <?php while( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

    <div class="post">
        <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
        <?php the_content(); ?>
		<?php include('comments.php'); ?>
    </div>

    <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>

</div>
<?php get_footer(); ?>