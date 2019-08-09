<?php get_header(); ?>
<div class="category-content container">
	<div class="row">
		<div class="main-content col-lg-8"> 
	        <article class="page"> 
	            <section class="article-container" data-stats-ve="35">
	                <h1><?php single_cat_title(); ?></h1>
	                <div class="cc">
	                    <?php the_archive_description(); ?>
	                    <table class="spaced-table">
                     	 	<tbody>
		                      	<?php
							        if ( have_posts() ) {
						               	while ( have_posts() ) { 
						               		the_post(); ?>
											<tr>
				                          		<td class="align-middle icon-column"><?php echo get_the_post_thumbnail(get_the_ID(), 'post_thumbnail'); ?>  </td>
				                          		<td>
					                          		<h2><?php the_title(); ?></h2>
					                          		<?php echo wp_trim_words(get_the_content(), 50); ?>	
					                          		<p class="detail-link"><a class="action-button" href="<?php echo get_permalink(); ?>">Chi tiết</a></p>
				                          		</td>
			                        		</tr>
									<?php } } ?>
	                      	</tbody>
	                    </table>
	                </div>
	            </section> 
            	<?php create_paginate(); ?>
	        </article>  
	    </div>
     	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>