jQuery(document).ready(function() {

	/* Menu */
	ddsmoothmenu.init({
		mainmenuid: "mainmenu", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});

	/* FancyBox 2 */
	addFancyBox();

	/* Responsive Menu Generation */
    menuHandler();

	/* Responsive Select Menu */
	jQuery("#responsive-menu select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});

	/* Activate Tabs */
	jQuery('.themetab a').click(function (e) {
		e.preventDefault();
		jQuery(this).tab('show');
	})

	/* Activate Carousels */
	jQuery('.carousel').carousel({ interval: 5000 })

	/* Footer Position 
	setTimeout(function() {
		footerHandler();
	},1000);*/

	/* Fit Videos */
	jQuery(".scalevid").fitVids();

	/* Tooltips */
	jQuery("a[data-rel^='tooltip']").tooltip();
	jQuery("div.projectnav[data-rel^='tooltip']").tooltip();

	/* Popovers */
	jQuery("a[data-rel^='popover']").popover();

	/* Sticky Menu Functions */
	//initStickyMenu();


	/*if (jQuery('body').hasClass("stickymenu")) {
		initStickyMenu2();
	} else {
			var header=jQuery('.header');
			header.css({'position':'absolute'});
		}*/


	/* Collapse Extra Functions */
	initCollapseExtras();

	/* Team Member Adjustement */
	initTeamMemberAdjustment();


	/* ADJUST THE MENU HEIGHT AND THE CONTAINER BELOW IT */
	/*menuLineAdjustment();
	jQuery('.logo').waitForImages(function() {
		menuLineAdjustment();
	})*/

	jQuery(window).resize(function() {

		initTeamMemberAdjustment();
		/*menuLineAdjustment();*/

	})

	/*Fancy Box Build Group */
	jQuery('.portfoliofilter a').on('click',function() {

		setTimeout(function() {

		   jQuery('.portfolio.isotope').find('.isotope-item').each(function() {
		   		jQuery(this).find('.fancybox').data('rel','fancygroup');
		   		jQuery(this).find('.fancybox').attr('rel','fancygroup');
		     });
		   jQuery('.portfolio.isotope').find('.isotope-hidden').each(function() {
		   		jQuery(this).find('.fancybox').data('rel','hiddengroup');
		   		jQuery(this).find('.fancybox').attr('rel','hiddengroup');
		     });

		 },500);
	});

	/* SET SEARCH FORM FOR BBPRESS */
	var fs = jQuery('body').data('forumsearch');
	if (fs!=undefined)
		jQuery('#bbp-search-form #bbp_search').val(fs)
	jQuery('#bbp-search-form #bbp_search').addClass("prepared-input");

	/* CARE ABOUT THE INPUT FIELDS */
	initInputFields();

	/* BUDDYPRESS CLICKS  */
	initBuddyPressClicks();

	/* MENU WIDTH ADJUSTMENT 
	menuWidthAdjustment();*/

	
	/*WAIT FOR SLIDER LOADER*/
	initSliderHeight();


});

		/******************************
			-	SLIDER FUN ;-)	-
		********************************/
		function initSliderFun() {
			// CHANGE HEIGHT OF DEF CONTAINER
			if(!is_mobile()){
				jQuery('.homeslider').css({height:'auto'});			
	
				jQuery('.homeslider ul li').each(function() {
					jQuery(this).find('.tp-caption').each(function(){
						if(jQuery(this).html().lastIndexOf("vimeo")>-1 || jQuery(this).html().lastIndexOf("vimeo")>-1 || jQuery(this).html().lastIndexOf("href")>-1)
							zindex = "30001";
						else 
						 	zindex = "10";
						jQuery(this).wrap('<div class="tp-parallax" style="position:absolute;width:100%;height:100%;top:0px;left:0px;z-index:'+zindex+';"></div>');
						
					});
				
			});

			jQuery(window).scroll(function() {			

				var offset = jQuery(window).scrollTop();
					jQuery('.homeslider .tp-parallax').each(function() {
						var tp=jQuery(this);
						TweenLite.to(tp,0.3,{z:1000,scale:1, rotationX:offset/10,z:0.01,transformOrigin:"center bottom",opacity:1-Math.abs(offset/1000),transformPerspective:1000,top:offset/2,ease:Linear.easeNone});	
						if(navigator.userAgent.indexOf('Chrome') > -1){
							tp.css("-webkit-transform-origin",'none');
							tp.css("-webkit-transform",'none');			
						}
					});

			});
			}
		}
		
		function initSliderHeight(){
			jQuery('.homeslider').css({height:'auto'});	
			
			jQuery(".comment-reply-link").click(function(){
				if(jQuery(this).closest("li .depth-1") != jQuery("#comments li").last()) jQuery(".form-submit #submit").css("margin-bottom","50px");
				else
					jQuery(".form-submit #submit").css("margin-bottom","10px");	
			});
		}
		
		////////////////////////////
		// INIT BUDDYPRESS CLICKS //
		////////////////////////////
		function initBuddyPressClicks() {
			var wn=jQuery('#whats-new');
			wn.data('oldheight',wn.height());
			wn.unbind('click');
			wn.unbind('focus');

		}

		///////////////////////
		// INIT INPUT FIELDS //
		//////////////////////

		function initInputFields() {

			// Check the Search value on Standard
				jQuery(".prepared-input, .searchinput").each(function() {
					var field=jQuery(this);
					field.data('standard',field.val());
				});


				jQuery(".prepared-input, .searchinput").focus(function(){
					var $this = jQuery(this);

					$this.val($this.val()== $this.data('standard') ? "" : $this.val());
				});
				jQuery(".prepared-input, .searchinput").blur(function(){
					var $this = jQuery(this);
					$this.val($this.val()== "" ? $this.data('standard') : $this.val());
				});
		}


	/* PAGETITLE Adjustment function menuLineAdjustment() {
	var newh=jQuery('.headerwrap .header').height();


	jQuery('body').removeClass("threelinemenu").removeClass("twolinemenu");

	if (jQuery('.mainmenu').position().top>30) {
		if (newh<150) {

			jQuery('body').addClass("twolinemenu");

		} else {

			if (newh>150) jQuery('body').addClass("threelinemenu");
		}
	}

	if (jQuery('.pagetitlewrap').length==0 && jQuery('.homesliderwrapper').length==0) jQuery('body').addClass("nopagetitle");

	// REPOSITION OF THE SUBMENU AFTER CHANGING DIMENSIONS
	var $headers=jQuery('#mainmenu').find("ul").parent();

	$headers.each(function(i){ //loop through each LI header
		var depth = jQuery(this).parents("ul").size();
		if (depth<2) {
			var $curobj2=jQuery(this).css({zIndex: 100-i}) //reference current LI header
			var $subul=jQuery(this).find('ul:eq(0)').css({display:'block'})

			var h=this.offsetHeight;
			this.istopheader=$curobj2.parents("ul").length==1? true : false //is top level header?

			$subul.css({top:this.istopheader ? h+"px" : 0, display:this.istopheader ? "none" : "block"})
		}
	}) //end $headers.each()


}*/


/*************************************
	-	MENU WIDTH ADJUSTMENT   -
**************************************/
	function menuWidthAdjustment() {
		/*jQuery('.ddsmoothmenu ul li').each(function() {
			var li=jQuery(this);
			var maxwidth=0;

			li.hover(function() {
				maxwidth=0;
				var li=jQuery(this);

				setTimeout(function() {

					li.find('>ul>li>a').each(function() {

						if (maxwidth < jQuery(this).innerWidth()) maxwidth = jQuery(this).width();
					})

					maxwidth=maxwidth+40;
					li.find('ul').css({width:maxwidth+"px"});
					li.find('ul ul').each(function() {
						console.log(jQuery(this).css('left'));
						jQuery(this).css({left:maxwidth+"px"});

					});

				},1);

			})
		})*/
	}

/* Team Member Adjustement */
function initTeamMemberAdjustment() {
	var maxh=0;
	var padds=0;
	jQuery('.team').waitForImages(function() {
		jQuery('.team').find('.memberwrap').each(function() {
			var th=jQuery(this);
			padds=parseInt(th.css('paddingBottom'),0) + parseInt(th.css('paddingTop'),0);
			if (maxh<th.find('.member').outerHeight(true)) maxh=th.find('.member').outerHeight(true);
		})



		jQuery('.team').find('.memberwrap').each(function() {
			jQuery(this).css({'height':(maxh+padds)+"px"});
		})
	});
}

/* INITIALISE  THE COLLAPSE FUNCTIONS */
function initCollapseExtras() {
	jQuery('.accordion-toggle').each(function() {
		jQuery(this).click(function() {
			jQuery(this).closest('.accordion').find('.accordion-toggle').each(function(i) {
				//alert(i)
				jQuery(this).addClass('collapsed');
			})
		})
	})
}


/*	INITIALIZE THE STICKY MENU 
function initStickyMenu() {

	var header=jQuery('.header');
	header.css({'position':'absolute'});

	jQuery(window).scroll(function() {
		//console.log("Scrolled");
		clearInterval(header.data('interv'));
		header.data('ii',0);
		header.data('interv',setInterval(function() {
			//console.log();
			var sct = jQuery(window).scrollTop();
			if ((header.parent().offset().top-sct)<=0){
				//header.css({'top':sct+'px'})
				header.css({'position':'fixed','top':'0px'});
			} else {
				header.css({'top':'auto','position':'absolute'});
			}
			header.data('ii',header.data('ii')+1);
			if (header.data('ii')>100) clearInterval(header.data('interv'));
			//console.log(header.data('ii'));
		},10));
	});
}	*/



/*	INITIALIZE THE STICKY MENU 	
function initStickyMenu2() {

	var header=jQuery('.header');
	header.css({'position':'absolute'});
	var stimer;

	jQuery(window).scroll(function() {
		clearTimeout(stimer);
		var sct = jQuery(window).scrollTop();
		if (!((header.parent().offset().top-sct)<=0)){
				clearTimeout(header.data('timer'));
				header.data('repositioned',0).fadeIn(0);
				header.css({'top':'auto','position':'absolute'});
		}
		stimer=setTimeout(function() {
			sct = jQuery(window).scrollTop();

			if ((header.parent().offset().top-sct)<=0){
			  if ( header.data('repositioned') != 1) {
					header.fadeOut(200)
					header.data('timer',setTimeout(function() {
						header.css({'position':'fixed','top':'0px'}).delay(300).fadeIn(300);
					},200));
					header.data('repositioned',1);
				}
			} else {
				clearTimeout(header.data('timer'));
				header.data('repositioned',0).fadeIn(0);
				header.css({'top':'auto','position':'absolute'});
			}
		},150);

	});
}*/

jQuery(window).load(function(){

	/* Isotope Portfolio */
	var $container = jQuery('.portfolio');
	$container.isotope({
		filter: '*',
		animationOptions: {
			duration: 500,
			easing: 'linear',
			queue: false
		}
	});

	jQuery(window).resize(function() {
		setTimeout(function() {jQuery('.portfolio').isotope('reLayout');},550);
	});

	jQuery('.portfolio').isotope('reLayout');

	jQuery('ul.portfoliofilter a').click(function(){
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 500,
				easing: 'linear',
				queue: false
			}
		});
	  return false;
	});

	var $optionSets = jQuery('ul.portfoliofilter'),
	       $optionLinks = $optionSets.find('a');
	       $optionLinks.click(function(){
	          var $this = jQuery(this);
		  // don't proceed if already selected
		  if ( $this.hasClass('selected') ) {
		      return false;
		  }
	   var $optionSet = $this.parents('ul.portfoliofilter');
	   $optionSet.find('.selected').removeClass('selected');
	   $this.addClass('selected');
	});

});

