<?php
$title = "Cat in Vegas Slot Review ".date('Y')." - By Playtech";
$desc = "Cat in Vegas Slot Review (".date('Y').") - Join Felix in this Vegas-inspired slot adventure by Playtech. Learn even more about the in-game progressive jackpot!";

$slotName = 'Cat in Vegas';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 4451
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
            <h1 class="title title--h2">Cat in Vegas Slot Review</h1>
            <p>
              Imagine what Hunter S. Thompson would have looked like in Vegas as a cat. Ok, scratch that, you don't
                have to - Playtech has done the hard work for you. The game opens with this twisted character entering the unholy city from the desert. He smartens
              up and primps his paws, ready for a night on the town and in search of riches beyond your wildest
                imaginings. Join Felix in his search for the desirable progressive jackpot in Playtech's Cat in Vegas. But first, read our review to find out all the juicy details.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/cat-in-vegas.png" class="review-game__img" alt="Cat in Vegas" width="200" height="139">
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
          <h2 class="title title--h2">The Set Up and Symbols of the Slot</h2>
          <p>
            This 5 reel slot offers up to 20 paylines, depending on your bet, and is set against a backdrop of the most famous gambling strip in the world – the skyline of Las Vegas. The symbols with the highest value are the the symbols with Felix in them.
            There are three: the cat brandishing a cocktail, carrying stacks of US dollars and finally, Felix looking fly with a blue casino chip. The rest are the usual Ace, King, Queen and the lowest paying symbol, the number ten. You also have Scatter
            symbols to bolster your winning potential. Hitting any of these symbols a particular number of times in one round activates a bonus round. Read more about this after the jump. The final symbol you need to look out for is the golden Wild symbol,
            which is helps you to make winning combos.
          </p>
          <h2 class="title title--h2">Enter the Bonus Rounds</h2>
          <p>
            Getting three of the Scatter symbol named “The King Show” will gain you entry into a bonus game of the same name. And who better to host The King Show, than the King himself. Elvis Presley will be your host here – his dance moves gift you with
            5 Wilds that remain in position during the entirety of your 20 free spins. It's a super fun and wacky round that will have you chuckling as you spin.
          </p>
          <p>
            The next bonus round is triggered by the appearance of just one Wheel of Luck Symbol. Your main man Felix will give the wheel a spin and award you with a multiplier bonus for you spin. This continues until you hit the same prize twice, then you
            are back to the base game.
          </p>
          <p>
            The final bonus round is the best of the bunch. You need to get three of the “Bonus” scatter symbols to get a place in this round. Once you are in you have a chance to win that exciting progressive jackpot. In this game your new feline pal will
            play 4 slots. The games will keep on pumping out awards and multipliers until he runs them to the ground. If you are lucky enough to see all of the lights above the machines turn red then congratulations, you lucky dog, you've just landed that
            incredible progressive.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('catinvegas', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">The Concluding Thoughts</h2>
          <p>
            You don't need to be Hunter S Thompson, or even have the same lifestyle as him, to play or enjoy this slot. You don't even need a lot of cash – bet as little as you like, as this game has no minimum bet. However, the more you bet, the more paylines
            open up, so there are perks for being a higher roller. Due to the large, ever growing jackpot, the game has a relatively low payout of 92% - however this is to be expected with the prize being so obnoxiously tempting. A good looking game, with
            a playful and amusing theme and a decent sountrack, Cat in Vegas will appeal to most Canadian gamers that are trying to reach that progressive.
          </p>
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
