<div id="main-breadcrumbs">
	<nav class="breadcrumbs wrap-content" role="menubar" aria-label="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<ul class="no-bullet">
			<li role="menuitem">
				<a href="<?php echo home_url() ;?>" itemprop="url" title="">
					<span itemprop="title"><?php echo get_the_title( 12 ); ?></span>
				</a>
			</li>
			<?php 
					echo '<span>&nbsp;/&nbsp;</span>
					<li role="menuitem">
						<a href="'.get_permalink(19).'" itemprop="url" title="'.get_the_title( 19 ).'">
							<span itemprop="title">'.get_the_title( 19 ).'</span>
						</a>
					</li>';
			?>
			<!-- <span>&nbsp;/&nbsp;</span>
			<li role="menuitem">
				<a href="<?php //echo home_url() ;?>" itemprop="url" title="">
					<span itemprop="title"><?php //echo get_the_category() ?></span>
				</a>
			</li> -->
			<?php 
				$cat = get_the_category() ;
				if(!empty( $cat )){
				// $cat_link = get_category_link( $cat[0]->cat_ID );
					// '.$cat_link.'

				/*echo '<span>&nbsp;/&nbsp;</span>
				<li role="menuitem">
					<a href="" itemprop="url" title="'.$cat[0]->cat_name.'" class="cat-parent">
						<span itemprop="title">'.$cat[0]->cat_name.'</span>
					</a>
				</li>';*/
			}?>
			<span>&nbsp;/&nbsp;</span>
			<li role="menuitem" class="current">
				<meta itemprop="url" content="<?php the_permalink() ; ?>">
				<span itemprop="title"><?php the_title();?></span>
			</li>
		</ul>
	</nav>
</div>