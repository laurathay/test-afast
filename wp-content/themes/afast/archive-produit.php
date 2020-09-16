<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
		    		<blockquote><?php the_field('page-intro'); ?><?php echo category_description(); ?>
		    			<?php
if(!(is_paged())){
echo category_description();
}
?>
</blockquote>
			
				    <div id="main" class="large-12 medium-12 columns" role="main">
						
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
						<article id="post-<?php the_ID(); ?>" <?php post_class('product-link, background-cover'); ?> role="article" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>');">
												
							<header class="article-header">
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								</h2>
								<?php //get_template_part( 'partials/content', 'byline' ); ?>
							</header> <!-- end article header -->
											
							<section class="entry-content" itemprop="articleBody">
								<a href="<?php the_permalink() ?>"></a>
									<?php the_content('<button class="tiny">Read More</button>'); ?>
								</a>
							</section> <!-- end article section -->
												
							<footer class="article-footer">
						    	<!-- <p class="tags"><?php //the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p> -->
							</footer> <!-- end article footer -->
						</article> <!-- end article -->

					<?php endwhile; ?>	
										
					<?php joints_page_navi(); ?>

					<?php else : ?>
						<?php //get_template_part( 'partials/content', 'missing' ); ?>
					<?php endif; ?>

								
				    </div> <!-- end #main -->
    
				    <?php //get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>