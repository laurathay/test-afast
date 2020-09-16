			<article id="post-<?php the_ID(); ?>" <?php post_class(/*$postClasse*/); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
									
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
			    		<blockquote><?php the_content() ; ?><?php// the_field('page-intro'); ?></blockquote>
			    	</div>
			    	<hr>
				    
				    <?php
						// if(get_children($post->ID)) {
				    	$product_cat = get_field('product_cat') ;
				    	// print_r($product_cat) ;
				    	if($product_cat!=''){
							$args =  array(
							    'post_type' => 'produits',
							    'posts_per_page' => -1,
								'orderby'    => 'id',
								'order'      => 'ASC',
							    'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            // 'field' => 'slug',
							            'terms' => $product_cat[0]
							        )
						    	)
							);
				    	}/*else{
							$args=array(
								'post_type' => 'produits',
								'posts_per_page' => -1,
								'orderby'    => 'id'
							);		
				    	}*/
							$loop = new WP_Query( $args );
							$n_products=0;
							// echo category_description();
							while ( $loop->have_posts() ) {
								$loop->the_post();
								++$n_products;
							} 
							$grid_sizer = '50%' ;
							if($n_products>2)$n_products=3 ; $grid_sizer = '33.333333333%';

							echo '<ul class="small-block-grid-'.$n_products.'" id="products"><div class="grid-sizer" style="width:'.$grid_sizer.';"></div>';
							while ( $loop->have_posts() ) : $loop->the_post(); 
								$product_title = get_field('product_title') ;

								if(empty($product_title))$product_title=get_the_title();
								$product_intro = get_the_excerpt() ;
								$product_intro = get_the_content('En savoir +');
										// <a href="" style="background-image:  ;">
								
							/*	echo
								'
									<li class="product-link">
										<h2>'.$product_title.'</h2>
										<span class="product-ref">'.$product_ref.'</span>
										<div class="product-intro">
											'.$product_intro.'
										</div>
										<div class="product-bg">'.$product_thumb.'</div>
										</a>
									</li>';*/
								$product_title = get_field('product_title') ;
								if(empty($product_title))$product_title=get_the_title();
								$product_intro = get_field('product_intro') ;
								$product_intro = get_the_content('En savoir +');

								$product_ref = get_field('product_ref') ;
								// $product_desc = get_field('product-desc') ;
								$product_thumb = get_the_post_thumbnail() ;
								$product_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								// <span class="product-ref">'.$product_ref.'</span>

								echo
										// <div class="product-container clearfix" style="background-image: url('.$product_bg.') ;">
								
								'
									<li class="product-link">
										<div class="product-container clearfix">
											<div class="product-content">
												<h2 class="product-title">'.$product_title.'</h2>
												<div class="product-intro">
													<p class="left">
													<span class="left">'.$product_thumb.'</span>
													'.$product_intro.'
													</p>
												</div>
											</div>
										</div>
									</li>
								';
											// <div class="product-bg"></div>

							endwhile ;
							echo '</ul>';
							wp_reset_query();
							wp_reset_postdata();
						// }
					?>
					
				    <?php wp_link_pages(); ?>
				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php 
					// idéalement fonction php => affichage des images format original en background
						/*wp_reset_query();
		  				wp_reset_postdata();
						$page_slider = get_field('page-slider');
						if(!empty($page_slider)) {
							echo '
							<div id="main-slider">
							' . $page_slider . '
							</div>';
						}*/
					?>
				</footer> <!-- end article footer -->
									    
			</article> <!-- end article -->
			
