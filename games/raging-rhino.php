<?php
$title = 'Raging Rhino Slots - Play A Top Online Slots Game In ' . date('Y');
$desc = "Find out why our players love Raging Rhino Slots! One of the best online slots games in ' . date('Y') . ', it\'s got great game features, bonus rounds and jackpots.";

$slotName = 'Raging Rhino';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7684
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom"  id="freeGame">
        <div class="container">
            <div itemscope="" itemtype="http://schema.org/Review">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
            ?>
                <div class="review-game__information">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-8">
                            <h1 class="title title--h2">Raging Rhino &ndash; An African Safari Slots Game</h1>
                            <p>
                                In 2014, Williams Interactive released Raging Rhino as part of their Any Way slots series. What makes Any Way slots special is that you have more paylines than  you will find in almost any other slots game online &ndash; 4,096 to be exact. Yes, that number seems outrageous but it is true! Every time you spin the reels,  you have 4,096 chances to win real cash. In Raging Rhino, you are surrounded by an environment that is reminiscent of an African Safari. There are a whole range of animals to spot, including rhinos of course, as well as gorillas, leopards, crocodiles, honey badgers, and other African symbols like a diamond and a Marula tree. There are also card symbols like hearts and spades as well. The graphics and sound all play together to make this an immersive African Safari experience for the player.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/raging-rhino.png" class="review-game__img" alt="Raging Rhino" width="200" height="139">
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
                        <h2 class="title title--h2">Safari Animals Galore in Raging Rhino Reels and Symbols</h2>
                        <p>You may still be reeling from the realization that you have not tens, not hundreds, but thousands of ways to win in Raging Rhino. This is unheard of in the slots world, where usually you see between 10 and 50 paylines, with anything more than that becoming extremely rare. Well, you really do have 4,096 paylines in Raging Rhino. Here is how it works. Raging Rhino is a six reel, four row game. You can win by lining up any identical symbols in any combination on adjacent reels. This means you have 4 x 4 x 4 x 4 x 4 x 4 x 4 chances, or 4,096 ways to win. All you need to do is line up two or more symbols, where in most slots games you have to line up three or more. This makes it much easier to win Raging Rhino than almost any other slots game online. </p>
                        <h2 class="title title--h2">The Best Bonus Features Around</h2>
                        <p>The jackpot in this game is secured by spinning six Raging Rhinos with the max bet available. The Wild symbol is an illustration of a classic scene out on the Savannah. It can substitute for any symbol other than the bonus feature symbol, and it appears on the central four reels out of six. The bonus feature symbol is the Diamond, of course! Diamonds are your key to riches in Raging Rhino.  You can win eight free spins by lining up three diamonds, 15 free spins with four diamonds, 20 with five diamonds and 50 free spins if you see six or more diamonds on the screen. You can even re-trigger free spins during the free spin bonus round. </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('raging-rhino', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Even More Fun in the Bonus Round</h2>
                        <p>The fun does not end with wilds and free spins in Raging Rhino. In fact, it is multiplied! As we described above, you can win up to 50 free spins in one shot and then you can even re-trigger more free spins while those are going. Well, it does not end there. During your free spins, any time you land a wild symbol it automatically transforms into either a 2x or 3x wild multiplier, meaning anything you win during that spin will be 2x or 3x your normal payout amount based on your bet amount. </p>
                        <h2 class="title title--h2">Spectacular Conclusions from This Fun Safari Slots Game </h2>
                        <p>
                            Raging Rhino is a spectacular high variance game that anyone who loves an exciting slot machine will have a great time playing. It does not get any more exciting than 4,096 paylines and an African Safari experience to go along with it. In this game you will find free spins, wilds, multipliers and all of the bonus features you expect from a great slots game. We definitely recommend giving it a shot!
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
