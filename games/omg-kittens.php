<?php
$title = 'OMG Kittens Slot Game - ' . date('Y') . '\'s Most In-depth Slot Reviews';
$desc = 'OMG Kittens is one of ' . date('Y') . '\'s most fun online slots titles. Check out our review and find out about free spins, symbols and game reels.';

$slotName = 'OMG Kittens';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 7677
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
                            <h1 class="title title--h2">OMG Kittens by WMS Slots Review</h1>
                            <p>OMG! This is the cutest slot machine ever. WMS Gaming has come up with a unique concept that any internet user will be familiar with, but you probably never thought you would see in a slot machine. Kittens are all over the internet, either getting into antics or just plain being cute and fluffy. Cat videos and pictures get so much traffic online these days &ndash; we just can&apos;t seem to get enough of them! It is no surprise that this theme has made its way into the online gambling world. If you are not a fan of adorable balls of fluffiness, we suggest you find another slot machine to play, but if you love cute kittens, read on to learn more!</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/omg-kittens.png" class="review-game__img" alt="OMG Kittens" width="200" height="139">
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
                        <h2 class="title title--h2">Cute and Cuddly Reels and Symbols</h2>
                        <p>OMG Kittens is a cute and bubbly game all around. There are five reels with three rows each, the standard slot machine set up. The reels and the background are all brightly coloured with grass and paw prints. Symbols are all cat related, including a ball of yarn for the kitties to play with, a sparkly pink kitty collar, a spilled bottle of milk for a kitten to drink, and of course there are kittens! The kitties include Tiger, an orange stripey kitty, Mr Whiskers, a brown kitten with a white moustache, and Bubbles, a bright white blue eyed kitten. There are 40 paylines in this game, giving you 40 chances to win every time you spin. You can bet anywhere from one cent to one dollar per line, so your max bet would be $40.</p>
                        <h2 class="title title--h2">OMG! Bonus Features!</h2>
                        <p>Of course, the point of this game is not just to look at cute photos of kittens. The object is to win cash, and in order to win in slots you need some bonus features. Well, OMG Kittens has plenty of bonuses to go around! First of all, the kitten symbols are big enough that they take up the entire reel when you land on one. If you line up three or more of the same kitty, you are in for massive payouts. Mixing and matching the kitties also gives you a nice prize. There is also a scatter symbol, the Fishcat, which is a kitty trying to sneak into a fish bowl.</p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('omg-kittens', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Even More Feline Fun With Free Spins</h2>
                        <p>There is also an opportunity to win a ton of free spins when you see Tiger, Mr Whiskers or Buttons on your screen. Any time you land all three cats, with a bonus on the fifth reel, you will be awarded free spins. If you see any of the kittens on reel five you might even be in for a multiplier of up to 100x! The combination of kitties determines the amount of free spins or multiplier that is awarded to you. The luckiest player will get the multiplier while going through their free spins round. This game is fantastic for beginners, and you can expect to earn about 20 to 40 percent above your budget when you play. </p>
                        <h2 class="title title--h2">Final Thoughts on OMG Kittens Slots  </h2>
                        <p>OMG Kittens is a really fun and sweet game. It is a nice break from the usual <a href="/games/video-slots" class="text--link" title="video slots">video slots</a>, which tend to focus on action and overzealous bonus features in order to attract customers away from the competition. OMG Kittens is an old fashioned slots game with the standard five reel set up, but with a fresh and inviting theme that you won't find anywhere else. We recommend this game for beginners because it is uncomplicated and fun to learn the ropes of gambling on.</p>
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
