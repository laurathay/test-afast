<?php get_header(); ?>
			
			<div id="content">

					<div id="main" role="main">
						<?php get_template_part('partials/content','breadcrumbs-refs') ; ?>
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'single-references' ); ?>
					    					
					    <?php endwhile;  ?>

					    <?php endif; ?>
			
					</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>