<?php
$title = "Frankie Dettori's Magic Seven Slot Review ".date('Y')."";
$desc = "Read Frankie Dettori&apos;s Magic Seven Online Slot Review for ".date('Y')." - Learn even more about this popular horse-racing inspired online slot game, bonus rounds &amp; special features!";

$slotName = 'Frankie Dettori\'s Magic Seven';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 4491
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
            <h1 class="title title--h2">Frankie Dettori's Magic Seven Slot Review</h1>
            <p>
              Frankie Dettori became famous for being one of the best jockeys of all time, and soared to fame when he won every single one of the 7 races on Champion's Day at Ascot, 1996 - hence the nickname Magic 7. The iconic status of this racetrack champion
              is such that even in Canada, his name is still commonly heard in betting circles. The jackpot in this game is a fitting 7,777 coins which you win when you land 5 of the man himself. However, if you are betting with the maximum value and number
              of coins, this jackpot reaches all the way up to 77,770 coins. The 5 reel, 25 payline slot offers a good selection of special features including a gamble feature and 2 special bonus rounds, making it easy to stay engaged. Read our review on the
              tips and quirks of the game, and discover the best places to play.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/frankie-dettoris-magic-seven.png" class="review-game__img" alt="Frankie Dettoris Magic Seven" width="200" height="139">
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
          <h2 class="title title--h2">Getting Symbolic</h2>
          <p>The symbols revolve around the Frankie in action. One shows him shooting down the racetrack, another is of him celebrating his fantastic winning streak and the final is him grinning and enjoying life. We were pleased to notice the decent amount
            of mid-range wins in this game. The second highest symbol, of Frankie celebrating, pays out a very acceptable 2000 coins, so there's plenty of opportunities to walk away with a Dettori style grin.</p>
          <h2 class="title title--h2">Bonus Round</h2>
          <p>Activate the first of the bonus round by hitting the bonus track symbol on the first and final reel simultaneously. During the opening part you have to make your choice of hidden prizes. Pick wisely, as these determine the amount of multipliers
          you play with in the game. Inside the game, you need to pick sites on the racetrack to uncover your winnings. There's also the chance to uncover trophies which increase your multiplier, along with showing you exciting bonus footage of Dettori's
          famous winning races. This continues until the game randomly decides that it's time to &quot;collect&quot;, and then you return to the base game. The maximum amount you can take away from this round is 280 times your original bet, which is not bad at
          all.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('frankiedettorismagicseven', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Free Games Race Special Feature</h2>
          <p>The next bonus round is the Free Games Race feature. You need to land 3 or more of the scatter symbols to activate this. This game is a true homage to racetrack betting. You will be shown three horses, if you can correctly guess the winner you
            get an incredible 35 free spins! Second place offers 15 and the consolation prize is 10. In this round, unfortunately you cannot trigger any more free spins, but luckily the Wild's are still in play, and there's still a chance to bag that jackpot.</p>
          <h2 class="title title--h2">The Scores on the Boards</h2>
          <p>This medium variance game has a lot to offer the player with a medium budget. While the chance of you winning a life changing amount is incredibly low, there is still a lot to play for. The payout of this game is relatively high, and a lot of
          players will walk away as happy as Dettori. If this sounds like your kind of slot then check out our list of the best casinos we have found to play the game.</p>
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
