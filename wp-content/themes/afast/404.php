<?php get_header(); ?>
	<?php $lang = get_locale() ; ?>

	<div id="content">

		<div id="inner-content" class="row">
	
			<div id="main" role="main">

				<article id="content-not-found">
				
					<header class="article-header">
						<h1><?php if($lang=='fr_FR') echo 'Page introuvable'; else echo ''; ?></h1>
						<hr>
					</header> <!-- end article header -->
			
					<section class="entry-content">
						<p><?php if($lang=='fr_FR') echo 'La page que vous recherchez n\'existe pas'; else echo ''; ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><a href="<?php echo get_home_url() ;//get_search_form(); ?>" title="<?php if($lang=='fr_FR') echo 'Accueil' ; else echo 'Home' ; ?>"><?php if($lang=='fr_FR') echo 'Accueil' ; else echo 'Home' ; ?></a></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
	
			</div> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>