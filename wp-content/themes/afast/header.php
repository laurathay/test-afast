<?php $lang = get_locale() ; ?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<!-- Mobile Neta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Icons & Favicons -->
		<?php $src = '/wp' ; ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $src ; ?>/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $src ; ?>/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $src ; ?>/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $src ; ?>/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $src ; ?>/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $src ; ?>/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $src ; ?>/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $src ; ?>/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $src ; ?>/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo $src ; ?>/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo $src ; ?>/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo $src ; ?>/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo $src ; ?>/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo $src ; ?>/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo $src ; ?>/favicons/manifest.json">
		<link rel="shortcut icon" href="<?php echo $src ; ?>/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffc40d">
		<meta name="msapplication-TileImage" content="<?php echo $src ; ?>/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo $src ; ?>/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<meta name="google-site-verification" content="vbHUQzkBCjBi1g79Ie2acNxhNJxBt0LcwJniLi2Grxs" />
		<?php wp_head(); ?>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/normalize.min.css">
		<!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/library/css/style.css"> -->

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.4.1/slick.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.4.1/slick-theme.min.css"/>

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css"/>
		

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/afast-tech-styles.css">
	  <!--[if lt IE 9]>
	    <![endif]-->

	   
	    <!--[if lt IE 10]>
		    <style>
		    	.visible-ie { display:block !important; } 
		    </style>
    	<![endif]-->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	</head>
	<body <?php body_class(); ?>>
		
		<header class="header" role="banner" id="main-header">
			<div id="top-bar-header">
				<div class="wrap-content">
					<ul class="switch-lang"><?php pll_the_languages(array('display_names_as'=>'slug','show_names'=>0));?></ul>
					<?php // joints_top_nav(); ?>
					<!-- <div class="switch-lang"> -->
						<!-- <a href="#">FR</a> -->
						<!-- <span></span> -->
						<!-- <a href="#">EN</a> -->
					<!-- </div> -->
				</div>
			</div>
			<div id="logo-header">
				<div class="wrap-content">
					<div class="logo left">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-afast.jpg" alt="Logo <?php bloginfo('name'); ?>">
						</a>
					</div>
					<div class="baseline right">
						<span>Anchoring and Fall Arrest Systems Technologies</span>
					</div>
				</div>
			</div>
			<div id="main-menu">
				<div class="wrap-content">
					<div id="main-navigation" class="sticky"> 
						<nav id="main-nav" class="top-bar">
							<section class="top-bar-section">
								<?php joints_top_nav(); ?>
							</section>
						</nav>
					</div>
				</div>
			</div>
		</header> <!-- end .header -->
		<div id="container">
					
