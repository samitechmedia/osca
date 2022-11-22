<?php
$title = "Golden Goddess Slot Review (".date('Y').") - By IGT";
$desc = "Golden Goddess Slot Review for ".date('Y')." - We review this fantasy-based slot machine by IGT. Find out more about jackpots, paylines &amp; multipliers!";

$slotName = 'Golden Goddess';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2343
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
            <h1 class="title title--h2">Golden Goddess Slot Review</h1>
            <p>
              International Gaming Technology (IGT) is well known for having one of the most impressive ranges of slot games among any worldwide developer, with Golden Goddess featuring as a notable addition. Fantasy themed, this game if for those of you who like the game stripped-back, the graphics quality high and the payouts regular. And it would seem you do, judging by the enthusiasm Canadians have for this game.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/golden-goddess.png" class="review-game__img" alt="Golden Goddess" width="200" height="139">
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
          <h2 class="title title--h2">Configuration and Graphics</h2>
          <p>Golden Goddess is a five reel, forty payline slot featuring a blonde-bombshell of a goddess and her pony-tailed love interest. Other characters include a white dove and horse. Although there is no obvious narrative here, the game hints at a romantic
            tale set in Ancient Greece, complete with sun-drenched mountains, lush flora and a classical temple poking out from behind the mountains. One thing to take note of and to give some deserved appreciation to are the hand-drawn symbols – superb
            levels of detail give you top quality icons as well as adding to the overall superior feel to this game’s build.</p>
          <p> Plus, its not all just good looks here, there is some great audio to match. In keeping with the game’s theme, a soft melody, complete with delicate pan-pipe overtones, plays while you spin the reels. On winning, a range of carefully chosen sparkle
            sounds chime out, furthering our belief in the careful production of this game.</p>
          <h2 class="title title--h2">Symbols, Multipliers and the Jackpot</h2>
          <p>As mentioned above the main symbols displayed include the Goddess, the Man, the White Dove and the Horse, while the minor symbols include 10, J, Q, K and A. There are two special symbols that activate the free spins round – a ‘Golden Goddess’
            Wild and a Red Rose bonus. But the main feature here is the Super Stacks. For those new to the game, this means that with every spin (of just 40 coins or more) one symbol is selected to become stacked. More often than not you will get three
            or four rows of the same symbols, allowing you to get 15x to 20x your bet, ensuring your balance doesn’t burn out too quickly, along with your enjoyment. 50x your bet is your max jackpot, won by getting a full screen of five of a kind. When
            this happens the symbols come together to become one giant symbol and signifying a handsome payout is on its way. This isn’t a crazy jackpot sure, but Golden Goddess is designed for continuous entertainment rather than super big bucks.</p>

        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('goldengoddess', 'game-images'); ?>
        </div>
        <p>There is more to Golden Goddess, however, than just the Super Stacks – another feature to look out for is the seven free spins that are up for grabs. These are won by scoring nine Red Rose symbols on reels two, three or four. You then have the
          chance to pick one of the Red Roses and the symbol it reveals will be the one that becomes stacked for the rest of the free spin round. A little frustratingly, the free spins cannot be re-triggered but the presence of the stacked symbols during
          the free spins is more than enough to compensate.</p>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Tactics and Gameplay Tips</h2>
          <p>Although simple in format, Golden Goddess can be somewhat of a strategic slot machine to play. This is especially true when you have triggered the bonus round features, as you will be hoping that the symbol you uncover is going to be a highly
            profitable one. If you’re lucky and it is, you can come by some large paying combinations once the stacked symbols begin to spin during the free spins round. Plus, here wins are almost guaranteed, even if you do pick up one of the lower paying
            symbols.Another tip is to try and always activate as many paylines as you can while playing. With the bonus features being structured the way they are the more paylines you put into action the greater the possibility of winning becomes.</p>
          <h2 class="title title--h2">The Final Verdict</h2>
          <p> To sum things up, there is a reason Golden Goddess is such a hit, what with its good-looking graphics, simple format, relaxing soundtrack and exciting bonus features; it’s easy to just want to keep playing and playing. The jackpot may not be the
          biggest, but don’t that let that put you off. Golden Goddess a lot of fun and can be quite profitable too. Good work IGT, yet another winner, to join the podium alongside the excellent Da Vinci Diamonds and brilliant Pixies of the Forest!</p>
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
