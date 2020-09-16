<div id="main-breadcrumbs">
	<nav class="breadcrumbs wrap-content" role="menubar" aria-label="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<ul class="no-bullet">
			<li role="menuitem">
				<a href="<?php echo home_url() ;?>" itemprop="url" title="">
					<span itemprop="title"><?php echo get_the_title( 12 ); ?></span>
				</a>
			</li>
			<?php if(wp_get_post_parent_id()==19){
					echo '<span>&nbsp;/&nbsp;</span>
					<li role="menuitem">
						<a href="'.get_permalink(19).'" itemprop="url" title="'.get_the_title( $post->post_parent ).'">
							<span itemprop="title">'.get_the_title( $post->post_parent ).'</span>
						</a>
					</li>';
				}
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
				echo '<span>&nbsp;/&nbsp;</span>
				<li role="menuitem">
					<a href="" itemprop="url" title="'.$cat[0]->cat_name.'">
						<span itemprop="title">'.$cat[0]->cat_name.'</span>
					</a>
				</li>';
			}?>
			<span>&nbsp;/&nbsp;</span>
			<li role="menuitem" class="current">
				<meta itemprop="url" content="<?php the_permalink() ; ?>">
				<span itemprop="title"><?php the_title();?></span>
			</li>
		</ul>
	</nav>
</div>