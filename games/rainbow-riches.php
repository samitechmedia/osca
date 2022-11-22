<?php
$title = 'Rainbow Riches Slots - Play A Top Online Slots Game In ' . date('Y');
$desc = "Find out why our players love Rainbow Riches Slots! One of the best online slots games in ' . date('Y') . ', it\'s got great game features, bonus rounds and jackpots";

$slotName = 'Rainbow Riches';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 5150
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
                            <h1 class="title title--h2">Review of Rainbow Riches, a WMS Slot Machine</h1>
                            <p>
                                Casino players are always chasing the pot of gold at the end of the rainbow. Our goal is to help you win big by reviewing the most popular slot machines on the internet. Rainbow Riches takes you on a trip to the magical side of Ireland with leprechauns and pots of gold, and gives you a chance to win tons of cash. Follow us to the end of the rainbow as we go over the bonus features you will find in this classic slots game. The game is a standard five by three reel set, like you will find in classic Vegas style slots. There are free spins, wilds, and bonus games within the game for you to discover. Follow us on the road to riches to learn more!
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/rainbow-riches.png" class="review-game__img" alt=" Rainbow Riches" width="200" height="139">
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
                        <h2 class="title title--h2">Rainbow Reels and Rich Symbols</h2>
                        <p>
                            As you probably have noticed, this game has a lucky leprechaun theme set in the green isle of Ireland. The background of the slots game is a rainbow, with Celtic golden knots around the reels. The symbols are all Irish in style, even the King, Queen, Jack, 10 and Ace letters. You will see a lucky leprechaun with pointy ears and a big red beard, a Wild gold coin, pots of gold, wishing wells and more inside the reels. There are 20 paylines and you can set your per – line bet from one cent all the way up to $25. The most basic way to win, as you can imagine, is lining up three or more of any symbol on the 20 paylines. Different symbols have different values, which can be found in the game's pay table.
                        </p>
                        <h2 class="title title--h2">Bonus Features</h2>
                        <p>
                            Rainbow Riches is a simple and classic slots game. The graphics are colourful and fun, but there are no special 3D effects or videos. The reel set up is as simple as it gets, which is great for beginners or anyone who prefers classic Vegas style slots. Still, you are not going to miss out on any fun or excitement with this game. There are plenty of bonus features that will have you winning tons of cash in no time. First of all, the jackpot is worth 5,000 times your bet, so if you bet the max amount you could win up to $125,000 when you line up five Wild symbols. The Wild symbol is the gold coin with a leprechaun on it, and it also substitutes for all other symbols when it shows up on the reels, which of course increases your chances of winning.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('rainbow-riches', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Come and Get Your Pot of Gold!</h2>
                        <p>When you land three or more Bonus Leprechaun symbols, you will unlock the Road to Riches feature. Spin the wheel to find out how many steps you take on the road, and keep on spinning until you land on Collect or finish the road. The final amount you win is multiplied by your total stake. The next bonus feature is unlocked when you line up three or more Wishing Wells. You get to choose one of three wishing wells, which unlocks a multiplier up to 500x. The final feature is the Pots of Gold bonus round, which is unlocked with three Pots of Gold symbols on the middle reels. This also rewards you with a multiplier, with the amount depending on which spinning pot lands on the arrow. </p>
                        <h2 class="title title--h2">Conclusions on Rainbow Riches Slots</h2>
                        <p>
                            There are a lot of Irish themed slots out there. It is a super fun theme, because who wouldn't want to see sparkling gold and lucky leprechauns on their screen while they play slots? Rainbow Riches is a great addition to the bunch. It is an uncomplicated game that is great for beginners, but still has a ton of bonus features to help you win those riches. You will find wilds, multipliers, bonus rounds and more when you play this awesome slots game!
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
