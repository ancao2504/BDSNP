<?php echo get_header(); ?>
<?php 
	$id = get_the_id(); 
	$content = get_post_field('post_content', $id);
	if( empty($content) ) { ?>
		<section class="post-content container"> 
			<div class="row">    
				<div class="main-content col-lg-8"> 
					<article class="page"> 
						<section class="article-container" data-stats-ve="35">
							<h1><?php the_title(); ?></h1>
							<div class="drop-head"><?php echo 'Ngày ' . get_the_date('d') . ' tháng ' . get_the_date('m') . ' năm '. get_the_date('Y'); ?></div>
							<div class="cc">
								<?php echo the_content(); ?>
							</div>
						</section> 
					</div>    
				</article>   
				<?php get_sidebar(); ?>
			</div>  
		</section> 
	<?php } else {
		echo $content;
	}
?>
		

<?php echo get_footer(); ?>