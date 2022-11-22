<div class="game-blocks new-toplist">
                        <!-- begin loop -->
<?php
$row_count=1;
foreach ($sites_five as $fname){
?>

                        <div class="game-block">
                        <?php if ($row_count==1){ ?>
                            <div class="first-rated">Our #1 Rated Casino</div>
                            <?php } ?>
                            <div class="ttl">
                                <span class="number"><?php echo $row_count; ?></span>
                                <p class="game-name"><?php echo $output[$fname]['sitename']; ?></p>
                            </div>
                            <div class="block-body">
                              <div class="lnk-block">
                                <a href="<?php echo $output[$fname]['link']; ?>" rel="nofollow noreferrer" target="_blank">
                                  <span class="logo-block clearfix">
                                    <span class="col">
                                      <span class="logo">
                                        <img src="<?php echo $output[$fname]['logoinner']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Logo">
                                      </span>
                                    </span>
                                    <span class="col">
                                                <span>Rating</span>
                                                <span class="rating-res"><i><?php echo $output[$fname]['rating']; ?></i>/10</span>
                                                <span class="rating"><span style="width:<?php echo $output[$fname]['ratingstars']; ?>">&nbsp;</span></span>
                                            </span>
                                  </span>
                                  <span class="bonuses-information clearfix">
                                    <span class="bonus-info greentxt">
                                    <span>1st Deposit bonus</span>
                                    <span class="bonus"><?php echo $output[$fname]['bonusvalue']; ?></span>
                                    </span>
                                    <span class="bonus-info">
                                    <span>Average payout</span>
                                    <span class="payout"><?php echo $output[$fname]['payout']; ?></span>
                                    </span>
                                  </span>

                                  <div class="bot-block">
                                    <div class="button-base">
                                      <span class="btn-play-now">Play Slots</span>
                                    </div>
                                  </div>

                                </a>
                              </div>
                                <div class="quote-block">
                                  <ul class="hptick">
                                  <li><?php echo $output[$fname]['bullet1']; ?></li>
                                  <li><?php echo $output[$fname]['bullet2']; ?></li>
                                  <li><?php echo $output[$fname]['bullet3']; ?></li>
                                  <li><?php echo $output[$fname]['bullet4']; ?></li>
                                  </ul>
                                </div>
                                <div class="popular-game-block">
                                    <div class="status-game"><?php echo $output[$fname]['gamestatus']; ?></div>
                                    <div class="title-game"><?php echo $output[$fname]['gametitle']; ?></div>
                                    <p><?php echo $output[$fname]['gametext']; ?></p>
                                    <div class="logo-game"><img src="/images/<?php echo $output[$fname]['gamelogo']; ?>" alt="<?php echo $output[$fname]['gamelogoalt']; ?>" <?php if ($row_count==1){ ?> style="margin-bottom: 0;" <?php } ?> /></div>
                                    <a class="btn-game" href="<?php echo $output[$fname]['link']; ?>" rel="nofollow noreferrer" target="_blank">Find out more</a>
                                </div>
                                <div class="deposit-block">
                                    <p>Deposit options</p>
                                    <ul>
                                        <li><img src="/images/inner/deposit2.png" alt="Visa" title="Visa" /></li>
                                        <li><img src="/images/inner/deposit3.png" alt="Visa Debit" title="Visa Debit" /></li>
                                        <li><img src="/images/inner/deposit5.png" alt="Mastercard" title="MasterCard" /></li>
                                        <li><img src="/images/inner/deposit6.png" alt="Interac" title="Interac" /></li>
                                        <li><img src="/images/inner/deposit7.png" alt="Instadebit" title="Instadebit"/></li>
                                        <li><img src="/images/inner/deposit8.png" alt="Paysafecard" title="Paysafecard"/></li>
                                    </ul>
                                </div>
                                <div class="screenshots-block">
                                    <p>Screenshots</p>
                                    <ul>
                                        <li>
                                            <a href="<?php echo $output[$fname]['screen1link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen1']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Gameplay" width="166"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $output[$fname]['screen2link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $output[$fname]['screen2']; ?>" alt="<?php echo $output[$fname]['sitename']; ?> Gameplay" width="166"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="platforms-block">
                                    <p>Platforms</p>
                                    <ul>
                                        <li class="windows" alt="Windows" title="Windows"></li>
                                        <li class="android" alt="Android" title="Android"></li>
                                        <li class="mac" alt="Apple" title="Apple"></li>
                                    </ul>
                                </div>
                                <div class="platforms-block">
                                    <p>Payout Speed</p>
                                    <span class="payout"><span class="percent"><strong><?php echo $output[$fname]['payouttime'];?></strong></span></span>
                                </div>
                                <div class="bot-block">
                                  <a href="<?php echo $output[$fname]['link']; ?>" rel="nofollow noreferrer" target="_blank" class="blue-lnk">Pocket up to <?php echo $output[$fname]['bonusvalue']; ?> in bonuses today!</a>
                                  <p class="review-link"><?php if(isset($output[$fname]['reviewurl'])){?><a href="<?php echo $output[$fname]['reviewurl']; ?>">Read Review</a><?php }?></p>
                                </div>
                            </div>
                        </div>

<?php
$row_count++;
}
?>

                        <!-- end loop -->
                    </div>
