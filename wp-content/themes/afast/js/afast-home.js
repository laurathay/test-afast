(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
		    init:function(){
		    	console.log('home : main-init');
		    
		    	if($('#main-slider .gallery img').length>1) $('#main-slider .gallery img').css('display','none');
		    	$('#main-slider .gallery').addClass('hidden');
		    	
		    	$('#main-slider .gallery').each(function(){
		    		$(this).before('<ul class="no-bullet slick"></ul>');
	    			iGalleryItem = 0;
		    		$(this).find('.gallery-item').each(function(){

		    			if($(this).find('a')!=false){
		    				var href = $(this).find('a').attr('href');
		    			}else{
		    				var href = $(this).find('img').attr('src');
		    			}
		    			var img = '<li>';

	    				var alt = $(this).find('img').attr('alt');
	    				var title = $(this).find('img').attr('title');
	    				if( alt==undefined && title== undefined ) alt='', title='' ;
	    				if( alt==undefined && title!=undefined ) alt=title ;
	    				if( title==undefined && alt!=undefined ) title=alt ;

		    			// var caption = $(this).find('.gallery-caption').text();
		    			// if(title!='') var title='<h3 class="caption-title">'+title+'</h3>';else {title ='';}
		    			// if(caption!=false)caption='<p class="caption-content">'+caption+'</p>';else {caption ='';}

	    				// if(title!=''||caption!=false)img+='<div class="wrap-content wrap-caption"><div class="caption">'+title+caption+'</div></div>';
	    				// if(title!='')img+='<div class="wrap-content wrap-caption"><div class="caption">'+title+'</div></div>';
	    					
	    					img+='<div style="background-image:url('+href+');" class="bg-gallery"></div>';
	    					img+='<img src="'+href+'" alt="'+alt+'" title="'+title+'" class="hidden"/>' ;
		    			img+='</li>';
		    			
		    			$('#main-slider .slick').append(img);
		    			var slickCaption = $('#main-slider .slick li')[iGalleryItem] ;
		    			$(slickCaption).find('.caption').append($(this).find('.gallery-caption'));
		    			++iGalleryItem ;
		    		})
		    		$(this).remove();
		    	})
		    	
		    	$('body #main-slider .slick').slick({
		    		 dots: true,
					  infinite: true,
					  speed: 500,
					  fade: true,
					  cssEase: 'linear',
					  arrows: false,
					  pauseOnHover: false,
					  autoplay: true,
					  autoplaySpeed: 6000,
				   	 	dots: true
		    	})

				/*$('.logged-in #main-slider .slick img').each(function(){
					var containerHeight = $('.logged-in #main-slider').outerHeight() ;
					var imgHeight = $(this).outerHeight() ;
					$(this).css('margin-top',-( ( imgHeight-containerHeight )/2 ) ) ;
				})*/
		    	main.checkBlocksHomeHeight();
	      	},
	      	checkBlocksHomeHeight:function(){
      			$('#block-links .block-link').css('height','auto');
	      		// $('#block-links .block-link').css('height',$('#block-links').outerHeight()+30);
	      		// $('#block-links .block-link').height($('#block-links').height());
	      		$('#block-links .block-link').css('height',$('#block-links').height());
	      		$('#block-links .block-link').addClass('js-action');
	      		// console.log($('.block-link .block-container').height());
	      		// console.log($('.block-link .block-content').height());
	      	}
	      	
	    }; // end main
	    var handler={
	    	init:function(){
				console.log('home : handler-init');
				$(window).resize(function(){
	    			handler.elemsResizing();
	    		})
				handler.binding();
	    	},
	    	elemsResizing:function(){
				main.checkBlocksHomeHeight();
	    	},
	    	elemsScrolling:function(){
	    	},
	    	binding:function(){	
	    		$(document).bind('scroll',function(){
	    			handler.elemsScrolling();
	    		})
	    		$(document).bind('scroll',function(){
	    			handler.elemsResizing();
	    		})
	    	}
	    };
	}) // end document.ready
})(jQuery);

