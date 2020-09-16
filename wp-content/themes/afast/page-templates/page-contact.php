<?php
/*
Template Name: Page contact
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="content">
		<?php get_template_part('partials/content','breadcrumbs'); ?>
	    <div id="main" role="main">
			    	<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php  $postClasse = 'main-slider-padding' ; 
						// $page_slider = get_field('page-slider');

			?>
			<?php //if(!is_front_page()){
				// echo '<ul class="breadcrumbs wrap-content"><li><a href="#">Accueil</a><li></ul>' ;
		//	}?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
									
				<header class="article-header visually-hidden">
					<h1 class="page-title">
						<?php 
				    		echo the_title(); 
				    	?>
					</h1>
				</header> <!-- end article header -->
								
			    <section class="entry-content wrap-content" itemprop="articleBody">
					<div class="intro">
			    		<blockquote><?php the_field('page-intro'); ?></blockquote>
			    	</div>
			    	<hr>
			    	<section class="section-page">
						<div class="column small-7 large-6 right no-padding-right">
							<header>
								<?php the_field('col-right-content') ; ?>
							</header>
						</div>
						<aside class="column small-5 large-6 left no-padding-left">
							<?php the_field('col-left-content') ; ?>
						</aside>
						<footer>
						</footer>
					</section><hr>
				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php 
						wp_reset_query();
		  				wp_reset_postdata();
						// $page_slider = get_field('page-slider');
						// if(!empty($page_slider)) {
							echo '

							<div id="main-slider">
							<div id="map_container"><div id="map"></div></div>
							</div><div class="clear"></div>';
						// }
					?>
				</footer> <!-- end article footer -->
									    
			</article> <!-- end article -->
			
		<?php //endwhile; else : ?>
							
			<?php //get_template_part( 'partials/content', 'missing' ); ?>

		<?php // endif; ?>
									

		</div> <!-- end #main -->
	</div> <!-- end #content -->

<?php get_footer(); ?>
