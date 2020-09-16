<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $postClasse = '' ; if(get_field('add-img-header')==true) { $postClasse = 'main-slider-padding' ; } 
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
							
	 	<?php  	
		  	if(get_children($post->ID)) {
				
			}
			if($post->post_parent) {
				$section='<section class="entry-content section-page wrap-content" itemprop="articleBody">';
				while ( have_posts() ) : the_post();

					$section_title = get_field('page-section-title') ;
					if(empty($section_title))$section_title=get_the_title();
					$section_position = get_field('page-section-position') ;
					$section_content = get_field('page-section-content') ;
					$section_aside_type = get_field('page-section-aside-type') ;
					$section_aside_type.= ' '.get_field('page-section-aside-ratio') ;
					$section_link = get_field('page-section-aside-link-page') ;
					$btn ='' ;
					if(!empty($section_link)){
						$section_text = get_field('page-section-aside-link-text') ;
						$btn = '<a href="'.$section_link.'" title="'.$section_text.'" class="btn btn-small btn-2 right">'.$section_text.'</a>' ;
					}
					// $section_aside = get_field('page-section-aside') ;
					$section_aside = do_shortcode($post->post_content);

				/*	$section.= '
						<section class="clearfix">';*/
					// if( !empty($section_title) || !empty($section_content) ) { 
						$section.= '
							<div class="column small-7 large-6 right no-padding-right">
								<header>
									<h1>'.$section_title.'</h1>
								</header>
								'.$section_content.$btn.' 
							</div>';
					// }
					// if(!empty($section_aside)) {
						$section.='
							<aside class="column small-5 large-6 '.$section_aside_type.' left no-padding-left">
								'.$section_aside.'
							</aside>
							';
					// }
					/*$section.='
						</section><!-- end .section-page -->';*/
					$section.='</section><!-- end article section -->' ;
					$page_more = get_field('page-more',$post->post_parent);
					if(!empty($page_more)) {
						$section.='
						<footer class="wrap-content">
							<h3>'.$page_more.'</h3>
							<ul class="no-bullet small-block-grid-4" id="product-linked">';
						// <footer class="wrap-content" id="more-links">
							// <ul class="no-bullet small-block-grid-4">';

						$child_pages = get_page_children($post->post_parent);
						$args = array(
							'post_parent' => $post->post_parent,
							'post_type'   => 'any', 
							'posts_per_page' => -1,
							'post_status' => 'any' 
						); 
						$children_array = get_children( $args );

						if ( $children_array ) {
							foreach ( $children_array as $child ) {
								if(get_the_title()!=$child->post_title){
											// '.get_the_post_thumbnail($child->ID).'
								/*	$img_src = wp_get_attachment_image_src(get_field('page-thumbnail',$child->ID), 'small');
									$section.='
									<li>
										<a href="'.get_permalink($child->ID).'" title="'.$child->post_title.'">
											<h4 style="background:url('.$img_src[0].');" class="background-cover">
												<strong>'.$child->post_title.'</strong>
												'.wp_get_attachment_image( get_field('page-thumbnail',$child->ID), 'small' ).'
											</h4>
										</a>
									</li>' ;*/
									$img_src = wp_get_attachment_image_src(get_field('page-thumbnail',$child->ID), 'small');
									$section.='
									<li class="product-linked">
										<div class="product-linked-container">
										<a href="'.get_permalink($child->ID).'" title="'.$child->post_title.'" class="background-cover" style="background:url('.$img_src[0].');">
											<h4 class="product-linked-title">
												'.$child->post_title.'
											</h4>
										</a>
										<span class="product-linked-thumbnail invisible">
												'.wp_get_attachment_image( get_field('page-thumbnail',$child->ID), 'small' ).'
										</span>
										</div>
									</li>' ;
								}
							}
						}
					
						$section.='</ul>
						</footer> <!-- end article footer -->
						';
					}
				endwhile ;
				// wp_reset_postdata();
				// wp_reset_query();
				
				echo $section;
			}else{
			  	if(get_children($post->ID)) {
					$section = '
						<header class="article-header">
							<h1 class="page-title">'.get_the_title().'</h1>
							<div class="intro">
					    		<blockquote>'.get_field('page-intro').'</blockquote>
					    	</div>
						</header> <!-- end article header -->
						<section class="entry-content wrap-content" itemprop="articleBody">' ;
					$args=array(
						'post_parent'  => $post->ID,
						'post_type' => 'page',
						'posts_per_page' => -1,
						'orderby'    => 'id',
						'order' => 'ASC'
					);		

					$loop = new WP_Query( $args );
					$i_link=0;
					while ( $loop->have_posts() ) : $loop->the_post(); 
						++$i_link;
					endwhile ;
				
					$classe = ' large-6 xlarge-3';
					if(is_int($i_link/3)) $classe = ' large-4';


					while ( $loop->have_posts() ) : $loop->the_post(); 

						$title = get_field('page-section-title') ;
						if(empty($title))$title=get_the_title();
						$url = get_permalink();
						$link.= '
							<li class="cat-link column small-6 medium-6'.$classe.'">
								<div class="cat-container clearfix">
								<a href="'.$url.'" title="'.$title.'">
									<div class="cat-content">
										<h2 class="cat-title">'.$title.'<img class="right" src="'.get_template_directory_uri().'/images/icon-arrow-right.png"></h2>
									</div>
								</a>
							</li>' ;

					endwhile ;

					$section.='<ul class="no-bullet" id="products"><div class="grid-sizer small-6 medium-6'.$classe.'"></div>'.$link.'</ul></section>' ;
				
					wp_reset_postdata();
					wp_reset_query();
				
					$page_img_header = get_field('img-header');
					if(!empty($page_img_header)) {
						$section .= '
						<footer class="article-footer">
							<div id="main-slider" style="background:url('.$page_img_header['url'].');">
								<div class="bg-overlay"></div>
							</div><div class="clear"></div>
						</footer> <!-- end article footer -->
						';
					}
					echo $section ;
				}
			}
		?>
		<?php 
			if( $post->ID == '584' ) {
				echo '<section class="entry-content section-page wrap-content" itemprop="articleBody" style="padding-top:30px;">' ;
				the_content() ;
				echo '</section>' ;
			}
		?>
							    
	</article> <!-- end article -->


