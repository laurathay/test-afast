<?php
	$product_cat = get_field('product_cat') ;
	if($product_cat!=''){
		$args =  array(
		    'post_type' => 'products',
		    'posts_per_page' => -1,
			'orderby'    => 'id',
			'order'      => 'ASC',
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'category',
		            'terms' => $product_cat
		        )
	    	)
		);
	}
	$loop = new WP_Query( $args );
	$n_products=0;
	while ( $loop->have_posts() ) {
		$loop->the_post();
		++$n_products;
	} 

	echo '<ul class="medium-block-grid-2 large-block-grid-3" id="products"><div class="grid-sizer medium-block-grid-2 large-block-grid-3"></div>';
	while ( $loop->have_posts() ) : $loop->the_post(); 

		$product_link = get_permalink( $id );

		// $product_title = get_post_meta( $id, 'product_name', true ) ;
		$product_title = get_the_title( $id ) ;
		// if(empty($product_title)) $product_title = get_the_title( $id ) ;

		$product_thumb = get_the_post_thumbnail( $id, 'medium' ) ;
		$product_thumb_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' );
		$product_btn = get_locale() ;
		if($product_btn=='fr_FR')$product_btn='En savoir plus';
		if($product_btn=='en_GB')$product_btn='More';

		echo
		'
			<li class="product-link">
				<div class="product-container clearfix">
					<div class="product-content">
						<a href="'.$product_link.'" title="'.$product_title.'">
						<h2 class="product-title">'.$product_title.'</h2>
						<div class="product-intro clearfix">
							<p>
							<span class="product-thumb" class="background-cover" style="background:url('.$product_thumb_bg.') no-repeat top left">'.$product_thumb.'</span>';
							the_excerpt_max_charlength(33);
		echo '				</p>
						</div>
						<p class="text-center"><span class="btn btn-small btn-2 active">'.$product_btn.'</span></p>
						</a>
					</div>
				</div>
			</li>
		';
	endwhile ;
	echo '</ul>';
	wp_reset_query();
	wp_reset_postdata();
?>