/* #Fancy Box
================================================== */

function addFancyBox() {
	/* PrettyPhoto init */

	jQuery(".prettyphoto").each(function(){
		jQuery(this).removeClass("prettyphoto").addClass("fancybox").attr("rel","gallery");
	});

	jQuery(".fancybox").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		autoResize : true,
		fitToView : true,
		helpers : {
			media : {}
		}
	});

	jQuery(window).resize(function() {
		jQuery.fancybox.update();
	});
}

/* #Menu Handler
================================================== */

function menuHandler() {

	var defpar = jQuery('#mainmenu').parents().length;

	jQuery('#mainmenu li > a').each(function() {
		var a=jQuery(this);
		var par= a.parents().length-defpar -3;

		var atext = a.html().split('<')[0];
		atext = atext.toLowerCase();
		atext = atext.substr(0,1).toUpperCase() + atext.substr(1,atext.length);

		if (par==0)
			var newtxt=jQuery("<div>"+atext+"</div>").text();
		else
			if (par==2)
				var newtxt=jQuery("<div>&nbsp;&nbsp;&nbsp;"+atext+"</div>").text();
			else
				if (par==4)
					var newtxt=jQuery("<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+atext+"</div>").text();

		 jQuery('#responsive-menu select').append(new Option(newtxt,a.attr('href')) );
	});
}

/*#Footer Handler
================================================== */
function footerHandler() {

	var footer_wrap = jQuery('body').find('.footerwrap');

	jQuery(window).resize(function() {
		footerAdjust();
		setTimeout(function() {footerAdjust();},100);
	});

	var intfa_c=0;
	var intfa=setInterval(function() {
		footerAdjust();
		intfa_c++;
		if (intfa_c>15) clearInterval(intfa);
	},100);

	function footerAdjust(){

		var footerh = footer_wrap.outerHeight();
		var windowh = jQuery(window).height();
		dif=0;
		if(footer_wrap.length){
			dif =  parseInt(footer_wrap.css('marginTop'),0) + Math.round(windowh - (footer_wrap.offset().top + footerh));
			if (dif>0) {
				footer_wrap.stop();
				footer_wrap.animate({'marginTop':dif+"px"},{duration:300,queue:false});
			}
			if (dif<0) {
				footer_wrap.stop(true,true);
				footer_wrap.animate({'marginTop':"0px"},{duration:300,queue:false});
			}
		}


	};



}


// Check Mobile
	function is_mobile() {
	      var agents = ['android', 'webos', 'iphone', 'ipad', 'blackberry','Android', 'webos', ,'iPod', 'iPhone', 'iPad', 'Blackberry', 'BlackBerry'];
	   var ismobile=false;
	      for(i in agents) {
	
	       if (navigator.userAgent.split(agents[i]).length>1) {
	              ismobile = true;
	            
	            }
	      }
	      return ismobile;
	  }
