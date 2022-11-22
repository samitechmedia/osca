<div id="osvw" >
	<div class="game-blocks">

<?php
$row_count=1;
foreach ($sites_five as $fname){
?>

<!-- begin loop -->

    			<div class="game-block"<?php if ($output[$fname]['sitecode'] == 'spincasino'){echo ' id="freespins"';}?>>
				<div class="ttl">
					<span class="number">#<?php echo $row_count; ?></span>
					<p class="game-name"><?php if($row_count == 1){echo 'BEST CANADIAN SLOT SITE - ';}  echo strtoupper($output[$fname]['sitename']); ?></p>
				</div>
				<div class="block-body">
					<div class="logo-col">
						<a href="<?php echo $output[$fname]['link']; ?>" class="main-link" rel="nofollow noreferrer" target="_blank">
							<span class="logo">
								<span class="logo-hold">
									<span><img src="<?php echo $output[$fname]['logoinner']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>" /></span>
								</span>
								<span class="slots-txt"><?php echo $output[$fname]['slots']; ?> Slots</span>
							</span>
							<span class="btn-play-now"></span>
							<span class="bottom-cta-link"><?php echo $output[$fname]['cta']; ?></span>
						</a>
						<p class="review-link"><a href="<?php echo $output[$fname]['reviewurl']; ?>">Read Review</a></p>
					</div>
					<div class="text-col">
						<div class="bonuses-information">
							<div class="bonus-info greentxt tooltip-parent">
								<div class="hold">
									<p><?php echo $output[$fname]['bonusvalue']; ?></p>
									<span>Deposit bonus</span>
								</div>
								<span class="tooltip"><?php echo $output[$fname]['tooltip']; ?></span>
							</div>
							<div class="bonus-info tooltip-parent">
								<div class="hold">
									<p><?php echo $output[$fname]['payout']; ?></p>
									<span class="paytxt">PAYOUTS</span>
								</div>
								<span class="tooltip">This is the average payout % across all games at Spin Casino. </span>
							</div>
							<div class="bonus-info greentxt tooltip-parent">
								<div class="hold last">
									<p><?php echo $output[$fname]['rating']; ?></p>
									<span>OUT OF 10</span>
								</div>
								<span class="tooltip">Our team of reviewers test a range of criteria to make sure the casinos we recommend are the best. Some of the many things they check are; security, game fairness, range of games, software, safe downloads, safe and secure deposit options, fair bonus terms and customer support.</span>
							</div>
						</div>
						<div class="quote-block">
							<p>WHAT THE EXPERTS SAY</p>
															<q><?php echo $output[$fname]['description']; ?></q>

						</div>
					</div>
					<div class="screenshots-col">
						<div class="hold">
							<div class="deposit-block">
								<p>Deposit options</p>
								<ul>
									<li><img src="/images/inner/deposit2.png" alt="Visa" /></li>
									<li><img src="/images/inner/deposit3.png" alt="Visa Debit" /></li>
									<li><img src="/images/inner/deposit5.png" alt="Mastercard" /></li>
                                    <li><img src="/images/inner/deposit6.png" alt="Interac" /></li>
<?php if($row_count == 1){?>
<li><img src="/images/inner/deposit7.png" alt="Interac" /></li>
<?php } ?>

								</ul>
							</div>
							<div class="platforms-block">
								<p>Platforms</p>
								<ul>
									<li class="tooltip-parent">
										<img src="/images/inner/platform1.png" alt="" />
										<span class="tooltip">Desktop/Laptop, including Mac.</span>
									</li>
									<li class="tooltip-parent">
										<img src="/images/inner/platform2.png" alt="" />
										<span class="tooltip">Mobile/Cell - Android &amp; iPhone</span>
									</li>
									<li class="tooltip-parent">
										<img src="/images/inner/platform3.png" alt="" />
										<span class="tooltip">Tablets - Android &amp; iPad</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="preview">
							<p>Slots preview</p>
							<ul>
								<li><a href="<?php echo $output[$fname]['screen1link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen1']; ?>" alt="" width="166" /></a></li>
								<li><a href="<?php echo $output[$fname]['screen2link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen2']; ?>" alt="" width="166" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
 <!-- end loop -->

 <?php
 $row_count++;
}
?>
     </div>
</div>
