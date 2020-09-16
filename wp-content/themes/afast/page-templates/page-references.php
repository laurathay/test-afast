<?php
/*
Template Name: Page références
*/
?>
<?php get_header(); ?>
	<div id="content">
	    <div id="main" role="main">
			<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('partials/content','breadcrumbs') ; ?>
			<?php $postClasse = '' ; if(get_field('add-slider-header')==true) { $postClasse = 'main-slider-padding' ; } ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
									
				<header class="article-header">
					<h1 class="page-title">
						<?php echo the_title(); ?>
					</h1>
					<div class="intro">
			    		<blockquote><?php the_content() ; ?><?php// the_field('page-intro'); ?></blockquote>
			    	</div>
			    	<hr>
				</header> <!-- end article header -->
			    <section class="entry-content wrap-content" itemprop="articleBody">
				    <?php
							get_template_part('partials/loop','references');
							wp_reset_query();
							wp_reset_postdata();
					?>
					
				    <?php wp_link_pages(); ?>
				</section> <!-- end section article -->
									
				<footer class="article-footer">
				</footer> <!-- end article footer -->
									    
			</article> <!-- end article -->
		</div> <!-- end #main -->
	</div> <!-- end #content -->
<?php get_footer(); ?>

