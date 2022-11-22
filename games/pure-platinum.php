<?php
$title = "Pure Platinum Slots Review ".date('Y')." - Play For Free Today";
$desc = "Read the Pure Platinum Online Slots Review for ".date('Y')." - With great graphics, fun free spins round + more. Play this great slot game free here!";

$slotName = 'Pure Platinum';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 2459
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom"  id="freeGame">
        <div class="container">
            <div itemscope="" itemtype="http://schema.org/Review">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
            ?>
                <div class="review-game__information type-section-padding">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-8">
                            <h1 class="title title--h2">Pure Platinum - Slot Review</h1>
                            <p>
                                Forget silver, banish gold, Platinum is the precious metal that will set you apart in the 21st century. This exquisite game with its crisp graphics is a seductive slot for anyone who likes to be regularly rewarded by a slot game, even while on a
                                budget. The name suggests its better suited for high rollers, but fortunately this is not the case. The game, developed by industry giants Microgaming, is a dream come true for even budget gamers. You can bet within your means and still reap the
                                high pay out benefits. What&apos;s not to love? Read our review on the popular game to find out our experience with the popular slots game.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/pure-platinum.png" class="review-game__img" alt="Pure Platinum" width="200" height="139">
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
                        <h2 class="title title--h2">Configuration of Pure Platinum</h2>
                        <p>
                            Let's first consider the set up. You have five reels, as has become a standard in modern slots, and forty paylines. By anyones standards, that's a lot! The game also includes a bonus round featuring 50 free spins. Again, I I don't think there's
                            much on the market today that can compare to that. This is a game that revels in the signs of wealth, luxury and refined taste. The symbols on the reels are the signifies of the luxury lifestyle and a hint of what you could be revelling in if
                            you win. There are diamonds, luxury watches and pure platinum bars. The Scatter symbol of the game is a platinum recording disk and the Pure Platinum Logo operates as the Wild. Hit more than three Scatters and you gain entry to a free spins
                            round. This is the most exciting part of the game, keep reading to discover what the bonus round entails.
                        </p>
                        <h2 class="title title--h2">Bonus Round Features</h2>
                        <p>
                            Welcome to the bonus round where all of your cash dreams come true. In this round you will be awarded either 10, 25 or even 50 free spins with up to 5 times multipliers. If you are ready to take your win to the next level, you can hit the gamble
                            button. This will bring you to a screen where you can correctly guess the colour of a turned over card, or quadruple your win by correctly guessing the suit.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('pureplatinum', 'game-images'); ?>
                    </div>
                </div>
                <div class="row type-section-padding">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">The Final Verdict</h2>
                        <p>
                            This game, modelled after one of the rarest and most expensive metals in the world is actually better suited to newer players, or those with a smaller budget. The jackpot is only C$500, so the risk that goes along with the game isn't too high.
                            This is a perfect game to practice your slot skills on or to get used to the idea of betting for real money. It's a lot of fun, and we appreciate the game for being that mediator between free play and higher stakes games. The game itself is
                            aesthetically beautiful and the interface is smooth. It also shares a lot of similarities between other high stakes Microgaming slots, so once you master this one, you'll be able to progress to higher stakes and bigger jackpots in no time.
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
