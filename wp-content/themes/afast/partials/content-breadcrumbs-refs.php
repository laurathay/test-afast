<?php $lang = get_locale() ; ?>
<div id="main-breadcrumbs">
	<nav class="breadcrumbs wrap-content" role="menubar" aria-label="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<ul class="no-bullet">
			<li role="menuitem">
				<?php if($lang=="fr_FR") { $home_title="Accueil"; } else { $home_title="Home"; } ?> 
				<a href="<?php echo home_url() ;?>" itemprop="url" title="<?php echo $home_title ; ?>">
					<span itemprop="title"><?php echo $home_title ; ?></span>
				</a>
			</li>
			<span>&nbsp;/&nbsp;</span>
			<?php 
				$menuitem_title='Références';
				if($lang!="fr_FR") $menuitem_title='References' ;
				$page_url = 'http://afast-tech.com/fr/references/' ;
				if($lang!="fr_FR") $page_url='http://afast-tech.com/en/references/' ;

				$classes = get_body_class();
				if (in_array('single-references',$classes)) {
					echo '
					<a href="'.$page_url.'" itemprop="url" title="'.$menuitem_title.'">
						<span itemprop="title">'.$menuitem_title.'</span>
					</a>
					<span>&nbsp;/&nbsp;</span>
					';
					$menuitem_title = get_the_title();
					/*<li role="menuitem" class="current">
						<meta itemprop="url" content="'.get_the_permalink().'">
						<span itemprop="title">'.get_the_title().'</span>
					</li>*/
				}
			?>
			<li role="menuitem" class="current">
				<meta itemprop="url" content="<?php echo get_the_permalink() ; ?>">
				<span itemprop="title"><?php echo $menuitem_title ; ?></span>
			</li>
		</ul>
	</nav>
</div>