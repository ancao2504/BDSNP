<div class="side-container col-lg-4"> 
	<div class="sidebar-content">
		<?php 
			if( is_category('4') ) {
				$cat_id = '5';
			}  else {
				$cat_id = '4';
			}
		?>
		<h4 class="row"><?php echo get_cat_name($cat_id); ?></h4>
		<?php 
			$args = array(
						'numberposts' 	=> '8',
						'category'		=> $cat_id,
						'orderby' 		=> 'date',
						'order' 		=> 'DESC'	
					);
			$product_posts = get_posts($args);
			echo '<ul class="related-products">';
			foreach ($product_posts as $product_post) {
				setup_postdata( $product_post );
				echo '<li><a href="' . get_permalink($product_post->ID) . '"><div class="row"><div class="col-md-4 col-sm-4 col-4">' . get_the_post_thumbnail($product_post->ID, 'post_thumbnails') . '</div><div class="col-md-8 col-sm-8 col-8 item-side-title"><div>' . $product_post->post_title . '</div></div></div></a></li>';
			}
			wp_reset_postdata();
			echo '</ul>';
		?>

		<?php 
			if( is_single() ) {
				$cat_id = '5';
			
				echo '<h4 class="row">' . get_cat_name($cat_id) . '</h4>';
				$args = array(
							'numberposts' 	=> '8',
							'category'		=> $cat_id,
							'orderby' 		=> 'date',
							'order' 		=> 'DESC'	
						);
				$product_posts = get_posts($args);
				echo '<ul class="related-products">';
				foreach ($product_posts as $product_post) {
					setup_postdata( $product_post );
					echo '<li><a href="' . get_permalink($product_post->ID) . '"><div class="row"><div class="col-md-4 col-sm-4 col-4">' . get_the_post_thumbnail($product_post->ID, 'post_thumbnails') . '</div><div class="col-md-8 col-sm-8 col-8 item-side-title">' . $product_post->post_title . '</div></div></a></li>';
				}
				wp_reset_postdata();
				echo '</ul>';
				}
		?>
	</div>
</div>