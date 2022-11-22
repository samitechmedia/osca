
<div class="game-blocks game-blocks--three type-display-flex">
<!-- begin loop -->
<?php
$row_count=1;

foreach ($sites_five as $fname){
?>
     <?php if ($row_count <= 3){ ?>
     <div class="game-blocks__block <?php if ($row_count==1){ ?>game-blocks__block--first<?php } ?>">
        <?php if ($row_count==1){ ?>
            <div class="first-rated">Our #1 Rated Casino</div>
            <?php } ?>
            <div class="game-block__title">
                <span class="game-block__number"><?php echo $row_count; ?></span>
                <h3 class="title title--top3"><?php echo $output[$fname]['sitename']; ?></h3>
            </div>
            <div class="game-block__body">
                <a href="<?php echo $output[$fname]['link']; ?>" rel="nofollow noreferrer" target="_blank">
                    <div class="game-block__logo type-display-flex type-flex-justify-around">
                        <div class="game-block__logo-wrapper">
                            <div class="logo">
                                <img src="<?php echo $output[$fname]['logoinner']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Logo">
                            </div>
                        </div>
                        <div class="rating__area">
                            <div class="rating__header">rating</div>
							<div class="rating__count"><?php echo round($output[$fname]['rating'] / 2, 1); ?>/5 </div>
							<span class="rating rating--gold">
								<span class="rating__fill" style="width:<?php echo $output[$fname]['rating'] * 10 + 3 . '%' ?>">
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
								</span>
							</span>
						</div>
                    </div>
                    <div class="info-box__area type-display-flex type-flex-justify-between">
                        <div class="info-box__item">
                            <p class="info-box__title info-box__title--green">
                                <?php echo $output[$fname]['bonusvalue']; ?>
                            </p>
                            <p>
                                1st Deposit Bonus
                            </p>
                        </div>
                        <div class="info-box__item">
                            <p class="info-box__title info-box__title--blue">
                                <?php echo $output[$fname]['payout']; ?>
                            </p>
                            <p>
                                Average Payout
                            </p>
                        </div>
                    </div>

                    <div class="game-block__btn-block">
                        <div class="button-base type-display-flex type-flex-justify-center">
                            <button class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green">
                            PLAY NOW
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                            </button>
                        </div>
                    </div>

                </a>
                <div class="quote-block">
                    <ul class="bullet__list">
                    <li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet1']; ?></li>
                    <li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet2']; ?></li>
                    <li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet3']; ?></li>
                    <li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet4']; ?></li>
                    </ul>
                </div>
                <div class="col-12 game-block__featured">
                    <div class="featured__image-holder type-display-flex type-flex-justify-center">
                        <div class="featured__tool-tip">
                            <?php echo $output[$fname]['gamestatus']; ?>
                        </div>
                        <img src="<?php echo $output[$fname]['gamelogo']; ?>" alt="<?php echo $output[$fname]['gamelogoalt']; ?>"/>
                    </div>
                    <p class="game-block__header"><?php echo $output[$fname]['gametitle']; ?></p>
                    <p class="avalon__text"><?php echo $output[$fname]['gametext']; ?></p>
                    <a href="<?php echo $output[$fname]['gamelink']; ?>"  class="primary-btn primary-btn--outline primary-btn--outline--hover">Find out more</a>
                </div>
                <div class="game-block__deposit type-display-flex type-flex-justify-center">
                    <p class="game-block__header">Deposit options</p>
                    <div class="type-display-flex type-flex-justify-between">
                        <?php foreach ($output[$fname]['paymentsystems'] as $system) { ?>
                            <div class="deposit-icon">
                                <img src="/images/redesign/icons/deposits/<?php
                                    echo $system; ?>.svg" alt="<?php echo $system;
                                ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="game-block__screenshots">
                    <p class="game-block__header">Screenshots</p>
                    <ul class="clearfix">
                        <li>
                            <a href="<?php echo $output[$fname]['screen1link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen1']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Gameplay" width="166"></a>
                        </li>
                        <li>
                            <a href="<?php echo $output[$fname]['screen2link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen2']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Gameplay" width="166"></a>
                        </li>
                    </ul>
                </div>
                <div class="game-block__platforms type-display-flex type-flex-justify-center">
                    <p class="game-block__header">Platforms</p>

                    <ul class="bullet__list type-display-flex type-flex-justify-between">
						<?php foreach ($output[$fname]['devices'] as $device) { ?>
							<li title="<?php echo $device ?>" class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg></li>
						<?php } ?>
                    </ul>
                </div>
                <div class="game-block__payout type-display-flex type-flex-justify-center">
                    <p class="game-block__header">Payout Speed</p>
                    <span class="game-block__payout-amount info-box__title info-box__title--green"><span class="percent"><strong><?php echo $output[$fname]['payouttime'];?></strong></span></span>
                </div>
                <div class="game-block__links type-display-flex type-flex-justify-center">
                    <a href="<?php echo $output[$fname]['link']; ?>"  class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green">Pocket up to <?php echo $output[$fname]['bonusvalue']; ?> today!
                        <div class="white__inner-circle">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </a>
                    <p class="type-read-more"><?php if(isset($output[$fname]['reviewurl'])){?><a href="<?php echo $output[$fname]['reviewurl']; ?>">Read Review</a><?php }?></p>
                </div>
            </div>
        </div>
    <?php } else{ ?>
        <div class="top__five-wrapp">
		<a href="<?php echo $output[$fname]['link']; ?>"  class="top-five__item type-display-flex type-flex-justify-around-top">
			<div class="image__holder">
				<div class="image__holder-wrapper">
					<img src="<?php echo $output[$fname]['logohome']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>" />
				</div>
				<button class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover">
					PLAY NOW
					<div class="white__inner-circle">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
					</div>
				</button>
                <span class="type-read-more type-read-more--icon read-more__trigger js-dataTextToggle"
                      data-text-original="Read more"
                      data-text-swap="Read less">
                        Read more
                </span>
			</div>

			<div class="inner__left-side">
				<div class="type-display-flex type-flex-justify-between" style="margin-bottom: 10px;">
					<div class="">
						<h2 class="title title--h2"><?php echo $output[$fname]['sitename']; ?></h2>
						<div class="rating__area">
							<span class="rating__count"><?php echo round($output[$fname]['rating'] / 2, 1); ?>/5 </span>
							<span class="rating rating--gold">
								<span class="rating__fill" style="width:<?php echo $output[$fname]['rating'] * 10 + 3 . '%' ?>">
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
								</span>
							</span>
						</div>
					</div>
					<div class="">
						<div class="custom__icon custom__icon--orange">
							<i class="sprite sprite-icon_spin"></i>
						</div>
						<div class="spin__text-holder">
							<span class="spin__total"><?php echo $output[$fname]['slots']; ?></span>
							<span class="spin__text">Slots & <br> Casino Games</span>
						</div>
					</div>
				</div>
				<div class="info-box__area type-display-flex type-flex-justify-between">
					<div class="info-box__item">
						<p class="info-box__title info-box__title--green"><?php echo $output[$fname]['bonusvalue']; ?></p>
						<p class="">1st Deposit Bonus</p>
					</div>
					<div class="info-box__item">
						<p class="info-box__title info-box__title--blue"><?php echo $output[$fname]['payout']; ?></p>
						<p>Average Payout</p>
					</div>
					<div class="info-box__item">
						<p class="info-box__title info-box__title--green"><?php echo $output[$fname]['payouttime']; ?></p>
						<p>Payout Speed</p>
					</div>
					<div class="info-box__item">
						<p class="info-box__title info-box__title--orange"><?php echo $output[$fname]['realmoneygames']; ?></p>
						<p>Real Money Games</p>
					</div>
					<div class="info-box__item not_mobile">
						<p>Platforms</p>
						<ul class="bullet__list type-display-flex type-flex-justify-between">
						<?php foreach ($output[$fname]['devices'] as $device) { ?>
							<li title="<?php echo $device ?>" class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg></li>
						<?php } ?>
						</ul>
					</div>
					<div class="info-box__item not_mobile">
						<p>Deposit Options</p>
						<div class="deposit-wrapper type-display-flex type-flex-justify-center">
                            <?php foreach ($output[$fname]['paymentsystems'] as $system) { ?>
                                <div class="deposit-icon">
                                    <img src="/images/redesign/icons/deposits/<?php
                                        echo $system; ?>.svg" alt="<?php echo $system;
                                    ?>"/>
                                </div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="featured__game type-display-flex type-flex-justify-between">
			<div class="col-12 col-lg-6 freeGame-block">
				<a href="#" id="626" class="featured__image-holder">
					<div class="featured__tool-tip">
                        <?php echo $output[$fname]['gamestatus']; ?>
					</div>
					<img src="<?php echo $output[$fname]['gamelogo']; ?>" alt="<?php echo $output[$fname]['gamelogoalt']; ?>">
				</a>
				<span class="avalon__title"><?php echo $output[$fname]['gametitle']; ?></span>
				<p class="avalon__text">Over $20 million paid out to winners!</p>
				<a href="<?php echo $output[$fname]['gamelink']; ?>" class="primary-btn primary-btn--outline primary-btn--outline--hover">Find out more</a>
			</div>
			<div class="col-12 col-lg-5">
				<h3 class="title title--h4"><?php echo $output[$fname]['sitename']; ?> Slot Player Benefits</h3>
				<ul class="bullet__list">
					<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet1']; ?></li>
					<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet2']; ?></li>
					<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet3']; ?></li>
					<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet4']; ?></li>
				</ul>
				<a href="/games/" class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover">
					PLAY 750 GAMES NOW
					<div class="white__inner-circle">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
					</div>
				</a>
				<a href="<?php echo $output[$fname]['reviewurl']; ?>" class="type-read-more">Read review</a>
			</div>
		</div>
	</div>
    <?php } ?>
<?php
$row_count++;
}
?>

    <!-- end loop -->
</div>
