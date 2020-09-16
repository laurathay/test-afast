<?php get_header(); ?>
			
			<div id="content">
			
				<!-- <div id="inner-content" class="row"> -->
			
				    <div id="main" role="main">
						<?php get_template_part('partials/content','breadcrumbs-refs') ; ?>
						
						<!-- To see additional archive styles, visit the /partials directory -->
						<div class="wrap-content padding-content">
						<?php
							$page_title='Références';
							if($lang!="fr_FR") $page_title='References' ;
							echo '<h1>'.$page_title.'</h1>' ; 
						?>
					    <?php get_template_part( 'partials/loop', 'archive-references' ); ?>
						</div>
						<hr>								
				    </div> <!-- end #main -->
    
				    <?php //get_sidebar(); ?>
				    
				<!-- </div> --> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>