<?php
foreach ($sites_five as $fname){
?>

<div class="review-block-header">
	<span class="inner">
		<a href="<?php echo $output[$fname]['link'] ?>" target="_blank" rel="nofollow noreferrer" class="aside">
			<img class="casino-logo" src="<?php echo $output[$fname]['logo']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>"/>
            <span class="rating rating--gold">
                <span class="rating__fill" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" style="width:<?php echo $output[$fname]['ratingstars']; ?>">
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                </span>
                <span class="rating__bg">
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                    <span class="rating__star fa fa-star" aria-hidden="true"></span>
                </span>
            </span>
            <meta itemprop="ratingValue" content="<?php echo str_replace('%', "", $output[$fname]['ratingstars']); ?>"/>
            <meta itemprop="bestRating" content="100"/>
			<button class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green">Play now</button>
        </a>
		<a href="<?php echo $output[$fname]['link'] ?>" target="_blank" rel="nofollow noreferrer" class="add-info">
			<div class="carousel">
				<div class="swiper-container js-swiper">
					<div class="swiper-wrapper">
						<?php foreach ($output[$fname]['slotgames'] as $slotgame) { ?>
							<div class="swiper-slide">
								<img class="image-screen" width="164" height="123" src="/images/casino-review-blocks/games/screenshots/<?php echo $slotgame; ?>.png" alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> screenshot" />
								<img class="image-logo" src="/images/casino-review-blocks/games/logos/<?php echo $slotgame; ?>.png" alt="<?php echo ucfirst(str_replace('-', ' ', $slotgame)); ?> logo" />
							</div>
						<?php } ?>
					</div>
				</div>
				<span class="swiper-button-prev"></span>
				<span class="swiper-button-next"></span>
			</div>
			<span class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow
			primary-btn--hover primary-btn--border-green primary-btn--background-green
			primary-btn--box-shadow-green"">Get your <?php echo $output[$fname]['bonusvalue']; ?> Bonus</span>
			<span class="arrow"></span>
		</a>
		<span class="main-col">
			<span class="bonus-info">
				<span class="heading">Exclusive Slots Bonus:</span>
                <span class="bonus-count">
                    <span class="main-text">100%</span>
                    Up To
                    <span class="main-text"><?php echo $output[$fname]['bonusvalue']; ?></span>
                </span>
			</span>
			<span class="text-block">
				<span class="heading">Features</span>
				<div class="js-dynamic-height">
				    <div class="dynamic-height-wrap">
							<ul class="bullet__list bullet--text">
								<?php foreach ($output[$fname]['features'] as $feature) { ?>

									<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $feature ?></li>

								<?php } ?>
							</ul>
				    </div>
				</div>
			</span>
			<span class="text-block">
				<span class="heading">VIP SPECIALS</span>
				<div class="js-dynamic-height" data-maxheight="10">
				    <div class="dynamic-height-wrap">
							<ul class="specials-list">
								<?php
									//This array is for the VIP specials.
									//Please ensure the vip array elements from the information file are in the same order
									$vipIcon = array('bonus-img', 'tournaments', 'gifts', 'withdrawals', 'support');

									$i = 0;

									foreach ($output[$fname]['vip'] as $vip) {
								?>

									<li class="specials-item <?php echo $vipIcon[$i] ?>"><?php echo $vip ?></li>

								<?php $i++; } ?>
							</ul>
				    </div>
				</div>
			</span>
		</span>
	</span>
</div>

<?php } ?>
