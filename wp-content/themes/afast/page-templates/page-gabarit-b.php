<?php
/*
Template Name: Page gabarit B
*/
?>
<?php get_header(); ?>

			
			<div id="content">
			
				    <div id="main" role="main">
						<?php get_template_part('partials/content','breadcrumbs') ; ?>
			    		
						<?php $postClasse = '' ; if(get_field('add-img-header')==true) { $postClasse = 'main-slider-padding' ; } 
						?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postClasse); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
												
							<header class="article-header">
								<h1 class="page-title">
									<?php echo get_the_title() ;?>
								</h1>
								<div class="intro">
						    		<blockquote><?php the_field('page-intro'); ?></blockquote>
						    	</div>
							</header> <!-- end article header -->
											
						    <section class="entry-content wrap-content" itemprop="articleBody">
						    	<?php
									if(get_children($post->ID)) {
										$args=array(
											'post_parent'  => $post->ID,
											'post_type' => 'page',
											'posts_per_page' => -1,
											'orderby'    => 'id',
											'order' => 'ASC'
										);		
										$loop = new WP_Query( $args );
										$n=0;
										$section='';
										$i_section=1;
										while ( $loop->have_posts() ) : $loop->the_post(); 
											$section_title = get_field('page-section-title') ;
											if(empty($section_title))$section_title=get_the_title();
											$section_position = get_field('page-section-position') ;
											$section_content = get_field('page-section-content') ;
											$section_aside_type = get_field('page-section-aside-type') ;
											$section_aside_type.= ' '.get_field('page-section-aside-ratio') ;
											$section_aside_link_page = get_field('page-section-aside-link-page') ;
											$section_aside_link_cat = get_field('page-section-aside-link-cat') ;
											$section_aside_link_text = get_field('page-section-aside-link-text') ;
											$section_aside = get_field('page-section-aside') ;
											$padding = array('','');
											$no_padding_left='no-padding-left';
											$no_padding_right='no-padding-right';

											if($section_position=='right'){
												$padding[0]=$no_padding_right;
												$padding[1]=$no_padding_left;
											}
											if($n==0) $position_column=array('right','left');
											if($n==0) $padding[0]=$no_padding_left;
											if($n==0) $padding[1]=$no_padding_right;
											if($n==1) $position_column=array('left','right');
											if($n==1) $padding[0]=$no_padding_right;
											if($n==1) $padding[1]=$no_padding_left;

											$section_aside_link='';
											if(!empty($section_aside_link_page)&&empty($section_aside_link_cat)){
												$section_aside_type.=' attached';
												$section_aside_link='<input class="btn-href" type="hidden" value="'.$section_aside_link_page.'"><input class="btn-text" type="hidden" value="'.$section_aside_link_text.'">';
												// $section_aside='<a href="'.$section_aside_link_page.'">'.$section_aside.'</a>';
											}

											if(!empty($section_aside_link_cat)){
												$section_aside_type.=' attached';
												$section_aside_link = '';
												$arguments =  array(
												    'post_type' => 'product',
												    'posts_per_page' => -1,
													'orderby'    => 'id',
													'order'      => 'DSC',
												    'tax_query' => array(
												        array(
												            'taxonomy' => 'category',
												            // 'field' => 'slug',
												            'terms' => $section_aside_link_cat
												        )
											    	)
											    );
											    	
													$loop = new WP_Query( $arguments );
													$iIdAttachment=0;
													$gallery_array=array();
										    		while ( $loop->have_posts() ) : $loop->the_post(); 
													// $section_aside.= '<a href="#">'.get_the_post_thumbnail().'</a>';
													++$iIdAttachment;
													$attachment_url = wp_get_attachment_image_src( $post->ID, 'full', true );
													array_push($gallery_array,$attachment_url[$iIdAttachment]);
													// $attachment_url = wp_get_attachment_metadata( $attachment_url[1] );
													// $section_aside.= '<a href="'.$attachment_url[$iIdAttachment].'">'.get_the_post_thumbnail().'</a>';
													endwhile;
													$gallery_shortcode ='[gallery link="file" ids="';
													$i_ids=0;
													$n_ids = count($gallery_array);
													// echo $n_ids;
													/*for( $i_ids ; $i_ids < $n_ids ; $i_ids++ ) {
														$gallery_shortcode.=$gallery_array[$i_ids];
														if($i_ids!=$n_ids) $gallery_shortcode.=',' ;
													}*/
													while( $i_ids < $n_ids ) {
														if($gallery_array[$i_ids]!=''){
															$gallery_shortcode.=$gallery_array[$i_ids];
														}
														if( $i_ids < $n_ids-1 ) $gallery_shortcode.=',' ;
														++$i_ids;
													}
													// 214,44,4,65,43
													$gallery_shortcode.='"]';

													$section_aside = do_shortcode($gallery_shortcode);
													$section_aside = $gallery_shortcode;
													wp_reset_postdata();
													wp_reset_query();
											}else{
												$section_aside = do_shortcode($post->post_content);
											}
											/*echo '<pre>';
											print_r($post);
											echo '</pre>';*/
											// $short = $post->
															// $section_aside= wp_get_attachment_image_src( $post->ID, 'full' );
															// $section_aside= wp_get_attachment_image_src( 186 );
															// $section_aside= wp_get_attachment_image( $post->ID, 'full' );
															// $section_aside= wp_get_attachment_metadata(  $post->ID );
											// $section_aside = get_shortcode_ids($post->post_content);
														// <div class="column small-7 large-6 '.$padding[0].' '.$section_position.'">
																// <h2 id="'.$id_title.'">'.$section_title.'</h2>
												
												$section.= '
													<section class="section-page">';
												if( !empty($section_title) || !empty($section_content) ) { 

												$section.= '
													
														<div class="column small-7 large-6 '.$position_column[0].' no-padding-'.$position_column[0].'">
															<header>
																<h2 id="section-'.$i_section.'">'.$section_title.'</h2>
															</header>
															'.$section_content.' 
														</div>';
												}
												if(!empty($section_aside)) {
													$section.='
														<aside class="column small-5 large-6 '.$section_aside_type.' '.$position_column[1].' no-padding-'.$position_column[1].'">
															'.$section_aside_link.$section_aside.'
														</aside>
														<footer>
														</footer>';
												}
												$section.='
													</section><hr>';
														
											++$i_section;
											if($n==1)$n=0;else ++$n;
											// wp_reset_query();
											// wp_reset_postdata();
										endwhile ;
										echo $section;
											wp_reset_query();

											wp_reset_postdata();
									}
								?>
							</section> <!-- end article section -->
												
							<footer class="article-footer">
								<?php 
									$page_img_header = get_field('img-header');
									if(!empty($page_img_header)) {
										echo '
										<div id="main-slider" style="background:url('.$page_img_header['url'].');">
										<div class="bg-overlay"></div>
										</div><div class="clear"></div>';
									}
								?>
							</footer> <!-- end article footer -->
												    
						</article> <!-- end article -->
					    					
    				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>