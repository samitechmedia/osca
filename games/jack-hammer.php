<?php
$title = "Jack Hammer Slots Review ".date('Y')." - Demo It Free Here";
$desc = "Play Jack Hammer Slots in ".date('Y')." - Our review looks at the game, offering lots of betting options, free spin feature & more. Try the game free here.";

$slotName = 'Jack Hammer';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 2878
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom" id="freeGame">
        <div class="container">
            <div itemscope="" itemtype="http://schema.org/Review">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
            ?>
                <div class="review-game__information">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-8">
                            <h1 class="title title--h2">Jack Hammer: Online Slot Review</h1>
                            <p>
                                Comic book fans and fans of online slots in Canada will love the graphics of this awesome noir cartoon slot from NetEnt. We&rsquo;ll begin our Jack Hammer slot review by saying that this is a really captivating ride of a game, boasting a number of unique
                                features including the fantastic Sticky Wins that leads to a ton of free re-spins. In this online slot review we&rsquo;ll take a close look at this exhilarating slot and let you know whether the juice is worth the squeeze.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/jack-hammer.png" class="review-game__img" alt="Jack Hammer" width="200" height="139">
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
                        <h2 class="title title--h2">All About Jack Hammer</h2>
                        <p>Your mission, should you choose to accept it, is to protect the city from the villainous Dr Wüten. There’s no rush, though – you can finish reading this online slot review first. This mad scientist will take over the city or destroy it, and only
                            you, Jack Hammer, can stop him. It’s a classic comic book plot, and visually this game’s awesome graphics back that up in spades.</p>
                        <p>The symbols on the reels are very noir, with mobsters &amp; bombs, the damsel in distress, as well as Jack Hammer and Dr Wüten themselves. The best bit about this great slot, though, is the setup of the reels that are laid out in comic book panels.</p>
                        <h2 class="title title--h2">A Sticky Situation For Jack, Sticky Wins For You</h2>
                        <p>The standout aspect of this game is of course the Sticky Wins feature, which is ongoing during regular spins and can lead to some really immense wins.</p>
                        <p>Whenever you hit a winning payline combination, the winning symbols are held in place – stuck. You’ll then receive a free re-spin, with any additional winning payline symbols counting towards a new win on top of your original prize. This continues
                            indefinitely until no new winning symbols land on the reels.</p>
                        <h2 class="title title--h2">Winning Your Free Spins</h2>
                        <p>If you manage to hit five or more bomb scatter symbols in one spin, you’ll be rewarded with a Free Spins bonus. You can hit up to 15 scatter symbols to net 30 free spins. This feature is frequently-triggered, though it must be noted that the wins
                            are generally not huge. However, anything you do win in this feature will carry a tasty multiplier and award you with three times your prize.</p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('jackhammer', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Jack Hammer Online Review: Our Verdict</h2>
                        <p>One thing we must mention in our slot review is that this game has one of the better payout rates available in the world of online slots in Canada. With a Return to Player percentage of over 97%. Plus, a fixed jackpot of 250,000 coins isn’t bad
                            either!</p>
                        <p>In conclusion, this game’s fantastic graphics, incredible return rate, awesome and rewarding free spins and multiplier combo, plus the unique Sticky Win feature, combines together to make this one of the most lucrative slots on the market. Our
                            Jack Hammer review wouldn’t be complete without pointing out that this is a low-to-medium variance slot, with few huge prizes but frequent wins. This game suits casual and intermediate players, but high rollers may want to look elsewhere.</p>
                    </div>
                    <div class="col-12 col-xl-6">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/jackpot.php"); ?>
                    </div>
                </div>
                <span itemprop="author" itemscope="" itemtype="http://schema.org/Organization">
      </span>
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
