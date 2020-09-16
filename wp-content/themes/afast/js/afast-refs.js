(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
		   	init:function(){
		   		console.log('references - main.init');
	    		var iGallery = 0;
		    	$('.single-references .slider-for').each(function(){
	    			$(this).append($(this).find('a'));
		    		$(this).find('.gallery').remove();
	    			$(this).find('a').addClass('background-cover');
	    			$(this).find('a').addClass('unlink');
		    		$(this).find('a').each(function(){
		    			var src = $(this).attr('href');
		    			$(this).css('background-image','url('+src+')');
		    		})
	    			$(this).find('img').css('opacity',0);
		    	})
		    	$('.single-references .slider-nav').each(function(){
	    			$(this).append($(this).find('img'));
		    		$(this).find('.gallery').remove();
		    	})
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
				$('.ref-picts').magnificPopup({
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
			  	main.resizeGalleryFull();
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
	    		console.log('references - handler.init')
    			$(window).resize(function(){
	    			handler.elemsResizing();
	    		})
	    	},
	    	elemsResizing:function(){
				main.resizeGalleryFull();
	    	}
	    }; // end handler
	}) // end document.ready
})(jQuery);