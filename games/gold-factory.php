<?php
$title = "Gold Factory Slots Review (".date('Y').") - By Microgaming";
$desc = "Gold Factory Slot Review for ".date('Y')." - We take a look at this gold-inspired slot machine by Microgaming. Find out more on multipliers, jackpots &amp; more!";

$slotName = 'Gold Factory';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 23
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
            <h1 class="title title--h2">Gold Factory Slots Review</h1>
            <p>
              The accompanying phenomenal growth of online gambling here in Canada and all over the world now means more slot choices than ever. Some online casinos offer hundreds of varieties of slots. A savvy gambler like you needs a lot more to go on in picking
              a machine than just novelty and entertainment appeal. You want one where you actually have a decent chance to win. As thousands of delighted players have already discovered, Gold Factory is that kind of slot machine.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/gold-factory.jpg" class="review-game__img" alt="Gold Factory" width="200" height="139">
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
          <h2 class="title title--h2">Gold Factory Overview</h2>
          <p>Gold Factory was developed by Microgaming in 2011. The game has 5 reels and 50 paylines, so you can see right away there are lots and lots of ways you can win.</p>
          <p>Unsurprisingly, since to hit the jackpot is every slot player's dream, research has shown that slots with money themes are far and away the most popular. So Microgaming obliged and created a machine with nothing but gold as its theme. All
            the action takes place inside a busy gold factory. However, there is no question, even for a second, as to what one product is being made there. The place is bursting at the seams with enough gold ingots to make you an instant multi-millionaire.
            And what a cheerful workplace it is. Even the laborers appear carefree and happy, surrounded by trains, hot air balloons, gold submarines, and gold carts.</p>
          <p>Once you start spinning the reels and see even more gold flying down the chutes, while cheerful music plays softly in the background, you won't want to go anywhere. You have your own job to perform-to keep spinning and keep winning!</p>
          <h2 class="title title--h2">The Important Symbols</h2>
          <p>All of the symbols on the reels relate to the Gold Factory theme. The Gold Factory logo is extra special, though, because that is the game's wild symbol. It can substitute for any other symbol except the scatter symbol and thereby turn a losing
            spin into a winning spin. The Gold Factory logo is also your key to winning the top fixed jackpot of 7,500 coins.</p>
          <p>The scatter symbol is the gold coin. Get 3 or more simultaneously and you activate the bonus game. The bonus game starts with your entry into the Boiler room. There are 12 hoppers being loaded with gold bars, and you must select 4 of them.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('goldfactory', 'game-images'); ?>
        </div>
        <p>Prizes and tokens are at stake. You could win a token giving you up to 35 free spins with double winnings. Or you could get the token that opens up another bonus game in the Reactor Room, giving you a shot at more prizes and bonuses. But this
          time, you are not necessarily limited to opening up just 4 of the 12 operational points. You can keep on going until a "malfunction" ends the bonus round.</p>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">No Need to Bet Big to Win Big</h2>
          <p>The huge betting range available to Gold Factory players makes this slot game equally appealing to slot lovers with any size bankroll and stakes preference from small stakes players to high rollers. You can also play for free. The minimum
            real money bet per spin is 1 payline for 1 cent. The maximum bet per spin is all 50 paylines at twenty 10 cent coins per line, which adds up to C$100 per spin. This is a lot of money, so be careful. If your bankroll is limited, be content
            playing for small stakes and winning less money.</p>
          <p>Gold Factory does not offer a progressive jackpot. But you can still win big with the fixed jackpots and bonus games. The top fixed jackpot is 7,500 coins (5 Gold Factory symbols on the same payline). The maximum amount you can win in the
              bonus game is a whopping 619,000 coins!</p>
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
