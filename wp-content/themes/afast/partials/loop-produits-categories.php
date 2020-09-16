<?php
	$args=array(
		'post_parent'  => $post->ID,
		'post_type' => 'page',
		'posts_per_page' => -1,
		'orderby'    => 'id',
		'order' => 'ASC'
	);	

	$loop = new WP_Query( $args );

	$n_cats=0;

	while ( $loop->have_posts() ) {
		$loop->the_post();
		++$n_cats;
	} 
	
	$classe_cats = ' large-6 xlarge-3';
	if(is_int($n_cats/3)) $classe_cats = ' large-4';
	
	$cats='<ul class="no-bullet" id="products"><div class="grid-sizer small-6 medium-6'.$classe_cats.'"></div>';
	while ( $loop->have_posts() ) : $loop->the_post(); 
		$product_title = get_the_title( $id ) ;
		
		$cat_url = get_permalink();

		$cats.=
		'
			<li class="cat-link column small-6 medium-6'.$classe_cats.'">
				<div class="cat-container clearfix">
					<a href="'.$cat_url.'" title="'.$product_title.'">
						<div class="cat-content">
							<h2 class="cat-title">'.$product_title.'<img class="right" src="'.get_template_directory_uri().'/images/icon-arrow-right.png"></h2>
						</div>
					</a>
				</div>
			</li>
		';
	endwhile ;
	$cats.='</ul>';
	echo $cats;
?>							