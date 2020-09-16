(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
		   	init:function(){
		   		console.log('product-init');
	    		var iGallery = 0;
		    	// $('.single-products .galery-full p').remove();
		    	$('.single-products .slider-for').each(function(){
		    		// $(this).append($(this).find('a'));
	    			$(this).append($(this).find('a'));
		    		$(this).find('.gallery').remove();
	    			$(this).find('a').addClass('background-cover');
	    			$(this).find('a').addClass('unlink');
		    		$(this).find('a').each(function(){
		    			var src = $(this).attr('href');
		    			// var imgHeight = $(this).find('img').height();
		    			$(this).css('background-image','url('+src+')');
		    			// $(this).css('height',imgHeight+'px');
		    		})
		    		// $(this).find('a').css('height',$(this).width());
	    			$(this).find('img').css('opacity',0);

		    	})
		    	$('.single-products .slider-nav').each(function(){
		    		// $(this).append($(this).find('a'));


	    			/*$(this).append($(this).find('img'));
		    		$(this).find('.gallery').remove();*/


		    		/*$(this).find('img').each(function(){
		    			var src = $(this).attr('src');
		    			var imgHeight = $(this).height();
		    			$(this).wrap('<li></li>');
		    			$(this).parents('li').css('background-image','url('+src+')');
		    			$(this).parents('li').css('height',imgHeight+'px');
		    		})
	    			$(this).find('li').addClass('background-cover');
	    			$(this).find('img').css('opacity',0);*/

		    	})
		    	/*if($('#product-linked .product-linked').length>4){
		    		$('#product-linked').slick({
				 			dots: false,
						  infinite: true,
						  // speed: 500,
						  fade: true,
						  // cssEase: 'linear',
						  // focusOnSelect: true,
						  slidesToScroll: 1,
						 	slidesToShow: 4,
						    dots: false,
						    arrows: true,
						  // autoplay: true,
						  // autoplaySpeed: 4500,
						  pauseOnHover: false
							// adaptiveHeight: true
					});
		    	}*/
		    	/*$('.single-products .slider-for .gallery').each(function(){
		    		++iGallery;
		    		// $(this).find('p').remove();
		    		$(this).before('<ul class="no-bullet slick"></ul>');
    				var imgHeight = $(this).height();
		    		$(this).find('.gallery-item').each(function(){
		    			// if($(this).find('a')!=false){
		    				var href = $(this).find('a').attr('href');
		    				// var imgHeight = $(this).find('img').height();
		    				// var img = '<li style="background-image:url('+href+'); height:'+imgHeight+'px;"><img src="'+href+'"></li>';
		    			// }else{
		    				// var src = $(this).find('img').attr('src');
		    				// <img src="'+href+'">
		    			var img = '<li style="background-image:url('+href+'); height:''+px;">';
	    				/*var title = $(this).find('img').attr('alt');
		    			var caption = $(this).find('.gallery-caption').text();
		    			if(title!='') var title='<strong class="caption-title">'+title+'</strong>';else {title =''; title='';}
		    			if(caption!=false)caption='<p class="caption-content">'+caption+'</p>';else caption ='';
	    				if(title!=''||caption!=false)img+='<div class="wrap-caption"><div class="caption">'+title+caption+'</div>';*/
		    			// img+='</li>';
		    				// var img = '<li style="background-image:url('+href+'); height:'+imgHeight+'px;"></li>';
		    			// }
	    				// $('.slick').append(img);
		    		// })
		    		// $(this).remove();
		    	// })*/
				 $('.slider-for').slick({
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  arrows: true,
				  fade: true
				  // asNavFor: '.slider-nav'
				});
				/*$('.slider-nav').slick({
				  slidesToShow: 3,
				  slidesToScroll: 1,
				  asNavFor: '.slider-for',
				  dots: true,
				  centerMode: true,
				  focusOnSelect: true
				});*/

				$('.slider-for').magnificPopup({
		          	delegate: 'a', 
		          	type: 'image',
		        	tLoading: 'Chargement de l\'image #%curr%...',
					mainClass: 'mfp-img-mobile',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
						preload: [0,1] // Will preload 0 - before current, and 1 after the current image
					},
					image: {
						tError: '<a href="%url%">L\'image #%curr%</a> ne peut pas être chargée.'
					}
		       	});
		    	/*$('.single-products .galery-full .slick').slick({
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
				});*/
			  	main.resizeGalleryFull();
	      		$('.product-pict').magnificPopup({
		          	delegate: 'a', 
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
							var alt = item.el.find('img').attr('alt');
							return alt;
						}
					}
		       	});
			},
			resizeGalleryFull:function(){
	      		$('.slider-for').each(function(){
	      			if($(this).hasClass('ratio-0-8'))$(this).find('a').css('height',($(this).width()*0.8)+'px');
	      			if($(this).hasClass('ratio-1'))$(this).find('a').css('height',($(this).width())+'px');
	      			if($(this).hasClass('ratio-1-1'))$(this).find('a').css('height',($(this).width()*1.1)+'px');
	      			if($(this).hasClass('ratio-1-2'))$(this).find('a').css('height',($(this).width()*1.2)+'px');
	      			if($(this).hasClass('ratio-1-3'))$(this).find('a').css('height',($(this).width()*1.3)+'px');
	      		})
	      	},
	    }; // end main
	    var handler = {
	    	init:function(){
    			$(window).resize(function(){
	    			handler.elemsResizing();
	    		})
	    		// handler.galleryBinding();
	    		
	    	},
	    	elemsResizing:function(){
				main.resizeGalleryFull();
	    	}
	    }; // end handler
	}) // end document.ready
})(jQuery);