<?php
$title = "Pixies of the Forest Slots Review ".date('Y')." - Play It Free!";
$desc = "Latest Pixies of the Forest Online Slots Review for ".date('Y')." - Enjoy free or real money play, a free spins bonus game, increasing wins + a decent 2,000 coin jackpot.";

$slotName = 'Pixies of the Forest';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7973
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
                            <h1 class="title title--h2">Pixies of the Forest Slot Review</h1>
                            <p>Pixies of the Forest is one of the most exciting slots available online, right now. With a little pinch of magic dust you may well be on your way to winning big prizes. Developed by powerful games providers IGT, it&rsquo;s a mystical-themed, five reel,
                                99 payline slot, brought to life with brilliant Tumbling Reels. This feature was first seen in Da Vinci Diamonds, and it is one that can seriously increase the chances of your wishes coming true. Already hugely popular in Canada, we decided to
                                put the slot to the test, to find out what keeps you flocking back.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/pixies-of-the-forest.png" class="review-game__img" alt="Pixies of the Forrest" width="200" height="139">
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
                        <h2 class="title title--h2">Gameplay and Configuration</h2>
                        <p>The betting is fixed at 99, meaning a minimum bet of 33 coins (thanks to the 3 for 1 Betting Feature aka Connected Lines) with each spin of the reels. You are in control of the coin value, however, meaning that Pixies of the Forest suits all variants
                            of slot players, from the most recreational of player to the high rollers. There is also a free version available online for those who would like to try before they buy, to use a well-know cliché, but as everyone knows - the fun is where the
                            money is. Especially with this slot, the payout percentage is 94.50%, very high for a medium variance slot and there is a generous 2,000 coin jackpot for the taking. To trigger the jackpot players must get five Pixies of the Forest logo symbols.</p>
                        <p>Much like any other slot out there, the aim of the game is to collect symbols from left to right on the screen. However what makes Pixies of the Forest so unique is the brilliant and lucrative Tumbling Reels feature. If you haven’t come across
                            this feature before, allow me to explain. When you achieve a winning symbol combination, the machine will credit you the amount won on the win meter, then the lot disappears and more symbols will tumble down to fill the now empty spaces. Think
                            Tetris. The really nice thing here is that the new symbols have the potential to create even more winning combinations, allowing one spin to bring in multiple wins – what a bargain! The symbols continue to tumble from the top until there are
                            no more winning combinations available.</p>
                        <h2 class="title title--h2">Bonus Rounds and Features</h2>
                        <p>In addition to the Tumbling Reels and Connected Lines features, Pixies of the Forest includes a Free Spins Bonus round. Getting three or more Bonus symbols on any wagered payline triggers this round, as the Bonus symbol acts as the slots Scatter
                            symbol and as such behaves like one in this game. You then have to choose one of the Bonus Symbols that activated the Free Spins Bonus round. Behind this symbol will be the number of free spins you have won, between five and eleven. With a maximum
                            of only eleven spins given you may think the Free Spins Bonus round will be over in the blink of an eye, but thankfully IGT have incorporated the Tumbling Reels here too. Therefore the bonus round takes considerably longer than you might first
                            anticipate. There is also potential for very large wins, despite the lack of a multiplier, thanks to much richer reels in the bonus round. There are additional Wild symbols on reels one, two, three and four, as opposed to just two, three and
                            four, like it is in the base game.</p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('pixiesoftheforest', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">The Experts' Verdict</h2>
                        <p>In summary, Pixies of the Forest, is a fantastic slot game. The combination of magical visuals and sonics, coupled with the lucrative Tumbling Wheels, results in highly enjoyable gameplay for all players. With a decent payout of just under 95%
                            and a decent amount of mid range wins available, this game is properly suited to casual intermediate players. We recommend that you give the free game a shot and then, once you're hooked, swap over to the full versions listed on this page to
                            get more of this magical world</p>
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
