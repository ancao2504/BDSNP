<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post
 */
?>
<?php get_header(); ?>
<div class="main" role="main">
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
						<div class="post-tags">
							<img class="tag-img" src="<?php echo get_template_directory_uri().'/images/tag.svg' ?>"/>
							<?php echo the_tags('', ', '); ?>
						</div>
					</section> 
				</article>   
			</div>  
			<?php get_sidebar(); ?>
		</div>
	</section> 
</div>
<?php get_footer(); ?>