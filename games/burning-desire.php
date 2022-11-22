<?php
$title = "Burning Desire Slots Review ".date('Y')." - Play For Free Here!";
$desc = "Latest Burning Desire Online Slots Review for ".date('Y')." - Find a game for all levels and budgets, with a total of 243 ways to win! Play it now for free.";

$slotName = 'Burning Desire';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2412
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
            <h1 class="title title--h2">Burning Desire - A Review of the Online Slot</h1>
            <p>
              Microgaming presents a new twist on a classic with Burning Desire. We know how well loved the game is in Canada, so we thought we'd go ahead and take a look, and find out for ourselves what all the fuss is about. We checked it out and we have to
              say we were extremely impressed. At its most basic, the game offers 5 reels and makes use of Microgaming's innovative 243 ways to win feature,rather than the traditional payline approach. Yes, you read that correctly, the game has no paylines.
              Ever felt the frustration of having one bar symbol out of place and missing out on an enormous win? You
                feel as though the game were rigged, and it was deliberately letting you miss out on the jackpot. If you had been playing Burning Desire -
              that jackpot would be in your bank account right now.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/burning-desire.png" class="review-game__img" alt="Burning Desire" width="200" height="139">
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
          <h2 class="title title--h2">Symbols and Theme</h2>
          <p>
            The game uses familiar symbols to those acquainted with the original slot games – bells, coins diamonds, roses, a lucky 7, a bar and of course the Burning Desire symbol all set ablaze in this 5 reel set up . The game revolves around the theme
            of love, as you can tell by the name and the symbols, however it has an alternative twist. Think rockabilly tattoo parlour graphics and awesome heavy rock guitar solos, heralding your big win! The graphics look simply fantastic, it's difficult
            not to get excited as the game begins to load, and the intro movie plays. The big aesthetic difference between this game and the old classics is that instead of the machine simply lighting up when you win, the game includes exciting special
            effects like the logo bursting into flames when you win.
          </p>
          <h2 class="title title--h2">Features of the Game</h2>
          <p>
            This slot has the coin symbol as the Scatter, this symbol completes winning combinations and adds to your payout. The power of the Scatter is that the winning symbols can be anywhere on the reel to win. Additionally, there is the Wild card – the
            Burning Desire symbol itself. This also completes winning pattens on the reel, however they need to all be in a line. One of the most exciting features of this game is the bonus round. You need to have 2 Scatter symbols on the board to enter
            the round, and when you do you get 15 free spins and an up to 3 times multiplier meaning that you can win up to 90,000 coins in one round. That's a lot of coins! This combined with the 243 ways to win means that when you enter the bonus round,
            you are almost guaranteed to leave happy!
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('burningdesire', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Rewarding Reels</h2>
          <p>
            It's remarkably easy to win Burning Desire, if also a little easy to get carried away. Every few spins seems to reward you highly. This makes it a little too tempting to place larger bets, so remember to practice good bankroll management while
            you are playing. The best way of doing this is to use the autoplay feature. That way, you can't let your emotions carry you away. Simply pre programme the amount you want to bet and then let the game do the rest.
          </p>
          <h2 class="title title--h2">Conclusions of the Review</h2>
          <p>
            Overall, the game offers much to both amateurs and newcomers alike. It's visually stunning, the rewards come fast and thick, and the jackpots are incredibly high. Burning Desire is just one of those slots that seems to tick a lot of boxes. While
            there are no real fancy twists, like a vampire storyline, to keep players interested, in our professional opinion it doesn't need it. Burning Desire is just what it says on the tin – it gives you a thrilling ride and a chance to leave with more
            than you arrived with!
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
