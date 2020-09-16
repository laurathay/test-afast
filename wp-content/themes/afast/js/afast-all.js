(function($){
  	$(document).ready(function(){
	  	$(function(){
	  		main.init();
	  		handler.init();
	    });
	    var main={
	    	documentPosTop:null,
	    	menuPos:null,
	    	secondNavWindowArea:null,
	    	secondNavLimitArea:null,
	    	windowHeight:null,
	    	headerHeight:null,
	    	containerHeight:null,
	    	footerHeight:null,
		    init:function(){
		    	console.log('all : main-init');
		    	$('.gallery br').each(function(){
		    		$(this).remove();
		    	});
				main.menuPos = $('#main-menu').position().top;
		    	main.checkMenuPos();
		    	main.optimizeFooterPosition();
		    	// main.generateNavSide();
	      	},
	      	checkMenuPos:function(){
	      		var documentPosTop = $(document).scrollTop();
	      		if(documentPosTop>main.menuPos && $(window).width()>=$('.wrap-content').width()){
	      			if(!$('#main-menu').hasClass('fixed')){
		      			$('#main-menu').addClass('fixed');
		      			$('#main-header').css('padding-bottom',45);
		      		}
	      		}else if($('#main-menu').hasClass('fixed')){
	      			$('#main-menu').removeClass('fixed');
	      			$('#main-header').css('padding-bottom',0);
	      		}
	      	},
	      	optimizeFooterPosition:function(){
	      		main.windowHeight = $(window).height() ;
	      		main.headerHeight = $('#main-header').height();
	      		main.footerHeight = $('#main-footer').height();
	      		main.containerHeight = main.windowHeight-main.footerHeight;
	      		console.log(main.containerHeight);
	      		/*if(main.containerHeight < main.windowHeight-main.headerHeight){
	      			console.log(main.windowHeight-main.headerHeight);
	      			$('#main-footer').addClass('footer-fixed');
	      		}else{
	      			$('#main-footer').removeClass('footer-fixed');
	      		}*/
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
					$('.second-nav').css('margin-top','-'+secondNavHeight+'px');
					this.checkSecondNavArea();
  					this.checkSecondNav(1000);
	      		}
	      		if( ( $('body').hasClass( 'page-template-page-produits' ) && !$('body').hasClass( 'page-id-19' ) ) /*|| $('body').hasClass( 'single-products' )*/ ) {
	      			$('body').prepend('<nav class="second-nav"><ul class="nav"></ul></nav>');
	      			$('.second-nav ul').append($('body').find('#menu-item-319 .dropdown').html());
	      			var secondNavHeight = $('.second-nav').height()/2 ;
					$('.second-nav').css('margin-top','-'+secondNavHeight+'px');
					this.checkSecondNavArea();
  					this.checkSecondNav(1000);
  					/*if(!$('.second-nav li').hasClass('.active')){
  						var href = $('#main-breadcrumbs .cat-parent').attr('href') ;
  						$('.second-nav li a[href="'+href+'"]').parents('li').addClass('active');
  					}*/
	      		}
      			// $('.second-nav .nav').append($('.has-dropdown.active .dropdown li').clone());
	      	},
	      	checkSecondNavArea:function(){
	      		this.secondNavWindowArea = $(window).width()-$('.second-nav').width() ;
	      		this.secondNavLimitArea = $('#top-bar-header .wrap-content').width()+$('.second-nav').width() ;
	      	},
	      	checkPosNavSide:function(delay){
				function moveNav() {
			        setTimeout(function () {
			        	$('.second-nav').removeClass('open');
			        }, delay);
		      	}
		      	moveNav();
	      	},
	      	checkSecondNav:function(){
	      		// if(this.secondNavWindowArea != secondNavWindowArea ) this.secondNavWindowArea = secondNavWindowArea ;
	      		this.checkSecondNavArea();
	      		// if(this.secondNavLimitArea != secondNavLimitArea ) this.secondNavLimitArea = secondNavLimitArea ;
	      		if(  this.secondNavWindowArea < this.secondNavLimitArea ){
    				if($('.second-nav').hasClass('open')) this.checkPosNavSide(500);
	    		}else{
    				if(!$('.second-nav').hasClass('open')) $('.second-nav').addClass('open');
    			}
	      	}
	    }; // end main
	    var handler={
	    	init:function(){
				console.log('all : handler-init');
	    		$('.unlink').bind('click',function(e){
					e.preventDefault();
				})
				$(window).resize(function(){
	    			handler.elemsResizing();
	    		})
				handler.binding();
	    	},
	    	elemsResizing:function(){
    			main.checkSecondNav();
    			main.optimizeFooterPosition();
    			// handler.checkAnchorPosition();
	    	},
	    	elemsScrolling:function(){
    			main.checkSecondNav();
    			main.checkMenuPos();
    			// handler.checkAnchorPosition();
	    	},
	    	binding:function(){	
	    		$(document).bind('scroll',function(){
	    			handler.elemsScrolling();
	    		})
	    		$(document).bind('scroll',function(){
	    			// handler.elemsResizing();
	    		})
	    	},
	    	checkAnchorPosition:function(){
	    		// var documentPosTop = $(document).scrollTop();
	    		// console.log(documentPosTop);
	    	}
	    };
	}) // end document.ready
})(jQuery);

