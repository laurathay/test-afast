(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
	    	blockLinksHeight:null,
	    	// windowHeight:null,
	    	// headerheight: null,
		    init:function(){
		    	console.log('main-init');
		    	$('.gallery br').each(function(){
		    		$(this).remove();
		    	});
		    	if($('.home #main-slider .gallery img').length>1) $('#main-slider .gallery img').css('display','none');
		    	
		    	$('.home #main-slider .gallery').each(function(){
		    		$(this).before('<ul class="no-bullet slick"></ul>');
		    		$(this).find('.gallery-item').each(function(){
		    			var href = $(this).find('a').attr('href');
		    			var img = '<li style="background-image:url('+href+');"">';
	    				var title = $(this).find('img').attr('alt');
		    			var caption = $(this).find('.gallery-caption').text();
		    			if(title!='') var title='<h3 class="caption-title">'+title+'</h3>';else {title =''; title='';}
		    			if(caption!=false)caption='<p class="caption-content">'+caption+'</p>';else caption ='';
	    				if(title!=''||caption!=false)img+='<div class="wrap-content wrap-caption"><div class="caption">'+title+caption+'</div>';
		    			img+='</li>';
// <img src="'+href+'" alt="'+alt+'">
		    			$('#main-slider .slick').append(img);
		    		})
		    		$(this).remove();
		    	})
		    	$('.home #main-slider .slick').slick({
		    		 dots: true,
					  infinite: true,
					  speed: 500,
					  fade: true,
					  cssEase: 'linear',
					  arrows: false,
					  // focusOnSelect: true,
					 // slidesToShow: 3,
					  // slidesToScroll: 1,
					  pauseOnHover: false,
					  autoplay: true,
					  autoplaySpeed: 4000,
					    dots: true
						// adaptiveHeight: true	
		    	})
		    /*	$('.galery-full').slick({
					// dots: true,
					infinite: true,
					// speed: 300,
					// slidesToShow: 1,
					 slidesToShow: 3,
					  slidesToScroll: 1,
					  autoplay: true,
					  autoplaySpeed: 3000,
					// ada
					ptiveHeight: true
				});*/

				var iGallery = 0;
		    	$('.page-template-default .galery-full .gallery').each(function(){
		    		++iGallery;
		    		$(this).before('<ul class="no-bullet slick slick-'+iGallery+'"></ul>');
    				var imgHeight = $(this).height();
		    		$(this).find('.gallery-item').each(function(){
		    			// if($(this).find('a')!=false){
		    				var href = $(this).find('a').attr('href');
		    				// var imgHeight = $(this).find('img').height();
		    				// var img = '<li style="background-image:url('+href+'); height:'+imgHeight+'px;"><img src="'+href+'"></li>';
		    			// }else{
		    				// var src = $(this).find('img').attr('src');
		    				// <img src="'+href+'">
		    			var img = '<li style="background-image:url('+href+');"">';
	    				var title = $(this).find('img').attr('alt');
		    			var caption = $(this).find('.gallery-caption').text();
		    			if(title!='') var title='<strong class="caption-title">'+title+'</strong>';else {title =''; title='';}
		    			if(caption!=false)caption='<p class="caption-content">'+caption+'</p>';else caption ='';
	    				if(title!=''||caption!=false)img+='<div class="wrap-caption"><div class="caption">'+title+caption+'</div>';
		    			img+='</li>';
		    				// var img = '<li style="background-image:url('+href+'); height:'+imgHeight+'px;"></li>';
		    			// }
	    				$('.slick-'+iGallery).append(img);
		    		})
		    		$(this).remove();
		    	})

		    	$('.page-template-default .galery-full .slick').slick({
					 dots: true,
					  infinite: true,
					  speed: 500,
					  fade: true,
					  // cssEase: 'linear',
					  focusOnSelect: true,
					 // slidesToShow: 3,
					  // slidesToScroll: 1,
					    dots: false,
					  autoplay: true,
					  autoplaySpeed: 4500,
					  pauseOnHover: false
						// adaptiveHeight: true
				});
				$('.galery-full .slick').on('init',function(event,slick){
					$('.galery-full').each(function(){
						// var slickHeight = $(this).find('.slick-slider').height();
						// $(this).find('.slick-list li').css('height',slickHeight);
					})
				});
				
  				/*$(document).ready(function(){

					$('.galery-full').each(function(){
						var slickHeight = $(this).find('.slick-slider').height();
						$(this).find('.slick-list li').css('height',slickHeight);
					})

				}) */// end document.ready
		    	/*$('.home .slick').slick({
					 dots: true,
					  infinite: true,
					  speed: 500,
					  fade: true,
					  cssEase: 'linear',
					  arrows: false,
					  // focusOnSelect: true,
					 // slidesToShow: 3,
					  // slidesToScroll: 1,
					  pauseOnHover: false,
					  autoplay: true,
					  autoplaySpeed: 4000,
					    dots: true
						// adaptiveHeight: true
				});*/
				$('.galery-thumb').each(function(){
					$(this).find('.gallery-icon').each(function(){
						var caption = '<div class="caption"><a class="open-album" href="'+$(this).find('a').attr('href')+'"><span>Agrandir</span></a>';
						var galleryThumb = $(this).parents('.galery-thumb') ;
						var galleryItem = $(this).parents('.gallery-item') ;
						if(galleryThumb.parents('.galery-thumb').find('input.btn-href').attr('value')){
							caption+='<a class="linked-page" href="'+$(galleryThumb).find('input.btn-href').attr('value')+'"><span>'+$(galleryThumb).find('input.btn-text').attr('value')+'</span></a>';	
						}else {
					 		if(galleryItem.find('.gallery-caption a')!='') {
								var linkText = $(galleryItem).find('.gallery-caption a').text() ;
								var linkHref = $(galleryItem).find('.gallery-caption a').attr('href') ;
								caption+= '<a href="'+linkHref+'"><span>'+linkText+'</span></a></p>';
							}
						}

						caption+='</div>';
						$(this).append(caption);
						// $(this).find('a').attr('href',$(this).find('input').attr('value'));
					})
				})
				$('.galery-thumb').each(function(){
					// var link='<p><a href="'+$(this).find('input.btn-href').attr('value')+'">'+$(this).find('input.btn-text').attr('value')+'</a><p>';
	    		/*	var caption='';
	    			if($(this).hasClass('attached')) caption = '<p><a href="'+$(this).find('input.btn-href').attr('value')+'">'+$(this).find('input.btn-text').attr('value')+'</a><p>';
	    				main.galeryThumb('#'+$(this).find('.gallery').attr('id'),caption);*/
				})
				if($('body').hasClass('home')){
			    	main.checkHeight();
				}
		    	main.resizeGalleryFull();
		    	main.generateNavSide();
	      	},
	      	galeryThumb:function(galeryID,caption){
	      		// var elemDelegate = '.gallery-icon a';
	      		// if($(galeryID).parents('aside').hasClass('attached'))elemDelegate='.open-album';
	      		$(galeryID).magnificPopup({
		          	delegate: '.gallery-icon .open-album', 
		          	type: 'image',
		        	tLoading: 'Chargement de l\'image #%curr%...',
					mainClass: 'mfp-img-mobile',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
						preload: [0,1] // Will preload 0 - before current, and 1 after the current image
					},
					image: {
						tError: '<a href="%url%">L\'image #%curr%</a> ne peut pas être chargée.',
						titleSrc: function(item) {
							// if(caption==false){
							 	// if(item.el.parents('.gallery-item').find('.gallery-caption')!=false) {
									// var linkText = item.el.parents('.gallery-item').find('.gallery-caption').text() ;
							 		// if(item.el.parents('.gallery-item').find('.gallery-caption a')!=false) {
										// var linkHref = item.el.parents('.gallery-item').find('.gallery-caption a').attr('href') ;
										// caption = '<p><a href="'+linkHref+'">'+linkText+'</a></p>';
									// caption = linkText;
								// }
							// }
					 		// console.log('caption = '+caption);
							var alt = item.el.parents('.gallery-item').find('img').attr('alt');
						/*	var caption='';
		    				if(item.el.parents('.galery-thumb').hasClass('attached')) { 
		    					caption = '<p><a href="'+item.el.parents('.galery-thumb').find('input.btn-href').attr('value')+'">'+item.el.parents('.galery-thumb').find('input.btn-text').attr('value')+'</a><p>'; 
		    				}else{
								var linkHref = item.el.parents('.gallery-item').find('.gallery-caption a').attr('href') ;
								var linkText =item.el.parents('.gallery-item').find('.gallery-caption a').text() ;
			    				caption='<p><a href="'+linkHref+'">'+linkText+'</p>';
		    				}*/
							// var alt = item.el.parents('.gallery-item').find('.gallery-caption')
							// if($(galeryID).parents('aside').hasClass('attached'))alt=item.el.parents('.gallery-icon img').attr('alt');
							return alt+caption;
						}
					}
		       	});
	      	},
	      	checkHeight:function(){
      			$('#block-links .block-link').css('height','auto');
	      		// $('#block-links .block-link').css('height',$('#block-links').outerHeight()+30);
	      		// $('#block-links .block-link').height($('#block-links').height());
	      		$('#block-links .block-link').css('height',$('#block-links').height());
	      		$('#block-links .block-link').addClass('js-action');
	      		// console.log($('.block-link .block-container').height());
	      		// console.log($('.block-link .block-content').height());
	      	},
	      	resizeGalleryFull:function(){
	      		$('.galery-full').each(function(){
	      			if($(this).hasClass('ratio-1'))$(this).find('li').css('height',($(this).width())+'px');
	      			if($(this).hasClass('ratio-1-1'))$(this).find('li').css('height',($(this).width()*1.1)+'px');
	      			if($(this).hasClass('ratio-1-2'))$(this).find('li').css('height',($(this).width()*1.2)+'px');
	      			if($(this).hasClass('ratio-1-4'))$(this).find('li').css('height',($(this).width()*1.3)+'px');
	      		})
	      	},
	      	generateNavSide:function(){
	      		if( $('body').hasClass('page-template-default') && $('.section-page').length>1 ){
	      			$('body').prepend('<nav class="second-nav"><ul class="nav"></ul></nav>');
	      			var iSection= 1 ;
	      			$('.section-page').each(function(){
	      				$('.second-nav ul').append('<li><a href="#section-'+iSection+'">'+$('#section-'+iSection).html()+'</a></li>');
	      				++iSection;
	      			})
	      			var secondNavHeight = $('.second-nav').height()/2 ;
	      			console.log(secondNavHeight);
					$('.second-nav').css('margin-top','-'+secondNavHeight+'px');

  					main.checkPosNavSide(1000);
	      		}
      			// $('.second-nav .nav').append($('.has-dropdown.active .dropdown li').clone());
	      	},
	      	checkPosNavSide:function(delay){
				function moveNav() {
			        setTimeout(function () {
			        	$('.second-nav').toggleClass('open');
			        }, delay);
		      	}
		      	moveNav();
	      	},
	      	checkSecondNav:function(){
	      		// console.log($(window).width()-$('.second-nav').width() +' : '+ $('#top-bar-header .wrap-content').width());
	      		if( $(window).width()-$('.second-nav').width() < $('#top-bar-header .wrap-content').width()+$('.second-nav').width() ){
    				if($('.second-nav').hasClass('open')) main.checkPosNavSide(500);
	    		}else{
    				if(!$('.second-nav').hasClass('open')) $('.second-nav').addClass('open');
    			}
	      	}

	      	
	    }; // end main
	    var handler={
	    	init:function(){
				console.log('handler-init');
	    		$('.unlink').bind('click',function(e){
					e.preventDefault();
				})
				$(window).resize(function(){
					if($('body').hasClass('home')) main.checkHeight();
					if($('body').hasClass('page-template-default')) main.resizeGalleryFull();
				})
				$('.galery-thumb.attached a').bind('click',function(e){
					// e.preventDefault();
				})
				handler.binding();
	    	},
	    	binding:function(){
	    		$('.galery-thumb .gallery-item').bind('click',function(){
	    			// $('.galery-full .slick').slick('slickPause');
	    			if(!$(this).parents('.gallery').hasClass('album-called')){
	    				/*var caption='';
	    				if($(this).parents('.galery-thumb').hasClass('attached')) { 
	    					caption = '<p><a href="'+$(this).parents('.galery-thumb').find('input.btn-href').attr('value')+'">'+$(this).parents('.galery-thumb').find('input.btn-text').attr('value')+'</a><p>'; 
	    				}else{
							var linkHref = $(this).find('.gallery-caption a').attr('href') ;
							var linkText = $(this).find('.gallery-caption a').text() ;
		    				caption='<p><a href="'+linkHref+'">'+linkText+'</p>';
	    				}*/
	    				/*var caption='';*/
	    				$(this).parents('.gallery').addClass('album-called');
    					main.galeryThumb('#'+$(this).parents('.gallery').attr('id')/*,caption*/);
	    				// console.log(caption);
	    			}
    				function bgTransition() {
				        setTimeout(function () {
				        	$('.mfp-bg').toggleClass('open');
				        	$('.mfp-figure').toggleClass('open');
				        },0);
			      	}
			      	bgTransition();
	    		})
				$('.mfp-bg').bind('click',function(){
					$(this).toggleClass('open');
					$('.mfp-figure').toggleClass('open');
				})
	    		$(window).resize(function(){
	    			main.checkSecondNav();
	    		})
	    		$('.mfp-container').bind('click',function(){
	    			// $('.galery-full .slick').slick('slickPlay');
	    		})
	    	}
	    }
	}) // end document.ready
})(jQuery);

