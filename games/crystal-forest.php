<?php
$title = "Crystal Forest Slot Review ' . date('Y') . ' - By Williams Interactive";
$desc = "Crystal Forest Slot Review (' . date('Y') . ') - Play with magic in this mystical-themed slot machine by Williams Interactive. Learn more about the progressive jackpot!";

$slotName = 'Crystal Forest';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7631
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
            <h1 class="title title--h2">Crystal Forest Slot Review</h1>
            <p>
				Crystal Forest is a five reel, 25 payline slot machine from Williams Interactive. It has a mystical theme with crystals, fairies and magical items and animals, so anyone who likes fantasy will love this game. The graphics are very beautiful, with a darker overall feel and brightly coloured, sometimes even neon coloured symbols featuring mystical symbols. The background of the reels includes clusters of crystals, and the music plays right along into the theme with the sound of crystals tinkling and falling in the background as you spin the reels. This game is very creative and does not follow the standard, played- out themes that you will see in other slots games. It has been a crowd favourite for years and was even upgraded into HD in recent years because it is so popular.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/crystal-forest-classic.png" class="review-game__img" alt="Crystal Forest" width="200" height="139">
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
      <div class="review__text-block type-display-flex type-flex-justify-center-top type-margin-bottom">
        <div class="type-left-side">
			<h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
            <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
			<h2 class="title title--h2">Symbols and Reels Have a Mystical, Magical Quality</h2>
			<p>The symbols in Crystal Forest all revolve around the theme of fantasy and magic. You will find items such as magic books, crystal balls, snowflakes, candles, mushrooms and crystal clusters. There are even magical creatures, including neon coloured forest frogs and bright pink unicorns. Finally, there is a beautiful fairy with long red hair and big green wings. The symbols all have a luminous quality to them that makes them stand out from the dark background as if they were glowing. There are 25 paylines in this game, and you can bet anywhere between 25 cents and $125 per spin, depending on your coin value and the number of paylines you bet on. </p>

			<h2 class="title title--h2">Bonus Features Galore </h2>
			<p>While there is not a bonus round in Crystal Forest, you will still find a lot of fun bonus features to help you win real cash while you play this game. Since this is a fixed payline game, you do have to bet on every single pay line when you play. You can amend your coin value to pay more or less per spin.  The reels in this game are called cascading reels, meaning the symbols fall into place from above instead of spinning. Every time you line up a winning combo, the symbols disappear and new symbols fall into their place. You can line up new winning combinations every time this happens, without having to pay for a new spin. You also will see the Magic Tree wild symbol on the middle reels while you are playing, which replaces each symbol to help you win. </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('crystal-forest', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Special Features of Crystal Forest Slots</h2>
			<p>One more unique feature of Crystal Forest is that it is linked in to WMS's Jackpot Party progressive jackpot. Progressive jackpots continue to grow and grow every time someone played one of the linked games, until someone eventually wins the jackpot. This means you can stand to win a whole lot of money when you play these games. Unfortunately you can only see the jackpot amount when you play for real money, not when you play the free trial version of the game. As we mentioned above, the game has cascading reels. If you are able to hit four cascading reels in row, you will trigger the free spin bonus round for seven free spins. You can get up to 50 additional free spins by continuing to trigger the cascading reels. </p>
			<h2 class="title title--h2">Conclusion and Final Thoughts on This Exciting Slots Game </h2>
			<p>Crystal Forest is overall a wonderful game and very fun to play. Instead of distracting you with flashy videos and bonus games, this game focuses on a few solid features that make it possible for you to win a lot of money. The cascading reels are really fun and you can get a ton of free spins on them, and the progressive jackpot is not to be missed. It is really no wonder why this game has been so popular for so many years. </p>
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
