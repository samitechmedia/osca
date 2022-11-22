<?php

$detect = new Mobile_Detect;
$slotCount = ($detect->isMobile() ? 5 : 4);

?>

<div class="top__five-area">
	<?php
	$row_count = 1;
	foreach ($sites_five as $fname) {
		?>
		<div class="toplist">
			<div class="top__panel top__panel--background type-display-flex type-flex-align-center">
				<div class="top__panel--background-numbered"></div>
				<div class="top__panel-title">
					<h3 class="title title--h3 title--h3-no-bg-color">
						<?php echo $output[$fname]['sitename']; ?>
					</h3>
				</div>
			</div>
			<a class="toplist__row toplist__border-bottom toplist__border-right toplist__border-left" href="<?php echo $output[$fname]['link']; ?>" rel="nofollow noreferrer" target="_blank">
				<div class="toplist__column toplist__column-md-2 toplist__column-full">
					<div class="toplist__logo">
						<img src="<?php echo $output[$fname]['logohome']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>" />
					</div>
					<div class="toplist__rating">
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
						<span class="toplist__rating-numbers"><?php echo round($output[$fname]['rating'] / 2, 1); ?>/5 </span>
					</div>
					<button class="toplist__button desktop">
							<?php echo $translations['playNow']; ?>
					</button>
				</div>
				<div class="toplist__column toplist__column-md-8">
					<div class="toplist__row toplist__border-left">
						<div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['firstDeposit']; ?>
								</p>
								<p class="toplist__description"><?php echo $output[$fname]['bonusvalue']; ?></p>
							</div>
						</div>

						<div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['averagePayout']; ?>
								</p>
								<p class="toplist__description"><?php echo $output[$fname]['payout']; ?></p>
							</div>
						</div>
						<div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['payoutSpeed']; ?>
								</p>
								<p class="toplist__description"><?php echo $output[$fname]['payouttime']; ?></p>
							</div>
						</div>
						<div class="toplist__column toplist__column-4 toplist__border-top  toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['realMoneyGames']; ?>
								</p>
								<p class="toplist__description"><?php echo $output[$fname]['realmoneygames']; ?></p>
							</div>
						</div>
						<div class="toplist__column toplist__column-4 toplist__border-top  toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['platforms']; ?>
								</p>
								<ul class="bullet__list type-display-flex type-flex-justify-between">
									<?php foreach ($output[$fname]['devices'] as $device) { ?>
										<li title="<?php echo $device ?>" class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg></li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
							<div class="info-box__item">
								<p class="toplist__info-title">
									<?php echo $translations['depositOptions']; ?>
								</p>
								<div class="toplist__icon-wrapper">
									<?php foreach ($output[$fname]['paymentsystems'] as $system) { ?>
										<div class="toplist__icon toplist__column toplist__column-md-2">
											<div class="toplist__icon-image">
												<img class="toplist__icon-img" src="/images/redesign/icons/deposits/<?php
																																														echo $system; ?>.svg" alt="<?php echo $system; ?>" />
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</a>
			<div class="toplist__row toplist__border-all toplist__border-top align-right top__five-wrapp">
				<a href="<?php echo $output[$fname]['link']; ?>" class="toplist__column toplist__column-full hide">
				<button class="toplist__button mobile">
					<?php echo $translations['playNow']; ?>
				</button>
				</a>
				<div class="toplist__column text-right">
					<p class="toplist__read-more type-read-more read-more__trigger m-b">
                        <span class="js-dataTextToggle toplist__read-more-toggle
                            data-text-original="<?php echo $translations['readMore']; ?>"
                            data-text-swap="<?php echo $translations['readLess']; ?>">
                            <?php echo $translations['readMore']; ?>
                        </span>
                        <svg class="icon icon--bold" width="12" height="12" aria-hidden="true">
							<use xlink:href="/dist/icons/icons-core.svg#icon-angle-down"></use>
						</svg>
                    </p>
					<div class="featured__game type-display-flex type-flex-justify-between" style="display: none;">
						<div class="col-12 col-lg-6 ">
							<div class="freeGame-block">
								<a href="<?php echo $output[$fname]['reviewurl']; ?>" id="626" class="featured__image-holder">
									<div class="featured__tool-tip">
										<?php echo $output[$fname]['gamestatus']; ?>
									</div>
									<img src="<?php echo $output[$fname]['gamelogo']; ?>" alt="<?php echo $output[$fname]['gamelogoalt']; ?>">
								</a>
							</div>
							<span class="avalon__title"><?php echo $output[$fname]['gametitle']; ?></span>
							<p class="avalon__text"><?php echo $output[$fname]['gametext']; ?></p>
							<a href="<?php echo $output[$fname]['gamelink']; ?>"
								class="primary-btn primary-btn--outline primary-btn--outline--hover">
								<?php echo $translations['findOutMore']; ?>
							</a>
						</div>
						<div class="col-12 col-lg-5">
							<h3 class="title title--h4"><?php echo $output[$fname]['sitename']; ?>
									<?php echo $translations['slotPlayerBenefit']; ?>
							</h3>
							<ul class="bullet__list">
								<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet1']; ?></li>
								<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet2']; ?></li>
								<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet3']; ?></li>
								<li class="bullet__item"><i class="fa fa-check" aria-hidden="true"></i><?php echo $output[$fname]['bullet4']; ?></li>
							</ul>
							<a href="/games/" class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--mb-20">
							<?php echo $translations['playGamesNow']; ?>
								<div class="white__inner-circle">
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
								</div>
							</a>
							<?php if($output[$fname]['reviewurl']) { ?>
								<a href="<?php echo $output[$fname]['reviewurl']; ?>" class="type-read-more">
									<?php echo $translations['readReview']; ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$row_count++;
	}
	?>

</div>
