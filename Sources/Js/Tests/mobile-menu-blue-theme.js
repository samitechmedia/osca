(function($){


var mobileBreakPoint = 'screen and (max-width:1009px), screen and (max-device-width:1024px)', //Set mobileBreakPoint to the screenwidth at which the regular desktop menu is no longer needed and a top mobile menu is needed instead
    menuIdentifier = '.main-nav' //parent id or class of menu container
	mobileMenuIdentifier = 'new-menu',//id of new mobile menu
	menuCategoryIdentifier = '.main-nav .menu-item'; //target for menu category headers
	mobileMenuInsert = '#main'; //div from which mobile menu will be prepended to
	reduceList = false; //if the menu category is part of the LI and not its own separate entity, set this to true, otherwise false.
	slickNavNative = false; //set to true if no menu rebuilding is necessary
	menuText = 'Menu', //if different text is needed for the hamburger text, change it here
	slickNavAjax = false, //if you need to ajax in the menu, create on and then put the full file path here, otherwise false.
	slickNavEngaged = false, //always false
    slickNavInitiated = false; //always false

var screenwidth={
	  //function to check initial state on page load and decide whether or not we need to initiate slicknav
	  initialState:function(){
		 var initialWidth = screenwidth.checkSize(),
             currentMenuIndicator = screenwidth.checkMediaQuery();
			 if(currentMenuIndicator == true){
	             mobilemenu.slicknavEngage();
			 }
		     screenwidth.checkResize();
		     console.log('running!');

	  },
	  //function to decide during window resize events if we need to show or hide slicknav
	  checkResize: function(){
			  $(window).resize(function() {
				  var belowThreshold = screenwidth.checkMediaQuery();
					if(belowThreshold == true && slickNavEngaged == false && slickNavInitiated == false){
						mobilemenu.slicknavEngage();
					}
					else if(belowThreshold == true && slickNavEngaged == false && slickNavInitiated == true){
						mobilemenu.slicknavShow();
					}
					else if(belowThreshold == false && slickNavEngaged == true){
						mobilemenu.slicknavHide();
				    }
					else{
					}
			  })
	  },

	  //simple function to return screen width
	  checkSize:function(){
			  $size = $(window).width();
			  return $size;
	  },
	  //simple function to return screen height (not currently called in this script)
	  checkHeight:function(){
		  var $height = $(window).height();
		  return $height;
	  },
	  checkMediaQuery: function(){
		 return $.mobile.media(mobileBreakPoint);
	  }



}

var mobilemenu={
	//all functions in mobilemenu are used to initiate, show or hide slicknav
	 slicknavEngage: function(){
		 $('#'+mobileMenuIdentifier).slicknav({
		       prependTo: mobileMenuInsert,
			 label: menuText,
			 open: function(trigger){
				 var that = trigger.parent().children('ul');
				 if(that.hasClass('submenu')) return;
				 $('.slicknav_nav li.slicknav_open ul').each(function(){
					 if($(this).get( 0 ) != that.get( 0 )){
						 $(this).slideUp().addClass('slicknav_hidden');
						 $(this).parent().children('a').find('.slicknav_arrow').text('►');
						 $(this).parent().removeClass('slicknav_open').addClass('slicknav_collapsed');
					 }
				 });
			 }
		 });
		 slickNavEngaged = true;
		 slickNavInitiated = true;
		 mobilemenu.desktopMenuHide();
         $('.slicknav_btn').after('<a class="slicknav_btn slicknav_btn_white" id="mobile-btn" href="/mobile"  style="outline: none;"><span id="mobile" class="slicknav_menutxt">Mobile</span><span class="slicknav_icon"><span class="fa fa-mobile"></span></span></a><a class="slicknav_btn slicknav_btn_white" id="real-money-btn" href="/real-money" tabindex="0"  style="outline: none;"><span id="real-money" class="slicknav_menutxt">Real Money</span><span class="slicknav_icon"><span class="fa fa-usd"></span></span></a>');
         console.log('engaged');
	 },

	 slicknavShow: function(){
		 $('.slicknav_menu').show();
		 slickNavEngaged = true;
		 mobilemenu.desktopMenuHide();
              $('.slicknav_btn').after('<a class="slicknav_btn slicknav_btn_white" id="mobile-btn" href="/mobile"  style="outline: none;"><span id="mobile" class="slicknav_menutxt">Mobile</span><span class="slicknav_icon"><span class="fa fa-mobile"></span></span></a><a class="slicknav_btn slicknav_btn_white" id="real-money-btn" href="/real-money" tabindex="0"  style="outline: none;"><span id="real-money" class="slicknav_menutxt">Real Money</span><span class="slicknav_icon"><span class="fa fa-usd"></span></span></a>');
		          console.log('shown');

	 },

	 slicknavHide: function(){
		 $('.slicknav_menu').hide();
		 slickNavEngaged = false;
		 mobilemenu.desktopMenuShow();
         $('#real-money-btn').remove();
         $('#mobile-btn').remove();
		          console.log('hidden');

	 },

	 desktopMenuShow:function(){
       $(menuIdentifier).show();
	 },

	 desktopMenuHide:function(){
       $(menuIdentifier).hide();
         $
	 }
}

//function to rebuild menu into a structure that works well with slicknav. If no rebuilding is necessary, function simply clones regular menu for use as mobile menu
var rebuildmenu={

	start:function(){

		var $menuParent = $(menuIdentifier),
		    $menuCategories = $(menuCategoryIdentifier),
			$unorderedList = $($menuParent.find('ul').not('.submenu'));
			$newMenu = $('<div>').attr('id',mobileMenuIdentifier);

		if(slickNavAjax != false){
			rebuildmenu.ajaxMobileMenu($newMenu);
			console.log('ajax!');
		}

		else if(slickNavNative != true){
              rebuildmenu.makeNewMenu($menuCategories, $unorderedList, $newMenu);
				console.log($unorderedList);

			console.log('rebuilding');
		}
		else{
			rebuildmenu.useCurrentMenu($menuParent,$newMenu);
			   console.log('using current');

		}
	},

	ajaxMobileMenu:function($newMenu){
		$.ajax({
            type:"GET",
            url: slickNavAjax,
            success: function(data) {
			$newMenu.append(data);
            rebuildmenu.engageRebuiltMenu($newMenu);
            }

     });

	},

	makeNewMenu:function($menuCategories, $unorderedList, $newMenu){

				 $menuCategories.each(function(i){
					if(reduceList == true){
						var $listReduce = $unorderedList.eq(i).children('li').clone().slice(1);
							$curList = $('<ul>').append($listReduce).html();
					}
					else{
						var $curList = $unorderedList.eq(i).html();
					 }

					 var header = $(this).text();
					   $newMenu.append('<li>'+header+'<ul>'+$curList+'</ul></li>');
				});
			    rebuildmenu.engageRebuiltMenu($newMenu);
	},

	useCurrentMenu:function($menuParent,$newMenu){
			$menuParentClone = $menuParent.clone().attr('class','thingybob');
			$newMenu.append($menuParentClone);
			rebuildmenu.engageRebuiltMenu($newMenu);

	},

	engageRebuiltMenu:function($newMenu){
		console.log($newMenu);
		$newMenu.appendTo('body').hide();
	    screenwidth.initialState();

	}
}

$(document).ready(rebuildmenu.start);
})(jQuery);
