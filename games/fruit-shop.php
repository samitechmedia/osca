<?php
$title = "Fruit Shop Slot Machine - Play Free [No Download]";
$desc = "Play Fruit Shop Slot Machine Free Online &#10148; No Download / No Registration. Play for Fun! [Instant Play]";

$slotName = 'Fruit Shop';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2874
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
            <h1 class="title title--h2">Fruit Shop Slot Machine - Play For Fun</h1>
            <p>
              It's never been easier to get your five fruits and vegetables each day than by spinning the reels on this classic, bubbly cartoon game from NetEnt. Generally, when you read an online slots review about a NetEnt game then you know it will be a positive
              one and this awesome little 15-payline slot is no exception.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/fruit-shop.png" class="review-game__img" alt="Fruit Shop" width="200" height="139">
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

      <div class="review__text-block type-display-flex type-flex-justify-between type-margin-bottom">
        <div class="type-left-side">
          <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
          <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
          <h2 class="title title--h2">The Game In A Nutshell</h2>
          <p>We’ll start by saying that the game is wonderfully simple, something many of our NetEnt slots review pages have in common. It’s a five-reel, 15-payline game with great graphics, a wild multiplier symbol, and a cool little free spins bonus feature.</p>
          <p>This is a game that will really appeal to all sorts of online slot aficionados in Canada, with a wide range of betting limits to suit everyone, no matter how many dollars they’ve managed to rustle up for a bankroll. You play as little as C$0.01
            or as much as C$150 per bet. With more than 500 times your bet to be won, it’s worth considering your bet size carefully.</p>
          <h2 class="title title--h2">Feel Fruity With Great Graphics &amp; Gameplay</h2>

          <p>This game is immediately striking because its aesthetic and graphics are both very different to most online slots you’ll find in Canada. The classic slots poker ranking symbols are bright bubble letters, and naturally there are many different
            fruits on the reels. These symbols are of course slots classics, and true to form the cherry symbol is the highest-paying one.</p>
          <p>The game doesn’t come jam-packed with bonus features and mini-games, but you will be rewarded with frequent wins and the feature round is relatively easy to trigger. On the other hand, however, a Fruit Shop online review wouldn’t be complete without
          pointing out that the maximum jackpot is just 80,000 coins – significant, but not mind-boggling.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('fruitshop', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
        <h2 class="title title--h2">Get Your Free Spins At The Fruit Shop</h2>
        <p>The best way to win playing this game is by hitting the free spins feature round. Like the graphics and the gameplay, this feature is a pretty simple one and does exactly what it says on the tin. You’ll land a free spin whenever you hit two or
          more cherry symbols on the reels, with up to five free spins available.</p>
        <p>As you might expect, this is very easy to do and you’ll regularly find yourself landing a free spin or two throughout play. You can extend your free spins by hitting another two or more cherries during your free spins, which can extend your wins
          even further. This frequent re-trigger is one of the top perks we found during our Fruit Shop online slot review.</p>
        <h2 class="title title--h2">Fruit Shop Slot Review: Our Verdict</h2>
        <p>This is a modern game with a classic online slots theme and a great cartoon twist that will appeal to old school slots fans and modern video slots players alike. While Fruit Shop is a pretty high variance slot, the ease of hitting multiple free
          spins means that we can’t help but conclude our Fruit Shop review with a very positive recommendation of this game.</p>
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
