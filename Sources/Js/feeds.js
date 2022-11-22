
var flyout ={
	start: function(){
                var $target = $('.widget-table-content.winners_rotate');
					flyout.fadeOldBox($target);
					//flyout.overStop();

	},//end function
	fadeOldBox: function(e){
             e.animate(
		              {
						'marginLeft':'-548px',
						'opacity'   :'0'

					  },
					  {//200
						duration:200,
						complete: function(){
							flyout.returnToStart(e);
						}
					  }
				)

	},
	returnToStart: function(e){
		    e.css({
				       'marginLeft': '538px',
					   'opacity'   : '1',

			        }).empty()
					  .load('/assets/includes/feeds/ajax.php')
		              .animate(
		              {
						'marginLeft':'0px',
						//'opacity'   :'1'

					  },
					  {
						duration:250
					  }
				      ).animate(
					   {
						'marginLeft':'30px',
					   },
					   {
						duration:100
					   }
					  ).animate(
					   {
						'marginLeft':'0px',
					   },
					   {
						duration:100
					   }
					  ).animate(
					   {
						'marginLeft':'2px',
					   },
					   {
						duration:50
					   }
					   ).animate(
					   {
						'marginLeft':'0px',
					   },
					   {
						duration:30,
						complete: function(){
							flyout.restart();
						}
					   }
					   )
	},

	restart: function(){
       newTimeout = setTimeout(flyout.start,4000)

	},
	overStop: function(){
		  $('.jackpot-widgets').on('mouseover','.winners-box',function(){
			  clearTimeout(newTimeout);
			  newTimeout = null;

		  });
		  $('.jackpot-widgets').on('mouseleave','.winners-box',function(){
			  if(newTimeout == null){
			  flyout.restart();
			  }

		  });
	},
	establishWinnerLinks: function(){
		  $('.jackpot-widgets').on('click','.tbl-row',function(){
			 var divName = $(this).attr('name');
			 switch(divName){
				   case 'spincasino':
				   var finalUrl = '/reviews/spin-casino';
				   break;
				   case 'rubyfortune':
				   var finalUrl = '/reviews/ruby-fortune';
				   break;
				   case 'betway':
				   var finalUrl = '/reviews/betway';
				   break;
				   case 'rvegas':
				   var finalUrl = '/reviews/royal-vegas';
				   break;

			 }
			 var win=window.open(finalUrl, '_self');
		     win.focus();
			 return false;
		  });
	},
	establishJackpotLinks: function(){
		  $('.widget-table-content.jackpots_rotate').on('click','.tbl-row',function(){
			 var win=window.open('/go/spincasino/casino', '_blank');
		     win.focus();
			 return false;
		  });
	  }
};//end var flyout--------------------------------------------

function sideLoad(){
	$('#play-for-free').after('<iframe class="playitnow" src="https://casino3.gammatrix.com/Loader/Start/6/starburst-mini//?funMode=True&language=en" width="193px" height="255px"></iframe>');
	}




$(document).ready(function(){
//flyout.overStop();
flyout.establishWinnerLinks();
flyout.establishJackpotLinks();
newTimeout = setTimeout(flyout.start,4000);
sideTimeout = setTimeout(sideLoad,4000);



});//document.ready
//$(document).ready(scrollJackpots.start);//document.ready
