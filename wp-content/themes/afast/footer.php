					<footer class="footer" role="contentinfo" id="main-footer" itemscope itemtype="http://schema.org/Organization">
						<div id="inner-footer" class="wrap-content">
							<div class="local-footer left no-padding">
								<meta itemprop="name" content="Afast">
								<a href="<?php echo home_url() ; ?>" itemprop="url">
									<img src="<?php echo get_template_directory_uri();?>/images/logo-afast-footer.png" alt="Logo Afast" itemprop="logo">
								</a>
								<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
									<div><span itemprop="streetAddress">2, ZAC du Maupas Nord</span></div>
									<div><span itemprop="postalCode">69620</span> <span itemprop="addressLocality">THEIZÉ</span></div>
									<div><span>Tél : </span><span itemprop="telephone">+33 478 221 664</span></div>
								</div>
							</div>
							<nav role="navigation" class="footer-menu clearfix right no-padding">
	    						<?php joints_footer_links(); ?>
	    					</nav>
						</div> <!-- end #inner-footer -->			
    					<div class="sq-footer text-center">
							<div class="cl-effect-1"><a class="lato" href="http://www.sequane.fr" title="Séquane, agence de communication située à Pontarlier">le digital par <span class="fleur">&nbsp;</span> s&eacute;quane</a></div>
    					</div>
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->

	  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<?php wp_footer(); ?>
		<?php 
			$src = get_template_directory_uri();
			echo '<script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>';
			echo '<script src="'.$src.'/library/js/scripts.js"></script>';
			echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.4.1/slick.min.js"></script>';
			if( $post->ID==12 || $post->ID==79 ){
				echo '<script type="text/javascript" src="'.$src.'/js/afast-home.js"></script>';
			}else{
				echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>';
				echo '<script type="text/javascript" src="'.$src.'/js/afast-page.js"></script>';
			}
			if( $post->ID==19 ){
				echo '<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script><script type="text/javascript" src="'.$src.'/js/afast-masonry.js"></script>';
			}
			if( $post->ID==25 ){
				echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry"></script><script src="'.$src.'/js/afast-map.js"></script>';
			}
			$classes = get_body_class();
			if (in_array('single-products',$classes)) {
				echo '<script type="text/javascript" src="'.$src.'/js/afast-product.js"></script>';
			}
			$classes = get_body_class();
			if (in_array('single-references',$classes)) {
				echo '<script src="'.$src.'/js/afast-refs.js"></script>';
			}
		?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/afast-all.js"></script>
		
	</body>
