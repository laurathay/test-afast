(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
		   	init:function(){
	    		var iGallery = 0;
		    	$('.galery-full .gallery').each(function(){
		    		++iGallery;
		    		$(this).before('<ul class="no-bullet slick slick-'+iGallery+'" id="album-'+iGallery+'"></ul>');
    				var imgHeight = $(this).height();
		    		$(this).find('.gallery-item').each(function(){
		    			if($(this).find('a')!=false){
		    				var href = $(this).find('a').attr('href');
		    			}else{
		    				var href = $(this).find('img').attr('src');
		    			}
	    				var alt = $(this).find('img').attr('alt');
	    				var title = $(this).find('img').attr('title');
	    				if( alt==undefined && title== undefined ) alt='', title='' ;
	    				if( alt==undefined && title!=undefined ) alt=title ;
	    				if( title==undefined && alt!=undefined ) title=alt ;
	    				
		    			var img = '<li style="background-image:url('+href+');"><a href="'+href+'" title="'+title+'" class="open-album"></a><img src="'+href+'" alt="'+alt+'" title="'+title+'" class="hidden"/></li>';
		    			/*var caption = $(this).find('.gallery-caption').text();
		    			if(title!='') var title='<strong class="caption-title">'+title+'</strong>';else {title =''; title='';}
		    			if(caption!=false)caption='<p class="caption-content">'+caption+'</p>';else caption ='';
	    				if(title!=''||caption!=false)img+='<div class="wrap-caption"><div class="caption">'+title+caption+'</div>';
		    			img+='</li>';*/
	    				$('.slick-'+iGallery).append(img);
		    		})
		    		$(this).remove();
		    	})
		    	$('.galery-full .slick').slick({
					 dots: true,
					  infinite: true,
					  speed: 500,
					  fade: true,
					  focusOnSelect: true,
					    dots: false,
					  autoplay: true,
					  autoplaySpeed: 4500,
					  pauseOnHover: false
				});
				$('.galery-thumb').each(function(){
					$(this).find('.gallery-icon').each(function(){
						var galleryThumb = $(this).parents('.galery-thumb') ;
						var galleryItem = $(this).parents('.gallery-item') ;

						var classeCaption =''
						if(galleryThumb.parents('.galery-thumb').find('input.btn-href').attr('value')){
							classeCaption = ' linked-caption' ;
						}

						var caption = '<div class="caption'+classeCaption+'"><a class="open-album" href="'+$(this).find('a').attr('href')+'"><span>Agrandir</span></a>';
						if(classeCaption!=''){
							caption+='<a class="linked-page" href="'+$(galleryThumb).find('input.btn-href').attr('value')+'"><span>'+$(galleryThumb).find('input.btn-text').attr('value')+'</span></a>';	
						}else {
					 		if(galleryItem.find('.gallery-caption a')!=''){
								// var linkText = $(galleryItem).find('.gallery-caption a').text() ;
								// var linkHref = $(galleryItem).find('.gallery-caption a').attr('href') ;
								// caption+= '<a href="'+linkHref+'"><span>'+linkText+'</span></a></p>';
							}
						}

						caption+='</div>';
						$(this).append(caption);
					})
				})
		    	main.resizeGalleryFull();
		    	main.galeryItems();
			},
			resizeGalleryFull:function(){
	      		$('.galery-full').each(function(){
	      			if($(this).hasClass('ratio-0-8'))$(this).find('li').css('height',($(this).width()*0.8)+'px');
	      			if($(this).hasClass('ratio-1'))$(this).find('li').css('height',($(this).width())+'px');
	      			if($(this).hasClass('ratio-1-1'))$(this).find('li').css('height',($(this).width()*1.1)+'px');
	      			if($(this).hasClass('ratio-1-2'))$(this).find('li').css('height',($(this).width()*1.2)+'px');
	      			if($(this).hasClass('ratio-1-3'))$(this).find('li').css('height',($(this).width()*1.3)+'px');
	      		})
	      	},
	      	galeryFull:function(idGaleryFull){
	      		console.log('galeryFull') ;
	      		$('#'+idGaleryFull).magnificPopup({
		          	delegate: 'li a.open-album', 
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
							var alt = item.el.parents('li').find('.caption-title').text();
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
							return alt/*+caption*/;
						}
					}
		       	});
			},
	      	galeryItems:function(){
	      		console.log('galeryItems') ;
	      		$('.gallery').magnificPopup({
		          	delegate: '.gallery-item a', 
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
							var alt = item.el.find('img').attr('alt');
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
							return alt/*+caption*/;
						}
					}
		       	});
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
							return alt/*+caption*/;
						}
					}
		       	});
	      	}
	    }; // end main
	    var handler = {
	    	init:function(){
    			$(window).resize(function(){
	    			handler.elemsResizing();
	    		})
	    		$('.open-album').bind('click',function(e){
	    			e.preventDefault();
	    		})
	    		handler.galleryBinding();
	    	},
	    	elemsResizing:function(){
				main.resizeGalleryFull();
	    	},
	    	galleryBinding:function(){
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
    				handler.galleryAlbum();
	    		})
				$('.ref-picts a').bind('click',function(){
					handler.galleryAlbum();
				})
				$('.slider-for a').bind('click',function(){
					handler.galleryAlbum();
				})
				$('.product-pict a').bind('click',function(){
					handler.galleryAlbum();
				})
				$('.galery-full a').bind('click',function(e){
					e.preventDefault() ;
					var galery = $(this).parents('.slick') ;
					if(!galery.hasClass('loaded')){
						galery.addClass('loaded') ;
						main.galeryFull(galery.attr('id')) ;
					}
					handler.galleryAlbum();
				})
				$('.mfp-bg').bind('click',function(){
					$(this).toggleClass('open');
					$('.mfp-figure').toggleClass('open');
				})
				$('.gallery-item a').bind('click',function(){
					handler.galleryAlbum();
				})
				$('.mfp-container').bind('click',function(){
	    			// $('.galery-full .slick').slick('slickPlay');
	    		})
    			$('.galery-thumb.attached a').bind('click',function(e){
					// e.preventDefault();
				})
    		},
    		galleryAlbum:function(){

    			function bgTransition() {
			        setTimeout(function () {
			        	$('.mfp-bg').toggleClass('open');
			        	$('.mfp-figure').toggleClass('open');
			        },0);
		      	}
		      	bgTransition();
    		}
	    }; // end handler
	}) // end document.ready
})(jQuery);