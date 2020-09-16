<?php
/*
Template Name: Page produits
*/
?>
<?php get_header(); ?>
	<div id="content">
	    <div id="main" role="main">
			<?php get_template_part('partials/content','breadcrumbs-cat') ; ?>
			<?php $postClasse = '' ; if(get_field('add-slider-header')==true) { $postClasse = 'main-slider-padding' ; } ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
									
				<header class="article-header">
					<h1 class="page-title">
						<?php echo the_title();?>
					</h1>
					<div class="intro">
			    		<blockquote><?php the_content() ; ?></blockquote>
			    	</div>
				</header> <!-- end article header -->
			    <section class="entry-content wrap-content" itemprop="articleBody">
				    <?php
			    			if(get_children($post->ID)) {
								get_template_part('partials/loop','produits-categories');
							}else{
								get_template_part('partials/loop','produits-cat');
							}
							wp_reset_query();
							wp_reset_postdata();
					?>
					
				    <?php wp_link_pages(); ?>
				</section> <!-- end section article -->
			</article> <!-- end article -->
		</div> <!-- end #main -->
	</div> <!-- end #content -->
<?php get_footer(); ?>

