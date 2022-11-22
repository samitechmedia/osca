<?php
$title = "Star Trek Red Alert Slots - " . date('Y') . "'s Most In-Depth Game Review";
$desc = "Star Trek Red Alert Slots " . date('Y') . " - The most definitive review of this fun Star Trek themed slots game, offering huge jackpots & bonus rounds.";

$slotName = 'Star Trek Red Alert';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7693
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
                            <h1 class="title title--h2">An Outerspace Adventure Slot - Star Trek Red Alert</h1>
                            <p>
                                Star Trek Red Alert is the first of five Star Trek themed slots developed by Williams Interactive and WMS. It is based off of the original series, and although there have been many additional series set in the same Star Trek universe, fans of the original show will recognize their favourite characters in this slot machine. When they first announced in 2010 that they were going to do a Star Trek series, fans of the show were worried that they would not do it justice. Well, prepare to be blown away because Star Trek Red Alert stays true to the series and features all of the characters that we know and love. It also includes tons of bonus features and ways for you to win a ton of cash &ndash; Read on to learn more!
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/star-trek-red-alert.png" class="review-game__img" alt="Star Trek Red Alert" width="200" height="139">
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
                        <h2 class="title title--h2">Classic Star Trek Symbols From the Original Series</h2>
                        <p>
                            As we mentioned above, the developers of this slots game were meticulous in their attention to detail to make sure that the game gives a great experience to fans of the Star Trek TV show. Even if you have never seen the show, you will love the graphics and the sound effects which make you feel like you are on a spaceship with Captain Kirk and the crew of the Enterprise. The graphics in Star Trek Red Alert show up on the reels as Dr. McCoy, Spock, Captain Kirk, Evil Guy, a Medical Tricorder, a communicator, Starfleet Insignias, Klingon Birds (spaceships), Phasers (pistols) and the Feature Icon (the Star Trek logo). There are multiple story lines in the game, which play out in the different bonus features.
                        </p>
                        <h2 class="title title--h2">Intergalactic Bonus Features </h2>
                        <p>
                            There are so many bonus features to this game, it is staggering. Usually you will find one or two bonus features and maybe a bonus game within the game. WMS spared no expense in developing this game to make sure it would be a ton of fun and like nothing else you have experienced. The first feature is Scotty's Wild Reel, in which Scotty appears and fills up one or two entire reels with his symbol. Spock is also a special feature, and provides multipliers of 3x all the way up to 10x whenever he appears on the reel. There is also a Fly- By Feature in which the Enterprise herself flies by across your screen. In this feature, all current winning combinations will change into either a Wild symbol, Feature symbol, Star Trek Insignia, Spock, Kirk or Dr. Mccoy.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('star-trek-red-alert', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Red Alert! There Are More Fun Features to Play</h2>
                        <p>
                            If you thought those bonus features were enough to keep you busy, there is one more exciting feature to come. The Red Alert bonus round is the best of the bunch, and truly unique to this slots game. The Red Alert feature has the potential to unlock unlimited free spins for as long as the feature lasts. When you line up the Feature symbol three or more times on the reels, you will be transported to the screen where the USS Enterprise is under attack from enemy space ships. Each enemy is worth a multiplier of various amounts. You start the bonus round with five shields, and each time you do not spin a win, you lose a shield. When you win on any of the 25 paylines, the Enterprise fires on one of the enemy ships, and awards you the multiplier of that ship. The feature is over after all five shields have been destroyed, which if you are lucky can take quite a while to happen.
                        </p>
                        <h2 class="title title--h2">The Final Frontier: Conclusions on Star Trek Red Alert Slots</h2>
                        <p>
                            Star Trek Red Alert is a fantastic game by world renowned developers <a href="/software/williams-interactive" title="Williams Interactive">Williams Interactive</a>. Star Trek fans will love seeing all of the crew members and Star Trek graphics on the screen as they spin the wheels. The bonus features of this game cannot be beat, and include free spins, multipliers, an exciting bonus round, wilds and Wild Reels. The game may be confusing to beginners who are not familiar with slots bonus features, but it is easy to get used to and well worth the effort!
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
