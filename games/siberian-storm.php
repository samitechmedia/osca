<?php
$title = "Siberian Storm Slots Review ".date('Y')." - Play For Free!";
$desc = "Top Siberian Storm Online Slots Review for ".date('Y')." - With 720 ways to win, enjoy it free or for real C$. Play to win the huge 50,000 coin jackpot.";

$slotName = 'Siberian Storm';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 362
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom"  id="freeGame">
        <div class="container">
            <div itemscope="" itemtype="http://schema.org/Review">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
            ?>
                <div class="review-game__information ">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-8">
                            <h1 class="title title--h2">Siberian Storm Slot Review</h1>
                            <p>
                                Siberian Storm, a five reel, 720 payline slot, brought to you by renowned gaming technology providers IGT, might be one of the best games released in the last ten years. With superb production, attention-holding features and a whopping 50,000 coin
                                jackpot, the game is really something to behold.
                            </p>
                            <p>
                                The theme here is all about the tigers. With top-quality illustration from the IGT team, the beauty and power of these rare creatures has been brought to brilliant life. The slot is set to the backdrop of an icy cave, it doesn&rsquo;t take much to conjure
                                up images of a majestic tiger skulking around its desolate lair. Expect plenty of rumbling roars on the reels and a carefully crafted soundtrack that never seems to get dull. Everything about the whole look and feel of this slot is well made.
                                IGT have really upped their game in the last few years, and we continue to be impressed with the immersive, high quality gaming experience they continue to deliver.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/siberian-storm.png" class="review-game__img" alt="Siberian Storm" width="200" height="139">
                                </div>
                                <a href="<?php echo $partnerInfo['affiliate_link']; ?>" rel="nofollow noreferrer" target="_blank" class="a-cta-button"> PLAY NOW
                                    <span aria-hidden="true" class="white__inner-circle">
                                        <span aria-hidden="true" class="fa fa-arrow-right"></span>
                                    </span>
                                    <span class="is-accessible-text">Play <?php echo $slotName; ?> for free</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <m-attribute-box></m-attribute-box>
                <div class="review__text-block type-display-flex type-flex-justify-center-top">
                    <div class="type-left-side">
                        <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
                        <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
                        <h2 class="title title--h2">Structure of Siberian Storm</h2>
                        <p>
                            Unlike many slots these days, Siberian Storm has a unique structure. Instead of the standard five reel setup, the reels are laid out in a hexagonal shape with a five-symbol reel in the centre and three symbol reels on the outside. A big plus of
                            this game is the MutliWay Xtra wagering feature. Players enjoy up to 720 ways to win and it pays left to right and right to left, doubling your chances of a win. As mentioned, the game’s jackpot is a cracking 50,000 coins and can be won by landing
                            five Siberian Storm symbols. Play starts from as little as 0.50 coins a spin and goes up to 150.
                        </p>
                        <h2 class="title title--h2">Free Spin Bonus Round</h2>
                        <p>
                            Siberian Storm’s Free Spins Bonus feature is another big crowd please. To activate it, players need to land the Tiger’s Eye Bonus symbol on five consecutive reels. Initially eight free spins will be awarded, however you will also notice stacked
                            Bonus symbols on the reels here, which can reward you with up to another 96 free spins. If by chance, you get another five Tiger’s Eye symbols in a row, another eight free spins will be awarded, along with a payout. This can be activated multiple
                            times, giving very lucky players an astonishing 240 free spins.
                        </p>
                        <h2 class="title title--h2">Stacked Wilds and Scatters</h2>
                        <p>
                            Multiple winnings and the potential for big money, by substituting other regular symbols on the reels. Also, keep an eye out for the Scatter symbols, as these can deliver some pretty pleasing prizes. As with most slots the Scatter symbol does
                            not have to land in any particular combination to take meaning – land it anywhere in view for a maximum payout of 50x your stake amount.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('siberianstorm', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">

                        <h2 class="title title--h2">The Verdict</h2>
                        <p>
                            Siberian Storm has the potential to throw you a few surprises if you’re not careful. The slot can change suddenly between taking your money to paying out a lot of decent cash prizes in a very short period of time. There is certainly a good degree
                            of risk in this game, but the life-changing payouts for those lucky to hit the top mark, are easily compensation enough. Other games from ITC provide players with lower risks, but remember they also deliver smaller prizes too. Plus this slot
                            delivers soundly in the entertainment department – it’s a lot of fun! So much so that it has peaked at the number one place in the popularity charts in the last few years. Prepared to take on this beast? Our advice is to wait to hit the Free
                            Spins round a few times and then cash out when you hit a lucky streak!
                        </p>
                    </div>
                    <div class="col-12 col-xl-6">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/jackpot.php"); ?>
                    </div>
                </div>
                <span itemprop="author" itemscope="" itemtype="http://schema.org/Organization"></span>
                <p>Reviewed By: OnlineSlots.ca</p>

                <?php
                $unity->outputTopPartnerSingleItemFromToplist();
                ?>

                <?php include($_SERVER['DOCUMENT_ROOT']."/includes/more-pokies.php"); ?>
            </div>
        </div>
    </section>
    <script src="/_arcade/dist/js/game-review.js"></script>
</div>

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
