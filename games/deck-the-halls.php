<?php
$title = "Deck the Halls Slot Review ".date('Y')." - By Microgaming";
$desc = "Deck the Halls Slot Review - Learn more about this Christmas-themed slot machine by Microgaming. We look at jackpots, bonus rounds &amp; even more.";

$slotName = 'Deck the Halls';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2423
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
            <h1 class="title title--h2">Deck the Halls Slot Review</h1>
            <p>
              Feeling festive? We certainly are. We've been playing Deck the Halls, a Christmas themed slot game by top gaming developers Microgaming that really appeals to our sense of good will and love of prizes, no matter the time of year. This theme certainly
              has that cosy Christmas feel about it, so no matter if you are playing in the heat of July and feeling nostalgic for Christmas past, or simply wanting to fully indulge in the Christmas spirit in the months leading up to the special day, this game
              will have you singing &ldquo;deck the halls&rdquo; and spontaneously buying junk for people you don't like before you know it!
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/deck-the-halls.png" class="review-game__img" alt="Deck the Halls" width="200" height="139">
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
          <h2 class="title title--h2">Festive Soundtrack and Theme</h2>
          <p>
            The Christmas theme song can become a little wearing after a while, even for the most intense Christmas lovers among us; luckily there is the option to mute it, so you can play your very own version of Christmas good cheer as you play. Alternatively,
            if you really love the sound of The Twelve Days of Christmas playing over and over, we recommend you listen to it with headphones, so that you can get the full benefit of the joyous music, without driving any loved ones crazy. Trust us, you'll
            thank us when its time to open your Christmas presents this year!
          </p>
          <h2 class="title title--h2">Gaming Configuration</h2>
          <p>The game itself is a 5 reel slot and of course to keep in the Christmas spirit offers an extraordinarily generous 30 paylines. The symbols on the reel are as you would expect – Christmas trees, roast turkeys, reindeers and all of the other festive
            symbols we have come to associate with the 25th of December. It's sentimental, sweet and will have you carolling along in no time.</p>
          <p>Be on your best behaviour and watch out particularly for the big man himself – Santa Clause – because when he comes to town, extra special bonuses are to be had! Santa is the stacking symbol – a feature unique to this game. If you stack Santa
          in the main game or bonus round you get a 4 x multiplier added to your win. The Deck the Halls symbol is the Wild in this game, and the logo will complete your winning combinations for you, giving you a big extra boost towards the profit on
          your Christmas wish list. Fill your stockings with the Bells Scatter symbol, your gateway into the ultimate prize bonus round. If you hit three or more in one spin you will be welcomed into the hall of free spins, where you can enjoy 15 spins
          on the house and a multitude of multipliers to really boost your bankroll.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('deckthehalls', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding-bottom">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">A Challenging Slot</h2>
          <p>However, despite the sugary theme, caution is urged, particularly to newer players. This is actually a highly advanced game. While the slot may seem harmless and an easy win, it is actually a high variance slot machine, meaning it can take away
            just as rapidly as it gives. You need to be careful with your bankroll on this one. The rewards are high, but as is the way of the gambling world, so are the stakes. Another thing that you need to be aware of, is that while the game offers 30
            paylines, these aren't just readily available to the lowest bidder. In classic modern Christmas spirit – what you get is what you pay for. You can wager up to 30 coins at a time, and every coin you wager unlocks a different payline. That means
            that if you only bet 20 coins, and you hit the jackpot in an unlocked payline, unfortunately you will be kicking yourself.</p>
          <h2 class="title title--h2">The Final Verdict From Our Team</h2>
          <p>So, while this game may be Christmas themed, it's possible that this is done by design to lure in unsuspecting new players who will be taken aback by the high variance of the game. Left without the skills or know-how, they are likely to end up
          losing the game. However, thanks to this, experts can cash in all year round with the incredible bonuses. If you know how to work the slot, it's a brilliant game to play any time of year, no need to wait until Christmas.</p>
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
