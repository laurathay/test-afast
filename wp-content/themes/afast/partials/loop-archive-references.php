<?php $lang = get_locale() ; $btn='Voir'; 
	if($lang=='en_GB')$btn = 'More' ; 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('small-4 medium-3 column'); ?> role="article">
							
		<header class="article-header">
			<h2>
				<?php 
				$content = get_the_content() ;
				if(!empty($content)){
					echo '<a href="'.get_permalink().'" rel="bookmark" title="<?php the_title_attribute(); ?>">';
				} ?>
				<?php the_post_thumbnail(); ?>
				<small><?php the_title(); ?></small>
				<?php if(!empty($content)){ echo '</a>' ; }?>
			</h2>
		</header> <!-- end article header -->
			
	</article> <!-- end article -->

<?php endwhile; ?>	

<?php endif; ?>
