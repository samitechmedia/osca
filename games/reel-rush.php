<?php
$title = "Reel Rush Slots Review ".date('Y')." - Play For C$ or Free!";
$desc = "Latest Reel Rush Online Slot Review for ".date('Y')." - Play for free or real money & generous rewards, 3,125 ways to win in free spins round + a top jackpot.";

$slotName = 'Reel Rush';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 4385
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
                            <h1 class="title title--h2">Reel Rush: Online Slot Review</h1>
                            <p>
                                This ode to 1990s platform gaming is enchanting in its simplicity. During the course of this Reel Rush slot review, we certainly had some real nostalgia thanks to the graphics and animations of this awesome 5-reel NetEnt slot. Oh, and did we mention
                                that it has a staggering 3,125 ways to win?
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/reel-rush.png" class="review-game__img" alt="Reel Rush" width="200" height="139">
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
                        <h2 class="title title--h2">Play Reel Rush</h2>
                        <h2 class="title title--h2">It’s-a me, Reel Rush!</h2>
                        <p>
                            Feeling fruity? Fruit symbols have been a staple of online slots, video slots, and even the old-school one-armed bandits in Las Vegas. In fact, you’ll be hard-pressed to find an online slot review that doesn’t allude to the fruity symbols on the
                            reels when discussing one of these classic games. The symbols are shaped like different coloured hard candies: strawberry flavour, mint flavour, and blackcurrant flavour.
                        </p>
                        <p>
                            Reel Rush adds an extra twist to this classic slots theme with a modern-day update. Games like Candy Crush have become massively popular with mobile gamers in Canada because of their call back to classic platform video games like Mario Bros, and
                            Reel Rush does the same.
                        </p>
                        <h2 class="title title--h2">3,125 Ways to Win</h2>
                        <p>
                            In another nod to the Mario World franchise, the wild symbol is a star. Like Candy Crush, you need to clear away spaces on the reels. In this case, each winning combination will reveal additional symbols from your starting 13 symbols to a full
                            complement of 25. However, miss a win and you’ll go right back to the beginning.
                        </p>
                        <p>
                            Each set of reels you clear in this game awards you a star, and when you collect six stars and clear the entire set of reels, you’ll be awarded with a great free spins feature round. During this feature, you’ll have an astounding 3,125 ways to
                            win which means you can lock up some pretty hefty real money prizes!
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('reelrush', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">The Bells and Whistles</h2>
                        <p>
                            If you know what you’re doing and would rather let the computer take care of itself, you can use the autoplay feature. When you get really good, this will allow you to work several slots simultaneously. This is especially great with a game like
                            Reel Rush, which is a decent earner and will generate a small but steady profit. Another note for this online review is that the soundtrack is a perfect accompaniment to spinning the reels on this great game.
                        </p>
                        <h2 class="title title--h2">Reel Rush Slot Review: Our Verdict</h2>
                        <p>
                            Overall, this is one of NetEnt’s more impressive slots. Like many of the online slot reviews we write about NetEnt games, what at first glance seems like an overly-simple game has layers deeper than you see at first glance. It’s proven very popular
                            among online slots fans in Canada, and there’s a lot to be said for the pure engagement of attractive, bubbly pop colours and music that makes the game feel very modern. The clean interface and incredible usability means that it’s one of the
                            better online slots in Canada, and we think you’ll love spinning these reels.
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
