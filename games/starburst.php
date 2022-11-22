<?php
$title = "Number One Online Slot Starburst - Play For Free";
$desc = "Canada's Favourite Slot - Put to the test. Discover what makes Starburst so rewarding. Enjoy this great slot game here, free.";

$slotName = 'Starburst';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 2884
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom"  id="freeGame">
        <div class="container">
            <div itemscope="" itemtype="http://schema.org/Review">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
            ?>
                <div class="review-game__information ">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-8">
                            <h1 class="title title--h2">Starburst Review: NetEnt&rsquo;s Top Online Slot</h1>
                            <p>
                                Released to overwhelming acclaim by award-winning online slots developer NetEnt, Starburst truly took the world of online casinos by storm. It remains one of the best online slots and is enjoyed by millions of real money online slots players in
                                Canada and the rest of the world. In fact, this arcade-style retro game has proven popular enough to hit the number one spot in our list of NetEnt slots.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/starburst.png" class="review-game__img" alt="Starburst" width="200" height="139">
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
                        <h2 class="title title--h2">Starburst Review: About The Game</h2>
                        <p>
                            This game has quickly become one of the top real money online slots for <a href="/software/netent">NetEnt</a> in the years since its release in 2012. Rest assured that this is not the only highly positive Starburst online review, as many players both in Canada and around the
                            world regularly list Starburst as one of their most popular slots.</p>
                        <p>Released at a time when the world of online slots was becoming over-saturated with glitzy features and style over substance, this super simple slot was a breath of fresh air for online casino players. As you’ll see throughout this Starburst slot
                            review, though, the game is actually deceptively layered.
                        </p>
                        <h2 class="title title--h2">Reach for the Stars</h2>
                        <p>
                            Starburst is, both aesthetically and mechanically, an extremely simple and satisfying online slots experience. It has fantastic arcade-style graphics, with neon stylings that are a throwback to the glitz and volume of the 1980s. The minimalist
                            graphics and gameplay have proven hugely popular in Canada
                        </p>
                        <p>
                            If you read online slots reviews regularly, you’ll notice more and more games boasting 30, 50, or even more paylines. Starburst is a stripped-down slot with just 10 paylines, but that doesn’t mean you can’t hit a big win on NetEnt’s most popular
                            online slot.
                        </p>
                        <p>
                            While there are just 10 paylines, there are far more than 10 ways to win. Starburst pays out consecutive symbols from left to right, with winning combinations not being required to begin on the first reel. This means that you’ll get a surprising
                            amount of payline wins as you spin.
                        </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('starburst', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Special Features &amp; Jackpot Info</h2>
                        <p>
                            Because of the minimalist and stripped-down nature of this game, our Starburst online slot review is quite short on detailing special bonus features. However, we believe this to be a welcome change from many games that put too much focus on these
                            big flashy bonuses that rarely pay out big wins.</p>
                        <p>Don’t be fooled into thinking that you can’t win big playing Starburst, though. The expanding Starburst Wilds are the bread and butter of this game. If you manage to hit a wild symbol, then not only do you get an increased chance of a payline
                            win, but the reel will expand and lock in place for a re-spin with a reel full of wilds..
                        </p>
                        <p>
                            The game doesn’t carry a progressive jackpot, but we still wouldn't turn down the chance to win C$50,000 which is the top prize possible playing this game.</p>
                        <h2 class="title title--h2">Starburst Online Review: Our Verdict</h2>
                        <p>To conclude this online slot review of Starburst, we can only leave you with a thought as wonderfully simple as the game itself: that it's extremely difficult to not have fun playing this game. Frequently-triggered expanding wilds, many ways to
                            win, and great graphics make this one of the best real money online slots you can find.</p>
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
