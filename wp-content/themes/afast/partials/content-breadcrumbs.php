<div id="main-breadcrumbs">
	<nav class="breadcrumbs wrap-content" role="menubar" aria-label="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<ul class="no-bullet">
			<li role="menuitem">
				<?php $lang = get_locale() ; if($lang=="fr_FR") { $home_title="Accueil"; } else { $home_title="Home"; } ?>
				<a href="<?php echo home_url() ;?>" itemprop="url" title="<?php echo $home_title ; ?>">
					<span itemprop="title"><?php echo $home_title ; ?></span>
				</a>
			</li>
			<?php if($post->post_parent) : ?>
			<span>&nbsp;/&nbsp;</span>
			<li role="menuitem">
				<a href="<?php echo get_permalink($post->post_parent); ?>" itemprop="url" title="<?php echo get_the_title( $post->post_parent ); ?>">
					 <span itemprop="title"><?php echo get_the_title( $post->post_parent ); ?></span>
				</a>
			</li>
			<?php endif ; ?>
			
			<span>&nbsp;/&nbsp;</span>
			<li role="menuitem" class="current">
				<meta itemprop="url" content="<?php the_permalink() ; ?>">
				<span itemprop="title"><?php the_title();?></span>
			</li>
		</ul>
	</nav>
</div>