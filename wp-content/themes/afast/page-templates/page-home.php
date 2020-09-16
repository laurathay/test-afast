<?php
/*
Template Name: Page d'accueil
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="content">
	    <div id="main" role="main">
			    	<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $postClasse = '' ; if(get_field('add-slider-header')==true) { $postClasse = 'main-slider-padding' ; } 
						// $page_slider = get_field('page-slider');

			?>
			<?php if(!is_front_page()){
				echo '<ul class="breadcrumbs wrap-content"><li><a href="#">Accueil</a><li></ul>' ;
			}?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
									
				<header class="article-header">
					<h1 class="page-title">
						<?php 
					    	$pageTitle = get_field('page-title');
					    	if(empty($pageTitle)){
					    		echo the_title(); 
					    	}else{
					    		echo $pageTitle;
					    	} 
				    	?>
					</h1>
				</header> <!-- end article header -->
								
			    <section class="entry-content wrap-content" itemprop="articleBody">
					<div class="intro">
			    		<blockquote><?php the_field('page-intro'); ?></blockquote>
			    	</div>
			    	<hr>
				    <?php 
		    			get_template_part( 'partials/content', 'home' ); 
			    	?>
				    <?php wp_link_pages(); ?>
				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php 
						wp_reset_query();
		  				wp_reset_postdata();
						$page_slider = get_field('page-slider');
						if(!empty($page_slider)) {
							echo '
							<div id="main-slider">
							' . $page_slider . '
							</div><div class="clear"></div>';
						}
					?>
				</footer> <!-- end article footer -->
									    
			</article> <!-- end article -->
			
		<?php //endwhile; else : ?>
							
			<?php //get_template_part( 'partials/content', 'missing' ); ?>

		<?php // endif; ?>
									

		</div> <!-- end #main -->
	</div> <!-- end #content -->

<?php get_footer(); ?>
