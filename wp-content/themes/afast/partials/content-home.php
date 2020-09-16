<div id="block-links" data-equalizer>
	<div class="block-link" style="background-image:url('<?php echo the_field('block-bg-1');?>');">
		<div class="block-container">
			<a href="<?php the_field('block-link-1');?>" title="">
				<div class="block-content">
					<h2><?php the_field('block-title-1') ; ?></h2>
					<div class="block-intro">
						<?php the_field('block-content-1'); ?>
					</div>
					<span class="btn btn-small btn-1 invisible"><?php the_field('block-btn-1'); ?></span>
				</div>
				<span class="btn btn-small btn-1 pos-absolute"><?php the_field('block-btn-1'); ?></span>
				<div class="bg-block-link"></div>
			</a>
		</div>
	</div>
	<div class="block-link" style="background-image:url('<?php echo the_field('block-bg-2');?>');">
		<div class="block-container">
			<a href="<?php the_field('block-link-2');?>" title="">
				<div class="block-content">
					<h2><?php the_field('block-title-2') ; ?></h2>
					<div class="block-intro">
						<?php the_field('block-content-2'); ?>
					</div>
					<span class="btn btn-small btn-1 invisible"><?php the_field('block-btn-2'); ?></span>
				</div>
				<span class="btn btn-small btn-1 pos-absolute"><?php the_field('block-btn-2'); ?></span>
				<div class="bg-block-link"></div>
			</a>
		</div>
	</div>
	<div class="block-link" style="background-image:url('<?php echo the_field('block-bg-3');?>');">
		<div class="block-container">
			<a href="<?php the_field('block-link-3');?>" title="">
				<div class="block-content">
					<h2><?php the_field('block-title-3') ; ?></h2>
					<div class="block-intro">
						<?php the_field('block-content-3'); ?>
					</div>
					<span class="btn btn-small btn-1 invisible"><?php the_field('block-btn-3'); ?></span>
				</div>
				<span class="btn btn-small btn-1 pos-absolute"><?php the_field('block-btn-3'); ?></span>
				<div class="bg-block-link"></div>
			</a>
		</div>
	</div>
</div>
<!-- <p class="clearfix"><a href="#" class="btn btn-2 right">Contact</a></p> -->
<hr>
<div id="refs">
	<div id="refs-intro">
		<h3><?php the_field('ref-title');?></h3>
		<div class="intro">
			<blockquote><?php the_field('ref-intro');?></blockquote>
		</div>
			<?php
			$ref_btn = get_field('ref-btn') ;
				// if( is_front_page() ) $posts_per_page=9; else $posts_per_page = -1 ;
				$args = array(
					'post_type'  => 'references',
					'orderby'    => 'date',
					'order'      => 'DESC',
					'posts_per_page' => -1
				);		
				$loop = new WP_Query( $args );
				$n_refs=0;
				while ( $loop->have_posts() ) {
					$loop->the_post();
					++$n_refs;
				} 
				$grid=1;
				$grid_size = 16.666666667;
				if($n_refs>6)$grid=6;else $grid=$n_refs;

				// $grid_padding = round(100/$grid_size,1);
				$grid_padding = 6-$grid;
				$grid_padding = $grid_size*$grid_padding ;
				$grid_padding = $grid_padding/2 ;
				$i_refs=1;
				$url_refs = '/fr/references';
				// $url_refs = home_url().'/fr/references';
				if($lang=='en_GB')$url_refs = '/en/references';
				echo'<ul class="no-bullet text-center clearfix">';
				// echo'<ul class="no-bullet small-block-grid-'.$grid.' text-center">';
				while ( $loop->have_posts() ) : $loop->the_post(); 
				if($i_refs==1){ $margin = ' style="margin-left: '.$grid_padding.'%"' ;}
				else{
					$margin = '';
				}
				if($i_refs==6){ $margin = ' style="margin-right: '.$grid_padding.'%"'; }
			?>
			<?php //if($n_refs>=3&&$i_refs==1)echo '<ul class="no-bullet small-block-grid-3">' ; ?>
				<li class="refs no-padding-bottom small-2 column"<?php echo $margin; ?>>
					<a class="inline-block no" href="<?php echo $url_refs; ?>" title="" id="ref-<?php echo $i_refs ; ?>">
						<h4 class="no-margin">
							<p class="no-margin"><?php the_post_thumbnail() ; ?></p>
							<span class="<?php if(is_front_page()) echo'visually-hidden';?>"><?php the_title() ; ?></span>
						</h4>
					</a>
				</li>
			<?php 
			if($i_refs>=6) break; else ++$i_refs; 
			/*if($i_refs==3) $i_refs=0 ; ++$i_refs;*/ ?>
			<?php endwhile; echo '</ul>'; ?>


		<?php if($n_refs>6) echo '<a href="'.$url_refs.'" class="btn btn-small btn-2 right">'.$ref_btn.'</a>' ; ?>
		<!-- </div> -->

		<?php //get_template_part( 'partials/loop', 'references' ); ?>
	</div>
</div>
<hr>
