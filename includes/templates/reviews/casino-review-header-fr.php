<div class="review-block-header">
	<span class="inner">
		<a href="<?php echo $partner['affiliate_link'] ?>" target="_blank" rel="nofollow noreferrer" class="aside">
			<img class="casino-logo" src="<?php echo $partner['logo']; ?>" alt="<?php echo $partner['sitename']; ?>" width="200" height="95"/>
            <span class="review-block-header__rating rate-stars">
				<svg class="icon c-silver" width="150" height="26" aria-hidden="true">
					<use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
				</svg>
				<span class="rate-stars__fill" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" style="width:<?php echo $partner['ratingstars']; ?>">
					<svg class="icon c-orange" width="150" height="26" aria-hidden="true">
						<use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
					</svg>
                </span>
            </span>
			<span class="is-accessible-text"><?php echo ($partner['rating']) / 2; ?> out of 5</span>
            <meta itemprop="ratingValue" content="<?php echo str_replace('%', "", $partner['ratingstars']); ?>"/>
            <meta itemprop="bestRating" content="100"/>
			<button class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green">JOUER MAINTENANT</button>
        </a>
		<a href="<?php echo $partner['affiliate_link'] ?>" target="_blank" rel="nofollow noreferrer" class="add-info">
		<div class="carousel js-swiper js-review-swiper">
				<div class="swiper-container js-review-swiper__container">
					<div class="swiper-wrapper">
					<?php
                        $slotgames = explode('||', $partner['slotgames']);
						$firstSlide = true;
                        foreach ($slotgames as $slotgame) {
							if ( $firstSlide ) { ?>
								<div class="swiper-slide">
									<img class="image-screen"
										src="/images/casino-review-blocks/games/screenshots/<?php echo $slotgame; ?>.png"
										width="164" height="123"
										alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> screenshot" />
									<img class="image-logo"
										src="/images/casino-review-blocks/games/logos/<?php echo $slotgame; ?>.png"
										width="157" height="74"
										alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> logo" />
								</div>
							<?php
							$firstSlide = false;
							} else { ?>
								<div class="swiper-slide">
									<img class="image-screen lazy"
										src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 164 123'%3E%3C/svg%3E"
										data-src="/images/casino-review-blocks/games/screenshots/<?php echo $slotgame; ?>.png"
										width="164" height="123"
										alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> screenshot" />
									<img class="image-logo lazy"
										src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 150 28'%3E%3C/svg%3E"
										data-src="/images/casino-review-blocks/games/logos/<?php echo $slotgame; ?>.png"
										width="157" height="74"
										alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> logo" />
								</div>
							<?php }
						} ?>
					</div>
				</div>
				<span class="swiper-btn swiper-btn--prev js-review-swiper__prev" aria-label="retour">
					<svg class="icon icon--green-white" width="25" height="25" aria-hidden="true">
						<use xlink:href="/dist/icons/icons-core.svg#icon-caret-circle-left"></use>
					</svg>
				</span>
				<span class="swiper-btn swiper-btn--next js-review-swiper__next" aria-label="continuez">
					<svg class="icon icon--green-white" width="25" height="25" aria-hidden="true">
						<use xlink:href="/dist/icons/icons-core.svg#icon-caret-circle-right"></use>
					</svg>
				</span>
			</div>
			<span class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow
			primary-btn--hover primary-btn--border-green primary-btn--background-green
			primary-btn--box-shadow-green">OBTENEZ VOTRE  <?php echo $partner['bonusvalue']; ?> BONUS</span>
			<span class="arrow"></span>
		</a>
		<span class="main-col">
			<span class="bonus-info">
				<span class="heading">Bonus de machines à sous exclusif:</span>
                <span class="bonus-count">
                    <span class="main-text">100%</span>
                  Jusqu'à
                    <span class="main-text"><?php echo $partner['bonusvalue']; ?></span>
                </span>
			</span>
			<span class="text-block">
				<span class="heading">Features</span>
				<ul class="bullet__list bullet__list--check-green bullet--text">
					<?php
					$features = explode('||', $partner['features']);
					foreach ($features as $feature) { ?>
						<li class="bullet__item"><?php echo $feature ?></li>
					<?php } ?>
				</ul>
			</span>
			<span class="text-block">
				<span class="heading">SPÉCIAUX VIP</span>
				<ul class="specials-list">
					<?php
						$vips = explode('||', $partner['vip']);
						//This array is for the VIP specials.
						//Please ensure the vip array elements from the information file are in the same order
						$vipIcon = array('bonus-img', 'tournaments', 'gifts', 'withdrawals', 'support');

						$i = 0;
						foreach ($vips as $vip) {
						?>

						<li class="specials-item <?php echo $vipIcon[$i] ?>"><?php echo $vip ?></li>

					<?php $i++; } ?>
				</ul>
			</span>
		</span>
	</span>
</div>

