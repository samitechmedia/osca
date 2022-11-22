<?php
$title = "Spartacus Gladiator of Rome - " . date('Y') . "'s Best Slot Game Review";
$desc = "Spartacus Gladiator of Rome Slots " . date('Y') . " - The most definitive review of this fun & popular online slots game, offering huge jackpots & bonus rounds.";

$slotName = 'Spartacus Gladiator of Rome';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7691
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
                            <h1 class="title title--h2">Slots Game Review - Spartacus Gladiator of Rome</h1>
                            <p>
                                Slot machines are loved the world round for their exciting game play and fun themes. Spartacus Gladiator of Rome is a game that is sure to please. It is based off of the famous character Spartacus, a Tharacian gladiator who battled other Gladiators, beasts and gods inside of the Roman Colosseum. The game is filled with action packed sound effects of steel crashing against steel, bringing you back in time and into the world of the Gladiator. This is a classic tale that has been told over the centuries and never seems to get old. Spartacus is as awesome a hero today as he was in Roman times, and this slots game is definitely not one to miss!
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/spartacus-gladiator-of-rome.png" class="review-game__img" alt="Spartacus Gladiator of Rome" width="200" height="139">
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
                        <h2 class="title title--h2">Roman Empire Symbols and Reels</h2>
                        <p>
                            Anyone who has played Williams Interactive or WMS slot games knows that this company is constantly innovating and coming up with new and exciting ways to set their games up. Spartacus Gladiator of Rome was obviously a fun one for them to develop. It really pushes the boundaries of slots to a whole new level. The game is set in their unique Colossal Reels formation, featuring a five reel by four reel base gaming screen positioned right next to a separate five reel by 1 reel colossal reels game, which in total gives you 100 paylines. This is truly a massive number when you consider the fact that most games have only 10 to 20 paylines! Not only that, when you spin a Wild, it automatically transfers over to the Colossal Reel and fills the entire reel set.
                        </p>
                        <h2 class="title title--h2">Bonus Features in Spartacus Gladiator of Rome</h2>
                        <p>
                            The graphics in Spartacus Gladiator of Rome are no joke. They are stunningly rendered in realistic illustrations and feature the classic card symbols heart, diamond, spade and club. You will also see Spartacus himself and a female gladiator, coliseum, swords and lions. If you line up three or more coliseum symbols you will trigger the free spin feature. You can spin this symbol on reels one, three and five on both reel sets. The free spin bonus gives you eight free spins with 2x winnings on each free spin. If you line up more coliseums, you get more spins and bigger wins. Four symbols gets you 12 spins and 5x wins, while five coliseums gets you 20 spins with 20x wins.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('spartacus-gladiator-of-rome', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Special Spartacus Bonus Round</h2>
                        <p>
                            One more special feature of Spartacus Gladiator of Rome is the Spartacus Wild symbol. This is a feature of the main reel set on the left hand side of your screen. Look out for this symbol because if it stacks up on one of the reels, it makes all four reel positions Wild. The Wild transfers over to the Colossal Reel as well, making the entire double reel set chock full of Wilds! This is an amazing thing to see, and not something that you get to experience in regular old five by five slots reels. You will be awarded additional free spins during this feature when there are three or more Coliseum symbols on either reel set.
                        </p>
                        <h2 class="title title--h2">Conclusions – Our Thoughts on Spartacus Gladiator of Rome</h2>
                        <p>
                            The Spartacus Gladiator of Rome slots machine is another big hit from WMS. <a href="/software/williams-interactive" title="Williams Interactive">Williams Interactive</a> continues to innovate in the industry put out fantastic games with awesome bonus features. Spartacus has been a popular theme over the centuries because we love a good hero story, and this slots game is one of our favourites due to the awesome story, graphics and features of the game.
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
