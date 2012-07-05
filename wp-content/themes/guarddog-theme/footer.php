    <div id="footer">
		<?php
			global $wpdb;
		    $footer_content = $wpdb->get_row(
		        $wpdb->prepare(
		            "SELECT * FROM $wpdb->posts
		             WHERE post_type = %s
					 AND post_title = %s
					 LIMIT 1
		            ",
		            'footer_post',
					'Footer Content'
		        )
		    );
		    echo $footer_content->post_content;
		?>
    </div><!-- #footer -->
</div><!-- #container -->
</body>
</html>