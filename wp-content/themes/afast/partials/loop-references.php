<div class="no-bullet">
<?php
	if( is_front_page() ) $posts_per_page=9; else $posts_per_page = -1 ;
		$args = array(
			'post_type'  => 'references',
			'orderby'    => 'date',
			'order'      => 'DESC',
			'posts_per_page' => $posts_per_page
		);		
		$loop = new WP_Query( $args );
		$n_refs=0;
		while ( $loop->have_posts() ) {
			$loop->the_post();
			++$n_refs;
		} 
		$i_refs=1;
		if($posts_per_page!=9) $n_refs = 4 ;
		echo'<div class="small-block-grid-'.$n_refs.' text-center">';
		$lang = get_locale();
		if($lang=='fr_FR')$ref_url = '?p=23' ; else  $ref_url = '?p=202' ;
		while ( $loop->have_posts() ) : $loop->the_post(); 
	?>
			<li class="refs no-padding-bottom">
				<a class="inline-block no" href="<?php echo site_url().'/'.$ref_url; ?>" title="" id="ref-<?php echo $i_refs ; ?>">
					<h4 class="no-margin">
						<p class="no-margin"><?php the_post_thumbnail() ; ?></p>
						<span class="<?php if(is_front_page()) echo'visually-hidden';?>"><?php the_title() ; ?></span>
					</h4>
				</a>
			</li>
		<?php endwhile; ?>
</div>

<?php $ref_btn = the_field('ref-btn') ;  echo '<a href="#" class="btn btn-2 right">'.$ref_btn.'</a>' ; ?>

