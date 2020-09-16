<?php
	if(get_children($post->ID)) {
		echo '
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
				</li>' ;

		endwhile ;
		wp_reset_postdata();
		wp_reset_query();

		$link='<ul class="no-bullet" id="products"><div class="grid-sizer small-6 medium-6'.$classe.'"></div>'.$link.'</ul></section>' ;
		echo $link ;

	}
	if(is_child()) {
		echo '<h1>hello</h1>';
		$section='<section class="entry-content wrap-content" itemprop="articleBody">';
		while ( have_posts() ) : the_post();

			$section_title = get_field('page-section-title') ;
			if(empty($section_title))$section_title=get_the_title();
			$section_position = get_field('page-section-position') ;
			$section_content = get_field('page-section-content') ;
			$section_aside_type = get_field('page-section-aside-type') ;
			$section_aside_type.= ' '.get_field('page-section-aside-ratio') ;
			$section_aside = get_field('page-section-aside') ;

			$section.= '
				<section class="section-page">';
			// if( !empty($section_title) || !empty($section_content) ) { 
				$section.= '
					<div class="column small-7 large-6 right no-padding-right">
						<header>
							<h1>'.$section_title.'</h1>
						</header>
						'.$section_content.' 
					</div>';
			// }
			// if(!empty($section_aside)) {
				$section.='
					<aside class="column small-5 large-6 '.$section_aside_type.' left no-padding-left">
						'.$section_aside.'
					</aside>
					';
			// }
			$section.='
				<footer class="more-link">
				</footer>
				</section><!-- end .section-page --><hr>';

		endwhile ;
			wp_reset_postdata();
	wp_reset_query();
		$section.='</section><!-- end article section -->' ;
		echo $section;
	}
?>