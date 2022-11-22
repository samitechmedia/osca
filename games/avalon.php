<?php
$title = "Avalon Slots Review (".date('Y').") - By Microgaming";
$desc = "Avalon Slots Review ".date('Y')." - We take a deeper look into this popular slot machine classic to find out more including jackpots &amp; bonus rounds!";

$slotName = 'Avalon';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 626
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
            <h1 class="title title--h2">Avalon Slots Review</h1>
            <p>
              If you were to hear from a fellow Canadian in conversation, &quot;I love my Avalon,&quot; don't assume that the person is talking about his or her car. Avalon is also the name of a particular online casino slot game currently very popular with Canadians, and with many other online slot enthusiasts all over the world.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/avalon.jpg" class="review-game__img" alt="Avalon" width="200" height="139">
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
          <h2 class="title title--h2">Get to Know King Arthur</h2>
          <p>
            If the game of Avalon is new to you, it might be a good idea beforehand to brush up on medieval history. That way, you can fully appreciate the stunning King Arthur based graphics and symbols.
          </p>
          <p>
            Back in medieval times, Avalon was the name of a mystical island. According to legend, Avalon was the place where King Arthur's sword, Excalibur, was forged and then given to him by the Lady of the Lake. King Arthur returned to Avalon, accompanied
            by the Lady of the Lake, to recover from his battle wounds. The game, an homage to King Arthur and his Lady, was launched in 2006 by Microgaming. It is a 5-reel online slot game with 20 paylines.
          </p>
          <p>
            As soon as you log on, mystical music and colourful regal imagery will transport you way back in time to the Middle Ages and the dazzling world of King Arthur's Court. The symbols of the game include the Avalon, the Lady of the Lake, and a treasure
            chest, along with some obvious other memorabilia from that long bygone era such as crowns, coats of arms, brooches, and goblets. Some high playing cards are thrown into the mix as well.
          </p>
          <h2 class="title title--h2">The Lady of the Lake is Your Friend</h2>
          <p>
            The Avalon logo is the game's wild symbol. As such, it can substitute for any other symbol except the scatter symbol, thereby turning losing spins into winning spins.
          </p>
          <p>
            The scatter symbol is the Lady of the Lake. Two ladies, anywhere on the machine, give you an instant win. Three or more, anywhere on the machine, earn you 12 free spins, with any associated winnings multiplied up to 7x. Also, as soon as the free
          spins are activated, a treasure chest symbol appears, acting as a second wild symbol, giving you even more chances to win. On the other hand, during the free spins, if Lady Luck is really looking after you and the Lady of the Lake appears on
          all 5 reels, you win 200x the amount of your bet! If either wild symbol appears on all 5 reels and the Lady of the Lake multiplies the win by 7 on a 200 coin maximum bet, you win even more!
        </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('avalon', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
        <h2 class="title title--h2">Great Selection of Game Options</h2>
          <p>
            You can play Avalon for free as well as for real money. You can play with either 1 cent coins or 50 cent coins over a wide betting range-up to 10 coins per line. The minimum bet per spin is 1 cent. The maximum bet per spin is ten 50 cent coins
            on each of the 20 lines, for a total of C$100. The opportunity for many small wins lowers the volatility.
          </p>
          <p>
            State-of-the-art options like auto play and quick spin allow you to adjust the speed of the game to your taste. You can turn the music off, too, if you prefer.
          </p>
          <h2 class="title title--h2">Nice Bonus Opportunities</h2>
          <p>
            Avalon does not offer a progressive jackpot, just the fixed jackpots when you get 5 matching symbols in a row. The top jackpot (based on a maximum 200 coin bet) is 3,000 coins for 5 Avalons in a row. However, if it happens during a free spin with
            a 7x win multiplier, your win increases to a whopping 21,000 coins!
          </p>
          <p>
            In case you want even more action, Avalon can provide it. Immediately after any win in the regular game or when the free spins are over, you can click on the optional "Gamble Bonus" game. You receive a playing card face down and you can either guess whether the card is red or black or what suit it is. If you guess wrong, you lose whatever you just won. If you guess the colour correctly, your winnings get doubled. If you guess the suit correctly, your winnings get quadrupled!
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
