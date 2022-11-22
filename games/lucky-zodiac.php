<?php
$title = "Lucky Zodiac Slots Review ".date('Y')." - Play For Free Here!";
$desc = "Lucky Zodiac Online Slots Review ".date('Y')." - Try out this slot game free here. It has excellent free spins, regular payouts &amp; a chance to win up to C&dollar;30,000.";

$slotName = 'Lucky Zodiac';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 2646
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
                            <h1 class="title title--h2">Lucky Zodiac Slots Game Review</h1>
                            <p>
                                The Lucky Zodiac slot machine focuses on a Chinese Zodiac theme and leaves you looking for symbols like the Snake, Monkey and Pig to unlock nice sized prizes. It’s a modern-day five-reel video slot, and it offers a generous free spin round that
                                puts out large enough prizes to get excited about. The theme of the game is a bit bland, and there aren’t any special rounds to mix things up,but the game itself is quite enjoyable and you’ll find yourself coming back again and again trying
                                to access the top prizes. </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/lucky-zodiac.png" class="review-game__img" alt="Lucky Zodiac" width="200" height="139">
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
                        <h2 class="title title--h2">The Regular Wins Add Up</h2>
                        <p>The Lucky Zodiac slots game is a straightforward five reel slot that most players will enjoy. The game itself doesn’t feature any special rounds or features other than the free spins round that you’ll unlock periodically. It can be played for
                            an affordable rate, and you’ll have ample opportunities to win thanks to a total of 20 paylines that all activate quite often. </p>
                        <p>During gameplay you can win by lining up any of the symbols, but the scatters and wilds will help you maximize those wins for even better results. Get enough of the scatters and you’ll unlock a generous free spins round that really adds up to
                            large payouts quickly. You’ll be amazed at the prizes that you’re unlocking from free spins and each free spin round will have you eagerly awaiting the next one that you unlock. </p>
                        <h2 class="title title--h2">Cash in Big with Free Spins</h2>
                        <p>When you play Lucky Zodiac slots you have the opportunity for some very nice prize payouts, but only if you get into the free spins round of the game. While playing in the standard part of the game you can win up to 200x your bet with five scatters,
                            but that amount can be multiplied by up to 7x in the free spins round of the game. </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('lucky-zodiac', 'game-images'); ?>
                    </div>
                </div>
                <p>In order to unlock the free spins round you need to find at least three of the scatter symbols. As soon as you do a total of 12 spins are unlocked and you get a multiplier from 2x up to 7x at the top of the screen. That’s how much each of your
                    prize wins are multiplied by through those 12 rounds. That means if you managed to get the top scatter prize during the top multiplier you could see wins as large as 140,000 coins while playing the game, which is quite significant no matter
                    what coin value you’re relying on. </p>
                <p>While you can win decent prizes during standard play, you really need to get into the free spins round in order to activate the most rewarding payouts that you can really get excited about. It’s important to note that unlocking the free spins
                    also transforms the sheep symbol into a wild, giving you twice the wilds to rely on throughout those 12 rounds. This results in many additional prizes that you wouldn’t have had otherwise. </p>
                <div class="row">
                    <div class="col-12 col-xl-6">

                        <h2 class="title title--h2">Nice but Lacking Creativity</h2>
                        <p>While Lucky Zodiac online slots offers quite a bit in the way of bonuses and special features, it doesn’t have much to offer in the looks department. The game is set on a dull green backdrop, and features many of the same bland card symbols
                            that you’ll find at every other slot. Sure the face cards have been dressed up with special symbols, but it’s all the same stuff that you’ve probably already seen a bunch of times with the other games that you play. The symbols are cleanly
                            designed, and there are some unique items such as pottery, lotus flowers and firecracker symbols, but it isn’t enough to give this game a unique and exciting look like some of the others in this genre enjoy. </p>
                        <p>Lucky Zodiac is an exciting take on the Chinese Zodiac that less people are familiar with today. The game itself is straightforward, but it’s rewarding enough to be worth a play. Top jackpots of over C$30,000 give you something to look forward
                            to, and the free spins round leaves you with satisfying prizes almost every time. Give it a try and the exciting gameplay will help you look past the somewhat dull graphics.</p>
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
