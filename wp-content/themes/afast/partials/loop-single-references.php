<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<!-- <header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php //the_title(); ?></h1>
    </header> --> <!-- end article header -->
					
    <section class="entry-content wrap-content" itemprop="articleBody">
		<?php
			$ref_picts = get_field( 'ref_picts' ) ;
			$ref_picts_ratio = get_field( 'ref_picts_ratio' ) ;
			echo '
			<div class="reference clearfix">
				<div class="column medium-4 large-5 no-padding-left">';
			if(empty($ref_picts)) {
				$ref_picts = get_the_post_thumbnail( $post_id, 'full' ) ;
				if(!empty($ref_picts)) {
					echo '<div class="ref-picts">'.$ref_picts.'</div>' ;
				}
			}else{
				echo '<div class="slider-for '.$ref_picts_ratio.'">'.$ref_picts.'</div>';
				// echo '<div class="slider-nav">'.$ref_picts.'</div>';
			}

			echo '
				</div>
				<div class="column ref-content medium-8 large-7 no-padding-right">
					<header class="article-header">	
						<h1 class="entry-title single-title" itemprop="headline">'.get_the_title().'</h1>
				    </header> <!-- end article header -->';
					the_content() ;
			echo '
				</div>
			</div><!-- end .reference -->
			';
		?>
	</section> <!-- end article section -->
						
</article> <!-- end article -->