<?php 
	get_template_part('partials/content','breadcrumbs-cat-single') ; 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
    <section class="entry-content wrap-content" itemprop="articleBody">
		<?php
			$product = '';
			$product_picts = get_field( 'product_picts' ) ;
			$product_picts_type= get_field( 'product_picts_type' ) ;
			$product_picts_ratio = get_field( 'product_picts_ratio' ) ;
			$product_link = get_field( 'product_link_page' ) ;
			$btn = '<a href="'.get_site_url().'/contact" title="Contact" class="btn btn-small btn-2 left">Contact</a>' ;
			$product_ref = get_post_meta( $id, 'product_ref', true ) ;
			echo '
				<div class="product clearfix">
					<div class="column medium-4 large-5 no-padding-left">';
			if(empty($product_picts)) {
				$product_picts = get_the_post_thumbnail( $id, 'full' ) ;
				if(!empty($product_picts)) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
					echo '<div class="product-pict"><a href="'.$thumb_url[0].'" title="'.get_the_title().'" class="unlink">'.$product_picts.'</a></div>' ;
				}
			}else{
				echo '<div class="slider-for '.$product_picts_ratio.'">'.$product_picts.'</div>';
			}

			echo 	'
					</div>
					<div class="column product-content medium-8 large-7 no-padding-right">';
					$product_title = get_the_title( $id ) ;
					// $product_title = get_post_meta( $id, 'product_name', true ) ;
					// if(empty($product_title)) $product_title = get_the_title( $id ) ;
					// $product_subtitle = get_post_meta( $id, 'product_subtitle', true ) ;
					// if(!empty($product_subtitle)) $product_subtitle = '<span class="product-linked-subtitle"><strong>'.$product_subtitle.'</strong></span>';
					// if(!empty($product_subtitle)) $product_subtitle = '<h2>'.$product_subtitle.'</h2>';
			echo 
						'<header class="article-header">	
							<h1 class="entry-title single-title" itemprop="headline">'.$product_title.'</h1>
			   			</header> <!-- end article header -->
			   			';
			if(!empty($product_ref)) echo '<strong class="product-ref">Réf.&nbsp;'.$product_ref.'</strong><br>';
					the_content() ;
					echo $btn.'
					</div>
				</div>
			';
		?>
	</section> <!-- end article section -->
						

	<footer class="article-footer wrap-content">
			<?php 

				wp_reset_query();
				wp_reset_postdata();

		    	$pod = pods( 'products', get_the_id() );
				$related = $pod->field( 'product_linked' );
				$lang = get_locale();
				$product_btn='Voir'; 
				$title_more='Les produits associés';
				if($lang=='en_GB'){ 
					$product_btn='More'; 
					$title_more='Related products'; 
				}

				if ( ! empty( $related ) ) {
					echo '<h3>'.$title_more.'</h3>' ;
					echo '<ul id="product-linked" class="small-block-grid-4">';

					foreach ( $related as $rel ) :
						$id = $rel[ 'ID' ];

						$product_linked_url = get_permalink( $id ) ;
						$product_linked_thumbnail = get_the_post_thumbnail( $id ) ;

						if(!empty($product_linked_thumbnail)) {
							$product_linked_thumbnail = '<span class="product-linked-thumbnail invisible">'.$product_linked_thumbnail.'</span>' ;
							/*$product_linked_title = get_post_meta( $id, 'product_name', true ) ;
							if(empty($product_linked_title))*/ $product_linked_title = get_the_title( $id ) ;
							// $product_linked_subtitle = get_post_meta( $id, 'product_subtitle', true ) ;
							// if(!empty($product_linked_subtitle)) $product_linked_subtitle = '<h2 class="product-linked-subtitle">'.$product_linked_subtitle.='</h2>';

							$product_linked_thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $id ) );

							echo
							'
								<li class="product-linked">
									<div class="product-linked-container">
										<a href="'.$product_linked_url.'" title="'.$product_linked_title.'" class="background-cover" style="background:url('.$product_linked_thumb_url.');">
											<h4 class="product-linked-title">
												'.$product_linked_title.'
											</h4>
										</a>
										'.$product_linked_thumbnail.'
									</div>
								</li>
							';
						}
					endforeach;

					echo '</ul>' ;
				} 
				/*// Si il n'y a pas de produit associé, c'est un accessoire ...
				else {
					$POST_ID = get_the_id() ;
					$args =  array(
					    'post_type' => 'products',
					    'posts_per_page' => -1,
						'orderby'    => 'id',
						'order'      => 'ASC'
					);
					$loop = new WP_Query( $args );

					$n_product=0;
					while ( $loop->have_posts() ) : $loop->the_post(); 
					++$n_product ;
					endwhile ;
					if($n_product!=0){

						echo '<h3>'.$title_more.'</h3>' ;
						echo '<ul id="product-linked" class="small-block-grid-4">';
						while ( $loop->have_posts() ) : $loop->the_post(); 
								
							$id = get_the_id();
				    		$pod = pods( 'products', $id );

							$related = $pod->field( 'product_linked' );

							foreach ( $related as $rel ) :
								//get id for related post and put in ID
								if($rel['ID']==$POST_ID){

									$product_linked_url = get_permalink( $id ) ;
									$product_linked_thumbnail = get_the_post_thumbnail( $id ) ;

									if(!empty($product_linked_thumbnail)) {
										$product_linked_thumbnail = '<span class="product-linked-thumbnail">'.$product_linked_thumbnail.'</span>' ;
										$product_linked_title = get_the_title( $id ) ;
										if(!empty($product_linked_subtitle)) $product_linked_subtitle = '<p class="product-linked-subtitle">'.$product_linked_subtitle.='</p>';

										$product_linked_thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $id ) );
										echo
										'
											<li class="product-linked">
												<div class="product-linked-container">
													<a href="'.$product_linked_url.'" title="'.$product_linked_title.'" class="background-cover" style="background:url('.$product_linked_thumb_url.');">
														<h4 class="product-linked-title">
															'.$product_linked_title.'
														</h4>
													</a>
													'.$product_linked_thumbnail.'
												</div>
											</li>
										';
									}
								}

							endforeach ;

						endwhile ;
						echo '</ul>' ;
						wp_reset_query();
						wp_reset_postdata();
					}
				}*/ 
			?>
	</footer> <!-- end article footer -->
</article> <!-- end article -->