//(function ($) {

	$(document).ready(function(){
			var inProcess = false;
			var items = [
				{
					background_left: '77px',
					background_top: '-317px',
					title: 'Diane L. from Vancouver just won<br />C$12,319 playing Slots at Ruby Fortune.',
                img: '/images/map/site-winner-1.png',
                link: '/go/rubyfortune/casino',
                text: 'C$750 Welcome bonus for new customers'
				},

				{
					background_left: '-65px',
					background_top: '-64px',
					title: 'Mark M from Paulatuk just won<br /> C$7,527 playing Slots at Spin Casino.',
                img: '/images/map/site-winner-3.png',
                link: '/go/spincasino/casino',
                text: 'C$1000 Welcome bonus for new customers'
				},
				{
					background_left: '-77px',
					background_top: '-167px',
					title: 'Hope C. from Yellowknife just won<br /> C$4,157 playing Slots at Jackpot City.',
                img: '/images/map/site-winner-4.png',
                link: '/go/jackpotcity/casino',
                text: 'C$500 Welcome bonus for new customers'
				},
            {
                background_left: '-470px',
					background_top: '-386px',
                title: 'Gille from Quebec just won<br /> C$9,752 playing Slots at Spin Casino.',
                img: '/images/map/site-winner-3.png',
                link: '/go/spincasino/casino',
                text: 'C$1000 Welcome bonus for new customers'
            },
			{
					background_left: '-15px',
					background_top: '-319px',
					title: 'Stanley from Calgary just won<br /> C$3,687 playing Slots at Royal Vegas.',
                img: '/images/map/site-winner-2.png',
                link: '/go/royalvegas/casino',
                text: 'C$250 Welcome bonus for new customers'
				},
			{
                background_left: '-383px',
					background_top: '-444px',
                title: 'Susan E from Toronto just won<br /> C$8,299 playing Video Poker at Spin Casino.',
                img: '/images/map/site-winner-3.png',
                link: '/go/spincasino/casino',
                text: 'C$1000 Welcome bonus for new customers'
            },
			{
                background_left: '-185px',
					background_top: '-367px',
                title: 'Mario from Winnipeg just won<br /> C$3,697 playing Blackjack at Spin Casino.',
                img: '/images/map/site-winner-3.png',
                link: '/go/spincasino/casino',
                text: 'C$1000 Welcome bonus for new customers'
            },
			];


			var stopIt = false;
			var m = 0;

			$('.box-winner').on('mouseover', function () {
				stopIt = true;
			})
			$('.box-winner').on('mouseout', function () {
				stopIt = false;
				setTimeout(function () {
					showWinners(items, m);
				}, 1000);
			})
			showWinners(items);



			function showWinners(winners, i) {
				if (!stopIt && !inProcess) {
					inProcess = true;
					i = (i == undefined || i == winners.length) ? 0 : i;
					var popup_left = '160px';
					var popup_top = '67px';
					var block = $($('.block-winners-map .block-winner')[0]);
					var background = $('.img-map');
					background.animate({
						left: winners[i].background_left,
						top: winners[i].background_top,
					}, 'slow', function () {

					});


					block.fadeOut(1000, function () {
						block.css({
							left: popup_left,
							top: popup_top,
						});

						block.find('p.winner-title').html(winners[i].title);
						block.find('.site-winner img').attr('src', winners[i].img);
						block.find('a.btn-play-now').attr('href', winners[i].link).attr('rel', 'nofollow').attr('target', '_blank');
						block.find('p.bonus-winner').html(winners[i].text);
						block.fadeIn('slow', function () {
							i++;
							m = i;

							setTimeout(function () {
								showWinners(winners, i)
							}, 3000);
						});
					});

					inProcess = false;
				} else
					return ;
			}


	});

	//	})(jQuery);
