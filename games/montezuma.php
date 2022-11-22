<?php
$title = 'Montezuma Slots ' . date('Y') . ' - Expert Game Review &amp; Tips:';
$desc = 'Montezuma Slots ' . date('Y') . ' - Enjoy one of the most popular Williams Interactive online slots games - play now for huge bonuses worth &dollar;1000s!';

$slotName = 'Montezuma';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7672
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
                            <h1 class="title title--h2">Online Slots Review - Montezuma </h1>
                            <p>Do you love history, particularly South American history? If so, Montezuma is the online slot machine for you. This game from Williams Interactive focuses on the life and legacy of Montezuma, an ancient Aztec emperor and warrior who has been famed throughout the centuries for his bravery and fierce leadership. The theme of the game fits right in with this classic story, with a jungle background and a solid gold frame around the reels. There are references to Aztec civilization and culture all throughout the game, from the music to the symbols and the bonus features. Read on and we will tell you all about it!</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/montezuma.png" class="review-game__img" alt="Montezuma" width="200" height="139">
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
                <div class="review__text-block type-display-flex type-flex-justify-between">
                    <div class="type-left-side">
                        <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
                        <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
                        <h2 class="title title--h2">Ancient Aztec Reels and Slots Symbols in Montezuma</h2>
                        <p>The symbols and graphics in Montezuma were all meticulously done in the style of South American Aztec culture. The illustrations and symbols are all Aztec in style and the game itself is set in the jungle, with wild animals all around. The symbols you will see on the reels include. The Eagle, Gold Mast, Feather Hat, Snake, Dream Catcher, Aztec Warrior, Pyramid and Aztec Princess. The reels themselves feature golden jungle birds. </p>

                        <h2 class="title title--h2">Awesome Elvis Bonus Features</h2>
                        <p>The Montezuma slot machine has all of the standard features you would expect from a slots game. There are five reels, with 30 paylines. The paylines are automatically included in your bet, so you have the maximum chance to win every time you spin. The minimum bet is one cent, all the way up to 60 coins. You will also find scatters and wilds in this game. The wild symbol acts as any symbol that is needed for the maximum payout. The Pyramid is the wild symbol and only appears on reels two and four. You can also find stacked wilds, which combine with each other to make an even greater prize. </p>

                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('montezuma', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Bonus Round for the Warrior Montezuma</h2>
                        <p>Montezuma slots features an attractive bonus feature with free spins and multipliers. To activate the bonus round, you need to line up at least three Shield scatter symbols. Most slot machines give you a fixed amount of free spins, but Montezuma adds a whole new level of excitement by featuring a spinning wheel that lands on a number in between three and 25 free spins. The other cool part of this bonus feature is the bonus guarantee. If you end your free spins with less than a 10x multiplier, you will automatically be upgraded to a 10x multiplier for a maximum prize of 300 coins. </p>
                        <h2 class="title title--h2">Our Final Thoughts - Elvis The King Lives Slots Conclusion</h2>
                        <p>The Montezuma slot game from <a href="/software/williams-interactive" title="Williams Interactive">WMS</a> is an awesome game with really fantastic features. Not only does it have a great story line and well developed graphics and symbols, it has fun and profitable bonus features as well. With free spins, stacked wilds, multipliers and guaranteed bonus wins, you cannot go wrong! Try this game out today, even if you are not a history fanatic, and we are sure you will love it!</p>
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
