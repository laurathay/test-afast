<?php get_header(); ?>
			
			<div id="content">
			
				    <div id="main" role="main">
						<?php get_template_part('partials/content','breadcrumbs') ; ?>
			    		<?php get_template_part( 'partials/loop', 'page' ); ?>
			    		<?php
			    			if(have_posts()){
			    				while (have_posts()) {
			    					the_post();
			    					the_content();
			    				}
			    			} 
			    		?>
    				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>